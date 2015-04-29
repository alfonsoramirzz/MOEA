<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
      <div class="modal-header">
        <h2><?php echo lang('login_heading');?></h2>
        <div>
          <h5><small><strong>YA SOY USUARIO DE TSHIRTANDSTAFF.COM</strong></small></h5>
          <p><small>Introduce tu dirección de e-mail y la contraseña para identificarte en la web.</small></p>
          <form class="form-horizontal" name="form" action="<?php base_url();?>login" method="POST">
            <div>         
              <input type="email" name="identity" class="form-control"/><br>
            </div>
            <div>         
              <input type="password" name="password" value="" class="form-control"/>
            </div>
            <div>
              <label><?php echo lang('login_remember_label', 'remember');?></label>
              <input type="checkbox" name="remember" id="remember" value="1" checked="checked" />
            </div>
            <div>
              <button type="submit" class="form-btn"><?php echo lang('login_submit_btn');?></button>
            </div>
          </form>
        </div>
      </div>

      <div class="modal-header">
        <h2><?php echo lang('signup_heading');?></h2>
        <div>
          <h5><small><strong>QUIERO SER USUARIO DE TSHIRTANDSTAFF.COM</strong></small></h5>
          <p><small>Si todavía no tienes una cuenta de usuario de TSHIRTANDSTAFF.COM, utiliza esta opción para acceder al formulario de registro. Te solicitaremos la información imprescindible para agilizar el proceso de compra.</small></p>
          <div>
            <a href="create_user">
            <button class="form-btn"><?php echo lang('signup_btn');?></button>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>