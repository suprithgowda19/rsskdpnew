@extends('includes.master')

@section('headerscript')
@parent
@endsection

@section('header')
@parent
@endsection

@section('content')

<div class="page-title page-title-small">
    <h2><a href="#" data-back-button><i class="fa fa-arrow-left"></i></a>{{ __('messages.indexbutton2') }}</h2>
      <a class=" float-end lan-btn btn changeLang" id="{{ __('messages.langid') }}" href="#" ><span>{{ __('messages.lang') }}</span></a>
   
</div>
<div class="card header-card shape-rounded" data-card-height="150">
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

@if(Session::has('error'))

<div class="ms-3 me-3 mb-5 alert alert-small rounded-s shadow-xl bg-red-dark s-alrt" role="alert">
    <span><i class="fa fa-times"></i></span>
    <strong>{{ Session::get('error') }}</strong>
    <button type="button" class="close color-white opacity-60 font-16" data-bs-dismiss="alert" aria-label="Close">&times;</button>
</div>

@endif

<div class="card card-style">
    <div class="content mb-0 mt-3">
        <form method="post" action="{{ route($checkStatusRoute ?? 'checkstatus') }}">
            @csrf

            <div class="input-style input-style-always-active has-borders no-icon validate-field mb-4">
                <input type="tel" pattern="[1-9]{1}[0-9]{9}"  class="form-control validate-text" id="form2" placeholder="{{ __('messages.regform2') }}" name="phone" required>
                <label for="form2" class="color-highlight">{{ __('messages.regform2') }}</label>
                <i class="fa fa-times disabled invalid color-red-dark"></i>
                <i class="fa fa-check disabled valid color-green-dark"></i>
                <em>(required)</em>
            </div>

            <div class="col-sm-12 col-md-12 text-center">
                <input type="submit" class="btn btn-m btn-full rounded-sm shadow-l bg-green-dark text-uppercase font-700 mt-4" value="{{ __('messages.regformsubmit') }}">

            </div>

        </form>
        <div class="divider mt-4 mb-3"></div>
        <div class="d-flex">
        </div>
    </div>
</div>







@endsection

@section('footer')
@parent
@endsection

@section('footerscript')
@parent
@endsection
