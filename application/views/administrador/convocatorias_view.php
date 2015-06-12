<?php 
    $this->load->view('head/librerias_view'); 
    $this->load->view('header/header_view', $logeado, $user);
 ?>

<div class="container convocatorias">
	<div class="row">
        <div class="col-md-6">
        	<h1 class="page-head-line">Convocatorias</h1><br>
          	<a href="crear_Convocatoria"><button class="btn btn-info">Registrar convocatorias</button></a><br><br><br>
        </div>
	</div>          
	<div class="row">
		<?php 
			if($convocatoria != null){
			foreach ($convocatoria as $row) {?>
	            <div class=" col-md-4 col-sm-4">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<?= $row->nombre;?>
						</div>
						<div class="panel-body">
							<p>Nombre: <?= $row->nombre;?></p>
							<p>Grado: <?= $row->grado;?></p>
							<p>País: <?= $row->pais;?></p>
							<p>Area: <?= $row->area;?></p><br>	
						</div>
						<div class="panel-footer">
							<div class="row">									
								<div class="col-md-6" >
									<form action=""></form>
									<a href="actualizar/<?= $row->idconv;?>">										
										<button class="btn btn-warning">Modificar</button>
									</a>									
								</div>	
								<?php if($row->edo == 1){ ?>
								<div class="col-md-6" >
									<a href="desactivar/<?= $row->idconv;?>">										
										<button class="btn btn-danger">Desactivar</button>
									</a>									
								</div>
								<?php }else{?>
									<div class="col-md-6" >
										<a href="activar/<?= $row->idconv;?>">										
											<button class="btn btn-danger">Activar</button>
										</a>									
									</div>
								<?php }?>
							</div>													
						</div>	
					</div>
				</div>
		<?php }}?>
	</div> <!-- Termina primera fila! -->     
</div> 
<?php 
    $this->load->view('footer/footer_view');
 ?>