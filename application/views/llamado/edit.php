<!-- main-heading -->
<h3 class="main-title-w3layouts mb-2 text-center">Formulario de Edición de Llamado</h3>
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
	<form action="<?php echo base_url(); ?>index.php/Llamado/update/<?php echo $item["llam_id"]; ?>" method="post">
	    <div class="form-group">
	        <div class="row">
	    		<div class="col-md-6">
	    			<label>Fecha de Inicio del Llamado</label>
	    			<input type="date" class="form-control" id="llam_fec_inic" name="llam_fec_inic" value="<?php echo $item['llam_fec_inic'];?>">
	    		</div>
	    		<div class="col-md-6">
	    			<label>Fecha Límite del Llamado</label>
	    			<input type="date" class="form-control" id="llam_fec_lim" name="llam_fec_lim" value="<?php echo $item['llam_fec_lim'];?>">
	    		</div>		    		
	    	</div>
	    </div>
	    <button id="btnSubmit" type="submit" class="btn btn-primary">Actualizar</button>
	</form>
</div>
<script src='<?php echo base_url(); ?>js/jquery-2.2.3.min.js'></script>
<script type="text/javascript">
	$("#btnSubmit").attr("disabled", true);
	var fec_inic = $('#llam_fec_inic').val();
	var fec_lim = $('#llam_fec_lim').val();
	$('#llam_fec_inic').change(function(){
        //alert(this.value);         //Date in full format alert(new Date(this.value));
        fec_inic = new Date(this.value);
        checkdates();
    });
    $('#llam_fec_lim').change(function(){
        //alert(this.value);         //Date in full format alert(new Date(this.value));
        fec_lim = new Date(this.value);
		checkdates();
    });
    function checkdates()
    {
    	if(fec_inic < fec_lim)
    	$("#btnSubmit").attr("disabled", false);
	    else
	    {    	
	    	$("#btnSubmit").attr("disabled", true);
	    	alert("La fecha de inicio debe ser menor a la fecha límite");
	    }
    }
    
</script>
		