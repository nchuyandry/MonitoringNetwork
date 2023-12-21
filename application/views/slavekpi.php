<html lang="en">

	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
		<link rel="icon" type="image/png" href="<?=base_url() ?>assets/img/tvip.png">
		<title>Dashboard KPI ICT</title>
		<!--     Fonts and icons     -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
		<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet" /> 
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
		<!-- Nucleo Icons-->
		<link href="<?=base_url() ?>assets/css/nucleo-icons.css" rel="stylesheet" /> 
		<!-- CSS Files -->
		<link href="<?=base_url() ?>assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
		<!-- CSS Just for demo purpose, don't include it in your project -->
		<link href="<?=base_url() ?>assets/demo/demo.css" rel="stylesheet" />
		<style>
			.card-chart .card-body {
				padding: 15px;
			}
		</style>
	</head>

	<body class="white-content">
		<div class="wrapper">

			<div class="sidebar" data="blue" >
				<!--
				Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
				-->
				<div class="sidebar-wrapper">
					<div class="logo">
						<a href="javascript:void(0)" class="simple-text logo-mini">
							<img src="<?=base_url() ?>assets/img/tvip.png" alt="Logo">
						</a>
						<a href="javascript:void(0)" class="simple-text logo-normal">
							ICT Team
						</a>
					</div>
					<ul class="nav">
						<li >
							<a href="<?=base_url() ?>">
								<i class="tim-icons icon-chart-pie-36"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="active">
							<a href="<?=base_url('slavekpi')?>">
								<i class="tim-icons icon-atom"></i>
								<p>DR Server</p>
							</a>
						</li>
						<li>
							<a href="<?=base_url('backupdb') ?>">
								<i class="tim-icons icon-single-copy-04"></i>
								<p>Back Up Database</p>
							</a>
						</li>
						<li>
							<a href="<?=base_url('temperature') ?>">
								<i class="tim-icons icon-bullet-list-67"></i>
								<p>Temperature</p>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="main-panel" data="blue">
				<!-- Navbar -->
				<?php $this->load->view('navbar') ?>

				<!-- End Navbar -->
				<div class="content">
					<div class="row">
						<div class="col-md-12">
							<div class="card card-chart">
								<div class="card-header ">
									<h2 class="card-title">DISASTER RECOVERY SERVER 2020</h2>
									<h5 class="card-title">Monthly Report</h5>									
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table tablesorter " id="">
											<thead class="thead-light">
												<tr>
													<th >Server</th>
													<th scope="col">Jan</th>
													<th scope="col">Feb</th>
													<th scope="col">Mar</th>
													<th scope="col">Apr</th>
													<th scope="col">May</th>
													<th scope="col">Jun</th>
													<th scope="col">Jul</th>
													<th scope="col">Aug</th>
													<th scope="col">Sep</th>
													<th scope="col">Oct</th>
													<th scope="col">Nov</th>
													<th scope="col">Dec</th>
												</tr>
											</thead>
											<tbody class="thead-light">
												<tr>
													<td><b>Target Jam</b></td>
<?php foreach ($dmsasa as $j) { ?>
													<td style="color:red;"><b><?php echo $j->total_jam ?></b></td>
<?php } ?>
												</tr>
												<tr>
													<td><?php echo  strtoupper($dmsasa[0]->nama) ?></td>
<?php foreach ($dmsasa as $row) { $tf = $row->tfail;$tj = $row->total_jam;$hsl = ($tj-$tf)/$tj*100;?>
													<td><?php echo number_format($hsl,2) ?>%</td>
<?php } ?>
												</tr>
												<tr>
													<td><?php echo  strtoupper($dmstvip[0]->nama) ?></td>
<?php foreach ($dmstvip as $row) { $tf = $row->tfail;$tj = $row->total_jam;$hsl = ($tj-$tf)/$tj*100; ?>
													<td><?php echo number_format($hsl,2) ?>%</td>
<?php } ?>
												</tr>
												<tr>
													<td><?php echo strtoupper($hris[0]->nama) ?></td>
<?php foreach ($hris as $row) { $tf = $row->tfail; $tj = $row->total_jam; $hsl = ($tj-$tf)/$tj*100; ?>
													<td><?php echo number_format($hsl,2) ?>%</td>
<?php } ?>
												</tr>
												<tr>
													<td><?php echo  strtoupper($modust[0]->nama) ?></td>
<?php foreach ($modust as $row) { $tf = $row->tfail; $tj = $row->total_jam; $hsl = ($tj-$tf)/$tj*100; ?>
													<td><?php echo number_format($hsl,2) ?>%</td>
<?php } ?>
												</tr>
												<tr>
													<td><?php echo  strtoupper($waterin[0]->nama) ?></td>
<?php foreach ($waterin as $row) { $tf = $row->tfail; $tj = $row->total_jam; $hsl = ($tj-$tf)/$tj*100; ?>
													<td><?php echo number_format($hsl,2) ?>%</td>
<?php } ?>
												</tr>
												<tr>
													<td><?php echo  strtoupper($waterout[0]->nama) ?></td>
