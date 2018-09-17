<!-- main-heading -->
<h3 class="main-title-w3layouts mb-2 text-center">Teléfonos de <?php echo $estudiante["est_nombre"]?></h3>
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
<section class="tables-section">
    <!-- table1 -->
    <div class="outer-w3-agile mt-3">

		<table class="table">
	        <thead class="thead-dark">
				<th>Números de Teléfono</th>
				<th>Descripción</th>
			</thead>
			<tbody>			
			<?php foreach ($telefonos as $telefono): ?>
			<tr>
				<td><?php echo $telefono["tel_numero"];?></td>
				<td><?php echo $telefono["tel_descripcion"];?></td>
			</tr>
			<?php endforeach ?>
			</tbody>
		</table>	    	        
	</div>
</section>