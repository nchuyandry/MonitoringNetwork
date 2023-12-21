<!doctype html>
<html lang="en">
<?php
$this->load->view('top');
?>
  <body>
 <?php
$queryresult = $this->db->query("SELECT COUNT(*) as totaldown from network WHERE status=0");
if ($queryresult != NULL) {
	if ($queryresult->row('totaldown') > 1) {
		echo "<script> blinkit(); </script>";
	}
}
$timeselected = date_create($currentmonth);
$start_date = new DateTime($currentmonth.'-01 00:00:00');
$since_start = $start_date->diff(new DateTime($currentime));
$minutes = $since_start->days * 24 * 60;
$minutes += $since_start->h * 60;
$minutes += $since_start->i;

$totalresult = $this->db->query("SELECT COUNT(*) as total from network n LEFT JOIN network_detail nd ON n.name=nd.name where bulan='".$currentmonth."-01'")->row('total');
$queryresult2 = $this->db->query("SELECT SUM(success) as totalsuccess, SUM(fail) as totalfail from network_detail where bulan='".$currentmonth."-01' GROUP BY bulan");
		//echo "q1:"."SELECT COUNT(*) as total from network n LEFT JOIN network_detail nd ON n.name=nd.name where bulan='".$currentmonth."-01'";
$totalsuccess = $this->db->query("SELECT SUM(success) as totalsuccess, SUM(fail) as totalfail from network_detail where bulan='".$currentmonth."-01' GROUP BY bulan")->row('totalsuccess');
		//var_dump($queryresult2->row('totalsuccess'));

$totalexception = $this->db->query("SELECT SUM(total) as totaltime FROM `network_exception` WHERE tanggal='".$currentmonth."' AND name='All'")->row('totaltime');

if ($totalexception!= NULL) {
	$totalsuccess += $totalexception * $totalresult;
}
$totalexception = $this->db->query("SELECT SUM(total) as totaltime FROM `network_exception` WHERE tanggal='".$currentmonth."' AND name<>'All'")->row('totaltime');

		
if ($totalexception!= NULL) {
	$totalsuccess += $totalexception;
}

$this->load->view('header');		
?>   

