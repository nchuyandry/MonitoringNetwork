
  <head>
  	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="60">
    <meta name="description" content="KPI Network">
    <meta name="author" content="ICT INFRA">
    <title>Board Network TVIP - ASA</title>

    <!-- Bootstrap core CSS -->
	<link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<!--<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">-->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" rel="stylesheet">
   <!-- <link href="<?=base_url()?>assets/css/sb-admin-2.min.css" rel="stylesheet">-->
    <link href="<?=base_url()?>assets/css/dot.css" rel="stylesheet">    
    <!-- Favicons -->
	<link rel="icon" href="<?=base_url() ?>assets/img/tvip.png">
	<link rel="tvip-touch-icon" href="<?=base_url() ?>assets/img/tvip.png" sizes="180x180">
	<link rel="icon" href="<?=base_url() ?>assets/img/tvip.png" sizes="32x32" type="image/png">
	<link rel="icon" href="<?=base_url() ?>assets/img/tvip.png" sizes="16x16" type="image/png">
	<meta name="theme-color" content="#7952b3">


    <style>
	    .blog-header {
		    line-height: 1;
		    border-bottom: 1px solid #e5e5e5;
		    background-color: #ffffff; 
		    border: solid rgba(0, 0, 0, .15);	
		}
		.border-left-danger {
		    border-left: .25rem solid #e74a3b!important;
		}
		.border-left-primary {
		    border-left: .25rem solid #2d4af4!important;
		}
		.border-left-dark {
		    border-left: .25rem solid #000!important;
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
    
  </head>