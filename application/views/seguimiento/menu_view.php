<?php $usuario = $this->ion_auth->user()->row(); ?>
<header>
    <nav class="navbar navbar-inverse navbar-fixed-top linea-gradada">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand">
                <strog class="titulo">MOVILIDAD</strong>
            </a>      
          </div>
          <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav collapsed navbar-right">                      
              <li class="usuario-icono">
				
                <a class=" btn-menu usuario-icono" id="menu-toggle_usuario">
			      <span class="usuario-icono">&nbsp;</span>
                   <span id="btn-toggle" class="glyphicon glyphicon-triangle-right usuario-icono"><?=$usuario->username?></span>  
                </a>
              </li>
              <li>
                
                <a data-toggle="modal" data-target="#basicModal" href='<?=base_url()?>index.php/auth/logout'>
			      <span class="usuario-icono">&nbsp;</span>
                   <span  class="glyphicon glyphicon-log-out usuario-icono">Salir</span>  
                </a>
              </li>
              
            </ul>
          </div><!--/.nav-collapse -->
        </div>
    </nav>

    <!--Inicia Togle Login -->
    
    <!--Termina Togle Login -->
    
    <!--Inicia Togle Perfil -->
    <div id="wrapper"  role="navigation">          
        <!-- Sidebar -->
        <div id="sidebar-wrapper">            
            <ul class="sidebar-nav">
                <li class="user-img-div  sidebar-brand">
                    <h4><?=$usuario->first_name?> <?=$usuario->last_name?></h4>   
                    <figure>
                      <img src="<?= base_url(); ?>recursos/images/USUARIOS/user.png" class="img-thumbnail" />
                    <figure>                
                </li>
                <li>
                    <a onclick="verConvocatorias()">
                      <i class="glyphicon glyphicon-th"></i>
                      <span>CONVOCATORIAS</span>
                    </a>
                </li>
                <li>
                    <a onclick="verConvInfor()">
                      <i class="glyphicon glyphicon-info-sign "></i>
                      <span>INFORMACIÓN</span>
                    </a>
                </li>
                <li>
                    <a onclick="verMisConv()">
                      <i class="glyphicon glyphicon-eye-open"></i>
                      <span>SEGUIMIENTO</span>
                    </a>
                </li>
                <li>
                    <a onclick="verMisConv()">
                      <i class="glyphicon glyphicon-thumbs-up"></i>
                      <span>MIS CONVOCATORIAS</span>
                    </a>
                </li>
                <li>
                    <a onclick="verMiHistorico()">
                      <i class="glyphicon glyphicon-file "></i>
                      <span>MI HISTORIAL</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar Wrapper-->
        <!--Termina Togle Perfil -->
</header>

