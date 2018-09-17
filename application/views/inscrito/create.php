<!-- main-heading -->
<h3 class="main-title-w3layouts mb-2 text-center">Formulario de Inscripción para Llamado</h3>
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
<div class="form-body-w3-agile text-center w-lg-50 w-sm-75 w-100 mx-auto mt-5">
	<form action="<?php echo base_url(); ?>index.php/Inscrito/store" method="post">
	    <div class="form-group">
	    	<div class="row">
	    		<div class="col-md-12">
			        <label>Estudiante</label>
			        <select name="est_id" class="form-control" required="">
			        	<option disabled selected value>Selecciona un estudiante</option>
			        	<?php foreach ($estudiantes as $estudiante) { ?>
			        	<option value="<?php echo $estudiante['est_id'];?>"><?php echo $estudiante['est_cedula'];?> - <?php echo $estudiante['est_nombre'];?></option>
			        	<?php } ?> 
			        </select>
	        	</div>
	        </div>
	    	<div class="row">
	    		<div class="col-md-12">
	    			<label>Fecha de Inscripción</label>
	    			<input type="date" class="form-control" id="insc_fecha" name="insc_fecha" value="<?php echo date("d/m/y");?>" required="">
	    		</div>	    				    		
	    	</div>

	    </div>  
		<input type="hidden" name="llam_id" value="<?php echo $llamado["llam_id"];?>">
	    <button id="btnSubmit" type="submit" class="btn btn-success mt-sm-5 mt-3 px-4">Registrar Llamado</button>
	</form>
</div>


		