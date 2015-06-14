<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->load->Model("Consulta/Consulta_model");
		$this->load->Model("Seguimiento_model");
		$this->load->helper('text');
		$this->load->model('ModeloConv');
		
		
		
		
	}

	//redirect if needed, otherwise display the user list
	function index()
	{

		if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('auth/principal', 'refresh');
			//redirect('auth/login', 'refresh');
		}
		elseif ($this->ion_auth->in_group('registrado')) //remove this elseif if you want to enable this for non-admins
		{
			redirect('auth/principal', 'refresh');
		}
		elseif (!$this->ion_auth->is_admin()) //remove this elseif if you want to enable this for non-admins
		{
			//redirect them to the home page because they must be an administrator to view this
			return show_error('You must be an administrator to view this page.');
		}
		else
		{
			//set the flash data error message if there is one
			/*
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			//list the users
			$this->data['users'] = $this->ion_auth->users()->result();
			foreach ($this->data['users'] as $k => $user)
			{
				$this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			}

			$this->_render_page('auth/index', $this->data);
			*/
			redirect('auth/principal', 'refresh');
		}
	}

	//log the user in
	function login()
	{
		$this->data['title'] = "Login";

		//validate form input
		$this->form_validation->set_rules('identity', 'Identity', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == true)
		{
			//check to see if the user is logging in
			//check for "remember me"
			$remember = (bool) $this->input->post('remember');

			if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
			{
				//if the login is successful
				//redirect them back to the home page
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect('/', 'refresh');
			}
			else
			{
				//if the login was un-successful
				//redirect them back to the login page
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('auth', 'refresh'); //use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		}
		else
		{
			//the user is not logging in so display the login page
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['identity'] = array('name' => 'identity',
				'id' => 'identity',
				'type' => 'text',
				'value' => $this->form_validation->set_value('identity'),
			);
			$this->data['password'] = array('name' => 'password',
				'id' => 'password',
				'type' => 'password',
			);

			$this->_render_page('auth/login', $this->data);
		}
	}

	//log the user out
	function logout()
	{
		$this->data['title'] = "Logout";

		//log the user out
		$logout = $this->ion_auth->logout();

		//redirect them to the login page
		$this->session->set_flashdata('message', $this->ion_auth->messages());
		redirect('auth', 'refresh');
	}

	//change password
	function change_password()
	{
		$this->form_validation->set_rules('old', $this->lang->line('change_password_validation_old_password_label'), 'required');
		$this->form_validation->set_rules('new', $this->lang->line('change_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
		$this->form_validation->set_rules('new_confirm', $this->lang->line('change_password_validation_new_password_confirm_label'), 'required');

		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login', 'refresh');
		}

		$user = $this->ion_auth->user()->row();

		if ($this->form_validation->run() == false)
		{
			//display the form
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
			$this->data['old_password'] = array(
				'name' => 'old',
				'id'   => 'old',
				'type' => 'password',
			);
			$this->data['new_password'] = array(
				'name' => 'new',
				'id'   => 'new',
				'type' => 'password',
				'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
			);
			$this->data['new_password_confirm'] = array(
				'name' => 'new_confirm',
				'id'   => 'new_confirm',
				'type' => 'password',
				'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
			);
			$this->data['user_id'] = array(
				'name'  => 'user_id',
				'id'    => 'user_id',
				'type'  => 'hidden',
				'value' => $user->id,
			);

			//render
			$this->_render_page('auth/change_password', $this->data);
		}
		else
		{
			$identity = $this->session->userdata('identity');

			$change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));

			if ($change)
			{
				//if the password was successfully changed
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				$this->logout();
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('auth/change_password', 'refresh');
			}
		}
	}

	//forgot password
	function forgot_password()
	{
		//setting validation rules by checking wheather identity is username or email
		if($this->config->item('identity', 'ion_auth') == 'username' )
		{
		   $this->form_validation->set_rules('email', $this->lang->line('forgot_password_username_identity_label'), 'required');
		}
		else
		{
		   $this->form_validation->set_rules('email', $this->lang->line('forgot_password_validation_email_label'), 'required|valid_email');
		}


		if ($this->form_validation->run() == false)
		{
			//setup the input
			$this->data['email'] = array('name' => 'email',
				'id' => 'email',
			);

			if ( $this->config->item('identity', 'ion_auth') == 'username' ){
				$this->data['identity_label'] = $this->lang->line('forgot_password_username_identity_label');
			}
			else
			{
				$this->data['identity_label'] = $this->lang->line('forgot_password_email_identity_label');
			}

			//set any errors and display the form
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->_render_page('auth/forgot_password', $this->data);
		}
		else
		{
			// get identity from username or email
			if ( $this->config->item('identity', 'ion_auth') == 'username' ){
				$identity = $this->ion_auth->where('username', strtolower($this->input->post('email')))->users()->row();
			}
			else
			{
				$identity = $this->ion_auth->where('email', strtolower($this->input->post('email')))->users()->row();
			}
	            	if(empty($identity)) {

	            		if($this->config->item('identity', 'ion_auth') == 'username')
		            	{
                                   $this->ion_auth->set_message('forgot_password_username_not_found');
		            	}
		            	else
		            	{
		            	   $this->ion_auth->set_message('forgot_password_email_not_found');
		            	}

		                $this->session->set_flashdata('message', $this->ion_auth->messages());
                		redirect("auth/forgot_password", 'refresh');
            		}

			//run the forgotten password method to email an activation code to the user
			$forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});

			if ($forgotten)
			{
				//if there were no errors
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect("auth/login", 'refresh'); //we should display a confirmation page here instead of the login page
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect("auth/forgot_password", 'refresh');
			}
		}
	}

	//reset password - final step for forgotten password
	public function reset_password($code = NULL)
	{
		if (!$code)
		{
			show_404();
		}

		$user = $this->ion_auth->forgotten_password_check($code);

		if ($user)
		{
			//if the code is valid then display the password reset form

			$this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
			$this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label'), 'required');

			if ($this->form_validation->run() == false)
			{
				//display the form

				//set the flash data error message if there is one
				$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

				$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
				$this->data['new_password'] = array(
					'name' => 'new',
					'id'   => 'new',
				'type' => 'password',
					'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
				);
				$this->data['new_password_confirm'] = array(
					'name' => 'new_confirm',
					'id'   => 'new_confirm',
					'type' => 'password',
					'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
				);
				$this->data['user_id'] = array(
					'name'  => 'user_id',
					'id'    => 'user_id',
					'type'  => 'hidden',
					'value' => $user->id,
				);
				$this->data['csrf'] = $this->_get_csrf_nonce();
				$this->data['code'] = $code;

				//render
				$this->_render_page('auth/reset_password', $this->data);
			}
			else
			{
				// do we have a valid request?
				if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id'))
				{

					//something fishy might be up
					$this->ion_auth->clear_forgotten_password_code($code);

					show_error($this->lang->line('error_csrf'));

				}
				else
				{
					// finally change the password
					$identity = $user->{$this->config->item('identity', 'ion_auth')};

					$change = $this->ion_auth->reset_password($identity, $this->input->post('new'));

					if ($change)
					{
						//if the password was successfully changed
						$this->session->set_flashdata('message', $this->ion_auth->messages());
						redirect("auth/login", 'refresh');
					}
					else
					{
						$this->session->set_flashdata('message', $this->ion_auth->errors());
						redirect('auth/reset_password/' . $code, 'refresh');
					}
				}
			}
		}
		else
		{
			//if the code is invalid then send them back to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("auth/forgot_password", 'refresh');
		}
	}


	//activate the user
	function activate($id, $code=false)
	{
		if ($code !== false)
		{
			$activation = $this->ion_auth->activate($id, $code);
		}
		else if ($this->ion_auth->is_admin())
		{
			$activation = $this->ion_auth->activate($id);
		}

		if ($activation)
		{
			//redirect them to the auth page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect("auth", 'refresh');
		}
		else
		{
			//redirect them to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("auth/forgot_password", 'refresh');
		}
	}

	//deactivate the user
	function deactivate($id = NULL)
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			//redirect them to the home page because they must be an administrator to view this
			return show_error('You must be an administrator to view this page.');
		}

		$id = (int) $id;

		$this->load->library('form_validation');
		$this->form_validation->set_rules('confirm', $this->lang->line('deactivate_validation_confirm_label'), 'required');
		$this->form_validation->set_rules('id', $this->lang->line('deactivate_validation_user_id_label'), 'required|alpha_numeric');

		if ($this->form_validation->run() == FALSE)
		{
			// insert csrf check
			$this->data['csrf'] = $this->_get_csrf_nonce();
			$this->data['user'] = $this->ion_auth->user($id)->row();

			$this->_render_page('auth/deactivate_user', $this->data);
		}
		else
		{
			// do we really want to deactivate?
			if ($this->input->post('confirm') == 'yes')
			{
				// do we have a valid request?
				if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
				{
					show_error($this->lang->line('error_csrf'));
				}

				// do we have the right userlevel?
				if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin())
				{
					$this->ion_auth->deactivate($id);
				}
			}

			//redirect them back to the auth page
			redirect('auth', 'refresh');
		}
	}

	
	//edit a user
	function edit_user($id)
	{
		$this->data['title'] = "Edit User";

		if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id)))
		{
			redirect('auth', 'refresh');
		}

		$user = $this->ion_auth->user($id)->row();
		$groups=$this->ion_auth->groups()->result_array();
		$currentGroups = $this->ion_auth->get_users_groups($id)->result();

		//validate form input
		$this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label'), 'required');
		$this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label'), 'required');
		$this->form_validation->set_rules('phone', $this->lang->line('edit_user_validation_phone_label'), 'required');
		$this->form_validation->set_rules('company', $this->lang->line('edit_user_validation_company_label'), 'required');

		if (isset($_POST) && !empty($_POST))
		{
			// do we have a valid request?
			if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
			{
				show_error($this->lang->line('error_csrf'));
			}

			//update the password if it was posted
			if ($this->input->post('password'))
			{
				$this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
				$this->form_validation->set_rules('password_confirm', $this->lang->line('edit_user_validation_password_confirm_label'), 'required');
			}

			if ($this->form_validation->run() === TRUE)
			{
				$data = array(
					'first_name' => $this->input->post('first_name'),
					'last_name'  => $this->input->post('last_name'),
					'company'    => $this->input->post('company'),
					'phone'      => $this->input->post('phone'),
				);

				//update the password if it was posted
				if ($this->input->post('password'))
				{
					$data['password'] = $this->input->post('password');
				}



				// Only allow updating groups if user is admin
				if ($this->ion_auth->is_admin())
				{
					//Update the groups user belongs to
					$groupData = $this->input->post('groups');

					if (isset($groupData) && !empty($groupData)) {

						$this->ion_auth->remove_from_group('', $id);

						foreach ($groupData as $grp) {
							$this->ion_auth->add_to_group($grp, $id);
						}

					}
				}

			//check to see if we are updating the user
			   if($this->ion_auth->update($user->id, $data))
			    {
			    	//redirect them back to the admin page if admin, or to the base url if non admin
				    $this->session->set_flashdata('message', $this->ion_auth->messages() );
				    if ($this->ion_auth->is_admin())
					{
						redirect('auth', 'refresh');
					}
					else
					{
						redirect('/', 'refresh');
					}

			    }
			    else
			    {
			    	//redirect them back to the admin page if admin, or to the base url if non admin
				    $this->session->set_flashdata('message', $this->ion_auth->errors() );
				    if ($this->ion_auth->is_admin())
					{
						redirect('auth', 'refresh');
					}
					else
					{
						redirect('/', 'refresh');
					}

			    }

			}
		}

		//display the edit user form
		$this->data['csrf'] = $this->_get_csrf_nonce();

		//set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		//pass the user to the view
		$this->data['user'] = $user;
		$this->data['groups'] = $groups;
		$this->data['currentGroups'] = $currentGroups;

		$this->data['first_name'] = array(
			'name'  => 'first_name',
			'id'    => 'first_name',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('first_name', $user->first_name),
		);
		$this->data['last_name'] = array(
			'name'  => 'last_name',
			'id'    => 'last_name',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('last_name', $user->last_name),
		);
		$this->data['company'] = array(
			'name'  => 'company',
			'id'    => 'company',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('company', $user->company),
		);
		$this->data['phone'] = array(
			'name'  => 'phone',
			'id'    => 'phone',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('phone', $user->phone),
		);
		$this->data['password'] = array(
			'name' => 'password',
			'id'   => 'password',
			'type' => 'password'
		);
		$this->data['password_confirm'] = array(
			'name' => 'password_confirm',
			'id'   => 'password_confirm',
			'type' => 'password'
		);

		$this->_render_page('auth/edit_user', $this->data);
	}

	// create a new group
	function create_group()
	{
		$this->data['title'] = $this->lang->line('create_group_title');

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}

		//validate form input
		$this->form_validation->set_rules('group_name', $this->lang->line('create_group_validation_name_label'), 'required|alpha_dash');

		if ($this->form_validation->run() == TRUE)
		{
			$new_group_id = $this->ion_auth->create_group($this->input->post('group_name'), $this->input->post('description'));
			if($new_group_id)
			{
				// check to see if we are creating the group
				// redirect them back to the admin page
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect("auth", 'refresh');
			}
		}
		else
		{
			//display the create group form
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['group_name'] = array(
				'name'  => 'group_name',
				'id'    => 'group_name',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('group_name'),
			);
			$this->data['description'] = array(
				'name'  => 'description',
				'id'    => 'description',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('description'),
			);

			$this->_render_page('auth/create_group', $this->data);
		}
	}

	//edit a group
	function edit_group($id)
	{
		// bail if no group id given
		if(!$id || empty($id))
		{
			redirect('auth', 'refresh');
		}

		$this->data['title'] = $this->lang->line('edit_group_title');

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}

		$group = $this->ion_auth->group($id)->row();

		//validate form input
		$this->form_validation->set_rules('group_name', $this->lang->line('edit_group_validation_name_label'), 'required|alpha_dash');

		if (isset($_POST) && !empty($_POST))
		{
			if ($this->form_validation->run() === TRUE)
			{
				$group_update = $this->ion_auth->update_group($id, $_POST['group_name'], $_POST['group_description']);

				if($group_update)
				{
					$this->session->set_flashdata('message', $this->lang->line('edit_group_saved'));
				}
				else
				{
					$this->session->set_flashdata('message', $this->ion_auth->errors());
				}
				redirect("auth", 'refresh');
			}
		}

		//set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		//pass the user to the view
		$this->data['group'] = $group;

		$readonly = $this->config->item('admin_group', 'ion_auth') === $group->name ? 'readonly' : '';

		$this->data['group_name'] = array(
			'name'  => 'group_name',
			'id'    => 'group_name',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('group_name', $group->name),
			$readonly => $readonly,
		);
		$this->data['group_description'] = array(
			'name'  => 'group_description',
			'id'    => 'group_description',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('group_description', $group->description),
		);

		$this->_render_page('auth/edit_group', $this->data);
	}


	function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key   = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return array($key => $value);
	}

	function _valid_csrf_nonce()
	{
		if ($this->input->post($this->session->flashdata('csrfkey')) !== FALSE &&
			$this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue'))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	function _render_page($view, $data=null, $render=false)
	{

		$this->viewdata = (empty($data)) ? $this->data: $data;

		$view_html = $this->load->view($view, $this->viewdata, $render);

		if (!$render) return $view_html;
	}



	/**************************************************************************/
	/************************* PRINCIPAL **************************************/
	/**************************************************************************/
	function principal()
	{
		/*
		$this->data['user'] = $this->ion_auth->user()->row();
		$this->data['logeado'] = $this->ion_auth->logged_in();
		$this->load->view('interesado/mostrar_informacion/principal_view', $this->data);
		//$this->load->view('pagina_principal/principal_view', $this->data);*/
		$this->data['user'] = $this->ion_auth->user()->row();//
		$this->data['logeado'] = $this->ion_auth->logged_in();
		$datos_convocatoria = array
		(
			'datos_convocatoria' => $this->Consulta_model->getConvocatoria(), 
			'numero_filas' => $this->Consulta_model->getCantidadFilas(),
			'dataUser' => $this->data
		);
		$this->load->view('interesado/mostrar_informacion/principal_view',$datos_convocatoria);
	}



	/**************************************************************************/
	/************************* PRINCIPAL **************************************/
	/**************************************************************************/










	/**************************************************************************/
	/************************** EQUIPO 5 **************************************/
	/********************* REGISTRAR INTERESADO *******************************/
	/**************************************************************************/

	//create a new user
	function create_user()
	{		
		$tables = $this->config->item('tables','ion_auth');

		//validate form input
		$this->form_validation->set_rules('nombre', 'Nombre', 'required');
		$this->form_validation->set_rules('apellidoP', 'Apellido Paterno', 'required');
		#$this->form_validation->set_rules('apellidoM', 'Apellido Materno', 'required');
		$this->form_validation->set_rules('telefono', 'Teléfono', 'required');
		$this->form_validation->set_rules('curp', 'CURP', 'required');
		$this->form_validation->set_rules('email', 'E-Mail', 'required|valid_email|is_unique['.$tables['users'].'.email]');
		$this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');
		#$this->form_validation->set_rules('ftg1', 'Facebook, Twitter, Google+', 'required');
		#$this->form_validation->set_rules('ftg2', 'Facebook, Twitter, Google+', 'required');
		$this->form_validation->set_rules('matricula', 'Matrícula/Número de personal', 'required');
		$this->form_validation->set_rules('promedio', 'Promedio', 'required');
		$this->form_validation->set_rules('pais1', 'Pais Opción 1', 'required');
		#$this->form_validation->set_rules('pais2', 'Pais Opción 2', 'required');
		#$this->form_validation->set_rules('pais3', 'Pais Opción 3', 'required');
		$this->form_validation->set_rules('beca', 'Solicitas beca', 'required');
		
		if ($this->form_validation->run() == true)
		{
			$username = strtoupper($this->input->post('nombre')) . ' ' . strtoupper($this->input->post('apellidoP'));
			$email    = strtolower($this->input->post('email'));
			$password = $this->input->post('password');

			$additional_data = array(
				'first_name' => $this->input->post('nombre'),
				'last_name'  => $this->input->post('apellidoP').' '.$this->input->post('apellidoM'),
				'company'    => '',
				'phone'      => $this->input->post('telefono'),
			);
		}

		if ($this->form_validation->run() == true)
		{
			$idUser = $this->ion_auth->register($username, $password, $email, $additional_data);
			if ($idUser != -1)
			{
			
				$idioma = array
				(
					'idioma1' => $_POST['idioma1'],
					'idioma2' => $_POST['idioma2'],
					'idioma3' => $_POST['idioma3']
				);
				$idIdioma = $this->ion_auth->registrarIdioma($idioma);

				$facultad = array
				(
					'nombreFacultad' => $_POST['facultad'],
					'areaAdscripcion' => $_POST['area']
				);
				$idFacultad = $this->ion_auth->registrarFacultad($facultad);

				$datosPersonales = array
				(
					'nombre' => $this->input->post('nombre'),
					'apellidoP' => $this->input->post('apellidoP'),
					'apellidoM' => $this->input->post('apellidoM'),
					'telefono' => $this->input->post('telefono'),
					'curp' => $this->input->post('curp')
				);
				$iddatosPersonales = $this->ion_auth->registrarDatosPersonales($datosPersonales);

				$paises = array
				(
					'pais1' => $_POST['pais1'],
					'pais2' => $_POST['pais2'],
					'pais3' => $_POST['pais3']
				);
				$idpaises = $this->ion_auth->registrarPaises($paises);

				$cuentas = array
				(
					'correo' => $_POST['ftg1'],
					'otraCuenta' => $_POST['ftg2']
				);
				$idcuentas = $this->ion_auth->registrarCuenta($cuentas);

				$interesado = array
				(
					'matricula' => $this->input->post('matricula'),
					'areaInteres' => $this->input->post('nombre'),
					'semestre' => $this->input->post('nombre'),
					'solicitaBeca' =>  $_POST['beca'],
					'promedio_solicitante' => $this->input->post('promedio'),
					'Usuario_idUsuario' => $idUser,
					'Facultad_idFacultad' => $idFacultad,
					'Idioma_idIdioma' => $idIdioma,
					'otroPerfil_idotroPerfil' => $idcuentas,
					'datosPersonales_iddatosPersonales' => $iddatosPersonales,
					'situacionActual' => $_POST['situacionActual'],
					'nivelDeInteres' => $_POST['nivel'],
					'pais_idpais' => $idpaises
				 );
				$this->ion_auth->registrarInteresado($interesado);
				//check to see if we are creating the user
				//redirect them back to the admin page
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect("auth", 'refresh');
			}
		}
		else
		{
			//display the create user form
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['nombre'] = $this->form_validation->set_value('nombre');
			$this->data['apellidoP'] = $this->form_validation->set_value('apellidoP');
			$this->data['apellidoM'] = $this->form_validation->set_value('apellidoM');
			$this->data['telefono'] = $this->form_validation->set_value('telefono');
			$this->data['curp'] = $this->form_validation->set_value('curp');
			$this->data['email'] = $this->form_validation->set_value('email');
			$this->data['password'] = $this->form_validation->set_value('password');
			$this->data['password_confirm'] = $this->form_validation->set_value('password_confirm');
			$this->data['ftg1'] = $this->form_validation->set_value('ftg1');
			$this->data['ftg2'] = $this->form_validation->set_value('ftg2');
			$this->data['matricula'] =$this->form_validation->set_value('matricula');
			$this->data['promedio'] =$this->form_validation->set_value('promedio');
			$this->data['pais1'] =$this->form_validation->set_value('pais1');
			$this->data['pais2'] =$this->form_validation->set_value('pais2');
			$this->data['pais3'] =$this->form_validation->set_value('pais3');
			$this->data['user'] = null;
			$this->data['logeado'] = 0;
			$this->_render_page('interesado/registro/formRegistro_view', $this->data);
		}
	}


	/**************************************************************************/
	/************************** EQUIPO 5 **************************************/
	/********************* REGISTRAR INTERESADO *******************************/
	/**************************************************************************/

	/**************************************************************************/
	/************************** EQUIPO 7 **************************************/
	/********************* REGISTRAR CONVOCATORIAS ****************************/
	/**************************************************************************/
	function convocatorias()
	{
		$this->data['user'] = $this->ion_auth->user()->row();
		$this->data['logeado'] = $this->ion_auth->logged_in();
		$this->data['convocatoria'] = $this->ion_auth->obtView();
		$this->_render_page('administrador/convocatorias_view', $this->data);
	}

	function crear_convocatoria()
	{
		$this->form_validation->set_rules('nombre', 'Nombre', 'required');
		$this->form_validation->set_rules('promedio', 'Promedio', 'required');
		$this->form_validation->set_rules('fechaI', 'Fecha Inicial', 'required');
		$this->form_validation->set_rules('fechaF', 'Fecha Final', 'required');
		$this->form_validation->set_rules('desc', 'Pais Opción 3', 'required');
		if ($this->form_validation->run() == true)
		{
			$nombre = strtoupper($this->input->post('nombre'));
			$promedio = $this->input->post('promedio');
			$fechaI = $this->input->post('fechaI');
			$fechaF = $this->input->post('fechaF');
			$desc = strtoupper($this->input->post('desc'));
			$grado = $_POST['grado'];
			$uni = $_POST['universidad'];
			$area = $_POST['area'];
			$ciudad = $_POST['ciudad'];
			$pais = $_POST['pais'];
		}


		if ($this->form_validation->run() == true && $this->ion_auth->conv($nombre, $fechaI, $fechaF, $desc, $grado, $uni, $area, $promedio, $pais, $ciudad))
		{
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect("auth/convocatorias", 'refresh');
		}
		else
		{
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['nombre'] = $this->form_validation->set_value('nombre');
			$this->data['promedio'] = $this->form_validation->set_value('promedio');
			$this->data['fechaI'] = $this->form_validation->set_value('fechaI');
			$this->data['fechaF'] = $this->form_validation->set_value('fechaF');
			$this->data['desc'] = $this->form_validation->set_value('desc');
			$this->data['user'] = $this->ion_auth->user()->row();
			$this->data['logeado'] = $this->ion_auth->logged_in();
			$this->data['area'] = $this->ion_auth->obtArea();
			$this->data['pais'] = $this->ion_auth->obtPais();
			$this->data['ciudad'] = $this->ion_auth->obtCiudad();
			$this->data['grado'] = $this->ion_auth->obtGrado();
			$this->data['uni'] = $this->ion_auth->obtUni();
			$this->_render_page('administrador/registro/formRegistro_view', $this->data);
		}
	}

	function crear_area()
	{
		$this->form_validation->set_rules('area', 'Nombre', 'required');
		if ($this->form_validation->run() == true)
		{
			$area = strtoupper($this->input->post('area'));
		}


		if ($this->form_validation->run() == true && $this->ion_auth->guardaArea($area))
		{
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			$this->data['nombre'] = '';
			$this->data['promedio'] = '';
			$this->data['fechaI'] = '';
			$this->data['fechaF'] = '';
			$this->data['desc'] = '';
			$this->data['user'] = $this->ion_auth->user()->row();
			$this->data['logeado'] = $this->ion_auth->logged_in();
			$this->data['area'] = $this->ion_auth->obtArea();
			$this->data['pais'] = $this->ion_auth->obtPais();
			$this->data['ciudad'] = $this->ion_auth->obtCiudad();
			$this->data['grado'] = $this->ion_auth->obtGrado();
			$this->data['uni'] = $this->ion_auth->obtUni();
			redirect("auth/crear_convocatoria", 'refresh');
		}
		else
		{
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['area'] = $this->form_validation->set_value('area');
			$this->data['user'] = $this->ion_auth->user()->row();
			$this->data['logeado'] = $this->ion_auth->logged_in();
			$this->_render_page('administrador/registro/formAgregarArea_view', $this->data);
		}
	}

	function crear_pais()
	{
		$this->form_validation->set_rules('pais', 'Nombre', 'required');
		if ($this->form_validation->run() == true)
		{
			$area = strtoupper($this->input->post('pais'));
		}


		if ($this->form_validation->run() == true && $this->ion_auth->guardaPais($area))
		{
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			$this->data['nombre'] = '';
			$this->data['promedio'] = '';
			$this->data['fechaI'] = '';
			$this->data['fechaF'] = '';
			$this->data['desc'] = '';
			$this->data['user'] = $this->ion_auth->user()->row();
			$this->data['logeado'] = $this->ion_auth->logged_in();
			$this->data['area'] = $this->ion_auth->obtArea();
			$this->data['pais'] = $this->ion_auth->obtPais();
			$this->data['ciudad'] = $this->ion_auth->obtCiudad();
			$this->data['grado'] = $this->ion_auth->obtGrado();
			$this->data['uni'] = $this->ion_auth->obtUni();
			redirect("auth/crear_convocatoria", 'refresh');
		}
		else
		{
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['pais'] = $this->form_validation->set_value('pais');
			$this->data['user'] = $this->ion_auth->user()->row();
			$this->data['logeado'] = $this->ion_auth->logged_in();
			$this->_render_page('administrador/registro/formAgregarPais_view', $this->data);
		}
	}

	function crear_ciudad()
	{
		$this->form_validation->set_rules('ciudad', 'Nombre', 'required');
		if ($this->form_validation->run() == true)
		{
			$pais = strtoupper($this->input->post('pais'));
			$ciudad = strtoupper($this->input->post('ciudad'));
		}


		if ($this->form_validation->run() == true && $this->ion_auth->guardaCiudad($ciudad, $pais))
		{
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			$this->data['nombre'] = '';
			$this->data['promedio'] = '';
			$this->data['fechaI'] = '';
			$this->data['fechaF'] = '';
			$this->data['desc'] = '';
			$this->data['user'] = $this->ion_auth->user()->row();
			$this->data['logeado'] = $this->ion_auth->logged_in();
			$this->data['area'] = $this->ion_auth->obtArea();
			$this->data['pais'] = $this->ion_auth->obtPais();
			$this->data['ciudad'] = $this->ion_auth->obtCiudad();
			$this->data['grado'] = $this->ion_auth->obtGrado();
			$this->data['uni'] = $this->ion_auth->obtUni();
			redirect("auth/crear_convocatoria", 'refresh');
		}
		else
		{
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['ciudad'] = $this->form_validation->set_value('ciudad');
			$this->data['pais'] = $this->form_validation->set_value('pais');
			$this->data['user'] = $this->ion_auth->user()->row();
			$this->data['logeado'] = $this->ion_auth->logged_in();
			$this->data['pais'] = $this->ion_auth->obtPais();
			$this->_render_page('administrador/registro/formAgregarCiudad_view', $this->data);
		}
	}

	function crear_grado()
	{
		$this->form_validation->set_rules('grado', 'Nombre', 'required');
		if ($this->form_validation->run() == true)
		{
			$grado = strtoupper($this->input->post('grado'));
		}


		if ($this->form_validation->run() == true && $this->ion_auth->guardaGrado($grado))
		{
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			$this->data['nombre'] = '';
			$this->data['promedio'] = '';
			$this->data['fechaI'] = '';
			$this->data['fechaF'] = '';
			$this->data['desc'] = '';
			$this->data['user'] = $this->ion_auth->user()->row();
			$this->data['logeado'] = $this->ion_auth->logged_in();
			$this->data['area'] = $this->ion_auth->obtArea();
			$this->data['pais'] = $this->ion_auth->obtPais();
			$this->data['ciudad'] = $this->ion_auth->obtCiudad();
			$this->data['grado'] = $this->ion_auth->obtGrado();
			$this->data['uni'] = $this->ion_auth->obtUni();
			redirect("auth/crear_convocatoria", 'refresh');
		}
		else
		{
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['grado'] = $this->form_validation->set_value('grado');
			$this->data['user'] = $this->ion_auth->user()->row();
			$this->data['logeado'] = $this->ion_auth->logged_in();
			$this->_render_page('administrador/registro/formAgregarGrado_view', $this->data);
		}
	}

	function crear_universidad()
	{
		$this->form_validation->set_rules('universidad', 'Nombre', 'required');
		if ($this->form_validation->run() == true)
		{
			$uni = strtoupper($this->input->post('universidad'));
		}


		if ($this->form_validation->run() == true && $this->ion_auth->guardaUni($uni))
		{
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			$this->data['nombre'] = '';
			$this->data['promedio'] = '';
			$this->data['fechaI'] = '';
			$this->data['fechaF'] = '';
			$this->data['desc'] = '';
			$this->data['user'] = $this->ion_auth->user()->row();
			$this->data['logeado'] = $this->ion_auth->logged_in();
			$this->data['area'] = $this->ion_auth->obtArea();
			$this->data['pais'] = $this->ion_auth->obtPais();
			$this->data['ciudad'] = $this->ion_auth->obtCiudad();
			$this->data['grado'] = $this->ion_auth->obtGrado();
			$this->data['uni'] = $this->ion_auth->obtUni();
			redirect("auth/crear_convocatoria", 'refresh');
		}
		else
		{
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['universidad'] = $this->form_validation->set_value('universidad');
			$this->data['user'] = $this->ion_auth->user()->row();
			$this->data['logeado'] = $this->ion_auth->logged_in();
			$this->_render_page('administrador/registro/formAgregarUni_view', $this->data);
		}
	}
	/**************************************************************************/
	/************************** EQUIPO 7 **************************************/
	/********************* REGISTRAR CONVOCATORIAS ****************************/
	/**************************************************************************/

	/**************************************************************************/
	/************************** EQUIPO 6 **************************************/
	/********************* ACTUALIZAR CONVOCATORIAS ***************************/
	/**************************************************************************/
	function actualizarConv()
	{
		$this->data['area'] = $this->ion_auth->obtArea();
		$this->data['lugar'] = $this->ion_auth->obtCiudad();
		$this->data['ciudad'] = $this->ion_auth->obtCiudad();
		$this->data['grado'] = $this->ion_auth->obtGrado();
		$this->data['uni'] = $this->ion_auth->obtUni();
		$this->data['user'] = $this->ion_auth->user()->row();
		$this->data['pais'] = $this->ion_auth->obtPais();
		$id = $this->input->post('idConv');
		$conv = $this->ion_auth->obtConvocatoria($id);
		$this->data['convocatoria'] = $conv->result()[0];
		$this->data['logeado'] = $this->ion_auth->logged_in();
		$this->_render_page('administrador/actualizar/formActualizarConv_view', $this->data);
	}

	function act_convocatoria()
	{
		$this->form_validation->set_rules('nombre', 'Nombre', 'required');
		$this->form_validation->set_rules('promedio', 'Promedio', 'required');
		$this->form_validation->set_rules('fechaI', 'Fecha Inicial', 'required');
		$this->form_validation->set_rules('fechaF', 'Fecha Final', 'required');
		$this->form_validation->set_rules('desc', 'Pais Opción 3', 'required');
		if ($this->form_validation->run() == true)
		{
			$id = $this->input->post('id');
			$nombre = strtoupper($this->input->post('nombre'));
			$promedio = $this->input->post('promedio');
			$fechaI = $this->input->post('fechaI');
			$fechaF = $this->input->post('fechaF');
			$desc = strtoupper($this->input->post('desc'));
			$grado = $_POST['grado'];
			$uni = $_POST['universidad'];
			$area = $_POST['area'];
			$ciudad = $_POST['ciudad'];
			$pais = $_POST['pais'];
		}


		if ($this->form_validation->run() == true && $this->ion_auth->actConv($nombre, $fechaI, $fechaF, $desc, $grado, $uni, $area, $promedio, $pais, $ciudad, $id))
		{
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect("auth/convocatorias", 'refresh');
		}
		else
		{
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['nombre'] = $this->form_validation->set_value('nombre');
			$this->data['promedio'] = $this->form_validation->set_value('promedio');
			$this->data['fechaI'] = $this->form_validation->set_value('fechaI');
			$this->data['fechaF'] = $this->form_validation->set_value('fechaF');
			$this->data['desc'] = $this->form_validation->set_value('desc');
			$this->data['user'] = $this->ion_auth->user()->row();
			$this->data['logeado'] = $this->ion_auth->logged_in();
			$this->data['area'] = $this->ion_auth->obtArea();
			$this->data['pais'] = $this->ion_auth->obtPais();
			$this->data['ciudad'] = $this->ion_auth->obtCiudad();
			$this->data['grado'] = $this->ion_auth->obtGrado();
			$this->data['uni'] = $this->ion_auth->obtUni();
			$this->_render_page('administrador/registro/formRegistro_view', $this->data);
		}
	}

	function act_area()
	{
		$this->form_validation->set_rules('area', 'Nombre', 'required');
		if ($this->form_validation->run() == true)
		{
			$area = strtoupper($this->input->post('area'));
		}


		if ($this->form_validation->run() == true && $this->ion_auth->guardaArea($area))
		{
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			$this->data['nombre'] = '';
			$this->data['promedio'] = '';
			$this->data['fechaI'] = '';
			$this->data['fechaF'] = '';
			$this->data['desc'] = '';
			$this->data['user'] = $this->ion_auth->user()->row();
			$this->data['logeado'] = $this->ion_auth->logged_in();
			$this->data['area'] = $this->ion_auth->obtArea();
			$this->data['pais'] = $this->ion_auth->obtPais();
			$this->data['ciudad'] = $this->ion_auth->obtCiudad();
			$this->data['grado'] = $this->ion_auth->obtGrado();
			$this->data['uni'] = $this->ion_auth->obtUni();
			redirect("auth/act_convocatoria", 'refresh');
		}
		else
		{
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['area'] = $this->form_validation->set_value('area');
			$this->data['user'] = $this->ion_auth->user()->row();
			$this->data['logeado'] = $this->ion_auth->logged_in();
			$this->_render_page('administrador/registro/formAgregarArea_view', $this->data);
		}
	}

	function act_pais()
	{
		$this->form_validation->set_rules('pais', 'Nombre', 'required');
		if ($this->form_validation->run() == true)
		{
			$area = strtoupper($this->input->post('pais'));
		}


		if ($this->form_validation->run() == true && $this->ion_auth->guardaPais($area))
		{
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			$this->data['nombre'] = '';
			$this->data['promedio'] = '';
			$this->data['fechaI'] = '';
			$this->data['fechaF'] = '';
			$this->data['desc'] = '';
			$this->data['user'] = $this->ion_auth->user()->row();
			$this->data['logeado'] = $this->ion_auth->logged_in();
			$this->data['area'] = $this->ion_auth->obtArea();
			$this->data['pais'] = $this->ion_auth->obtPais();
			$this->data['ciudad'] = $this->ion_auth->obtCiudad();
			$this->data['grado'] = $this->ion_auth->obtGrado();
			$this->data['uni'] = $this->ion_auth->obtUni();
			redirect("auth/act_convocatoria", 'refresh');
		}
		else
		{
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['pais'] = $this->form_validation->set_value('pais');
			$this->data['user'] = $this->ion_auth->user()->row();
			$this->data['logeado'] = $this->ion_auth->logged_in();
			$this->_render_page('administrador/registro/formAgregarPais_view', $this->data);
		}
	}

	function act_ciudad()
	{
		$this->form_validation->set_rules('ciudad', 'Nombre', 'required');
		if ($this->form_validation->run() == true)
		{
			$pais = strtoupper($this->input->post('pais'));
			$ciudad = strtoupper($this->input->post('ciudad'));
		}


		if ($this->form_validation->run() == true && $this->ion_auth->guardaCiudad($ciudad, $pais))
		{
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			$this->data['nombre'] = '';
			$this->data['promedio'] = '';
			$this->data['fechaI'] = '';
			$this->data['fechaF'] = '';
			$this->data['desc'] = '';
			$this->data['user'] = $this->ion_auth->user()->row();
			$this->data['logeado'] = $this->ion_auth->logged_in();
			$this->data['area'] = $this->ion_auth->obtArea();
			$this->data['pais'] = $this->ion_auth->obtPais();
			$this->data['ciudad'] = $this->ion_auth->obtCiudad();
			$this->data['grado'] = $this->ion_auth->obtGrado();
			$this->data['uni'] = $this->ion_auth->obtUni();
			redirect("auth/act_convocatoria", 'refresh');
		}
		else
		{
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['ciudad'] = $this->form_validation->set_value('ciudad');
			$this->data['pais'] = $this->form_validation->set_value('pais');
			$this->data['user'] = $this->ion_auth->user()->row();
			$this->data['logeado'] = $this->ion_auth->logged_in();
			$this->data['pais'] = $this->ion_auth->obtPais();
			$this->_render_page('administrador/registro/formAgregarCiudad_view', $this->data);
		}
	}

	function act_grado()
	{
		$this->form_validation->set_rules('grado', 'Nombre', 'required');
		if ($this->form_validation->run() == true)
		{
			$grado = strtoupper($this->input->post('grado'));
		}


		if ($this->form_validation->run() == true && $this->ion_auth->guardaGrado($grado))
		{
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			$this->data['nombre'] = '';
			$this->data['promedio'] = '';
			$this->data['fechaI'] = '';
			$this->data['fechaF'] = '';
			$this->data['desc'] = '';
			$this->data['user'] = $this->ion_auth->user()->row();
			$this->data['logeado'] = $this->ion_auth->logged_in();
			$this->data['area'] = $this->ion_auth->obtArea();
			$this->data['pais'] = $this->ion_auth->obtPais();
			$this->data['ciudad'] = $this->ion_auth->obtCiudad();
			$this->data['grado'] = $this->ion_auth->obtGrado();
			$this->data['uni'] = $this->ion_auth->obtUni();
			redirect("auth/act_convocatoria", 'refresh');
		}
		else
		{
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['grado'] = $this->form_validation->set_value('grado');
			$this->data['user'] = $this->ion_auth->user()->row();
			$this->data['logeado'] = $this->ion_auth->logged_in();
			$this->_render_page('administrador/registro/formAgregarGrado_view', $this->data);
		}
	}

	function act_universidad()
	{
		$this->form_validation->set_rules('universidad', 'Nombre', 'required');
		if ($this->form_validation->run() == true)
		{
			$uni = strtoupper($this->input->post('universidad'));
		}


		if ($this->form_validation->run() == true && $this->ion_auth->guardaUni($uni))
		{
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			$this->data['nombre'] = '';
			$this->data['promedio'] = '';
			$this->data['fechaI'] = '';
			$this->data['fechaF'] = '';
			$this->data['desc'] = '';
			$this->data['user'] = $this->ion_auth->user()->row();
			$this->data['logeado'] = $this->ion_auth->logged_in();
			$this->data['area'] = $this->ion_auth->obtArea();
			$this->data['pais'] = $this->ion_auth->obtPais();
			$this->data['ciudad'] = $this->ion_auth->obtCiudad();
			$this->data['grado'] = $this->ion_auth->obtGrado();
			$this->data['uni'] = $this->ion_auth->obtUni();
			redirect("auth/act_convocatoria", 'refresh');
		}
		else
		{
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['universidad'] = $this->form_validation->set_value('universidad');
			$this->data['user'] = $this->ion_auth->user()->row();
			$this->data['logeado'] = $this->ion_auth->logged_in();
			$this->_render_page('administrador/registro/formAgregarUni_view', $this->data);
		}
	}
	/**************************************************************************/
	/************************** EQUIPO 6 **************************************/
	/********************* ACTUALIZAR CONVOCATORIAS ***************************/
	/**************************************************************************/

	/**************************************************************************/
	/************************** EQUIPO 2 **************************************/
	/********************* GENERAR INFORMES ***********************************/
	/**************************************************************************/
	function verReporte()
	{
		$this->data['user'] = $this->ion_auth->user()->row();
		$this->data['logeado'] = $this->ion_auth->logged_in();
		$this->_render_page('administrador/reportes/reportes_view', $this->data);
	}


	function getTipos()
	{
		$id = $this->input->post('id');
		if($id == 1 || $id == 2 ||$id == 3 ||$id == 4 || $id == 5 || $id == 6)
		{
			switch ($id) 
			{
				case '1':
					$this->verReporteContenido(1);
					break;
				case '2':
					$this->data['tipo'] = "Grado";
					$this->data['query'] = $this->ion_auth_model->getTipo($id);
					$this->load->view('administrador/reportes/selectTipo_view', $this->data);
					break;
				case '3':
					$this->data['tipo'] = "Area";
					$this->data['query'] = $this->ion_auth_model->getTipo($id);
					$this->load->view('administrador/reportes/selectTipo_view', $this->data);
					break;					
				case '4':
					$this->data['tipo'] = "País";
					$this->data['query'] = $this->ion_auth_model->getTipo($id);
					$this->load->view('administrador/reportes/selectTipo_view', $this->data);
					break;				
				case '5':
					$this->data['tipo'] = "Universidad";
					$this->data['query'] = $this->ion_auth_model->getTipo($id);
					$this->load->view('administrador/reportes/selectTipo_view', $this->data);
					break;
				case '6':
					$this->verReporteContenido(6);
					break;	
				
				default:
					# code...
					break;
			}
		}
	}

	function verReporteContenido($idReporte = 0)
	{		
		if ($idReporte == 0) 
		{		
			$tipo = $this->input->post('tipo');
			$idReporte = $this->input->post('idReporte');
			if($idReporte == 1 || $idReporte == 2 ||$idReporte == 3 || $idReporte == 4 || $idReporte == 5)
			{
				$query = $this->ion_auth_model->getReg($idReporte, $tipo);				
				if($query != false)
				{
					switch ($idReporte) 
					{
						case '2':
							$this->data['tipo'] = "Reporte de convocatorias por grado de estudio";
							break;
						case '3':
							$this->data['tipo'] = "Reporte de convocatorias por area de formación";
							break;
						case '4':
							$this->data['tipo'] = "Reporte de convocatorias por país";
							break;
						case '5':
							$this->data['tipo'] = "Reporte de convocatorias por universidad";
							break;
						
						default:
							break;
					}											
					$this->data['registros'] = $query;	
					$html = $this->load->view('administrador/reportes/reportecontenido_view', $this->data, true);
					$data = pdf_create($html, '', false);
					delete_files('assets/pdf/temporal.pdf');
			     	write_file('assets/pdf/temporal.pdf', $data);
				}
			}
		}
		elseif ($idReporte == 1) 
		{
			$query = $this->ion_auth_model->getReg(0, 0);
			if($query != false)
			{
				$this->data['tipo'] = "Reporte de convocatorias";
				$this->data['registros'] = $query;	
				$html = $this->load->view('administrador/reportes/reportecontenido_view', $this->data, true);
				$data = pdf_create($html, '', false);
				delete_files('assets/pdf/temporal.pdf');
		     	write_file('assets/pdf/temporal.pdf', $data);
			}
		}
		elseif ($idReporte == 6) 
		{
			$query = $this->ion_auth_model->getFavs();
			
			if($query != false)
			{
				$this->data['favs'] = $query;					
				$html = $this->load->view('administrador/reportes/reporteFavoritos_view', $this->data, true);
				$data = pdf_create($html, '', false);
				delete_files('assets/pdf/temporal.pdf');
		     	write_file('assets/pdf/temporal.pdf', $data);
			}
		}

	}
	/**************************************************************************/
	/************************** EQUIPO 2 **************************************/
	/********************* GENERAR INFORMES ***********************************/
	/**************************************************************************/
	
	/**************************************************************************/
	/************************** EQUIPO 4 **************************************/
	/********************* GENERAR MOSTRAR ***********************************/
	/**************************************************************************/
	
	function PrincipalInt()
	{
		$this->data['user'] = $this->ion_auth->user()->row();//
		
		$datos_convocatoria = array
		(
			'datos_convocatoria' => $this->Consulta_model->getConvocatoria(), 
			'numero_filas' => $this->Consulta_model->getCantidadFilas(),
			'dataUser' => $this->data,
			'tablas_favoritas' => $this->Consulta_model->getFavoritos(),
			'user' => $this->data['user'],
			'matricula_u' => $this->Seguimiento_model->obtenerMatricula($this->data['user']->id),
			'logeado' => $this->ion_auth->logged_in()
		);
		$this->load->view('interesado/mostrar_informacion/principal_int',$datos_convocatoria);
	}
	
	function showConvocatoria(){
		$id = $_POST['id'];
		$datos = $this->Consulta_model->obtener($id);
		foreach($datos->result() as $row){
			$uni=$row->Universidad_idUniversidad1;
			$lugar=$row->Lugar_idLugar;
			$area=$row->Area_idArea;
			$grado=$row->Grado_idGrado;
		}
		
		
		$data = array(
		    'data' => $this->Consulta_model->obtener($id),
			'data2' => $this->Consulta_model->datos($id)
		);
		
		
		$this->load->view('interesado/mostrar_informacion/contenido',$data);
		
		
	}
	
	function showConvocatoriaCorreo(){
		$id = $_POST['id'];
		$datos = $this->Consulta_model->obtener($id);
		foreach($datos->result() as $row){
			$uni=$row->Universidad_idUniversidad1;
			$lugar=$row->Lugar_idLugar;
			$area=$row->Area_idArea;
			$grado=$row->Grado_idGrado;
		}
		
		
		$data = array(
		    'data' => $this->Consulta_model->obtener($id),
			'data2' => $this->Consulta_model->datos($id),
			'user' => $this->ion_auth->user()->row()
		);
		
		$this->load->view('interesado/mostrar_informacion/contenido_correo',$data);
		
		
	}
	
	function megusta(){
		$iduser=$this->uri->segment(3);
		$id=$this->uri->segment(4);
		//$id = $_POST['id'];
		//$iduser = $_POST['userid'];

		     $query = $this->Consulta_model->getUsuario($iduser);
		//$this->load->view('pagina_principal/prueba',$data);
		foreach($query->result() as $row){
			$mat=$row->matricula;
		}
		$this->Consulta_model->favorito($id,$mat);
		redirect('auth/PrincipalInt');
	}
	
	
	/**************************************************************************/
	/************************** EQUIPO 4 **************************************/
	/********************* GENERAR MOSTRAR ***********************************/
	/**************************************************************************/
	
	/**************************************************************************/
	/************************** EQUIPO 1 **************************************/
	/********************* GENERAR SEGUIMIENTO ***********************************/
	/**************************************************************************/
	
	/*
	* En estas vista va las convocatorias  a las que pedi informacion por correo
	*/ 
	public function seguimiento_correo()
	{
		$this->data['user'] = $this->ion_auth->user()->row();
		$this->data['logeado'] = $this->ion_auth->logged_in();
		$matricula = $this->Seguimiento_model->obtenerMatricula($this->data['user']->id);
		$this->data['convocatorias'] = $this->Seguimiento_model->obtenerConvocatoriasCorreo($matricula);
		$this->load->view('interesado/seguimiento/correo_view', $this->data);
	}
	
	/*
	* En esta vista van las convocatorias a las que di megusta
	*/
	public function ver_mis_favoritos()
	{
		$this->data['user'] = $this->ion_auth->user()->row();
		$this->data['logeado'] = $this->ion_auth->logged_in();
		$matricula = $this->Seguimiento_model->obtenerMatricula($this->data['user']->id);
		$this->data['convocatorias'] = $this->Seguimiento_model->obtenerConvocatorias($matricula);
		$this->load->view('interesado/seguimiento/favoritos_view', $this->data);
	}
	/*
	* En esta vista van las convocatorias en las que fui aceptado
	* se tienen que activar desde el lado del administrador
	*/
	public function ver_mi_historial()
	{
		$this->data['user'] = $this->ion_auth->user()->row();
		$this->data['logeado'] = $this->ion_auth->logged_in();
		$matricula = $this->Seguimiento_model->obtenerMatricula($this->data['user']->id);
		$this->data['convocatorias'] = $this->Seguimiento_model->obtenerConvocatorias($matricula);
		$this->load->view('interesado/seguimiento/historial_view', $this->data);
	}
	public  function ver_encuesta(){
    //id de favoritos
		$id=$this->uri->segment(3);
		$datos= array('id' => $id );
    //echo $id;
		$this->load->view('interesado/seguimiento/encuesta', $datos);
	}
	public function guarda_encuesta(){
		$id=$_POST["id"];
		$r1=$_POST["p1"];
		$r2=$_POST["p2"];
		$r3=$_POST["p3"];
		$datos= array('idFavoritos' => $id, "respuesta1" => $r1, "respuesta2" => $r2, "respuesta3" =>$r3 );
		$this->Seguimiento_model->guardaCuestionario($datos);
		$this->load->view("interesado/seguimiento/continuar");
	}
	
	/**************************************************************************/
	/************************** EQUIPO 1 **************************************/
	/********************* GENERAR SEGUIMIENTO ***********************************/
	/**************************************************************************/
	
	/**************************************************************************/
	/************************** EQUIPO 3 **************************************/
	/********************* GENERAR correo ***********************************/
	/**************************************************************************/
	
	public function enviarCorreo(){
  	
  	
  	$name = $_POST['asunto'];
	$email = $_POST['email'];
	$descProblem = $_POST['dudas'];
	$subject =$name;
	$estado =''; 
	$messageE = <<<EMAIL

	$descProblem
EMAIL;

	$header ="From: $email ";
	if($_POST){
		if ($name == '' || $email ==''|| $descProblem='') {
			echo "<script> alert('Mensaje No Enviado!');
			</script>";
		
		}
		else{
		 $to ='ejemplo@eejemplo.com';
		mail( $to,$subject, $messageE, $header);
		echo "<script> alert('Mensaje  Enviado!');
		</script>";

		$data= 
			array(
				'matricula'=> $this->input->post('mat'), 
				'idPrograma'=> $this->input->post('idprograma')
			);
		
		$this->ModeloConv->insertar($data);
		redirect("auth/PrincipalInt");
		}
       
	}
  }
  /**************************************************************************/
	/************************** EQUIPO 3 **************************************/
	/********************* GENERAR correo ***********************************/
	/**************************************************************************/
	
	
}
