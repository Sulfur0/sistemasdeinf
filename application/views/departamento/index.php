<!-- main-heading -->
<h3 class="main-title-w3layouts mb-2 text-center">Departamentos de la facultad <?php echo $facultad["fac_nombre"];?></h3>
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
						<a href="#" class="btn btn-primary">+ Agregar departamento</a>
					</div>
				</div>
			</div>
		</div>
		<table class="table">
	        <thead class="thead-dark">
	            <tr>
	                <th scope="col">Nombre</th>
	                <th scope="col">Acciones</th>
	            </tr>
	        </thead>
	        <tbody>
	        	<?php foreach ($departamentos as $departamento): ?>
	                <tr>
	                    <th scope="row"><?php echo $departamento['dep_nombre'] ?></th>	
	                    <td>
	                    	<div class="btn-group">
	                    		<a href="<?php echo base_url(); ?>index.php/Departamento/edit/<?php echo $departamento['fac_id'];?>" class="btn btn-sm btn-warning">Editar</a>
	                    		<a href="<?php echo base_url(); ?>index.php/Departamento/confirm_delete/<?php echo $departamento['fac_id'];?>" class="btn btn-sm btn-danger">Eliminar</a>
	                    	</div>
	                    </td>
	                </tr>
	            <?php endforeach ?>
	        </tbody>
	    </table>
	</div>
</section>

		