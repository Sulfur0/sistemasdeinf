<!-- main-heading -->
<h3 class="main-title-w3layouts mb-2 text-center">Formulario de Registro de Estudiante</h3>
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
	<form action="<?php echo base_url(); ?>index.php/Estudiantes/store" method="post">
	    <div class="form-group">
	    	<div class="row">
	    		<div class="col-md-6">
	    			<label>Cédula de Identidad</label>
	        		<input type="text" class="form-control" placeholder="Ingresa Cédula de Identidad" name="est_cedula" value="">
	    		</div>
	    		<div class="col-md-6">
	    			<label>Nombre Completo</label>
	        		<input type="text" class="form-control" placeholder="Ingresa Nombre Completo" name="est_nombre" value="">
	    		</div>
	    	</div>	        
	    </div>
	    <div class="form-group">
	    	<div class="row">
	    		<div class="col-md-4">
					<label>Fecha de Nacimiento</label>
	        		<input type="date" class="form-control" placeholder="Ingresa Fecha de Nacimiento" name="est_fec_nam" value="">
	    		</div>
	    		<div class="col-md-8">
					<label>Direccion</label>
	        		<input type="text" class="form-control" placeholder="Direccion" name="est_direccion" value="">
	    		</div>
	    	</div>	        
	    </div>
	    <div class="form-group">
	        <label>Correo Electrónico</label>
	        <input type="email" class="form-control" placeholder="Ingresa Correo Electrónico" required="" name="est_email" value="">
	    </div>
	    <div class="form-group">
	        <label>Curriculum</label>
	        <textarea name="est_curriculum" class="form-control" cols="30" rows="10"></textarea>	        
	    </div>
	    <div class="form-group">
	    	<div class="row">
	    	<div class="col-md-6">
		        <label>Carrera</label>
		        <input type="text" class="form-control" placeholder="Ingresa Carrera" name="est_carrera" value="">
	        </div>
	        <div class="col-md-6">
		        <label>Semestre que cursa</label>
		        <input type="number" class="form-control" placeholder="Ingresa el semestre que cursa actualmente" name="est_semestre">
	        </div>
	        </div>
	    </div>
		<hr>
		<div class="form-group">
			<div class="row">
				<div class="col-md-6">
					<label>Número Telefónico</label>
					<input type="text" class="form-control" placeholder="Ingresa Número Teléfono" name="tel_numero[]" value="">
				</div>
				<div class="col-md-6">
					<label>Descripción</label>
					<input type="text" class="form-control" placeholder="Ingresa Descripción" name="tel_descripcion[]" value="">
				</div>				
			</div>
			<div class="row">
				<div class="col-md-4">
					<input type="text" class="form-control" placeholder="Ingresa Número Teléfono" name="tel_numero[]" value="">
				</div>
				<div class="col-md-6">
					<input type="text" class="form-control" placeholder="Ingresa Descripción" name="tel_descripcion[]" value="">
				</div>	
				<div class="col-md-2">
					<a href="#" class="btn btn-danger">-</a>
				</div>			
			</div>
			<div class="row">
				<div class="col-md-4">
					<a href="#" class="btn btn-primary">+</a>
				</div>
			</div>
			
		</div>

	    <button type="submit" class="btn btn-success mt-sm-5 mt-3 px-4">Registrar</button>
	</form>
</div>

		