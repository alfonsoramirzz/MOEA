 <!-- INICIA CAROUSEL -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
              <img src="<?= base_url(); ?>recursos/images/banner-maestria-derecho.png" alt="Mujer">
            </div>
            <div class="item">
              <img src="<?= base_url(); ?>recursos/images/bannre-kanagwa.png" alt="Hombre">
            </div>
            <div class="item">
              <img src="<?= base_url(); ?>recursos/images/banner-concurso-938x320.png" alt="Hombre">
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- TERMINA CAROUSEL -->