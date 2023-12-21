<!doctype html>
<html lang="en">
<?php
$this->load->view('top');
?>
  <body>
<?php $this->load->view('header');?>	

<main>

	<section class="py-3 container">
		<div class="row py-lg-4">
	    	<div class="col-lg-12 col-md-8 mx-auto text-center ">
	        	<h1>CCTV TVIP - ASA</h1>
	        	<h5>Last Update : <?php date_default_timezone_set("Asia/Jakarta"); echo date('Y-m-d H:i:s'); ?></h5>
	     	</div>
	     	<div class="divider mb-5 mt-4"></div>
	<?php  
	/*$this->load->library('Ppping');
	$this->Ppping = new Ppping();*/
	
	
	$serversoffline = array();
	$serversonline = array();
	foreach($cctv->result() as $server){
/*		echo "<pre>";
		var_dump($server->ip);
		echo "</pre>";*/
		$verbinding =  fsockopen($server->ip,$server->port, $errno, $errstr);
		if($verbinding) array_push($serversonline, $server);
			else array_push($serversoffline, $server);
		/*$this->Ppping->hostname = $server->ip;
		$ping = $this->Ppping->Ping();
		$ip = $server->ip;*/
		}
	?>
<?php
foreach ($serversoffline as $server) { ?>
			<div class="col-xl-4 col-md-6 mb-4">
	           	<div class="card border-left-dark shadow h-100 py-2">
	    	   		<div class="card-body">
	                   	<div class="row no-gutters align-items-center">
		                   	<div class="col mr-2">
		                       <div class="text-xs font-weight-bold text-dark text-uppercase mb-1"><?php echo strtoupper($server->name)?></div>
		                       	<div class="h5 mb-0 font-weight-bold text-gray-800">IP Address : <a href="http://<?php echo $server->ip ?>"><?php echo $server->ip?></a> </div>
		                       	<div class="h5 mb-0 font-weight-bold text-gray-800">Port : <?php echo $server->port?> </div>
		                    </div>
		                    <div class="col-auto">
		                         <i class="fas fa-arrow-circle-down blink fa-2x" style="color:red"></i>
		                    </div>
	                    </div>
	                </div>
	            </div>
	        </div>

	    <?php } ?>
<?php
foreach ($serversonline as $server) { ?>
			<div class="col-xl-4 col-md-6 mb-4">
	           	<div class="card border-left-dark shadow h-100 py-2">
	    	   		<div class="card-body">
	                   	<div class="row no-gutters align-items-center">
		                   	<div class="col mr-2">
		                       <div class="text-xs font-weight-bold text-dark text-uppercase mb-1"><?php echo strtoupper($server->name)?></div>
		                       	<div class="h5 mb-0 font-weight-bold text-gray-800">IP Address : <a href="http://<?php echo $server->ip ?>"><?php echo $server->ip?></a> </div>
		                       	<!-- <div class="h5 mb-0 font-weight-bold text-gray-800">Port : <?php // echo $server->port?> </div> -->
		                    </div>
		                    <div class="col-auto">
		                    	<!--<i class="fas fa-thumbs-up blink fa-2x" style="color:green"></i>-->
								<i class="fas fa-arrow-circle-up fa-2x blink" style="color:green"></i>
		                    </div>
	                    </div>
	                </div>
	            </div>
	        </div>

	    <?php } ?>
	    </div>
  	</section>


</main>
<!--======================================Modal network========================================-->

<div class="modal fade" id="addnetwork" tabindex="-1" aria-labelledby="networkModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="networkModalLabel">Add New Network</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form>
      <div class="modal-body">
        
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">IP Address:</label>
            <input type="text" class="form-control" id="ip" name="ip">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Description</label>
            <textarea class="form-control" id="description" name="description"></textarea>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--======================================Modal cctv========================================-->
<div class="modal fade" id="addcctv" tabindex="-1" aria-labelledby="cctvModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cctvModalLabel">Add New DVR / NVR</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?=base_url('home/savecctv')?>" method="post">
      <div class="modal-body">
        
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">IP Address</label>
            <input type="text" class="form-control" id="ip" name="ip">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Port</label>
            <input type="text" class="form-control" id="port" name="port">
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--======================================Modal absen========================================-->
<div class="modal fade" id="addabsen" tabindex="-1" aria-labelledby="absenModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="absenModalLabel">Add New Machine</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?=base_url('')?>" method="post">
      <div class="modal-body">
        
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">IP Address</label>
            <input type="text" class="form-control" id="ip" name="ip">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Port</label>
            <input type="text" class="form-control" id="port" name="port">
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--======================================Modal absen========================================-->
<footer class="text-muted py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#"><i class="fas fa-arrow-up"></i>&nbsp; Back to top</a>
    </p>
	<p class="mb-1">&copy; Copyright 2021 ICT Infrastructure</p>
  </div>
</footer>


    <script src="<?=base_url()?>assets/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

      
  </body>
</html>
