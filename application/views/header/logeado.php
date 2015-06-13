<!--navbar-fixed-top-->
<nav class="navbar navbar-inverse navbar-fixed-top linea-gradada">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand" id="menu-toggle">
                <strog class="titulo">MOVILIDAD</strong>
            </a>      
          </div>
          <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav collapsed navbar-right">                      
              <li class="usuario-icono">
                <a href="logout">
                    <span class="glyphicon glyphicon-user usuario-icono"></span>
                    <span class="usuario-icono usuario">&nbsp;<?php echo $user->first_name; ?></span>
                </a>
              </li>
              <li id="li-user"></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
    </nav>
  
  <?php 
    if ($this->ion_auth->is_admin())
    {
      $this->load->view('header/menulateralADM_view');
    }elseif (!$this->ion_auth->is_admin()) {
      $this->load->view('header/menulateralINT_view');
    }
  ?>