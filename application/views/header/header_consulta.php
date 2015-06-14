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
            <a href="Principal" class="navbar-brand">
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
              <form class="form-horizontal" name="form" action="<?=base_url()?>/index.php/auth/login" method="POST">
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
    