<main>

	<section class="py-3 container">
		<div class="row py-lg-4">
	    	<div class="col-lg-12 col-md-8 mx-auto text-center ">
	        	<h1>BOARD NETWORK TVIP - ASA : <?php echo round((($totalsuccess) / ($minutes * $totalresult)) * 100,2);?>%</h1>
	        	<h3>Periode : <?php echo date_format($timeselected, "M Y")  ?></h3>
	     	</div>
	     	<div class="divider mb-5 mt-4"></div>
	<?php  

	foreach($down as $row){
		//$ip = $row->name;
		//$queryresult2 = $this->db->query("SELECT * from network_detail where name='".$row->name."' and bulan='".$currentmonth."-01'");
		$queryresult2 = $this->db->query("SELECT * from network_detail where name='".$row->name."' and bulan='".$currentmonth."-01'");
		$queryresult3 = $this->db->query("SELECT count(*) as total from network_log where name='".$row->name."' and month(time)=".$monthonly." AND status=0");
		$newtts = str_replace(" ","+",$row->description)."+has+been+down+for+".$queryresult2->row('lastfail')."+minute.";
		if (strlen($ttsquery."+".$newtts) <= 100) {
			if ($ttsquery != "") $ttsquery .= "+";
			$ttsquery .= $newtts;
		}
	?>

			<div class="col-xl-4 col-md-6 mb-4">
	           	<div class="card border-left-danger shadow h-100 py-2">
	    	   		<div class="card-body">
	                   	<div class="row no-gutters align-items-center">
		                   	<div class="col mr-2">
		                       	<div class="h5 font-weight-bold"><?php echo strtoupper($row->description)?></div>
		                       	<div class="font-weight-bold text-gray-800">Down for <?php echo $queryresult2->row('lastfail')?> Minute(s)</div>
		                       	<div class="font-weight-bold text-gray-800">Total Down <?php echo $queryresult3->row('total')?></div>
		                    </div>
		                    <div class="col-auto">
		                         <i class="fas fa-thumbs-down blink fa-2x" style="color:red"></i>
		                    </div>
	                    </div>
	                </div>
	            </div>
	        </div>

	    <?php } ?>
	    </div>
  	</section>
  	<div class="container">
		<div class="card shadow mb-4 " >
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Ping Result</h6>
				
			</div>
			<div class="card-body">
				<div class="card-body">
					<form class="row g-3" action="<?=base_url()?>" method="post" >
						<!--<div class="col-auto">
							<label class="form-label">Select Periode:</label>
						</div>-->
						<div class="col-auto">
							<select class="form-select" name="month">
						  		<!--<option value="<?php echo $monthonly?>">Now</option>-->
							  	<option value="01">January</option>
							  	<option value="02">February</option>
							  	<option value="03">March</option>
							  	<option value="04">April</option>
							  	<option value="05">May</option>
							  	<option value="06">June</option>
							  	<option value="07">July</option>
							  	<option value="08">August</option>
							  	<option value="09">September</option>
							  	<option value="10">October</option>
							  	<option value="11">November</option>
							  	<option value="12">December</option>
							</select>	
						</div>
						<div class="col-auto">
							<select class="form-select" aria-label="Default select example" name="year">
							  	<option value="2023">2023</option>
							  	<option value="2022">2022</option>
								<option value="2021">2021</option>
							  	<option value="2020">2020</option>
							  	
							</select>	
						</div>
						<div class="col-auto">
							<button class="btn btn-primary" type="submit">Submit</button>
						</div>
					</form>	
				</div>
				
			    <div class="table-responsive" style="background: #fff" >
					<table class="table table-bordered">
			    		<thead class="text-center table-dark">
			    			<tr>
								<th><b>Name</b></th>
								<th><b>Response</b></th>
								<th><b>Up Time</b></th>
								<th><b>Total Down</b></th>
								<th><b>Down Time</b></th>
								<th><b>Percentage</b></th>
								<th><b>Min Down</b></th>
								<th><b>Max Down</b></th>
								<th><b>Average Down</b></th>
							</tr>	
			    		</thead>
			    		<tbody class="text-center">
			    			<?php foreach($host as $row){
	//$queryresult2 = $this->db->query("SELECT * from network_detail where name='".$row->name."' and bulan='".$currentmonth."-01'");
	$queryresult4 = $this->db->query("SELECT MIN(totaldown) as minimum, MAX(totaldown) as maximum, AVG(totaldown) as average from network_log where name='".$row->name."' and month(time)=".$monthonly." and status=1 GROUP BY name");
	$queryresult5 = $this->db->query("SELECT SUM(success) as totalsuccess, SUM(fail) as totalfail from network_detail where name='".$row->name."' and bulan='".$currentmonth."-01' GROUP BY bulan");
	$totalsuccess = $queryresult5->row('totalsuccess');	
	$totalexception =$this->db->query("SELECT SUM(total) as totaltime FROM `network_exception` WHERE tanggal='".$currentmonth."' AND (name='All' OR name='".$row->name."')");
	if ($totalexception != NULL) {
		$totalsuccess += $totalexception->row('totaltime');
	}
	$queryresult3 = $this->db->query("SELECT count(*) as total from network_log where name='".$row->name."' and month(time)=".$monthonly." AND status=0");
					
			    			?>
			    			<tr class="" id="<?php echo $row->name?>">
			    				<td><?php echo $row->description?></td>
			    				<td><?php echo $row->response?> ms</td>
			    				<td><?php echo $totalsuccess ?> Menit</td>
			    				<td><?php echo $queryresult3->row('total') ?></td>
			    				<td><?php echo $minutes - $totalsuccess ?> menit </td>
			    				<td><?php echo round((($totalsuccess) / ($minutes)) * 100,2); ?> % </td>
			    				<td><?php echo ($queryresult4->row('minimum') != "" ? $queryresult4->row('minimum')." menit" : "-"); ?></td>
			    				<td><?php echo ($queryresult4->row('maximum') != "" ? $queryresult4->row('maximum')." menit" : "-"); ?></td>
			    				<td><?php echo ($queryresult4->row('average') != "" ? round($queryresult4->row('average'),0)." menit" : "-");?></td>
			    			</tr>
			    			<?php } ?>
			    		</tbody>
					</table>
			    </div>
			</div>
			<div class="card-body">

			</div>
		</div>
	</div>

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
