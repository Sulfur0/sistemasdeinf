<!-- main-heading -->
<h2 class="main-title-w3layouts mb-2 text-center">Currículums</h2>
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
		<form action="<?php echo base_url(); ?>index.php/Oferta/finalizar" id="elform" method="post">
			<table class="table">
		        <thead class="thead-dark">
		            <tr>
		            	<th scope="col">Contratar</th>
		                <th scope="col">Cédula</th>
		                <th scope="col">Nombre</th>
		                <th scope="col">Currículum</th>
		            </tr>
		        </thead>
		        <tbody>
		        	<?php foreach ($curriculums as $curriculum): ?>
		                <tr>
		                	<td><input type="checkbox" class="form-control" name="insc_contratado[]" value="<?php echo $curriculum['insc_id'] ?>"> Contratar</td>
		                    <td><?php echo $curriculum['est_cedula'] ?></td>	
		                    <td><?php echo $curriculum['est_nombre'] ?></td>
		                    <td><?php echo $curriculum['est_curriculum'] ?></td>		                    
		                </tr>
		            <?php endforeach ?>
		        </tbody>	        	        
		    </table>
		    <input type="hidden" name="ofer_id" value="<?php echo $oferta; ?>">
		    <div id="mensaje-div" class="row">
		    	<div class="col-md-12">
		    		<label>Por favor ingrese una razón por la cual dejar el llamado desierto</label>
		    		<textarea name="llam_desierto" class="form-control" id="llam_desierto" cols="30" rows="10" required=""></textarea>
		    	</div>
		    </div>
		    <div class="row">
	        	<div class="col-md-12">
	        		<a href="#" id="submit" class="btn btn-success mt-sm-5 mt-3 px-4">Finalizar</a>
	        		<!--<button type="submit" class="btn btn-success mt-sm-5 mt-3 px-4">Finalizar</button>--->
	        	</div>
	        </div>
	    </form>
	</div>
</section>

<script src='<?php echo base_url(); ?>js/jquery-2.2.3.min.js'></script>
<script type="text/javascript">
$("#mensaje-div").hide();
$('#submit').on('click', function(e) {
	e.preventDefault();

	if ($("#elform input:checkbox:checked").length > 0)
	{
	    $("#mensaje-div").fadeOut(1000);
	    $( "#elform" ).submit();
	}
	else
	{
	   	$("#mensaje-div").fadeIn(1000);
	   	$('#submit').on('click', function(e) {
	   		e.preventDefault();
	   		$( "#elform" ).submit();
	   	});
	}
	
});
</script>

		