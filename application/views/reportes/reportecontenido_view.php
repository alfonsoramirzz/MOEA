<!DOCTYPE html>
<html>
  <title>Reportes</title>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-type" content="text/html;charset=UTF-8">
        <script type="text/javascript" src="<?= base_url(); ?>recursos/js/jquery-2.1.4.js); ?>"></script>
        <script type="text/javascript" src="<?= base_url(); ?>recursos/js/bootstrap.js); ?>"></script>
        <link rel="stylesheet" href="<?php echo base_url("recursos/css/bootstrap.css"); ?>"/>
  
  </head>
  <body>
    <div class="container">
      <div class="page-header">
        <img src="<?php echo base_url("recursos/images/reportes/uv.png"); ?>" align="left">
        <h2><p class="text-center">Universidad Veracruzana</p></h2>
        <h3><p class="text-center">Dirección General de Relaciones Internacionales</p></h3>
      </div>
    </div>
    <div class="container">
      <div>
        <h2><p class="text-center">Reporte de convocatorias por grado de estudios</p></h2>
      </div>
      <div class="table-responsive">
        <table class="table table-bordered table-hover" align="center">
            <thead>
                <tr>
                    <th align="center">Convocatoria</th>
                    <th>Universidad</th>
                    <th>Área de Conocimiento</th>
                    <th>Promedio</th>
                    <th>Grado</th>
                    <th>Ciudad</th>
                    <th>País</th>
                    <th>Fecha de Inicio</th>
                    <th>Fecha Fin</th>
                </tr>
            </thead>
            <tbody>
              <?php
                foreach ($registros -> result() as $row) {
                  echo "<tr>";
                    echo "<td>".$row->Convocatoria."</td>";
                    echo "<td>".$row->Universidad."</td>";
                    echo "<td>".$row->Area."</td>";
                    echo "<td>".$row->promedio."</td>";
                    echo "<td>".$row->Grado."</td>";
                    echo "<td>".$row->Ciudad."</td>";
                    echo "<td>".$row->Pais."</td>";
                    echo "<td>".$row->fechaInicio."</td>";
                    echo "<td>".$row->fechaFin."</td>";
                }
              ?>
            </tbody>
        </table>
      </div>
    </div>
  </body>
</html>