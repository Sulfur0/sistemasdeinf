<!-- main-heading -->
<h3 class="main-title-w3layouts mb-2 text-center">Confirmación de Eliminación de Empresa</h3>
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
	<form action="<?php echo base_url(); ?>index.php/Empresa/delete/<?php echo $empresa['emp_id'];?>" method="post">
	    <div class="form-group">
	    	<div class="row">
	    		<div class="col-md-12">
	    			<p>¿Deseas eliminar la Empresa <?php echo $empresa['emp_nombre'];?>?</p>
	    		</div>	    		
	    	</div>	
	    	<div class="row">
	    		<div class="col-md-12">
	    			<button type="submit" class="btn btn-danger">Confirmar Eliminación</button>
	    		</div>	    		
	    	</div>   
	    	   
	    </div>    

	    
	</form>
</div>
