<!-- main-heading -->
<h3 class="main-title-w3layouts mb-2 text-center">Ajustes Generales</h3>
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
	<form action="<?php echo base_url(); ?>index.php/Ajustes/update" method="post">
	    <div class="form-group">
	    	<div class="row">
	    		<div class="col-md-12">
	    			<label>Facultad a la cual pertenece esta oficina</label>
	        		<input type="text" class="form-control" placeholder="Ingresa Nombre de Facultad" name="fac_nombre" value="">
	    		</div>
	    	</div>	        
	    </div>	    
	    <button type="submit" class="btn btn-success mt-sm-5 mt-3 px-4">Actualizar</button>
	</form>
</div>

		