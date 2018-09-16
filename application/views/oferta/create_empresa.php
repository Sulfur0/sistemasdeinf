<!-- main-heading -->
<h3 class="main-title-w3layouts mb-2 text-center">Formulario de Registro de Oferta de Empresa</h3>
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
	<form action="<?php echo base_url(); ?>index.php/Oferta/store" method="post">
	    <div class="form-group">
	    	<div class="row">
	    		<div class="col-md-12">
	    			<label>Oferta registrada por</label>
	        		<input type="text" class="form-control" placeholder="Ingresa Nombre de la empresa" name="ofer_destino" value="<?php echo $empresa["emp_nombre"] ;?>" readonly="">
	    		</div>	    		
	    	</div>	
	    	<div class="row">
	    		<div class="col-md-12">
	    			<label>Descripción</label>
	        		<input type="text" class="form-control" placeholder="Breve descripción de la oferta" name="ofer_descripcion" value="">
	    		</div>	    		
	    	</div>        
	    </div>    

	    <button type="submit" class="btn btn-success mt-sm-5 mt-3 px-4">Registrar</button>
	</form>
</div>

		