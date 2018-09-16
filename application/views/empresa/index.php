<!-- main-heading -->
<h2 class="main-title-w3layouts mb-2 text-center">empresas</h2>
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
<!-- Tables content -->
<section class="tables-section">
    <!-- table1 -->
    <div class="outer-w3-agile mt-3">

		<table class="table">
	        <thead class="thead-dark">
	            <tr>
	            	<th scope="col">Rif</th>
	                <th scope="col">Nombre</th>
	                <th scope="col">Acciones</th>
	            </tr>
	        </thead>
	        <tbody>
	        	<?php foreach ($empresas as $empresa): ?>
	                <tr>
	                	<td><?php echo $empresa['emp_rif'] ?></td>	
	                    <td><?php echo $empresa['emp_nombre'] ?></td>	
	                    <td>
	                    	<div class="btn-group">	                    		
	                    		<a href="<?php echo base_url(); ?>index.php/Oferta/create/<?php echo $empresa['emp_id'];?>/Empresa" class="btn btn-sm btn-primary">Simular Oferta</a>
	                    		<a href="<?php echo base_url(); ?>index.php/Empresa/edit/<?php echo $empresa['emp_id'];?>" class="btn btn-sm btn-warning">Editar</a>
	                    		<a href="<?php echo base_url(); ?>index.php/Empresa/confirm_delete/<?php echo $empresa['emp_id'];?>" class="btn btn-sm btn-danger">Eliminar</a>
	                    	</div>
	                    </td>
	                </tr>
	            <?php endforeach ?>
	        </tbody>
	    </table>
	</div>
</section>

		