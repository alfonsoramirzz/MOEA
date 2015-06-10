<!DOCTYPE html>
<html>
  <title>Reportes</title>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-type" content="text/html;charset=UTF-8">
        <link rel="stylesheet" href="<?php echo base_url("recursos/css/bootstrap.css"); ?>"/>
        <style type="text/css">
  .reporteaula
  {
    margin-left: 50px;
    margin-right: 50px;
  }

  .tftable 
  {
    font-size:10px;
    color:#333333;
    width:82%;
    border-width: 1px;
    border-color: black;
    border-collapse: collapse;
  }

  .tftable th 
  {
    font-size:12px;
    background-color:#009999;
    border-width: 1px;
    padding: 8px;
    border-style: solid;
    border-color: black;
    text-align:center;
    color: white;
    
  }

  .tftable tr 
  {
    background-color:#ffffff;
  }

  .tftable td 
  {
    font-size:11px;
    border-width: 1px;
    padding: 8px;
    border-style: solid;
    border-color: black;
    text-align:center;
    
  }
  .t1{
    font-size: 28px;
    font-weight: bold;
    line-height: 20px;
    text-align: center;
  }
  </style>
  </head>
  <body>
    <div class="container">
      <div class="page-header">
        <img src="<?php echo base_url("recursos/images/reportes/uv1.png"); ?>" align="left">
        <img src="<?php echo base_url("recursos/images/reportes/uv2.png"); ?>" align="center">
        
      </div>
    </div>
    <div class="container">
      <div>
        <p class="t1">Reporte de convocatorias favoritas</p>
      </div>
      <div class="table-responsive">
        <!--<table class="table table-bordered table-hover" align="center">-->
        <table class="tftable" border="1">
            <thead>
                <tr>
                    <th>Convocatoria</th>
				    <th>Numero de Favoritos</th>
                </tr>
            </thead>
            <tbody>
              <?php
		    		foreach ($favs -> result() as $row) 
		    		{
		    			echo "<tr>";
		    				echo "<td>".$row->Convocatoria."</td>";
		    				echo "<td>".$row->favs."</td>";
		    				
		    		}
		    	?>

            </tbody>
        </table>
      </div>
    </div>
  </body>
</html>