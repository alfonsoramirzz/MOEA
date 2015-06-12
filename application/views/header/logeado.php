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
                <li>
                    <a onclick="verReportes()">
                      <i class="glyphicon glyphicon-file "></i>
                      <span>REPORTES</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar Wrapper-->
        <!--Termina Togle Perfil -->