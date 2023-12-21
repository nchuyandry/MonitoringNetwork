
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="60">
    <meta name="description" content="KPI Network">
    <meta name="author" content="ICT INFRA">
    <title>Board Network TVIP - ASA</title>
   

    <!-- Bootstrap core CSS -->
	<link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	    <!-- Favicons -->
	<link rel="icon" href="<?=base_url() ?>assets/img/tvip.png">
	<link rel="tvip-touch-icon" href="<?=base_url() ?>assets/img/tvip.png" sizes="180x180">
	<link rel="icon" href="<?=base_url() ?>assets/img/tvip.png" sizes="32x32" type="image/png">
	<link rel="icon" href="<?=base_url() ?>assets/img/tvip.png" sizes="16x16" type="image/png">
	<meta name="theme-color" content="#7952b3">

	<script language="javascript" type="text/javascript">
		function cellBlink() {
			document.getElementById("entirepage").style.backgroundColor = "orange";
			setTimeout('cellBlink2()', 500);
		}
		function cellBlink2(){
			document.getElementById("page").style.backgroundColor = "red";
			setTimeout('cellBlink()', 500);
		}
		function blinkit(){
				intrvl=0;
				for(i=0;i<59;i++){
					intrvl += 1000;
					setTimeout("document.getElementById('page').style.background = 'red';",intrvl);
					intrvl += 1000;
					setTimeout("document.getElementById('page').style.background = 'white';",intrvl);
				}
			}
	</script>
	
    <style>
    .blog-header {
	    line-height: 1;
	    border-bottom: 1px solid #e5e5e5;
	    background-color: #ffffff; 
	    border: solid rgba(0, 0, 0, .15);	
	}
	.divider {
/*	    height: 3rem;*/
	    background-color: rgba(0, 0, 0, .1);
	    border: solid rgba(0, 0, 0, .15);
	    border-width: 1px 0;
	    box-shadow: inset 0 0.5em 1.5em rgb(0 0 0 / 10%), inset 0 0.125em 0.5em rgb(0 0 0 / 15%);
	}
	.body-bg{
/*		height: 3rem;*/
		background-color: rgba(0, 0, 0, .1);		
	    border: solid rgba(0, 0, 0, .15);	    
	    border-width: 1px 0;
		box-shadow: inset 0 0.5em 1.5em rgb(0 0 0 / 10%), inset 0 0.125em 0.5em rgb(0 0 0 / 15%);
	}
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
	
    
    <!-- Custom styles for this template -->
    <link href="<?=base_url()?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/dot.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" rel="stylesheet">
  </head>
  <body class="body-bg" >
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
		
?> 
    
<div class="container">
	<header class="blog-header py-3">
    	<div class="row flex-nowrap justify-content-between align-items-center">
      		<div class="col-sm-2 pt-1">
      		<a href="<?=base_url()?>">
        		<img class="d-block mx-auto mb-2" src="<?=base_url()?>assets/img/tvip.png" alt="" width="72" height="72"></a>
      		</div>
      		<div class="col-sm-8 text-center text-gray-800">
      			<h2><b>BOARD NETWORK TVIP - ASA : <?php echo round((($totalsuccess) / ($minutes * $totalresult)) * 100,2);?>% </b></h2>
      			<h4><?php echo date_format($timeselected, "M Y")  ?></h4>
      		</div>
      		<div class="col-sm-2 d-flex justify-content-end align-items-center">
        		<img class="d-block mx-auto mb-2" src="<?=base_url()?>assets/img/tvip.png" alt="" width="72" height="72">
      		</div>
    	</div>
	</header>

    <div class="py-3 ">
    	<div class="row">
    	<audio>
	                            	<source src="<?=base_url()?>assets/audio/alarm.mp3" type="audip/mpeg">
	                            </audio>
								<!-- Card Example -->
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
			<div class="col-xl-3 col-md-6 mb-4">
            	<div class="card border-left-danger shadow h-100 py-2">
               		<div class="card-body">
                    	<div class="row no-gutters align-items-center">
	                    	<div class="col mr-2">
	                        	<div class="h4 font-weight-bold text-gray-800"><?php echo strtoupper($row->name)?></div>
	                        	<div class="font-weight-bold text-gray-800">Down for <?php echo $queryresult2->row('lastfail')?> Minute(s)</div>
	                        	<div class="font-weight-bold text-gray-800">Total Down <?php echo $queryresult3->row('total')?></div>
	                        </div>
	                        <div class="col-auto">
	                            <i class="fas fa-arrow-down blink fa-2x" style="color:red"></i>
	                            <audio>
	                            	<source src="<?=base_url()?>assets/audio/alarm.mp3" type="audip/mpeg">
	                            </audio>
	                        </div>
                        </div>
                    </div>
                </div>
            </div>
				<?php } ?>
		</div>
    </div>
    <div class="card shadow mb-4 " >
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Ping Result</h6>
		</div>
		<div class="card-body">
			<div class="card-body text-left">
				<form class="form-row " action="<?=base_url()?>" method="post" >
					<div class="col-8">
					</div>
					<div class="col">
						<select class="form-control" aria-label="Default select example" name="month">
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
					<div class="col">
						<select class="form-select" aria-label="Default select example" name="year">
						  	<option value="2021">2021</option>
						  	<option value="2020">2020</option>
						  	<option value="2022">2022</option>
						  	<option value="2023">2023</option>
						</select>	
					</div>
					<div class="col">
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
   
    
    
    
    
    
    
    
    
  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; Copyright 2021 ICT Infrastructure</p>
    
  </footer>
</div>
</body>
</html>
