<!-- main-heading -->
<h2 class="main-title-w3layouts mb-2 text-center">Ofertas</h2>
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
	                <th scope="col">Acciones</th>
	            </tr>
	        </thead>
	        <tbody>
	        	<?php foreach ($ofertas as $oferta): ?>
	                <tr>
	                    <td><?php echo $oferta['ofer_destino'] ?></td>	
	                    <td><?php echo $oferta['ofer_destino_dep'] ?></td>
	                    <td><?php echo $oferta['ofer_descripcion'] ?></td>
	                    <?php 
	                    $rep = 0;
	                    foreach ($llamados as $key => $llamado) {
	                    	if($llamado['ofer_id'] == $oferta['ofer_id'])
	                    	{
	                    		$rep=1;
	                    		if($llamado['llam_status']=='finalizado'){
			                    	echo "<td>Oferta Finalizada</td>";
			                    }else if($llamado['llam_status']=='desierto'){
			                    	echo "<td>Oferta Desierta</td>";
			                   	}			                    
			                    break;	                     
			                }else if($rep==0) {?>
								<td>	                    	
			                    	<div class="btn-group">
			                    		<a href="<?php echo base_url(); ?>index.php/Llamado/create/<?php echo $oferta['ofer_id'];?>" class="btn btn-sm btn-success">Generar Llamado</a>
			                    		<a href="<?php echo base_url(); ?>index.php/Oferta/curriculum/<?php echo $oferta['ofer_id'];?>" class="btn btn-sm btn-primary">Ver Currículums</a>
			                    		<a href="<?php echo base_url(); ?>index.php/Oferta/edit/<?php echo $oferta['ofer_id'];?>" class="btn btn-sm btn-warning">Editar</a>
			                    		<a href="<?php echo base_url(); ?>index.php/Oferta/confirm_delete/<?php echo $oferta['ofer_id'];?>" class="btn btn-sm btn-danger">Eliminar</a>
				                    	</div>
				                    </td>
			                    <?php
			                    break;
			                	}
	                    }?>	                    
	                </tr>
	            <?php endforeach ?>
	        </tbody>
	    </table>
	</div>
</section>

		