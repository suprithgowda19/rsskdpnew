<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>RSSKDP</title>
        
        <link rel="manifest" href="{{ url('public/_manifest.json') }}" data-pwa-version="set_in_manifest_and_pwa_js">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ url('public/app/icons/icon-192x192.png') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('public/fonts/css/fontawesome-all.min.css') }}">
        <link rel="stylesheet" href="{{ url('public/styles/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ url('public/styles/style.css') }}">
        <link rel="icon" href="{{ url('public/favicon.ico') }}" type="image/x-icon"/>
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900|Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&amp;display=swap" rel="stylesheet">
    
    </head>
    
    <body class="theme-light">
    
        <div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>
        
        <div id="page">
        
        <div class="page-content">
        <div class="page-title page-title-small">
        <h2>RSSKDP DASHBOARD</h2>
        </div>
        <div class="card header-card shape-rounded" data-card-height="150">
        <div class="card-overlay bg-highlight opacity-95"></div>
        <div class="card-overlay dark-mode-tint"></div>
        <div class="card-bg preload-img" data-src="images/pictures/20s.jpg"></div>
        </div>
        
        
        <div class="card card-style">
        <div class="card-body">
        
        <div class="content">
        
        <h2>Karnataka Pranatha</h2>
        
        </div>
        
        </div>
        
        </div>
        
        
        <!---datas-->
        
        <div class="row p-4">
        <h2>Swayamsevak Registration</h2>
        
        </div>
        
        
        <div class="row mb-0">
        <div class="col-6 pe-0">
        <div class="card card-style">
        <div class="content mb-0">
        <div class="row ">
        <div class="col-12 pe-0">
        <h2 class="text-center">{{$reports['count']}}</h2>
        </div>
        <div class="col-12">
        <h6 class="text-center">Total </h6>
        </div>
        </div>
        </div>
        </div>      
        </div>
        <!--<div class="col-6 ps-0">-->
        <!--<div class="card card-style">-->
        <!--<div class="content mb-0">-->
        <!--<div class="row ">-->
        <!--<div class="col-12 pe-0">-->
        <!--<h2 class="text-center">{{$reports['today']}}</h2>-->
        <!--</div>-->
        <!--<div class="col-12">-->
        <!--<h6 class="text-center">Today</h6>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>      -->
        <!--</div>-->
        </div>
        
        <div class="resultdiv">
            <?php
				foreach($reports['vibhag'] as $vib)
				{
				?>
             <div class="card card-style">
			<div class="content">
			    
				<h2 class="color-highlight m-4">{{$vib->name}}</h2>
				
					<?php
					$id = $vib->id;
					
              $reports['bhag'] = DB::table('jm_blr_rs_bhag')->where('vibhag_id', $id)->get();
        
				foreach($reports['bhag'] as $bha)
				{
				?>
				 <div class="d-flex">
					<div class="ps-3">
						<h4>{{$bha->name}}</h4>
						
					</div>
					<?php
					$id = $bha->id;
         $v_count = DB::table('ssv_register')->where('district', $id)->where('status', 1)->count();
         ?>
				<div class="ms-auto align-self-center">
						<h1 class="font-20">{{$v_count}}</h1>
					</div>
				</div>
				<div class="divider mt-3 mb-3"></div>
				<?php } ?>
				
				
			
		</div>
		</div>
		
		<?php } ?>
        
        </div>
        
        </div>
        
        </div>    
        
        </div>    
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="text/javascript" src="{{ url('public/scripts/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('public/scripts/custom.js') }}"></script>
    </body>
</html>
