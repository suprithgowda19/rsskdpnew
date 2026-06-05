@extends('includes.master')

@section('headerscript')
@parent
@endsection

@section('header')
@parent
@endsection

@section('content')

<div class="page-title page-title-small">
    <h2  data-username="" class=" text-capitalize">{{ __('messages.indexhead') }}</h2>
      <a class=" float-end lan-btn btn changeLang" id="{{ __('messages.langid') }}" href="#" ><span>{{ __('messages.lang') }}</span></a>
    <!--<a href="#" data-menu="" class="bg-fade-highlight-light shadow-xl preload-img" data-src="{{url('public/images/avatars/5s.png') }}"></a>-->
</div>
<div class="card header-card shape-rounded" data-card-height="210">
    <div class="card-overlay bg-highlight opacity-95"></div>
    <div class="card-overlay dark-mode-tint"></div>
    <div class="card-bg preload-img" data-src="{{url('public/images/pictures/20s.jpg') }}"></div>
</div>

@if(Session::has('success'))

<div class="ms-3 me-3 alert alert-small rounded-s shadow-xl bg-green-dark s-alrt" role="alert">
    <span><i class="fa fa-check"></i></span>
    <strong>{{ Session::get('success') }}</strong>
    <button type="button" class="close color-white opacity-60 font-16" data-bs-dismiss="alert" aria-label="Close">&times;</button>
</div>

@endif

<div class="splide single-slider slider-no-arrows slider-no-dots homepage-slider" id="single-slider-1">
    <div class="splide__track">
        <div class="splide__list">

            @if(!empty($dash['banner']))

            @foreach($dash['banner'] as $banner)

            <div class="splide__slide">
                <div class="card rounded-l mx-2 text-center shadow-l " data-card-height="320" style="background-image:url('{{asset('uploads/banner')}}/{{$banner->image}}');">
                    <div class="card-bottom ">
                        <h1 class="font-24 font-700">{{$banner->title}}</h1>
                        <p class="boxed-text-xl banner-sub-title " style="">{{Str::of($banner->descp)->limit(250)}}</p>
                    </div>
                    <!--<div class="card-overlay bg-gradient-fade"></div>-->
                </div>
            </div>

            @endforeach
            
            @endif

        </div>
    </div>
</div>

<div class="content mt-0">
    <div class="row">
        <div class="col-12">
            <a href="{{ route('register')}}" class="btn btn-full btn-m rounded-s text-uppercase font-900 shadow-xl bg-highlight">{{ __('messages.indexbutton1') }}</a>
        </div>
    </div>
</div>


 
<!--<div class="content mt-4">-->
<!--    <div class="row ">-->
<!--        <div class="col-12 mx-auto">-->
<!--            <a href="{{ route('ssv.register')}}" class="btn btn-full btn-m rounded-s text-uppercase font-900 shadow-xl bg-highlight">{{ __('messages.ssvindexbutton1') }}</a>-->
<!--        </div>-->
        
<!--    </div>-->
<!--</div>-->



<!--<div class="content mt-0">-->
<!--    <div class="row">-->
<!--        <div class="col-6">-->
<!--            <a href="https://mcwaretech.in/rsskdp/register" class="btn btn-full btn-m rounded-s text-uppercase font-900 shadow-xl bg-highlight">{{ __('messages.indexbutton3') }}</a>-->
<!--        </div>-->
<!--        <div class="col-6">-->
<!--            <a href="https://rsskdp.in/register" class="btn btn-full btn-border btn-m rounded-s text-uppercase font-900 shadow-l border-highlight color-highlight bg-highlight">{{ __('messages.indexbutton4') }}</a>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--<div class="content mt-0">-->
<!--    <div class="row">-->
<!--        <div class="col-6">-->
<!--            <a href="https://mcwaredemo.info/rsskdp/register" class="btn btn-full btn-m rounded-s text-uppercase font-900 shadow-xl bg-highlight">{{ __('messages.indexbutton5') }}</a>-->
<!--        </div>-->
<!--        <div class="col-6">-->
<!--            <a href="https://schoolbell.in/rsskdp/register" class="btn btn-full btn-border btn-m rounded-s text-uppercase font-900 shadow-l border-highlight color-highlight bg-highlight">{{ __('messages.indexbutton6') }}</a>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<div class="content mb-3 mt-0">
    <h5 class="float-start font-16 font-500">{{ __('messages.indexsec1head') }}</h5>
    <a class="float-end font-12 color-highlight mt-n1" href="#">{{ __('messages.indexsec1view') }}</a>
    <div class="clearfix"></div>
</div>

<div class="splide double-slider visible-slider slider-no-arrows slider-no-dots" id="double-slider-2">
    <div class="splide__track">
        <div class="splide__list">

            @if(!empty($dash['news']))

            @foreach($dash['news'] as $news)

            <div class="splide__slide ps-3">
                <div class="bg-theme pb-3 rounded-m shadow-l text-center overflow-hidden">
                    <div data-card-height="150" class="card mb-2 " style="background-image:url('{{asset('uploads/news')}}/{{$news->image}}');" >
                        <h5 class="card-bottom color-white mb-2">{{Str::of($news->title)->limit(20)}}</h5>
                        <div class="card-overlay bg-gradient"></div>
                    </div>  
                    <p class="mb-3 ps-2 pe-2 pt-2 font-12">{{Str::of($news->descp)->limit(75)}}</p>
                    <!--<a href="#" class="btn btn-xs bg-highlight btn-center-xs rounded-s shadow-s text-uppercase font-900">View</a>-->
                </div>
            </div>

            @endforeach

            

            @endif

        </div>
    </div>
