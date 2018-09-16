<!-- main-heading -->
<h3 class="main-title-w3layouts mb-2 text-center">Formulario de Registro de Carrera para <?php echo $facultad['fac_nombre'];?></h3>
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
	<form action="<?php echo base_url(); ?>index.php/Carrera/store" method="post">
	    <div class="form-group">
	    	<div class="row">
	    		<div class="col-md-12">
	    			<label>Nombre de Carrera</label>
	        		<input type="text" class="form-control" placeholder="Ingresa Nombre de Carrera" name="carr_nombre" value="">
	    		</div>	    		
	    	</div>	
	    	<div class="row">
	    		<div class="col-md-12">
	    			<label>Unidades de Crédito</label>
	        		<input type="text" class="form-control" placeholder="Ingresa Unidades de Crédito" name="carr_unid_cred" value="">
	    		</div>	    		
	    	</div>	    
	    	<input type="hidden" name="fac_id" value="<?php echo $facultad['fac_id'];?>">    
	    </div>  

	    <button type="submit" class="btn btn-success">Registrar</button>
	</form>
</div>

		