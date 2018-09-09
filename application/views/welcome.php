<!-- main-heading -->
<h3 class="main-title-w3layouts mb-2 text-center">Bienvenido al Sistema de Oficina de Trabajo de la Facultad</h3>
<!--// main-heading -->
<p class="main-title-w3layouts mb-2 text-center">Por favor, seleccione un item del menú para continuar.</p>
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