<?php foreach ($waterout as $row) { $tf = $row->tfail; $tj = $row->total_jam; $hsl = ($tj-$tf)/$tj*100; ?>
													<td><?php echo number_format($hsl,2) ?>%</td>
<?php } ?>
												</tr>
											</tbody>
											<tfoot class="thead-light" >
												<tr>
													
<?php
	$kpi1=$totkpi[0]->tfail;
	$kpi2=$totkpi[1]->tfail;
	$kpi3=$totkpi[2]->tfail;
	$kpi4=$totkpi[3]->tfail;
	$kpi5=$totkpi[4]->tfail;
	$kpi6=$totkpi[5]->tfail;
	$kpi7=$totkpi[6]->tfail;
	$kpi8=$totkpi[7]->tfail;
	$kpi9=$totkpi[8]->tfail;
	$kpi10=$totkpi[9]->tfail;
	$kpi11=$totkpi[10]->tfail;
	$kpi12=$totkpi[11]->tfail;
?>
													<th>KPI</th>
													<th><?php $tjm=744*6;$tkpi=($tjm-$kpi1)/$tjm*100; echo number_format($tkpi,2) ?>%</th>
													<th><?php $tjm=696*6;$tkpi=($tjm-$kpi2)/$tjm*100; echo number_format($tkpi,2) ?>%</th>
													<th><?php $tjm=744*6;$tkpi=($tjm-$kpi3)/$tjm*100; echo number_format($tkpi,2) ?>%</th>
													<th><?php $tjm=720*6;$tkpi=($tjm-$kpi4)/$tjm*100; echo number_format($tkpi,2) ?>%</th>
													<th><?php $tjm=744*6;$tkpi=($tjm-$kpi5)/$tjm*100; echo number_format($tkpi,2) ?>%</th>
													<th><?php $tjm=720*6;$tkpi=($tjm-$kpi6)/$tjm*100; echo number_format($tkpi,2) ?>%</th>
													<th><?php $tjm=744*6;$tkpi=($tjm-$kpi7)/$tjm*100; echo number_format($tkpi,2) ?>%</th>
													<th><?php $tjm=744*6;$tkpi=($tjm-$kpi8)/$tjm*100; echo number_format($tkpi,2) ?>%</th>
													<th><?php $tjm=720*6;$tkpi=($tjm-$kpi9)/$tjm*100; echo number_format($tkpi,2) ?>%</th>
													<th><?php $tjm=744*6;$tkpi=($tjm-$kpi10)/$tjm*100; echo number_format($tkpi,2) ?>%</th>
													<th><?php $tjm=720*6;$tkpi=($tjm-$kpi11)/$tjm*100; echo number_format($tkpi,2) ?>%</th>
													<th><?php $tjm=744*6;$tkpi=($tjm-$kpi12)/$tjm*100; echo number_format($tkpi,2) ?>%</th>
												</tr>
											</tfoot>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-12">
							
						</div>
						<div class="col-lg-6 col-md-12">
							
						</div>
					</div>
				</div>
				<?php $this->load->view('footer')?>
			</div>
		</div>
		<?php // $this->load->view('plugin') ?>
		<!--   Core JS Files   -->
		<script src="<?=base_url() ?>assets/js/core/jquery.min.js"> </script>
		<script src="<?=base_url() ?>assets/js/core/popper.min.js"> </script>
		<script src="<?=base_url() ?>assets/js/core/bootstrap.min.js"> </script>
		<script src="<?=base_url() ?>assets/js/plugins/perfect-scrollbar.jquery.min.js"> </script>
		<!--  Google Maps Plugin    -->
		<!-- Place this tag in your head or just before your close body tag. -->
		<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"> </script>
		<!-- Chart JS -->
		<script src="<?=base_url() ?>assets/js/plugins/chartjs.min.js"> </script>
		<!--  Notifications Plugin    -->
		<script src="<?=base_url() ?>assets/js/plugins/bootstrap-notify.js"> </script>
		<!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
		<script src="<?=base_url() ?>assets/js/black-dashboard.min.js?v=1.0.0"> </script><!-- Black Dashboard DEMO methods, don't include it in your project! -->
		<script src="<?=base_url() ?>assets/demo/demo.js"> </script>
		<!--<script src="<?=base_url() ?>assets/js/control.js">-->

		</script>
		<script>
			$(document).ready(function() {
				// Javascript method's body can be found in assets/js/demos.js
				demo.initDashboardPageCharts();

			});
		</script>
		<script src="https://cdn.trackjs.com/agent/v3/latest/t.js"> </script>
		<script>
			window.TrackJS &&
			TrackJS.install({
				token: "ee6fab19c5a04ac1a32a645abde4613a",
				application: "black-dashboard-free"
			});
		</script>
	</body>

</html>