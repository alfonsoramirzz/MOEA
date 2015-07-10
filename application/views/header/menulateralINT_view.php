
    <!--Inicia Togle Perfil -->
    <div id="wrapper"  role="navigation">          
        <!-- Sidebar -->
        <div id="sidebar-wrapper">            
            <ul class="sidebar-nav">
                <li class="user-img-div  sidebar-brand">
                    <h4><?php echo $user->first_name.' '.$user->last_name; ?></h4>   
                    <figure>
                      <img src="<?= base_url(); ?>assets/images/USUARIOS/user.png" class="img-thumbnail" />
                    <figure>                
                </li>
                <li>
                   <a href='<?=base_url()?>index.php/auth/principalInt'>
                      <i class="glyphicon glyphicon-th"></i>
                      <span>CONVOCATORIAS</span>
                    </a>
                </li>
                <li>
                    <a href="<?=base_url()?>index.php/auth/seguimiento_correo">
                      <i class="glyphicon glyphicon-info-sign "></i>
                      <span>INFORMACIÓN</span>
                    </a>
                </li>
                <li>
                    <a href="<?=base_url()?>index.php/auth/ver_mis_favoritos">
                      <i class="glyphicon glyphicon-star-empty"></i>
                      <span>MIS CONVOCATORIAS</span>
                    </a>
                </li>
                <li>
                    <a href="<?=base_url()?>index.php/auth/ver_mi_historial">
                      <i class="glyphicon glyphicon-file "></i>
                      <span>MI HISTORIAL</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar Wrapper-->
        <!--Termina Togle Perfil -->