<!-- main-heading -->
<h2 class="main-title-w3layouts mb-2 text-center">Llamados</h2>
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
	                <th scope="col">Destino</th>
	                <th scope="col">Departamento</th>
	                <th scope="col">Descripción</th>
	                <th scope="col">Fecha Inicio</th>
	                <th scope="col">Fecha Límite</th>
	               	<th scope="col">Status</th>
	                <th scope="col">Acciones</th>
	            </tr>
	        </thead>
	        <tbody>
	        	<?php foreach ($llamados as $llamado): ?>
	                <tr>
	                	<?php if($llamado['ofer_figurar'] == 1){ ?>
							<td><?php echo $llamado['ofer_destino'] ?></td>	
	                	<?php } else { echo "<td></td>"; } ?>	                    
	                    <td><?php echo $llamado['ofer_destino_dep'] ?></td>
	                    <td><?php echo $llamado['ofer_descripcion'] ?></td>
	                    <td><?php echo $llamado['llam_fec_inic'] ?></td>
	                    <td><?php echo $llamado['llam_fec_lim'] ?></td>
	                    <td><?php echo $llamado['llam_status'] ?></td>
	                    <td>
	                    	<div class="btn-group">
	                    		<a href="<?php echo base_url(); ?>index.php/Inscrito/index/<?php echo $llamado['llam_id'];?>" class="btn btn-sm btn-primary">Ver Inscritos</a>
	                    		<a href="<?php echo base_url(); ?>index.php/Llamado/edit/<?php echo $llamado['llam_id'];?>" class="btn btn-sm btn-warning">Editar</a>
	                    		<a href="<?php echo base_url(); ?>index.php/Llamado/confirm_delete/<?php echo $llamado['llam_id'];?>" class="btn btn-sm btn-danger">Eliminar</a>
	                    	</div>
	                    </td>
	                </tr>
	            <?php endforeach ?>
	        </tbody>
	    </table>
	</div>
</section>

		