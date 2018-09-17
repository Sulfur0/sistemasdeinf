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
	<form action="<?php echo base_url(); ?>index.php/Estudiantes/update/<?php echo $estudiante["est_id"] ;?>" method="post">
	    <div class="form-group">
	    	<div class="row">
	    		<div class="col-md-6">
	    			<label>Cédula de Identidad</label>
	        		<input type="text" required="" class="form-control" placeholder="Ingresa Cédula de Identidad" name="est_cedula" value="<?php echo $estudiante["est_cedula"] ;?>">
	    		</div>
	    		<div class="col-md-6">
	    			<label>Nombre Completo</label>
	        		<input type="text" required="" class="form-control" placeholder="Ingresa Nombre Completo" name="est_nombre" value="<?php echo $estudiante["est_nombre"] ;?>">
	    		</div>
	    	</div>	        
	    </div>
	    <div class="form-group">
	    	<div class="row">
	    		<div class="col-md-4">
					<label>Fecha de Nacimiento</label>
	        		<input type="date" required="" class="form-control" placeholder="Ingresa Fecha de Nacimiento" name="est_fec_nam" value="<?php echo $estudiante["est_fec_nam"] ;?>">
	    		</div>
	    		<div class="col-md-8">
					<label>Direccion</label>
	        		<input type="text" required="" class="form-control" placeholder="Direccion" name="est_direccion" value="<?php echo $estudiante["est_direccion"] ;?>">
	    		</div>
	    	</div>	        
	    </div>
	    <div class="form-group">
	        <label>Correo Electrónico</label>
	        <input type="email" required="" class="form-control" placeholder="Ingresa Correo Electrónico" required="" name="est_email" value="<?php echo $estudiante["est_email"] ;?>">
	    </div>
	    <div class="form-group">
	        <label>Curriculum</label>
	        <textarea name="est_curriculum" required="" class="form-control" cols="30" rows="10"><?php echo $estudiante["est_curriculum"] ;?></textarea>	        
	    </div>
	    <div class="form-group">
	    	<div class="row">
	    		<div class="col-md-12">
			        <label>Facultad</label>
			        <select id="facultad" class="form-control">
			        	<option disabled selected value>Selecciona una facultad</option>
			        	<?php foreach ($facultades as $facultad) { ?>
			        	<option value="<?php echo $facultad['fac_id'];?>"><?php echo $facultad['fac_nombre'];?></option>
			        	<?php } ?> 
			        </select>
	        	</div>
	        </div>
	        <div class="row">
		    	<div class="col-md-8">
			        <label>Carrera</label>			        
			        <select name="car_id" required="" id="est_carrera" class="form-control">
			        	<option disabled selected value>Selecciona una carrera</option>			        	
			        </select>
		        </div>
		        <div class="col-md-4">
			        <label>Semestre que cursa</label>
			        <input type="number" required="" class="form-control" placeholder="Ingresa el semestre que cursa actualmente" name="est_semestre" value="<?php echo $estudiante["est_semestre"] ;?>">
		        </div>
	        </div>
	    </div>
		<hr>
		<div class="form-group">
			<div class="row" id="primero">
				<div class="col-md-4">
					<label>Número Telefónico</label>
					<input type="text" class="form-control" placeholder="Ingresa Número Teléfono" name="tel_numero[]" value="" required="">
				</div>
				<div class="col-md-6">
					<label>Descripción</label>
					<input type="text" class="form-control" placeholder="Ingresa Descripción" name="tel_descripcion[]" value="" required="">
				</div>				
			</div>
			
			<div class="row">
				<div class="col-md-4">
					<a href="#" id="plus" class="btn btn-primary">+</a>
				</div>
			</div>
			
		</div>
		<button type="submit" class="btn btn-success mt-sm-5 mt-3 px-4">Actualizar</button>
	</form>
</div>
<script src='<?php echo base_url(); ?>js/jquery-2.2.3.min.js'></script>
<script type="text/javascript">
$('#facultad').on('change', function() {
	id_numbers = new Array();
  	$.ajax({
       	url: "<?php echo base_url(); ?>index.php/Estudiantes/find_carreras",
       	type: "POST",
       	dataType:'json',
       	data: ({facultad: this.value}),
       	success: function (result) {
       		//id_numbers = JSON.parse(result);
       		console.log(result);
       		var opciones = "<option disabled selected value>Selecciona una carrera</option>";
       		var i;
			for (i = 0; i < result.length; ++i) {
			    opts = "<option value ='"+result[i]["carr_id"]+"'>"+result[i]["carr_nombre"]+"</option>";
       			opciones = opciones.concat(opts);
			}      		 
       		$('#est_carrera').html(opciones);
       	},
       	error: function(xhr, ajaxOptions, thrownError){
          	alert("Error: "+thrownError+" "+xhr+" "+ajaxOptions);
       	},
       	timeout : 15000//timeout of the ajax call
  	});
});
var contenido = '<div class="row"><div class="col-md-4"><input type="text" class="form-control" placeholder="Ingresa Número Teléfono" name="tel_numero[]" value=""></div><div class="col-md-6"><input type="text" class="form-control" placeholder="Ingresa Descripción" name="tel_descripcion[]" value=""></div><div class="col-md-2"><a href="#" id="del" class="btn btn-danger">-</a></div></div>';
$('#plus').on('click', function(e) {
	e.preventDefault();
	$("#primero").after(contenido).fadeIn(1000);	
	$('#del').on('click', function(e) {
		e.preventDefault();
		$(this).closest("div.row").fadeOut(1000);
		
	});
});
$('#del').on('click', function(e) {
	e.preventDefault();
	$(this).closest("div.row").fadeOut(1000);		
});

</script>



		