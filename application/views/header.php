<header>
	<div class="collapse bg-dark" id="navbarHeader">
    	<div class="container">
      		<div class="row">
        		<div class="col-sm-8 col-md-7 py-4">
          			<h4 class="text-white">Dashboard</h4>
          				<ul class="nav list-unstyled">
		    				<li class="me-3">
		    					<a href="<?=base_url()?>" class="text-white"><i class="fas fa-signal"></i> Network</a>
						    </li>
				            <li class="me-3">
						    	<a href="<?=base_url('cctv')?>" class="text-white" ><i class="fas fa-video"></i> CCTV</a>
						    </li >
				            <li class="me-3">
						    <a href="#" class="text-white" ><i class="fas fa-fingerprint"></i> Attendance Machine</a>						      
						    </li>
          				</ul>
        		</div> 
		       	<div class="col-sm-4 offset-md-1 py-4">
		        	<h4 class="text-white"></h4>
		          	<ul class="list-unstyled">
					  	<li><a href="#" class="text-white" data-bs-toggle="modal" data-bs-target="#addnetwork">Add Network</a></li>
					  	<li><a href="#" class="text-white" data-bs-toggle="modal" data-bs-target="#addcctv">Add CCTV</a></li>
					  	<li><a href="#" class="text-white" data-bs-toggle="modal" data-bs-target="#addabsen">Add Attendance Machine </a></li>
		          	</ul>
		        </div>
    		</div>
    	</div>
  	</div>
	<div class="navbar navbar-dark bg-dark shadow-sm">
    	<div class="container">
      		<a href="<?=base_url()?>" class="navbar-brand d-flex align-items-center">
      			<img class="d-block mx-auto mb-2" src="<?=base_url()?>assets/img/tvip.png" alt="" width="50" height="50">
        		<strong class="p-3">Monitoring Network</strong>
      		</a>
      		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        		<span class="navbar-toggler-icon"></span>
      		</button>
    	</div>
  	</div>
</header>
