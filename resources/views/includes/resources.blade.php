@extends('includes.master')

@section('headerscript')
@parent
<style>
    .menu{
        overflow:scroll !important;
    }
</style>
@endsection

@section('header')
@parent
@endsection

@section('content')

    <div class="page-title page-title-small">

        <h2><a href="#" data-back-button><i class="fa fa-arrow-left"></i></a>{{ __('messages.resotitle') }}</h2>
      <a class=" float-end lan-btn btn changeLang" id="{{ __('messages.langid') }}" href="#" ><span>{{ __('messages.lang') }}</span></a>
       
    </div>
    <div class="card header-card shape-rounded" data-card-height="150">
        <div class="card-overlay bg-highlight opacity-95"></div>
        <div class="card-overlay dark-mode-tint"></div>
        <div class="card-bg preload-img" data-src="{{url('public/images/pictures/20s.jpg') }}"></div>
    </div>
    
    <div class="row mb-0">
        @php $cnt = 0; @endphp
         @foreach($resources as $res)
    @if($cnt%2==0)
     <div class="col-6 pe-0">
                <div class="card card-style me-2">
                    <a data-menu="instant-left grp-{{$res->activities_id}}" data-card-height="150" class="card preload-img mb-3" data-src="{{url('public/uploads/activities') }}/{{$res->image}}"  href="#">
                        <div class="card-bottom mb-2">
                            <h4 class="color-white font-600 text-center">{{$res->title}}</h4>
                        </div>
                        <div class="card-overlay bg-gradient rounded-0"></div>
                    </a>
                    <div class="content mt-0">

<span class="color-black  mb-2 mt-2"><i class="fa fa-user pe-2"></i> {!! date('dS M', strtotime($res->updated_at)) !!}</span>
                        </div>
                </div>
            </div>
             @elseif($cnt%2<>0)
            <div class="col-6 ps-0">
                <div class="card card-style ms-2">
                    <a data-menu="instant-left grp-{{$res->activities_id}}" data-card-height="150" class="card preload-img mb-3" data-src="{{url('public/uploads/activities') }}/{{$res->image}}"  href="#">
                        <div class="card-bottom mb-2">
                            <h4 class="color-white font-600 text-center">{{$res->title}}</h4>
                        </div>
                        <div class="card-overlay bg-gradient rounded-0"></div>
                    </a>
                    <div class="content mt-0">
                       
                        <span class="color-black  mb-2 mt-2 text-end"><i class="fa fa-user ps-2"></i> {!! date('dS M', strtotime($res->updated_at)) !!}</span>
           
                    </div>
                </div>
            </div>
    
   @endif

      
    @php $cnt++;   @endphp
    @endforeach
    </div>
    
   

@endsection

@section('footer')

     @foreach($resources as $sec)
    
    <div id="instant-left grp-{{$sec->activities_id}}" class="menu menu-box-left" data-menu-width="cover" data-menu-height="cover" data-menu-effect="menu-over">  

        <div class="card" data-card-height="90">
            <div class="card-top">
                <div class="page-title page-title-small">
                    <h2><a href="#" class="close-menu"><i class="fa fa-arrow-left"></i></a>Details</h2>
                </div>
            </div>
            <div class="card-overlay bg-highlight opacity-95"></div>
            <div class="card-overlay dark-mode-tint"></div>
            <div class="card-bg preload-img" data-src="{{url('public/images/pictures/20s.jpg') }}"></div>
        </div>



                            <h4 class="color-highlight font-600 text-center mb-2">{{$sec->title}}</h4>
        <div class="content">
            <pre>{{$sec->descp}}</pre>

            <div class="divider mt-4"></div>
            
            @if(!empty($sec->image2))
            <h4>Images</h4>


            
                 <div class="row mb-0">
                     
                      @php
                $mul = explode("|",$sec->image2);
                @endphp
                @foreach($mul as $imgv)
                <div class="col-6 pe-0">
                    <a data-card-height="115" data-gallery="gallery-1" class="card card-style preload-img" data-src="{{asset('uploads/activities/sub')}}/{{$imgv}}" href="{{asset('uploads/activities/sub') }}/{{$imgv}}" title="{{$sec->title}}">
                        <!--<div class="card-center text-center">-->
                        <!--    <h3 class="color-white mb-0">Camera</h3>-->
                        <!--    <p class="color-white opacity-80 mt-n1 font-12 mb-0">-->
                        <!--        Industrial Designed.-->
                        <!--    </p>-->
                        <!--</div>-->
                        <div class="card-overlay bg-black opacity-60"></div>
                    </a>        
                </div>
                
            
              @endforeach
               
              
            </div>
            
            @endif

            <div class="divider mt-4"></div>
           

           
            <a href="#" class="close-menu btn btn-m btn-full bg-highlight rounded-sm text-uppercase font-900 mb-3">Close</a>

        </div>        
    </div>  
    @endforeach
@parent

@endsection



@section('footerscript')
@parent
@endsection