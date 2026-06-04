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
   <style>
      .rdash{
          display:none;
      }
  </style>
</head>
    
<body class="theme-light">
    
<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>
    
<div id="page">
    
   
    
    <div class="page-content">
        <div class="page-title page-title-small">
            <h2>RSSKDP DASHBOARD</h2>
            <!--<a href="#" data-menu="menu-main" class="bg-fade-highlight-light shadow-xl preload-img" data-src="images/avatars/5s.png"></a>-->
        </div>
        <div class="card header-card shape-rounded" data-card-height="150">
            <div class="card-overlay bg-highlight opacity-95"></div>
            <div class="card-overlay dark-mode-tint"></div>
            <div class="card-bg preload-img" data-src="images/pictures/20s.jpg"></div>
        </div>
        

        <div class="card card-style">
            <div class="card-body">
                
                <div class="content">
                    <h2>Vibhag Dashboard</h2>
                    <h5 class="color-highlight mb-4">{{$reports['vibhag']->name}}</h5>
                    
                   
                    <input type="hidden" id="vibhid" value="<?=$reports['vibhagid'];?>">
                    <div class="mnagardiv">
                <div class="col-md-12 has-borders no-icon mb-4" style="position: relative;margin-bottom: 15px !important;">
                     <label for="mnagar" class="color-highlight profess-tag">Bhag / Jille List</label>
                    <select required class="form-select mnagar profess-tag-1"  name="mnagar" data-placeholder="Select any Bhag" style="border-color: rgba(0, 0, 0, 0.08) !important;">
                    <option value='default' selected disabled>Choose one option</option>
                    @foreach($reports['bhag'] as $vib)
                    <option value="{{$vib->id}}">{{$vib->name}}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="mandaladiv">
                <div class="col-md-12 has-borders no-icon mb-4" style="position: relative;margin-bottom: 15px !important;">
                     <label for="mandala" class="color-highlight profess-tag">Nagar / Taluk List</label>
                    <select required class="form-select mandala profess-tag-1"  name="mandala" data-placeholder="Select any Nagar" style="border-color: rgba(0, 0, 0, 0.08) !important;">
                    </select>
                </div>
            </div>
            
            
                </div>
            
                </div>
                
            </div>
            
            
            <!---datas-->
        
        
        
        
        
        <div class="resultdiv">
            
            
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
        <!--    <div class="col-6 ps-0">-->
        <!--       <div class="card card-style">-->
        <!--    <div class="content mb-0">-->
        <!--        <div class="row ">-->
        <!--            <div class="col-12 pe-0">-->
        <!--                <h2 class="text-center">{{$reports['today']}}</h2>-->
        <!--            </div>-->
        <!--            <div class="col-12">-->
        <!--                <h6 class="text-center">Today</h6>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>      -->
        <!--    </div>-->
        </div>
        
        
        
            
            
           <h2 class="color-highlight m-4 text-uppercase">Bhag / Jille</h2> 
            <div class="card card-style">
			<div class="content">
				
				<?php
				$data = '';
				foreach($reports['bhag'] as $vib)
				{
				?>
				 <div class="d-flex">
					<div class="ps-3">
						<h4>{{$vib->name}}</h4>
					</div>
					<?php
					$id = $vib->id;
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
		
         
        
      
           
           
     </div>      
           
           
           
           
           
            
            
        </div>
        
        
        
        
        


            
       
    </div>    
    
 
    
    
</div>    



 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="{{ url('public/scripts/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('public/scripts/custom.js') }}"></script>
    <script type="text/javascript" >
    
      $(document).ready(function(){
          
             var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
             
             $(".mandaladiv").hide();
             
             var vibhag = document.getElementById('vibhid').value;
            
        
         $('body').on('change', '.mnagar', function () {
            
            var bhag = $(".mnagar").val();

            $.ajax({

                url: '{{route('vibhagnagar.list.ssv')}}',
                type: 'POST',
                data: {_token: CSRF_TOKEN, vibhag:vibhag, bhag:bhag},
                dataType: 'JSON',
                success: function (data) 
                {
                   
                    $(".mandaladiv").show();
                       $(".mandala").html('');
                       
                      $(".mandala").append("<option value='default' selected disabled>Choose one option</option>"); 
                         $.each(data.nagar, function(i, item)
                    {
                        $(".mandala").append("<option value="+item.id+">"+item.name+"</option>");      
                    });
                    
                     $(".resultdiv").html(" ");
                    $(".resultdiv").html(data.nagardash);
                    
                    
                }
            }); 
        });
        
         $('body').on('change', '.mandala', function () {
            
            // var vibhag = $(".mbhag").val();
            var bhag =  $(".mnagar").val();
            var nagar =  $(this).val();

            $.ajax({

                url: '{{route('vibhagmandala.dashboard.ssv')}}',
                type: 'POST',
                data: {_token: CSRF_TOKEN, vibhag:vibhag, bhag:bhag, nagar:nagar},
                dataType: 'JSON',
                success: function (data) 
                {
                    $(".resultdiv").html(" ");
                    $(".resultdiv").html(data);
                    
                }
            }); 
        });
        
        
      });
    </script>
    
    
    
    
    
</body>
