<!-- main-heading -->
<h3 class="main-title-w3layouts mb-2 text-center">Formulario de Registro de Llamado para Oferta</h3>
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
	<form action="<?php echo base_url(); ?>index.php/Llamado/store" method="post">
	    <div class="form-group">
	    	<div class="row">
	    		<div class="col-md-12">
	    			<p>Datos de la oferta (Si desea editar algún dato debe hacerlo desde edición de ofertas):</p>
	    		</div>	    		
	    	</div>
	    	<div class="row">
	    		<div class="col-md-12">
	    			<label>Insitución emisora de la Oferta</label>
	    			<input type="text" class="form-control" readonly="" name="ofer_destino" value="<?php echo $oferta["ofer_destino"];?>">
	    		</div>	    		
	    	</div>	
	    	<?php if($oferta["ofer_destino_dep"] !== NULL){ ?>
			<div class="row">
	    		<div class="col-md-12">
	    			<label>Departamento Emisor de la Oferta</label>
	    			<input type="text" class="form-control" readonly="" name="ofer_destino_dep" value="<?php echo $oferta["ofer_destino_dep"];?>">
	    		</div>	    		
	    	</div>
	    	<?php } ?>
	    	<hr>
	    	<div class="row">
	    		<div class="col-md-6">
	    			<label>Fecha de Inicio del Llamado</label>
	    			<input type="date" class="form-control" id="llam_fec_inic" name="llam_fec_inic">
	    		</div>
	    		<div class="col-md-6">
	    			<label>Fecha Límite del Llamado</label>
	    			<input type="date" class="form-control" id="llam_fec_lim" name="llam_fec_lim">
	    		</div>		    		
	    	</div>
	    </div>  
		<input type="hidden" name="llam_status" value="pendiente">
		<input type="hidden" name="ofer_id" value="<?php echo $oferta["ofer_id"];?>">
	    <button id="btnSubmit" type="submit" class="btn btn-success mt-sm-5 mt-3 px-4">Registrar Llamado</button>
	</form>
</div>
<script src='<?php echo base_url(); ?>js/jquery-2.2.3.min.js'></script>
<script type="text/javascript">
	$("#btnSubmit").attr("disabled", true);
	var fec_inic, fec_lim;
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

		