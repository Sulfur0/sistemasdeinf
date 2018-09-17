<!-- main-heading -->
<h3 class="main-title-w3layouts mb-2 text-center">Currículum de <?php echo $estudiante["est_nombre"]?></h3>
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
	<div class="form-group">
	    <label>Curriculum</label>
	    <textarea name="est_curriculum" class="form-control" cols="30" rows="10" readonly=""><?php echo $estudiante["est_curriculum"]?></textarea>	        
	</div>
</div>