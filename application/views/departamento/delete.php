<!-- main-heading -->
<h3 class="main-title-w3layouts mb-2 text-center">Confirmación de Eliminación de Departamento</h3>
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
	<form action="<?php echo base_url(); ?>index.php/Departamento/delete/<?php echo $departamento['dep_id'];?>" method="post">
	    <div class="form-group">
	    	<div class="row">
	    		<div class="col-md-12">
	    			<p>¿Deseas eliminar el Departamento <?php echo $departamento['dep_nombre'];?>?</p>
	    		</div>	    		
	    	</div>	
	    	<input type="hidden" name="fac_id" value="<?php echo $departamento['fac_id'];?>">
	    	<div class="row">
	    		<div class="col-md-12">
	    			<button type="submit" class="btn btn-danger">Confirmar Eliminación</button>
	    		</div>	    		
	    	</div>   
	    	   
	    </div>    

	    
	</form>
</div>
