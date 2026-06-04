@extends('includes.master')

@section('headerscript')
@parent
<style>
    .header{
        display:none;
    }
    .back-to-top{
        display : none;
    }
    #footer-bar {
        display:none;
    }
    .footer-card{
        bottom : 0px !important;
    }
</style>
@endsection

@section('header')
@parent
@endsection

@section('content')

        <div class="page-title page-title-small ">
            <div class="text-center">
                <h2>B-Care</h2>
            <span class="color-white"> <strong>Connecting public</strong></span>
            </div>

            <h2>Log In</h2>
              <h1>{{ __('messages.title') }}</h1>
           
                
            <!--<a href="#" data-menu="menu-main" class="bg-fade-highlight-light shadow-xl preload-img" data-src="{{url('public/images/avatars/5s.png') }}"></a>-->
        </div>
        
 <input type="hidden" id="lngchk" value="{{ session()->get('langpop') == 'hide' ? 'hide' : '' }}">
        
        <div class="card header-card shape-rounded" data-card-height="150">
            <div class="card-overlay bg-highlight opacity-95"></div>
            <div class="card-overlay dark-mode-tint"></div>
            
            <div class="card-bg preload-img" data-src="{{url('public/images/pictures/img-rss-01.png') }}"></div>
        </div>
       @if(Session::has('success'))
 <div class="ms-3 me-3 alert alert-small rounded-s shadow-xl bg-green-dark s-alrt" role="alert">
            <span><i class="fa fa-check"></i></span>
            <strong>{{ Session::get('success') }}</strong>
            <button type="button" class="close color-white opacity-60 font-16" data-bs-dismiss="alert" aria-label="Close">&times;</button>
        </div>
@endif
        
        @if(Session::has('error'))
        <div class="ms-3 me-3 mb-5 alert alert-small rounded-s shadow-xl bg-red-dark s-alrt" role="alert">
            <span><i class="fa fa-times"></i></span>
            <strong>{{ Session::get('error') }}</strong>
            <button type="button" class="close color-white opacity-60 font-16" data-bs-dismiss="alert" aria-label="Close">&times;</button>
        </div>
        @endif

        <div class="card card-style">
            <div class="content mt-2 mb-0">
                
                 <a class="lan-btn btn" href="#" data-menu="lang"><span>EN/KA</span></a>
                 
                 

                <form method="post" action="{{route('login.api')}}">
                    @csrf
                <div class="input-style no-borders has-icon validate-field mb-4">
                    <i class="fa fa-user"></i>
                    <input type="tel" class="form-control validate-name" id="form1a" placeholder="Mobile number" name="phone" required>
                    <label for="form1a" class="color-blue-dark font-10 mt-1">Phone</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>

                <div class="input-style no-borders has-icon validate-field mb-4">
                    <i class="fa fa-lock"></i>
                    <input type="password" class="form-control validate-password" id="form3a" placeholder="Password" name="password" required>
                    <label for="form3a" class="color-blue-dark font-10 mt-1">Password</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>

                <!--<a href="#" class="btn btn-m mt-4 mb-4 btn-full bg-green-dark rounded-sm text-uppercase font-900">Login</a>-->
                <center>
                     <input type="submit" class="btn btn-m mt-4 mb-4 btn-full bg-green-dark rounded-sm text-uppercase font-900" value="Login">
                    
                </center>
                
                </form>
                <div class="divider mt-4 mb-3"></div>

                <div class="d-flex">
                    <div class="w-50 font-11 pb-2 color-theme opacity-60 pb-3 text-start"><a href="{{ route('register') }}" class="color-theme">Registration</a></div>
                    <div class="w-50 font-11 pb-2 color-theme opacity-60 pb-3 text-end"><a href="{{ route('forgot-password') }}" class="color-theme">Forgot Password</a></div>
                </div>
                
                


            </div>

        </div>
        
        
        <div id="lang" class="menu menu-box-modal rounded-m" data-menu-height="150" data-menu-width="310">
<div class="me-3 ms-3 mt-3">
<h1 class="font-700 mb-n1">Select language</h1>
<p class="font-11 mb-1">
You can direct to multiple languages of your page.
</p>
<div class="list-group language list-custom-small">
<div class="row">
<div class="col-6"><a href="#"><img class="me-3 mt-n1" width="20" src="{{url('public/images/flags/India.png') }}"><span>English</span></a></div>
<div class="col-6"><a href="#"><img class="me-3 mt-n1" width="20" src="{{url('public/images/flags/kannada.jpg') }}"><span>Kannada</span></a></div>
</div>
</div>
<div class="clear"></div>
</div>
</div>



<div class="modal fade " id="langser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" height="150" width="310" style="top:30% !important;">
    <div class="modal-dialog " role="document">
        <div class="modal-content ">
        <div class="me-3 ms-3 mt-3">
<h1 class="font-700 mb-n1">Select language</h1>
<p class="font-11 mb-1">
You can direct to multiple languages of your page.
</p>
<div class="list-group language list-custom-small">
<div class="row">
    
<div class="col-6"><a href="#" class="changeLang" id="en"><input type="hidden"  value="en"><img class="me-3 mt-n1" width="20" src="{{url('public/images/flags/India.png') }}"><span>English</span></a></div>
<div class="col-6"><a href="#" class="changeLang" id="ka"><input type="hidden"  value="ka"><img class="me-3 mt-n1" width="20" src="{{url('public/images/flags/kannada.jpg') }}"><span>Kannada</span></a></div>
</div>
</div>
<div class="clear"></div>
</div>
        </div>
    </div>
    </div>


@endsection

@section('footer')
@parent
@endsection


@section('footerscript')
@parent
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>

  <script type="text/javascript">
  
 $( document ).ready(function() {
     
     var load = document.getElementById('lngchk').value;

     if(load != "hide")
     {
         $('#langser').modal('show');
     }
     
     
     var url = "{{ route('changeLang') }}";
  
    $(".changeLang").click(function(){
        // var clk = $('input[type=hidden]').val();
        // alert( $(this).attr('id'));
        window.location.href = url + "?lang="+ $(this).attr('id');
    });
  
      
    });
  
  
  
        
    </script>

@endsection