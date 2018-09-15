<!-- main-heading -->
<h3 class="main-title-w3layouts mb-2 text-center">Formulario de Edición de Facultad</h3>
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
	<form action="<?php echo base_url(); ?>index.php/Facultad/update/<?php echo $item["fac_id"]; ?>" method="post">
	    <div class="form-group">
	        <label>Nombre de la Facultad</label>
	        <input type="text" class="form-control" placeholder="Ingresa Nombre de la Facultad" name="fac_nombre" value="<?php echo $item["fac_nombre"]; ?>">
	    </div>
	    <button type="submit" class="btn btn-primary">Actualizar</button>
	</form>
</div>

		