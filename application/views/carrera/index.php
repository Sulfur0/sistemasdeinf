<!-- main-heading -->
<h3 class="main-title-w3layouts mb-2 text-center">Carreras de la facultad <?php echo $facultad["fac_nombre"];?></h3>
<!--// main-heading -->
<?php if (isset($response)) { ?>
	<div class="col-md-6 offset-md-3 space-bot-md">
		<div class="alert alert-success">
			<p><b><?php echo $response;?></b></p>
		</div>
	</div>			
<?php } else if (isset($errors)) { ?>
	<div class="col-md-6 offset-md-3 space-bot-md">
		<div class="alert alert-danger">
			<p><b><?php echo $errors;?></b></p>
		</div>
	</div>			
<?php } ?>

<!-- Tables content -->
<section class="tables-section">	
    <!-- table1 -->
    <div class="outer-w3-agile mt-3">
		<div class="form-control">
			<div class="row">
				<div class="col-md-12">
					<div class="btn-group">
						<a href="<?php echo base_url(); ?>index.php/Carrera/create/<?php echo $facultad["fac_id"];?>" class="btn btn-primary">+ Agregar carrera</a>
					</div>
				</div>
			</div>
		</div>
		<table class="table">
	        <thead class="thead-dark">
	            <tr>
	                <th scope="col">Nombre</th>
	                <th scope="col">Unidades de Credito</th>
	                <th scope="col">Acciones</th>
	            </tr>
	        </thead>
	        <tbody>
	        	<?php foreach ($carreras as $carrera): ?>
	                <tr>
	                    <td><?php echo $carrera['carr_nombre'] ?></td>
	                    <td><?php echo $carrera['carr_unid_cred'] ?></td>	
	                    <td>
	                    	<div class="btn-group">
	                    		<a href="<?php echo base_url(); ?>index.php/Carrera/edit/<?php echo $carrera['carr_id'];?>" class="btn btn-sm btn-warning">Editar</a>
	                    		<a href="<?php echo base_url(); ?>index.php/Carrera/confirm_delete/<?php echo $carrera['carr_id'];?>" class="btn btn-sm btn-danger">Eliminar</a>
	                    	</div>
	                    </td>
	                </tr>
	            <?php endforeach ?>
	        </tbody>
	    </table>
	</div>
</section>

		