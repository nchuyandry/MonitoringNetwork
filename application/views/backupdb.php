<html lang="en">

	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
		<link rel="icon" type="image/png" href="<?=base_url() ?>assets/img/tvip.png">
		<title>Dashboard KPI ICT</title>
		<!--     Fonts and icons     -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
		<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
		<!-- Nucleo Icons -->
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
						<li >
							<a href="<?=base_url('slavekpi') ?>">
								<i class="tim-icons icon-atom"></i>
								<p>DR Server</p>
							</a>
						</li>
						<li class="active">
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
						<div class="col-12">
							<div class="card card-chart">
								<div class="card-header ">
									<h2 class="card-title">Back Up Database 2020</h2>
									<h5 class="card-title">Daily Report</h5>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table-bordered table-sm" >
											<thead class="thead-light">
												<tr>
													<th rowspan="2"  >Bulan</th>
													<th rowspan="2"  >Host</th>
													<th colspan="31">Tanggal</th>
												</tr>
												<tr>
												<?php for ($i=1;$i<=9;$i++) { echo "<th>0".$i."</th>";} ?>
												<?php for ($j=10;$j<=31;$j++) { echo "<th>".$j."</th>";} ?>
												</tr>&nbsp;
											</thead>
											<tbody>
												<!--===========================================OKtober==========================================-->
												<?php
										//var_dump($bln);
										$oct = date_create("2020-10-01");
										$nov = date_create("2020-11-01");
										//var_dump($oct);
										?>
												<tr>
													<td rowspan="5" >&nbsp;&nbsp;<?php echo date_format($oct, "M Y") ?></td>
													<td><?php echo strtoupper($dmsasa[0]->name) ?></td>
													<?php
										foreach ($dmsasa as $row) { ?>
													<td title="<?php echo $row->DATE ?>" ><?php echo $row->success ?></td>
													<?php } ?>


												</tr>
												<tr>
													<td><?php echo strtoupper($dmstvip[0]->name) ?></td>
													<?php
										foreach ($dmstvip as $row) { ?>
													<td title="<?php echo $row->DATE ?>" ><?php echo $row->success ?></td>
													<?php } ?>
												</tr>
												<tr>
													<td><?php echo strtoupper($hris[0]->name) ?></td>
													<?php
										foreach ($hris as $row) { ?>
													<td title="<?php echo $row->DATE ?>" ><?php echo $row->success ?></td>
													<?php } ?>
												</tr>
												<tr>
													<td><?php echo strtoupper($waterin[0]->name) ?></td>
													<?php
										foreach ($waterin as $row) { ?>
													<td title="<?php echo $row->DATE ?>" ><?php echo $row->success ?></td>
													<?php } ?>
												</tr>
												<tr>
													<td><?php echo strtoupper($waterout[0]->name) ?></td>
													<?php
										foreach ($waterout as $row) { ?>
													<td title="<?php echo $row->DATE ?>" ><?php echo $row->success ?></td>
													<?php } ?>
												</tr>
												<!--===========================================November==========================================-->
												<tr>
													<td rowspan="5" >&nbsp;&nbsp;<?php echo date_format($nov, "M Y") ?></td>
													<td><?php echo strtoupper($dmsasan[0]->name) ?></td>
													<?php
										foreach ($dmsasan as $row) { ?>
													<td title="<?php echo $row->DATE ?>" ><?php echo $row->success ?></td>
													<?php } ?>


												</tr>
												<tr>
													<td><?php echo strtoupper($dmstvipn[0]->name) ?></td>
													<?php
										foreach ($dmstvipn as $row) { ?>
													<td title="<?php echo $row->DATE ?>" ><?php echo $row->success ?></td>
													<?php } ?>
												</tr>
												<tr>
													<td><?php echo strtoupper($hrisn[0]->name) ?></td>
													<?php
										foreach ($hrisn as $row) { ?>
													<td title="<?php echo $row->DATE ?>" ><?php echo $row->success ?></td>
													<?php } ?>
												</tr>
												<tr>
													<td><?php echo strtoupper($waterinn[0]->name) ?></td>
													<?php
										foreach ($waterinn as $row) { ?>
													<td title="<?php echo $row->DATE ?>" ><?php echo $row->success ?></td>
													<?php } ?>
												</tr>
												<tr>
													<td><?php echo strtoupper($wateroutn[0]->name) ?></td>
													<?php
										foreach ($wateroutn as $row) { ?>
													<td title="<?php echo $row->DATE ?>" ><?php echo $row->success ?></td>
													<?php } ?>
												</tr>
												<!--===========================================Desember==========================================-->


											</tbody>
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
				<?php $this->load->view('footer') ?>
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