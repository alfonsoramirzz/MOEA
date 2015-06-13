<header>

    <?php
      /*Cambiar menu si esta logeado*/
      if ($logeado == 0)
      {
        $this->load->view('header/noLogeado'); 
      }
      elseif ($logeado == 1)
      {
        $this->load->view('header/logeado', $user);
      }
      /*Cambiar menu si esta logeado*/
    ?>
</header>