</div>

<div class="content mb-2">
    <h5 class="float-start font-16 font-500">{{ __('messages.indexsec2head') }}</h5>
    <a class="float-end font-12 color-highlight mt-n1" href="{{ route('resources.list')}}">{{ __('messages.indexsec2view') }}</a>
    <div class="clearfix"></div>
</div>

<div class="splide double-slider visible-slider slider-no-arrows slider-no-dots" id="double-slider-1">
    <div class="splide__track">
        <div class="splide__list">

            @if(!empty($dash['activities']))
            @foreach($dash['activities'] as $activities)

            <div class="splide__slide ps-3" data-menu="instant-left grp-{{$activities->activities_id}}">
                <div class="bg-theme rounded-m shadow-m text-center ">
                    <img class="rounded-circle mt-4 mb-4" width="90" height="90" src="{{asset('uploads/activities')}}/{{$activities->image}}">
                    <h5 class="font-16 pb-4 mb-4">{{$activities->title}}</h5>
                    <!--<p class="line-height-s font-11  pb-4" >-->
                    <!--    {{Str::of($activities->descp)->limit(40)}}-->
                    <!--</p>-->
                </div>
            </div>

            @endforeach
            

            @endif

        </div>
    </div>
</div>
<div class="card preload-img" data-src="{{url('public/images/pictures/20s.jpg') }}">
    <div class="card-body">
        <h4 class="color-white">{{ __('messages.indexsec3head') }}</h4>
        <p class="color-white">
            {{ __('messages.indexsec3descp') }}
        </p>
        <div class="card card-style ms-0 me-0 bg-theme">
            <div class="row m-3">

                @if(!empty($dash['scheme']))

                @foreach($dash['scheme'] as $scheme)
                <div class="col-6">
                    <i class="float-start ms-3 me-3" >
                        <img class="rounded-circle " width="60" height="60" src="{{asset('uploads/scheme')}}/{{$scheme->image}}">
                    </i>
                    <h5 class="color-theme float-start font-13 font-500 line-height-s pb-3 mb-3">{{Str::of($scheme->title)->limit(20)}}<br>{{$scheme->count}}</h5>
                </div>
                @endforeach
                
                @endif

            </div>
        </div>
    </div>
    <div class="card-overlay bg-highlight opacity-90"></div>
    <div class="card-overlay dark-mode-tint"></div>
</div>

<div class="card card-style">
    <div class="content text-center">
        <h2>{{ __('messages.indexsec4head') }}</h2>
        <p class="boxed-text-xl">{{ __('messages.indexsec4descp') }}</p>
    </div>
    <div class="divider divider-small mb-3 bg-highlight"></div>
    <h2 class="text-center">{{ __('messages.indexsec4faq') }}</h2>

    <div class="content">
        @if(!empty($dash['about']))

        @foreach($dash['about'] as $about)

        <div class="d-flex mb-4 pb-3">
            <div>
                <i class="pt-3 icon-80 text-center ms-n2 me-2" >
                    <img class="rounded-circle " width="40" src="{{asset('uploads/about')}}/{{$about->image}}">
                </i>
            </div>
            <div>
                <h5 class="font-16 font-600">{{$about->title}}</h5>
                <p>{{Str::of($about->descp)->limit(150)}}</p>
            </div>
        </div> 

        @endforeach

        @endif
    </div>
</div>

<div class="card card-style mt-4 shadow-l" data-card-height="250">
    <div class="card-center ps-3 pe-3">

        @if(!empty($dash['content']))
        @php
        $content = $dash['content'];

        @endphp
        <h4 class="color-white">{{$content->title}}</h4>     
        <p class="color-white mb-0 opacity-60">
            {{$content->descp}}
        </p>
        @else

        <h4 class="color-white">Do you know?</h4>     
        <p class="color-white mb-0 opacity-60">
            We're the top selling Mobile Author on Envato. We value the quality of products and efficiency of our support!
        </p>

        @endif
    </div>
    <div class="card-overlay bg-highlight opacity-90"></div>
</div>

@endsection
@section('footer')
@foreach($dash['activities'] as $sec)
    
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
<script>
//Image Sliders
    var splide = document.getElementsByClassName('splide3');
    if(splide.length){
        var singleSlider = document.querySelectorAll('.single-slider');
        if(singleSlider.length){
            singleSlider.forEach(function(e){
                var single = new Splide( '#'+e.id, {
                    type:'loop',
                    autoplay:true,
                    interval:4000,
                    perPage: 1,
                }).mount();
                var sliderNext = document.querySelectorAll('.slider-next');
                var sliderPrev = document.querySelectorAll('.slider-prev');
                sliderNext.forEach(el => el.addEventListener('click', el => {single.go('>');}));
                sliderPrev.forEach(el => el.addEventListener('click', el => {single.go('<');}));
            });
        }

        var doubleSlider = document.querySelectorAll('.double-slider6');
        if(doubleSlider.length){
            doubleSlider.forEach(function(e){
                var double = new Splide( '#'+e.id, {
                    type:'loop',
                    autoplay:true,
                    interval:4000,
                    arrows:false,
                    perPage: 2,
                }).mount();
            });
        }

        var trippleSlider = document.querySelectorAll('.tripple-slider');
        if(trippleSlider.length){
            trippleSlider.forEach(function(e){
                var tripple = new Splide( '#'+e.id, {
                    type:'loop',
                    autoplay:true,
                    padding: {
                        left   :'0px',
                        right: '80px',
                    },
                    interval:4000,
                    arrows:false,
                    perPage: 2,
                    perMove: 1,
                }).mount();
            });
        }
    }

</script>
@endsection

