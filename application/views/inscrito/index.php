<!-- main-heading -->
<h2 class="main-title-w3layouts mb-2 text-center">Estudiantes Inscritos</h2>
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
		<div class="row">
			<div class="col-md-12">
				<a href="<?php echo base_url(); ?>index.php/Inscrito/create/<?php echo $llamado;?>" class="btn btn-sm btn-primary">Inscribir Nuevo Estudiante</a>
			</div>
		</div>
		<table class="table">
	        <thead class="thead-dark">
	            <tr>
	                <th scope="col">Nombre</th>
	                <th scope="col">Cédula</th>
	                <th scope="col">Fecha Inscripción</th>
	                <th scope="col">Contratado</th>
	                <th scope="col">Acciones</th>
	            </tr>
	        </thead>
	        <tbody>
	        	<?php foreach ($inscritos as $inscrito): ?>
	                <tr>	 
	                	<td><?php echo $inscrito['est_nombre'] ?></td>
	                	<td><?php echo $inscrito['est_cedula'] ?></td>
	                    <td><?php echo $inscrito['insc_fecha'] ?></td>
	                    <?php if($inscrito['insc_contratado'] == 1){?>
	                    <td>Contratado</td>
	                    <?php }else{echo "<td></td>"; } ?>
	                    <td>
	                    	<div class="btn-group">                   		
	                    		<a href="<?php echo base_url(); ?>index.php/inscrito/confirm_delete/<?php echo $inscrito['insc_id'];?>" class="btn btn-sm btn-danger">Eliminar</a>
	                    	</div>
	                    </td>
	                </tr>
	            <?php endforeach ?>
	        </tbody>
	    </table>
	</div>
</section>

		