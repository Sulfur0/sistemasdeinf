<!-- main-heading -->
<h2 class="main-title-w3layouts mb-2 text-center">Estudiantes</h2>
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

		<table class="table">
	        <thead class="thead-dark">
	            <tr>
	                <th scope="col">Cédula</th>
	                <th scope="col">Nombre</th>
	                <th scope="col">Fec. Nam.</th>
	                <th scope="col">Dirección</th>
	                <th scope="col">Email</th>
	                <th scope="col">Carrera</th>
	                <th scope="col">Ver Teléfonos</th>
	                <th scope="col">Ver Curriculum</th>
	                <th scope="col">Acciones</th>
	            </tr>
	        </thead>
	        <tbody>
	        	<?php foreach ($estudiantes as $estudiante): ?>
	                <tr>
	                    <th scope="row"><?php echo $estudiante['est_cedula'] ?></th>
	                    <td><?php echo $estudiante['est_nombre'] ?></td>
	                    <td><?php echo $estudiante['est_fec_nam'] ?></td>
						<td><?php echo $estudiante['est_direccion'] ?></td>
	                    <td><?php echo $estudiante['est_email'] ?></td>
	                    <td>
	                    	<?php foreach ($carreras as $carrera) 
	                    	{
	                    		if($estudiante['car_id'] == $carrera['carr_id']){
	                    			echo $carrera['carr_nombre'];
	                    		}
	                    	}
	                    	?>
	                    	
	                    </td>
	                    <td>
	                    	<a href="<?php echo base_url(); ?>index.php/Estudiantes/telefonos/<?php echo $estudiante['est_id'];?>" class="btn btn-sm btn-primary">Teléfonos</a>
	                    </td>
	                    <td>
	                    	<a href="<?php echo base_url(); ?>index.php/Estudiantes/curriculum/<?php echo $estudiante['est_id'];?>" class="btn btn-sm btn-primary">Curriculum</a>
	                    </td>
	                    <td>
	                    	<div class="btn-group">
	                    		<a href="<?php echo base_url(); ?>index.php/Estudiantes/edit/<?php echo $estudiante['est_id'];?>" class="btn btn-sm btn-warning">Editar</a>
	                    		<a href="<?php echo base_url(); ?>index.php/Estudiantes/delete/<?php echo $estudiante['est_id'];?>" class="btn btn-sm btn-danger">Eliminar</a>
	                    	</div>
	                    </td>
	                </tr>
	            <?php endforeach ?>
	        </tbody>
	    </table>
	</div>
</section>

		