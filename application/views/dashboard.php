<html lang="en">

	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
		<link rel="icon" type="image/png" href="<?=base_url() ?>assets/img/tvip.png">
		<title>
			Dashboard KPI ICT
		</title>
		<!--     Fonts and icons     -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
		<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
		<!-- Nucleo Icons -->
		<link href="<?=base_url()?>assets/css/nucleo-icons.css" rel="stylesheet" />
		<!-- CSS Files -->
		<link href="<?=base_url() ?>assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
		<!-- CSS Just for demo purpose, don't include it in your project -->
		<link href="<?=base_url() ?>assets/demo/demo.css" rel="stylesheet" />
	</head>

	<body class="white-content">
		<?php $x = explode('<br><br>',$temp);
		$t = substr($x[1],23,2);
		$hu = substr($x[2],20,2);
		$d = 100-$t;
		$e = 100-$hu;
		?>
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
						<li class="active" >
							<a href="<?=base_url() ?>">
								<i class="tim-icons icon-chart-pie-36"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li>
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
							<a href="#">
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
						<div class="col-lg-6">
							<div class="card card-chart">
								<div class="card-header">
									<h5 class="card-category">Temperature</h5>
									<h3 class="card-title">
										<i class="tim-icons icon-bell-55 text-primary"></i> <?php echo $t ?>&deg; Celcius</h3>
								</div>
								<div class="card-body">
									<div class="chart-area">
										<canvas id="temperature"></canvas>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="card card-chart">
								<div class="card-header">
									<h5 class="card-category">Humidity</h5>
									<h3 class="card-title">
										<i class="tim-icons icon-tablet-2 text-info"></i> <?php echo $hu ?> %</h3>
								</div>
								<div class="card-body">
									<div class="chart-area">
										<canvas id="humidity"></canvas>
									</div>
								</div>
							</div>
						</div>
						
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="card card-chart">
								<div class="card-header ">
									<div class="row">
										<div class="col-sm-6 text-left">
											<h5 class="card-category">Total KPI Monthly</h5>
											<h2 class="card-title">Slave KPI</h2>
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="chart-area" >
										<canvas id="myChart"></canvas>
									</div>
								</div>
							</div>
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
		<script src="<?=base_url() ?>assets/js/black-dashboard.min.js?v=1.0.0"> </script> 
		<!--Black Dashboard DEMO methods, don't include it in your project! -->
		<script src="<?=base_url() ?>assets/demo/demo.js"> </script>
		<!--<script src="<?=base_url() ?>assets/js/control.js">-->
			
		
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
		<script>
			// Set new default font family and font color to mimic Bootstrap's default styling
			Chart.defaults.global.defaultFontFamily = 'Poppins', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
			Chart.defaults.global.defaultFontColor = '#858796';

			var ctx = document.getElementById("myChart").getContext("2d");
			var gradientStroke = ctx.createLinearGradient(0, 230, 0, 50);

			gradientStroke.addColorStop(1, 'rgba(72,72,176,0.2)');
			gradientStroke.addColorStop(0.2, 'rgba(72,72,176,0.0)');
			gradientStroke.addColorStop(0, 'rgba(119,52,169,0)'); //purple colors
			var data = {
				labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
				datasets: [{
						label: "Total Log KPI Server ",
						lineTension: 0.3,
						backgroundColor: "rgba(150, 140, 255, 0.5)",
						borderColor: "rgba(78, 115, 223, 0.5)",
						pointRadius: 3,
						pointBackgroundColor: "rgba(78, 115, 223, 0.5)",
						pointBorderColor: "rgba(78, 115, 223, 0.5)",
						pointHoverRadius: 3,
						pointHoverBackgroundColor: "rgba(78, 115, 223, 0.5)",
						pointHoverBorderColor: "rgba(78, 115, 223,0.5)",
						pointHitRadius: 10,
						pointBorderWidth: 2,
						data: [<?php foreach ($totkpi as $data) {
								echo $data->tfail . ", ";
							}?>],
					},{
						label: "DMS3ASA",
						lineTension: 0.3,
						backgroundColor:"rgba(119,52,169,0.5)",
						borderColor: "rgba(119,52,169,1)",
						pointRadius: 3,
						pointBackgroundColor: "rgba(119,52,169,1)",
						pointBorderColor: "rgba(119,52,169,1)",
						pointHoverRadius: 3,
						pointHoverBackgroundColor: "rgba(119,52,169,1)",
						pointHoverBorderColor: "rgba(119,52,169,1)",
						pointHitRadius: 10,
						pointBorderWidth: 2,
						data: [<?php foreach ($dmsasa as $data) {
								echo $data->tfail . ", ";
							}?>],
					},{
						label: "DMS3TVIP",
						lineTension: 0.3,
						backgroundColor:"rgba(71, 54, 59, 0.5)",
						borderColor: "rgba(119,52,169,1)",
						pointRadius: 3,
						pointBackgroundColor: "rgba(71, 54, 59, 1)",
						pointBorderColor: "rgba(71, 54, 59, 1)",
						pointHoverRadius: 3,
						pointHoverBackgroundColor: "rgba(71, 54, 59, 1)",
						pointHoverBorderColor: "rgba(71, 54, 59, 1)",
						pointHitRadius: 10,
						pointBorderWidth: 2,
						data: [<?php foreach ($dmstvip as $data) {
								echo $data->tfail . ", ";
							}?>],
					},{
						label: "HRIS",
						lineTension: 0.3,
						backgroundColor:"rgba(53, 255, 50, 0.5)",
						borderColor: "rgba(53, 255, 50, 1)",
						pointRadius: 3,
						pointBackgroundColor: "rgba(53, 255, 50, 1)",
						pointBorderColor: "rgba(53, 255, 50, 1)",
						pointHoverRadius: 3,
						pointHoverBackgroundColor: "rgba(53, 255, 50, 1)",
						pointHoverBorderColor: "rgba(53, 255, 50, 1)",
						pointHitRadius: 10,
						pointBorderWidth: 2,
						data: [<?php foreach ($hris as $data) {
								echo $data->tfail . ", ";
							}?>],
					},{
						label: "MODUST",
						lineTension: 0.3,
						backgroundColor:" rgba(224, 36, 12, 0.5)",
						borderColor: " rgba(224, 36, 12, 1)",
						pointRadius: 3,
						pointBackgroundColor: " rgba(224, 36, 12, 1)",
						pointBorderColor: " rgba(224, 36, 12, 1)",
						pointHoverRadius: 3,
						pointHoverBackgroundColor: " rgba(224, 36, 12, 1)",
						pointHoverBorderColor: " rgba(224, 36, 12, 1)",
						pointHitRadius: 10,
						pointBorderWidth: 2,
						data: [<?php foreach ($modust as $data) {
								echo $data->tfail . ", ";
							}?>],
					},{
						label: "WATERIN",
						lineTension: 0.3,
						backgroundColor:" rgba(177, 142, 25, 0.5)",
						borderColor: "  rgba(177, 142, 25, 1)",
						pointRadius: 3,
						pointBackgroundColor: "  rgba(177, 142, 25, 1)",
						pointBorderColor: "  rgba(177, 142, 25, 1)",
						pointHoverRadius: 3,
						pointHoverBackgroundColor: " rgba(177, 142, 25, 1)",
						pointHoverBorderColor: "  rgba(177, 142, 25, 1)",
						pointHitRadius: 10,
						pointBorderWidth: 2,
						data: [<?php foreach ($waterin as $data) {
								echo $data->tfail . ", ";
							}?>],
					},{
						label: "WATEROUT",
						lineTension: 0.3,
						backgroundColor:" rgba(255, 151, 0, 0.5)",
						borderColor: " rgba(255, 151, 0, 1)",
						pointRadius: 3,
						pointBackgroundColor: " rgba(255, 151, 0, 1)",
						pointBorderColor: " rgba(255, 151, 0, 1)",
						pointHoverRadius: 3,
						pointHoverBackgroundColor: " rgba(255, 151, 0, 1)",
						pointHoverBorderColor: " rgba(255, 151, 0, 1)",
						pointHitRadius: 10,
						pointBorderWidth: 2,
						data: [<?php foreach ($waterout as $data) {
								echo $data->tfail . ", ";
							}?>],
					}

				],
			};
			var options = {
				maintainAspectRatio: false,
				legend: {
					display: true
				},

				tooltips: {
					backgroundColor: '#f5f5f5',
					titleFontColor: '#333',
					bodyFontColor: '#666',
					bodySpacing: 4,
					xPadding: 12,
					mode: "nearest",
					intersect: 0,
					position: "nearest"
				},
				responsive: true,
				scales: {
					yAxes: [{
							barPercentage: 1.6,
							gridLines: {
								drawBorder: false,
								color: 'rgba(29,140,248,0.0)',
								zeroLineColor: "transparent",
							},
							ticks: {
								suggestedMin: 0,
								suggestedMax: 100,
								padding: 20,
								fontColor: "#9a9a9a"
							},
							display: true,
							scaleLabel: {
								display: true,
								labelString: 'Value'
							}
						}],

					xAxes: [{
							barPercentage: 1.6,
							gridLines: {
								drawBorder: false,
								color: 'rgba(225,78,202,0.1)',
								zeroLineColor: "transparent",
							},
							ticks: {
								padding: 20,
								fontColor: "#9a9a9a"
							},
							display: true,
							scaleLabel: {
								display: true,
								labelString: 'Month'
							}
						}]
				}
			}; 
			
			var myChart = new Chart(ctx, {
				type: 'line',
				data: data,
				options: options
			});
	</script>
	<script>
			Chart.defaults.global.defaultFontFamily = 'Poppins', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
			Chart.defaults.global.defaultFontColor = '#858796';

			// Pie Chart Example
			var ctx = document.getElementById("temperature");
			var myPieChart = new Chart(ctx, {
				type: "doughnut",
				data: {
					labels: ["Temperature", " "],
					datasets: [
						{
							data: [<?php echo $t. ",2 ," . $d;?>],
							backgroundColor: [
								"rgb(78, 115, 223)","rgba(0, 0, 0)","rgb(135, 135, 135)"],
							borderWidth: 0,
							hoverBackgroundColor: [
								"rgb(78, 115, 200)","rgba(0, 0, 0)","rgb(135, 135, 135)"
							],
							hoverBorderWidth: 0
						},
						{
							data: [<?php echo $t. ",2 ," . $d;?>],
							backgroundColor: [
								"rgba(0, 0, 0, 0)",
								"rgba(0, 0, 0)",
								"rgba(0, 0, 0, 0)",
								"rgba(0, 0, 0, 0)",
								"rgba(0, 0, 0, 0)"
							],
							borderWidth: 0,
							hoverBackgroundColor: [
								"rgba(0, 0, 0, 0)",
								"rgba(0, 0, 0)",
								"rgba(0, 0, 0, 0)",
								"rgba(0, 0, 0, 0)",
								"rgba(0, 0, 0, 0)"
							],
							hoverBorderWidth: 0
						}
					]
				},
				options: {
					cutoutPercentage: 0,
					rotation: -1 * Math.PI,
					circumference: 1 * Math.PI,
					legend: {
						display: true
					},
					tooltips: {
						enabled: false
					},
					title: {
						display: true,
						text: '<?php echo $t?> C',
						fontSize: 30,
						position: "bottom"
					}
				}
			});
			var ctx = document.getElementById("humidity");
			var myPieChart = new Chart(ctx, {
				type: "doughnut",
				data: {
					labels: ["Humidity", " "],
					datasets: [
						{
							data: [<?php echo $hu. ",2 ," . $e;?>],
							backgroundColor: [
							" rgba(37, 255, 206, 1)","rgba(0, 0, 0)","rgb(135, 135, 135)"],
							borderWidth: 0,
							hoverBackgroundColor: [
							" rgba(37, 255, 206, 0.5)","rgba(0, 0, 0)","rgba(135, 135, 135, 0.9)"
							],
							hoverBorderWidth: 0
						},
						{
							data: [<?php echo $hu. ",2 ," . $e;?>],
							backgroundColor: [
								"rgba(0, 0, 0, 0)",
								"rgba(0, 0, 0)",
								"rgba(0, 0, 0, 0)",
								"rgba(0, 0, 0, 0)",
								"rgba(0, 0, 0, 0)"
							],
							borderWidth: 0,
							hoverBackgroundColor: [
								"rgba(0, 0, 0, 0)",
								"rgba(0, 0, 0)",
								"rgba(0, 0, 0, 0)",
								"rgba(0, 0, 0, 0)",
								"rgba(0, 0, 0, 0)"
							],
							hoverBorderWidth: 0
						}
					]
				},
				options: {
					cutoutPercentage: 0,
					rotation: -3.1415926535898,
					circumference: 3.1415926535898,
					legend: {
						display: true
					},
					tooltips: {
						enabled: true
					},
					title: {
						display: true,
						text: '<?php echo $hu?> %',
						fontSize: 30,
						position: "bottom"
					}
				}
			});

	</script>
	</body>

</html>