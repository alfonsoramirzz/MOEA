    <!--Inicio JavaScript-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="<?= base_url(); ?>recursos/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>recursos/js/scripts.js"></script>
    <script src="<?= base_url(); ?>recursos/js/jquery.js"></script>
    <!--Fin JavaScript-->

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
            <a href="#" class="navbar-brand" id="menu-toggle">
                <strog class="titulo">MOVILIDAD</strong>
            </a>      
          </div>
          <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav collapsed navbar-right">                      
              <li class="usuario-icono">
                <a data-toggle="modal" data-target="#basicModal">
                    <span class="glyphicon glyphicon-user usuario-icono"></span>
                    <span class="usuario-icono usuario">&nbsp;INGRESA</span>
                </a>
              </li>
              <li id="li-user"></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
    </nav>

    <!--Inicia Togle Login -->
    <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
          <div class="modal-header">
            <h2>INGRESA</h2>
            <div>
              <h5><small><strong>YA SOY USUARIO MOVILIDAD</strong></small></h5>
              <p><small>Introduce tu dirección de e-mail y la contraseña para identificarte en la web.</small></p>
              <form class="form-horizontal" name="form" action="<?php base_url();?>login" method="POST">
                <div>         
                  <input type="email" name="identity" class="form-control"/><br>
                </div>
                <div>         
                  <input type="password" name="password" value="" class="form-control"/>
                </div>
                <div>
                  <label>RECUERDAME</label>
                  <input type="checkbox" name="remember" id="remember" value="1" checked="checked" />
                </div>
                <div>
                  <button type="submit" class="form-btn">IDENTIFICATE</button>
                </div>
              </form>
            </div>
          </div>
          <div class="modal-header">
            <h2>REGISTRATE</h2>
            <div>
              <h5><small><strong>QUIERO SER USUARIO DE MOVILIDAD</strong></small></h5>
              <p><small>Si todavía no tienes una cuenta de usuario de MOVILIDAD, utiliza esta opción para acceder al formulario de registro. Te solicitaremos la información imprescindible para agilizar el proceso de movilidad.</small></p>
              <div>
                <a href="#">
                <button class="form-btn">REGISTRARME</button>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--Termina Togle Login -->
    <!--Inicia Togle Perfil -->
    <div id="wrapper"  role="navigation">          
        <!-- Sidebar -->
        <div id="sidebar-wrapper">            
            <ul class="sidebar-nav">
                <li class="user-img-div  sidebar-brand">
                    <h4>PEPITO CONTRERAS</h4>   
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
</header>

