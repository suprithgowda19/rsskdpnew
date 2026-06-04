@extends('includes.master')
@section('headerscript')
@parent
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"/>

<style>
    
    .header{
        display:none;
    }
    #footer-bar{
        display:none;
    }
    .footer-card{
        bottom : 0px !important;
    }
    .form-control[readonly] {
        background-color: #e9ecef00 !important;
    }
    
</style>

@endsection
@section('header')
@parent
@endsection
@section('content')

<div class="page-title page-title-small"> 
    <!--<h2><a href="#" data-back-button=""><i class="fa fa-arrow-left"></i></a> {{ __('messages.reghead') }}</h2>-->
    <!--<a class=" float-end lan-btn btn changeLang" id="{{ __('messages.langid') }}" href="#" ><span>{{ __('messages.lang') }}</span></a>-->
    <!--<a href="#" data-menu="" class="bg-fade-highlight-light shadow-xl preload-img" data-src="{{url('public/images/avatars/5s.png') }}"></a>-->
</div>
<div class="card header-card shape-rounded" data-card-height="150">
    <div class="card-overlay bg-highlight opacity-95"></div>
    <div class="card-overlay dark-mode-tint"></div>
    <div class="card-bg preload-img" data-src="{{url('public/images/pictures/20s.jpg') }}"></div>
</div>

@if(Session::has('error'))

<div id="succmodal" class="modal fade s-alrt mt-4">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-red-dark">
            
            <div class="modal-body bg-red-dark rounded-2">
                <h1 class="text-center mt-4"><i class="fa fa-3x fa-times color-white "></i></h1>
                <center><strong>{{ Session::get('error') }}</strong></center> 
                <p class="boxed-text-l color-white opacity-70">{{ __('messages.error1') }}</p>
            </div>
        </div>
    </div>
</div>



@endif


@if(Session::has('success'))

<div id="succmodal" class="modal fade s-alrt mt-4">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-green-dark">
            
            <div class="modal-body bg-green-dark rounded-2 ">
                <h1 class="text-center mt-4"><i class="fa fa-3x fa-check-circle color-white "></i></h1>
                <center><strong>{{ Session::get('success') }}</strong></center> 
        <h1 class="text-center mt-3 text-uppercase font-700 color-white">  ಧನ್ಯವಾದ</h1>
              
                
            </div>
        </div>
    </div>
</div>

@endif



<div class="card card-style">
    <div class="content mb-0 mt-3">
        <h3 class="text-center">ರಾಷ್ಟ್ರೀಯ ಸ್ವಯಂಸೇವಕ ಸಂಘ</h3>
        <h3 class="text-center">ಕರ್ನಾಟಕ ದಕ್ಷಿಣ</h3>
        <h3 class="text-center">ಪ್ರವಾಸಿ ಕಾರ್ಯಕರ್ತರ ಸರ್ವೇಕ್ಷಣೆ</h3>
        <br>
        <form method="post" action="{{route('pks.store')}}" >
            
            @csrf
            
            <div class="input-style input-style-always-active has-borders no-icon validate-field mb-4">
                <input type="text" class="form-control validate-text" id="form1" placeholder="ಹೆಸರು" name="name" required>
                <label for="form1" class="color-highlight">ಹೆಸರು (Required)</label>
                <i class="fa fa-times disabled invalid color-red-dark"></i>
                <i class="fa fa-check disabled valid color-green-dark"></i>
            </div>
            <div class="input-style input-style-always-active has-borders no-icon validate-field mb-4">
                <input type="tel" class="form-control validate-text" id="phone" placeholder="ಮೊಬೈಲ್" name="phone" required>
                <label for="phone" class="color-highlight">ಮೊಬೈಲ್ (Required)</label>
                <i class="fa fa-times disabled invalid color-red-dark"></i>
                <i class="fa fa-check disabled valid color-green-dark"></i>
            </div>
            <div class="col-md-12  has-borders no-icon mb-4" style="position: relative;margin-bottom: 15px !important;">
                <label for="resp" class="color-highlight profess-tag">ಜವಾಬ್ದಾರಿ (Required)</label>
                <select required class="form-select resp profess-tag-1 selectpicker"  name="resp" data-placeholder="ಆಯ್ಕೆ ಮಾಡಿ" data-live-search="true" data-live-search-placeholder="Enter Here" style="border-color: rgba(0, 0, 0, 0.08) !important;">
                </select>
            </div>
            <div class="col-md-12  has-borders no-icon mb-4" style="position: relative;margin-bottom: 15px !important;">
                <label for="karyavibhag" class="color-highlight profess-tag">ಕಾರ್ಯ ವಿಭಾಗ (Required)</label>
                <select required class="form-select karyavibhag profess-tag-1 selectpicker" id="karyavibhag"  name="karyavibhag" data-placeholder="ಆಯ್ಕೆ ಮಾಡಿ" data-live-search="true" data-live-search-placeholder="Enter Here" style="border-color: rgba(0, 0, 0, 0.08) !important;">
                </select>
            </div>
                      <div class="col-md-12 input-style-always-active has-borders no-icon mb-4" style="position: relative;margin-bottom: 15px !important;">
                <label for="city" class="color-highlight profess-tag"> ವಿಭಾಗ (Required)</label>
                <select required class="form-select city profess-tag-1" id="city" name="city" data-placeholder="ಆಯ್ಕೆ ಮಾಡಿ"  style="border-color: rgba(0, 0, 0, 0.08) !important;">
                </select>
            </div>
            
            <div class="col-md-12 input-style-always-active has-borders no-icon mb-4" style="position: relative;margin-bottom: 15px !important;">
                <label for="district" class="color-highlight profess-tag">ಜಿಲ್ಲೆ / ಭಾಗ (Required)</label>
                <select required class="form-select district profess-tag-1" id="district" name="district" data-placeholder="ಆಯ್ಕೆ ಮಾಡಿ"  style="border-color: rgba(0, 0, 0, 0.08) !important;">
                </select>
            </div>
            
            <div class="col-md-12 input-style-always-active has-borders no-icon mb-4" style="position: relative;margin-bottom: 15px !important;">
                <label for="taluk" class="color-highlight profess-tag">ನಗರ / ತಾಲ್ಲೂಕು (Required)</label>
                <select required class="form-select taluk profess-tag-1" id="taluk" name="taluk" data-placeholder="ಆಯ್ಕೆ ಮಾಡಿ"  style="border-color: rgba(0, 0, 0, 0.08) !important;">
                </select>
            </div>
            
            <!--<div class="col-md-12 input-style-always-active has-borders no-icon mb-4" style="position: relative;margin-bottom: 15px !important;">-->
            <!--    <label for="area" class="color-highlight profess-tag"> ಮಂಡಲ / ವಸತಿ ಆಯ್ಕೆಮಾಡಿ (Required)</label>-->
            <!--    <select required class="form-select area profess-tag-1" id="area" name="area" data-placeholder="ಆಯ್ಕೆ ಮಾಡಿ"  style="border-color: rgba(0, 0, 0, 0.08) !important;">-->
            <!--    </select>-->
            <!--</div>-->
            
            <div class="p-2 mb-4">
                <p>
                    &#9830;	೨೦೨೨ ರ ಜೂನ್ ನಿಂದ ೨೦೨೩ ರ ಜನವರಿ ವರೆಗೆ ನಾವು ನಡೆಸಿದ ಬೌದ್ಧಿಕ ವಿಭಾಗದ ಕೆಲಸಗಳನ್ನು ಉತ್ತರದಲ್ಲಿ ಗಣನೆಗೆ ತೆಗೆದುಕೊಳ್ಳಿ 
                    <br>
                    &#9830;	ಎಲ್ಲ ಪ್ರವಾಸಿ ಕಾರ್ಯಕರ್ತರು ಉತ್ತರಿಸುವುದು
                </p>
            </div>
            
            
            <p class="mb-2">1-	ಈ ವರ್ಷ ನಮ್ಮ ಶಾಖಾ ಪ್ರವಾಸ ತಿಂಗಳ ಸರಾಸರಿ ಎಷ್ಟು (tick ಮಾಡಿ)</p>
            
            <div class="mb-4" style="padding-left:25px;">
                <div class="row p-2 pl-4 mb-2">
                    <div class="col-md-6 form-check icon-check">
                        <input class="form-check-input q1" type="radio" name="q1" value=">8" id="radio1">
                        <label class="form-check-label" for="radio1">>8</label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    <div class="col-md-6  form-check icon-check ">
                        <input class="form-check-input q1" type="radio" name="q1" value="4-8" id="radio2">
                        <label class="form-check-label" for="radio2">4-8</label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    <div class="col-md-6  form-check icon-check ">
                        <input class="form-check-input q1" type="radio" name="q1" value="1-4" id="radio3">
                        <label class="form-check-label" for="radio3">1-4</label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    <div class="col-md-6  form-check icon-check ">
                        <input class="form-check-input q1" type="radio" name="q1" value="0" id="radio4">
                        <label class="form-check-label" for="radio4">0</label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                </div>
            </div>
            
            
            
            <p class="mb-2">2-	ಶಾಖೆಯಲ್ಲಿ ಈ ವಿಷಯಗಳನ್ನು ಎಷ್ಟು ಬಾರಿ ನಾವು ತೆಗೆದುಕೊಂಡಿದ್ದೇವೆ (tick ಮಾಡಿ)</p>
            
            <div class="mb-4" style="padding-left:25px;">
                <p class="mb-1">(i) ಹಾಡು </p>
                <div class="row p-2 pl-4 mb-2">
                    
                    <div class="col-md-6 form-check icon-check">
                        
                        <input class="form-check-input q2i" type="radio" name="q2i" value=">5" id="i1">
                        <label class="form-check-label" for="i1">>5</label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    <div class="col-md-6  form-check icon-check ">
                        <input class="form-check-input q2i" type="radio" name="q2i" value="1-5" id="i2">
                        <label class="form-check-label" for="i2">1-5</label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    <div class="col-md-6  form-check icon-check ">
                        <input class="form-check-input q2i" type="radio" name="q2i" value="0" id="i3">
                        <label class="form-check-label" for="i3">0</label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    
                </div>
                
                <p class="mb-1">(ii) ವಚನ </p>
                <div class="row p-2 pl-4 mb-2">
                    
                    <div class="col-md-6 form-check icon-check">
                        
                        <input class="form-check-input q2ii" type="radio" name="q2ii" value=">5" id="ii1">
                        <label class="form-check-label" for="ii1">>5</label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    <div class="col-md-6  form-check icon-check ">
                        <input class="form-check-input q2ii" type="radio" name="q2ii" value="1-5" id="ii2">
                        <label class="form-check-label" for="ii2">1-5</label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    <div class="col-md-6  form-check icon-check ">
                        <input class="form-check-input q2ii" type="radio" name="q2ii" value="0" id="ii3">
                        <label class="form-check-label" for="ii3">0</label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    
                </div>
                
                <p class="mb-1">(iii) ಶ್ಲೋಕ </p>
                <div class="row p-2 pl-4 mb-2">
                    
                    <div class="col-md-6 form-check icon-check">
                        
                        <input class="form-check-input q2iii" type="radio" name="q2iii" value=">5" id="iii1">
                        <label class="form-check-label" for="iii1">>5</label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    <div class="col-md-6  form-check icon-check ">
                        <input class="form-check-input q2iii" type="radio" name="q2iii" value="1-5" id="iii2">
                        <label class="form-check-label" for="iii2">1-5</label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    <div class="col-md-6  form-check icon-check ">
                        <input class="form-check-input q2iii" type="radio" name="q2iii" value="0" id="iii3">
                        <label class="form-check-label" for="iii3">0</label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    
                </div>
                
                
                <p class="mb-1">(iv) ಬೋಧ ಕಥೆ</p>
                <div class="row p-2 pl-4 mb-2">
                    
                    <div class="col-md-6 form-check icon-check">
                        
                        <input class="form-check-input q2iv" type="radio" name="q2iv" value=">5" id="iv1">
                        <label class="form-check-label" for="iv1">>5</label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    <div class="col-md-6  form-check icon-check ">
                        <input class="form-check-input q2iv" type="radio" name="q2iv" value="1-5" id="iv2">
                        <label class="form-check-label" for="iv2">1-5</label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    <div class="col-md-6  form-check icon-check ">
                        <input class="form-check-input q2iv" type="radio" name="q2iv" value="0" id="iv4">
                        <label class="form-check-label" for="iv4">0</label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    
                </div>
            </div>
            
            
            <p class="mb-2">3-	ಈ ವಿಷಯಗಳನ್ನು ನಾವು ಎಷ್ಟು ಕಾರ್ಯಕರ್ತರಿಗೆ ಹೇಳಿಕೊಡಲು ಸಾಧ್ಯವಾಯಿತು (tick ಮಾಡಿ)</p>
            
            <div class="mb-4" style="padding-left:25px;">
                <p class="mb-1">(i) ಹಾಡು </p>
                <div class="row p-2 pl-4 mb-2">
                    
                    <div class="col-md-6 form-check icon-check">
                        
                        <input class="form-check-input q3i" type="radio" name="q3i" value=">5" id="q3i1">
                        <label class="form-check-label" for="q3i1">>5</label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    <div class="col-md-6  form-check icon-check ">
                        <input class="form-check-input q3i" type="radio" name="q3i" value="1-5" id="q3i2">
                        <label class="form-check-label" for="q3i2">1-5</label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    <div class="col-md-6  form-check icon-check ">
                        <input class="form-check-input q3i" type="radio" name="q3i" value="0" id="q3i3">
                        <label class="form-check-label" for="q3i3">0</label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    
                </div>
                
                <p class="mb-1">(ii) ವಚನ </p>
                <div class="row p-2 pl-4 mb-2">
                    
                    <div class="col-md-6 form-check icon-check">
                        
                        <input class="form-check-input q3ii" type="radio" name="q3ii" value=">5" id="q3ii1">
                        <label class="form-check-label" for="q3ii1">>5</label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    <div class="col-md-6  form-check icon-check ">
                        <input class="form-check-input q3ii" type="radio" name="q3ii" value="1-5" id="q3ii2">
                        <label class="form-check-label" for="q3ii2">1-5</label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    <div class="col-md-6  form-check icon-check ">
                        <input class="form-check-input q3ii" type="radio" name="q3ii" value="0" id="q3ii3">
                        <label class="form-check-label" for="q3ii3">0</label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    
                </div>
                
                <p class="mb-1">(iii) ಶ್ಲೋಕ </p>
                <div class="row p-2 pl-4 mb-2">
                    
                    <div class="col-md-6 form-check icon-check">
                        
                        <input class="form-check-input q3iii" type="radio" name="q3iii" value=">5" id="q3iii1">
                        <label class="form-check-label" for="q3iii1">>5</label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    <div class="col-md-6  form-check icon-check ">
                        <input class="form-check-input q3iii" type="radio" name="q3iii" value="1-5" id="q3iii2">
                        <label class="form-check-label" for="q3iii2">1-5</label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    <div class="col-md-6  form-check icon-check ">
                        <input class="form-check-input q3iii" type="radio" name="q3iii" value="0" id="q3iii3">
                        <label class="form-check-label" for="q3iii3">0</label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    
                </div>
                
                
                <p class="mb-1">(iv) ಬೋಧ ಕಥೆ</p>
                <div class="row p-2 pl-4 mb-2">
                    
                    <div class="col-md-6 form-check icon-check">
                        
                        <input class="form-check-input q3iv" type="radio" name="q3iv" value=">5" id="q3iv1">
                        <label class="form-check-label" for="q3iv1">>5</label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    <div class="col-md-6  form-check icon-check ">
                        <input class="form-check-input q3iv" type="radio" name="q3iv" value="1-5" id="q3iv2">
                        <label class="form-check-label" for="q3iv2">1-5</label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    <div class="col-md-6  form-check icon-check ">
                        <input class="form-check-input q3iv" type="radio" name="q3iv" value="0" id="q3iv4">
                        <label class="form-check-label" for="q3iv4">0</label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    
                </div>
            </div>
            
            
            <p class="mb-2">4-	ಸಾಂಘಿಕನಲ್ಲಿ (ಅಥವಾ ಶಾಖೆಯಲ್ಲಿ) ಈ ವಿಷಯಗಳನ್ನು ಎಷ್ಟು ಬಾರಿ ನಾವು ತೆಗೆದುಕೊಂಡಿದ್ದೇವೆ (tick ಮಾಡಿ)</p>
            
            <div class="mb-4" style="padding-left:25px;">
                <p class="mb-1">(i) ಬೌದ್ಧಿಕ</p>
                <div class="row p-2 pl-4 mb-2">
                    
                    <div class="col-md-6 form-check icon-check">
                        
                        <input class="form-check-input q4i" type="radio" name="q4i" value=">5" id="q4i1">
                        <label class="form-check-label" for="q4i1">>5</label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    <div class="col-md-6  form-check icon-check ">
                        <input class="form-check-input q4i" type="radio" name="q4i" value="1-5" id="q4i2">
                        <label class="form-check-label" for="q4i2">1-5</label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    <div class="col-md-6  form-check icon-check ">
                        <input class="form-check-input q4i" type="radio" name="q4i" value="0" id="q4i3">
                        <label class="form-check-label" for="q4i3">0</label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    
                </div>
                
                <p class="mb-1">(ii) ಚರ್ಚೆ</p>
                <div class="row p-2 pl-4 mb-2">
                    
                    <div class="col-md-6 form-check icon-check">
                        
                        <input class="form-check-input q4ii" type="radio" name="q4ii" value=">5" id="q4ii1">
                        <label class="form-check-label" for="q4ii1">>5</label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    <div class="col-md-6  form-check icon-check ">
                        <input class="form-check-input q4ii" type="radio" name="q4ii" value="1-5" id="q4ii2">
                        <label class="form-check-label" for="q4ii2">1-5</label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    <div class="col-md-6  form-check icon-check ">
                        <input class="form-check-input q4ii" type="radio" name="q4ii" value="0" id="q4ii3">
                        <label class="form-check-label" for="q4ii3">0</label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    
                </div>
                
                <p class="mb-1">(iii) ದೀರ್ಘ ಕಥೆ </p>
                <div class="row p-2 pl-4 mb-2">
                    
                    <div class="col-md-6 form-check icon-check">
                        
                        <input class="form-check-input q4iii" type="radio" name="q4iii" value=">5" id="q4iii1">
                        <label class="form-check-label" for="q4iii1">>5</label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    <div class="col-md-6  form-check icon-check ">
                        <input class="form-check-input q4iii" type="radio" name="q4iii" value="1-5" id="q4iii2">
                        <label class="form-check-label" for="q4iii2">1-5</label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    <div class="col-md-6  form-check icon-check ">
                        <input class="form-check-input q4iii" type="radio" name="q4iii" value="0" id="q4iii3">
                        <label class="form-check-label" for="q4iii3">0</label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    
                </div>
                
                
                <p class="mb-1">(iv) ಸಮಾಚಾರ ಸಮೀಕ್ಷೆ </p>
                <div class="row p-2 pl-4 mb-2">
                    
                    <div class="col-md-6 form-check icon-check">
                        
                        <input class="form-check-input q4iv" type="radio" name="q4iv" value=">5" id="q4iv1">
                        <label class="form-check-label" for="q4iv1">>5</label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    <div class="col-md-6  form-check icon-check ">
                        <input class="form-check-input q4iv" type="radio" name="q4iv" value="1-5" id="q4iv2">
                        <label class="form-check-label" for="q4iv2">1-5</label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    <div class="col-md-6  form-check icon-check ">
                        <input class="form-check-input q4iv" type="radio" name="q4iv" value="0" id="q4iv4">
                        <label class="form-check-label" for="q4iv4">0</label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    
                </div>
            </div>
            
            
            <p class="mb-2">5-	ಸಾಂಘಿಕನಲ್ಲಿ (ಅಥವಾ ಶಾಖೆಯಲ್ಲಿ) ಈ ವಿಷಯಗಳನ್ನು ಎಷ್ಟು ತಯಾರಿಯೊಡನೆ ನಾವು ತೆಗೆದುಕೊಂಡಿದ್ದೇವೆ (tick ಮಾಡಿ)</p>
            
            <div class="mb-4" style="padding-left:25px;">
                <p class="mb-1">(i) ಹಾಡು </p>
                <div class="row p-2 pl-4 mb-2">
                    
                    <div class="col-md-6 form-check icon-check">
                        
                        <input class="form-check-input q5i" type="radio" name="q5i" value="ಉತ್ತಮ ತಯಾರಿ " id="q5i1">
                        <label class="form-check-label" for="q5i1">ಉತ್ತಮ ತಯಾರಿ </label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    <div class="col-md-6  form-check icon-check ">
                        <input class="form-check-input q5i" type="radio" name="q5i" value="ಸಾಧಾರಣ ತಯಾರಿ " id="q5i2">
                        <label class="form-check-label" for="q5i2">ಸಾಧಾರಣ ತಯಾರಿ </label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    <div class="col-md-6  form-check icon-check ">
                        <input class="form-check-input q5i" type="radio" name="q5i" value="ಕಡಿಮೆ ತಯಾರಿ " id="q5i3">
                        <label class="form-check-label" for="q5i3">ಕಡಿಮೆ ತಯಾರಿ </label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    
                </div>
                
                <p class="mb-1">(ii) ವಚನ </p>
                <div class="row p-2 pl-4 mb-2">
                    
                    <div class="col-md-6 form-check icon-check">
                        
                        <input class="form-check-input q5ii" type="radio" name="q5ii" value="ಉತ್ತಮ ತಯಾರಿ " id="q5ii1">
                        <label class="form-check-label" for="q5ii1">ಉತ್ತಮ ತಯಾರಿ </label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    <div class="col-md-6  form-check icon-check ">
                        <input class="form-check-input q5ii" type="radio" name="q5ii" value="ಸಾಧಾರಣ ತಯಾರಿ " id="q5ii2">
                        <label class="form-check-label" for="q5ii2">ಸಾಧಾರಣ ತಯಾರಿ </label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    <div class="col-md-6  form-check icon-check ">
                        <input class="form-check-input q5ii" type="radio" name="q5ii" value="ಕಡಿಮೆ ತಯಾರಿ " id="q5ii3">
                        <label class="form-check-label" for="q5ii3">ಕಡಿಮೆ ತಯಾರಿ </label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    
                </div>
                
                <p class="mb-1">(iii) ಶ್ಲೋಕ </p>
                <div class="row p-2 pl-4 mb-2">
                    
                    <div class="col-md-6 form-check icon-check">
                        
                        <input class="form-check-input q5iii" type="radio" name="q5iii" value="ಉತ್ತಮ ತಯಾರಿ " id="q5iii1">
                        <label class="form-check-label" for="q5iii1">ಉತ್ತಮ ತಯಾರಿ </label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    <div class="col-md-6  form-check icon-check ">
                        <input class="form-check-input q5iii" type="radio" name="q5iii" value="ಸಾಧಾರಣ ತಯಾರಿ " id="q5iii2">
                        <label class="form-check-label" for="q5iii2">ಸಾಧಾರಣ ತಯಾರಿ </label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    <div class="col-md-6  form-check icon-check ">
                        <input class="form-check-input q5iii" type="radio" name="q5iii" value="ಕಡಿಮೆ ತಯಾರಿ " id="q5iii3">
                        <label class="form-check-label" for="q5iii3">ಕಡಿಮೆ ತಯಾರಿ </label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    
                </div>
                
                
                <p class="mb-1">(iv) ಬೋಧ ಕಥೆ</p>
                <div class="row p-2 pl-4 mb-2">
                    
                    <div class="col-md-6 form-check icon-check">
                        
                        <input class="form-check-input q5iv" type="radio" name="q5iv" value="ಉತ್ತಮ ತಯಾರಿ " id="q5iv1">
                        <label class="form-check-label" for="q5iv1">ಉತ್ತಮ ತಯಾರಿ </label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    <div class="col-md-6  form-check icon-check ">
                        <input class="form-check-input q5iv" type="radio" name="q5iv" value="ಸಾಧಾರಣ ತಯಾರಿ " id="q5iv2">
                        <label class="form-check-label" for="q5iv2">ಸಾಧಾರಣ ತಯಾರಿ </label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    <div class="col-md-6  form-check icon-check ">
                        <input class="form-check-input q5iv" type="radio" name="q5iv" value="ಕಡಿಮೆ ತಯಾರಿ " id="q5iv4">
                        <label class="form-check-label" for="q5iv4">ಕಡಿಮೆ ತಯಾರಿ </label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    
                </div>
            </div>
            
            
            
            <p class="mb-2">6-	ಪ್ರಾರ್ಥನಾ ಸಪ್ತಾಹದಲ್ಲಿ ನಾವು ಶಾಖೆಯಲ್ಲಿ ಪ್ರಾರ್ಥನಾ ಅಭ್ಯಾಸ ಮಾಡಿಸಿದ್ದೇವೆ (tick ಮಾಡಿ) </p>
            
            <div class="mb-4" style="padding-left:25px;">
                <div class="row p-2 pl-4 mb-2">
                    <div class="col-md-6 form-check icon-check">
                        <input class="form-check-input q6" type="radio" name="q6" value="ಹೌದು" id="q61">
                        <label class="form-check-label" for="q61">ಹೌದು</label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    <div class="col-md-6  form-check icon-check ">
                        <input class="form-check-input q6" type="radio" name="q6" value="ಇಲ್ಲ" id="q62">
                        <label class="form-check-label" for="q62">ಇಲ್ಲ</label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    
                </div>
            </div>
            
            <p class="mb-2">7-	ಪ್ರಾರ್ಥನಾ ಸಪ್ತಾಹಕ್ಕಾಗಿ ಹೇಳಿಕೊಡುವವರಿಗಾಗಿ ಪ್ರಶಿಕ್ಷಣವನ್ನು ನಾವು ತೆಗೆದುಕೊಂಡಿದ್ದೇವೆ (tick ಮಾಡಿ) </p>
            
            <div class="mb-4" style="padding-left:25px;">
                <div class="row p-2 pl-4 mb-2">
                    <div class="col-md-6 form-check icon-check">
                        <input class="form-check-input q7" type="radio" name="q7" value="ಹೌದು" id="q71">
                        <label class="form-check-label" for="q71">ಹೌದು</label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    <div class="col-md-6  form-check icon-check ">
                        <input class="form-check-input q7" type="radio" name="q7" value="ಇಲ್ಲ" id="q72">
                        <label class="form-check-label" for="q72">ಇಲ್ಲ</label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    
                </div>
            </div>
            
            <p class="mb-2">8-	ಪ್ರಾರ್ಥನೆ ವಿಷಯ ಅಧ್ಯಯನ ಮಾಡಿ ಬೌದ್ಧಿಕ ಮಾಡಿದ್ದೇವೆ (tick ಮಾಡಿ)</p>
            
            <div class="mb-4" style="padding-left:25px;">
                <div class="row p-2 pl-4 mb-2">
                    <div class="col-md-6 form-check icon-check">
                        <input class="form-check-input q8" type="radio" name="q8" value="ಹೌದು" id="q81">
                        <label class="form-check-label" for="q81">ಹೌದು</label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    <div class="col-md-6  form-check icon-check ">
                        <input class="form-check-input q8" type="radio" name="q8" value="ಇಲ್ಲ" id="q82">
                        <label class="form-check-label" for="q82">ಇಲ್ಲ</label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    
                </div>
            </div>
            
            
            
            <p class="mb-2">9-	ಈ ವರ್ಷ ನಾವು ಓದಿದ ಪುಸ್ತಕಗಳು ಅಥವಾ / ಅಧ್ಯಯನ ಮಾಡಿದ ವಿಷಯಗಳ ಸಂಖ್ಯೆ  (tick ಮಾಡಿ)</p>
            
            <div class="mb-4" style="padding-left:25px;">
                <div class="row p-2 pl-4 mb-2">
                    <div class="col-md-6 form-check icon-check">
                        <input class="form-check-input q9" type="radio" name="q9" value=">5" id="q91">
                        <label class="form-check-label" for="q91">>5</label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    <div class="col-md-6  form-check icon-check ">
                        <input class="form-check-input q9" type="radio" name="q9" value="1-5" id="q92">
                        <label class="form-check-label" for="q92">1-5</label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    <div class="col-md-6  form-check icon-check ">
                        <input class="form-check-input q9" type="radio" name="q9" value="0" id="q93">
                        <label class="form-check-label" for="q93">0</label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    
                </div>
            </div>
            
            
            
            <p class="mb-2">10-	ಈ ವರ್ಷ ನಾವು ಈ ಕೆಳಗಿನ ವಿಷಯಗಳ ಬಗ್ಗೆ ಅಧ್ಯಯನ ಮಾಡಲು ಸಾಧ್ಯವಾಯಿತು (tick ಮಾಡಿ)</p>
            
            
            <div class="mb-4" style="padding-left:25px;">
                <p class="mb-1">(i) ಯೋಗಿ ಅರವಿಂದರು 		</p>
                <div class="row p-2 pl-4 mb-2">
                    
                    <div class="col-md-6 form-check icon-check">
                        
                        <input class="form-check-input q10i" type="radio" name="q10i" value="ಓದಿ ಹೇಳಲು ಆಗಿದೆ " id="q10i1">
                        <label class="form-check-label" for="q10i1">ಓದಿ ಹೇಳಲು ಆಗಿದೆ  </label>
                      
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    <div class="col-md-6  form-check icon-check ">
                        <input class="form-check-input q10i" type="radio" name="q10i" value="ಕೇವಲ ಓದಿದೆ " id="q10i2">
                        <label class="form-check-label" for="q10i2">ಕೇವಲ ಓದಿದೆ </label>
                        
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    <div class="col-md-6  form-check icon-check ">
                        <input class="form-check-input q10i" type="radio" name="q10i" value="ಇಲ್ಲ " id="q10i3">
                        <label class="form-check-label" for="q10i3">ಇಲ್ಲ </label>
                        
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    
                </div>
                
                <p class="mb-1">(ii) ಲಚಿತ್ ಬರ್ಫುಕಾನ್ </p>
                <div class="row p-2 pl-4 mb-2">
                    
                    <div class="col-md-6 form-check icon-check">
                        
                        <input class="form-check-input q10ii" type="radio" name="q10ii" value="ಓದಿ ಹೇಳಲು ಆಗಿದೆ " id="q10ii1">
                        <label class="form-check-label" for="q10ii1">ಓದಿ ಹೇಳಲು ಆಗಿದೆ  </label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    <div class="col-md-6  form-check icon-check ">
                        <input class="form-check-input q10ii" type="radio" name="q10ii" value="ಕೇವಲ ಓದಿದೆ " id="q10ii2">
                        <label class="form-check-label" for="q10ii2">ಕೇವಲ ಓದಿದೆ </label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    <div class="col-md-6  form-check icon-check ">
                        <input class="form-check-input q10ii" type="radio" name="q10ii" value="ಇಲ್ಲ " id="q10ii3">
                        <label class="form-check-label" for="q10ii3">ಇಲ್ಲ </label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    
                </div>
                
                <p class="mb-1">(iii) ರಜ್ಜು ಭಯ್ಯಾ</p>
                <div class="row p-2 pl-4 mb-2">
                    
                    <div class="col-md-6 form-check icon-check">
                        
                        <input class="form-check-input q10iii" type="radio" name="q10iii" value="ಓದಿ ಹೇಳಲು ಆಗಿದೆ " id="q10iii1">
                        <label class="form-check-label" for="q10iii1">ಓದಿ ಹೇಳಲು ಆಗಿದೆ  </label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    <div class="col-md-6  form-check icon-check ">
                        <input class="form-check-input q10iii" type="radio" name="q10iii" value="ಕೇವಲ ಓದಿದೆ " id="q10iii2">
                        <label class="form-check-label" for="q10iii2">ಕೇವಲ ಓದಿದೆ </label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    <div class="col-md-6  form-check icon-check ">
                        <input class="form-check-input q10iii" type="radio" name="q10iii" value="ಇಲ್ಲ " id="q10iii3">
                        <label class="form-check-label" for="q10iii3">ಇಲ್ಲ </label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    
                </div>
                
                
                <p class="mb-1">(iv) ಪ ಪೂ ಡಾಕ್ಟರ್ ಜಿ </p>
                <div class="row p-2 pl-4 mb-2">
                    
                    <div class="col-md-6 form-check icon-check">
                        
                        <input class="form-check-input q10iv" type="radio" name="q10iv" value="ಓದಿ ಹೇಳಲು ಆಗಿದೆ " id="q10iv1">
                        <label class="form-check-label" for="q10iv1">ಓದಿ ಹೇಳಲು ಆಗಿದೆ  </label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    <div class="col-md-6  form-check icon-check ">
                        <input class="form-check-input q10iv" type="radio" name="q10iv" value="ಕೇವಲ ಓದಿದೆ " id="q10iv2">
                        <label class="form-check-label" for="q10iv2">ಕೇವಲ ಓದಿದೆ </label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    <div class="col-md-6  form-check icon-check ">
                        <input class="form-check-input q10iv" type="radio" name="q10iv" value="ಇಲ್ಲ " id="q10iv4">
                        <label class="form-check-label" for="q10iv4">ಇಲ್ಲ </label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    
                </div>
                
                
                <p class="mb-1">(v) ಪ ಪೂ ಗುರೂಜಿ </p>
                <div class="row p-2 pl-4 mb-2">
                    
                    <div class="col-md-6 form-check icon-check">
                        
                        <input class="form-check-input q10v" type="radio" name="q10v" value="ಓದಿ ಹೇಳಲು ಆಗಿದೆ " id="q10v1">
                        <label class="form-check-label" for="q10v1">ಓದಿ ಹೇಳಲು ಆಗಿದೆ  </label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    <div class="col-md-6  form-check icon-check ">
                        <input class="form-check-input q10v" type="radio" name="q10v" value="ಕೇವಲ ಓದಿದೆ " id="q10v2">
                        <label class="form-check-label" for="q10v2">ಕೇವಲ ಓದಿದೆ </label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    <div class="col-md-6  form-check icon-check ">
                        <input class="form-check-input q10v" type="radio" name="q10v" value="ಇಲ್ಲ " id="q10v4">
                        <label class="form-check-label" for="q10v4">ಇಲ್ಲ </label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                    </div>
                    
                </div>
            </div>
            
            

            
            
            
            
  
            
            <center>
                <input type="submit" class="btn btn-m btn-full rounded-sm shadow-l bg-green-dark text-uppercase font-700 mt-4" id="submit" value="ಸಲ್ಲಿಸು">
            </center>
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

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" ></script>
<script type="text/javascript">
    
    $(document).ready(function(){
        
        $('.searchlist').hide();
        
        $("#date").keydown(function(e){
            e.preventDefault();
        });
        
        $("#date2").keydown(function(e){
            e.preventDefault();
        });
        
        
        $("#date2").datepicker({
            format: "yyyy",
            viewMode: "years", 
            minViewMode: "years",
            endDate:"Y"
        });
        
        $("#date").datepicker({
            format: "yyyy",
            viewMode: "years", 
            minViewMode: "years",
            endDate: "-10Y"
        });
        
        
        $(".form-select").select2({
            placeholder : "Placeholder",
            tags: true
            
        });
        
        $(".taluk").select2({
            placeholder : "Placeholder",
            tags: true,
            minimumResultsForSearch: Infinity
            
        });
        $(".city").select2({
            placeholder: "Select",
            tags: true,
            minimumResultsForSearch: Infinity
            
        });
        $(".district").select2({
            placeholder : "Placeholder",
            tags: true,
            minimumResultsForSearch: Infinity
            
        });
        $(".area").select2({
            placeholder : "Placeholder",
            tags: true,
            minimumResultsForSearch: Infinity
            
        });
        $(".resposub").select2({
            placeholder : "Placeholder",
            tags: true,
            minimumResultsForSearch: Infinity
            
        });
        $(".resp").select2({
            placeholder : "Placeholder",
            tags: true,
            minimumResultsForSearch: Infinity
            
        });
        $(".karyavibhag").select2({
            placeholder : "Placeholder",
            tags: true,
            minimumResultsForSearch: Infinity
            
        });
        
        $(".student").hide();
        $(".studentsub").hide();
        $( '.respsub' ).hide();
        $( '.respsubsub' ).hide();
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        
        $('#search').on('keyup',function(){
            
            if($(this).val() != '')
            {
                $.ajax({
                    url: '{{route('area.search')}}',
                    type: 'POST',
                    data: {search:$(this).val()},
                    dataType: 'JSON',
                    success: function(result) {
                        
                        
                        if(result !='')
                        {
                            
                            $('.searchlistul').html('');
                            $('.searchlist').show();
                            $.each(result, function(i, item)
                            {
                                
                                $(".searchlistul").append("<li class='list-group-item searchval' id='"+item.id+"'>"+item.name+" - "+item.name_kn+"</li>");      
                            });
                        }
                        else{
                            
                            $('.searchlist').hide();
                            $('#search').val('');
                            
                            $("#taluk").html('');
                            $("#district").html('');
                            $("#city").html('');
                        }
                    }
                });
            }
            
            
        });
        
        // $('#search').on('keyup',function(){
            
            //     if($(this).val() != '')
            //     {
                //         $.ajax({
                    //             url: '{{route('area.search')}}',
                    //             type: 'POST',
                    //             data: {search:$(this).val()},
                    //             dataType: 'JSON',
                    //             success: function(result) {
                        
                        
                        //                 if(result !='')
                        //                 {
                            
                            //                     $('.searchlistul').html('');
                            //                     $('.searchlist').show();
                            //                     $.each(result, function(i, item)
                            //                     {
                                
                                //                         $(".searchlistul").append("<li class='list-group-item searchval' id='"+item.id+"'>"+item.name+" - "+item.name_kn+" ( "+item.nname+" - "+item.nname_kn+" )</li>");      
                                //                     });
                                //                 }
                                //                 else{
                                    
                                    //                     $('.searchlist').hide();
                                    //                     $('#search').val('');
                                    
                                    //                     $("#taluk").html('');
                                    //                     $("#district").html('');
                                    //                     $("#city").html('');
                                    //                 }
                                    //             }
                                    //         });
                                    //     }
                                    
                                    
                                    // });
                                    
                                    $.ajax({
                                        url: '{{route('city.list')}}',
                                        type: 'GET',
                                        dataType: 'JSON',
                                        success: function (data) 
                                        { 
                                            if(data == '')
                                            {
                                            }
                                            else
                                            {
                                                $(".city").html('');
                                                $(".city").append("<option label='Please Select' value=''>Select any one</option>");
                                                $.each(data, function(i, item)
                                                {
                                                    $(".city").append("<option value="+item.id+">"+item.name+" - "+item.name_kn+"</option>");      
                                                });
                                                
                                            }
                                        }
                                    });
                                    $('body').on('change', '.city', function () {
                                        
                                        $.ajax({
                                            
                                            url: '{{route('district.list')}}',
                                            type: 'POST',
                                            data: {_token: CSRF_TOKEN, bhag_id:$(this).val()},
                                            dataType: 'JSON',
                                            success: function (data) 
                                            {
                                                if(data == '')
                                                {
                                                }
                                                else
                                                {
                                                    $(".district").html('');
                                                    $(".taluk").html('');
                                                    $(".area").html('');
                                                    $(".district").append("<option label='Please Select' value=''>Select any one</option>");
                                                    $.each(data, function(i, item)
                                                    {
                                                        $(".district").append("<option value="+item.id+">"+item.name+" - "+item.name_kn+"</option>");      
                                                    });
                                                }
                                                
                                            }
                                        }); 
                                    });
                                    
                                    $('body').on('change', '.district', function () {
                                        
                                        $.ajax({
                                            
                                            url: '{{route('taluk.list')}}',
                                            type: 'POST',
                                            data: {_token: CSRF_TOKEN, nagar_id:$(this).val()},
                                            dataType: 'JSON',
                                            success: function (data) 
                                            {
                                                if(data == '')
                                                {
                                                }
                                                else
                                                {
                                                    $(".taluk").html('');
                                                    $(".area").html('');
                                                    $(".taluk").append("<option label='Please Select' value=''>Select any one</option>");
                                                    $.each(data, function(i, item)
                                                    {
                                                        $(".taluk").append("<option value="+item.id+">"+item.name+" - "+item.name_kn+"</option>");      
                                                    });
                                                }
                                                
                                            }
                                        }); 
                                    });
                                    $('body').on('change', '.taluk', function () {
                                        
                                        $.ajax({
                                            
                                            url: '{{route('area.list')}}',
                                            type: 'POST',
                                            data: {_token: CSRF_TOKEN, vasathi_id:$(this).val()},
                                            dataType: 'JSON',
                                            success: function (data) 
                                            {
                                                if(data == '')
                                                {
                                                }
                                                else
                                                {
                                                    $(".area").html('');
                                                    $(".area").append("<option label='Please Select' value=''>Select any one</option>");
                                                    $.each(data, function(i, item)
                                                    {
                                                        $(".area").append("<option value="+item.id+">"+item.name+" - "+item.name_kn+"</option>");      
                                                    });
                                                }
                                                
                                            }
                                        }); 
                                    });
                                    
                                    $.ajax({
                                        url: '{{route('jag.list')}}',
                                        type: 'GET',
                                        dataType: 'JSON',
                                        success: function (data) 
                                        { 
                                            if(data == '')
                                            {
                                            }
                                            else
                                            {
                                                $("#jag").append("<option label='Please Select' value=''>Select any one</option>");
                                                $.each(data, function(i, item)
                                                {
                                                    $("#jag").append("<option value="+item.id+">"+item.name+" - "+item.name_ka+"</option>");      
                                                });
                                            }
                                        }
                                    }); 
                                    
                                    //list careers
                                    $.ajax({
                                        url: '{{route('registercategory.list')}}',
                                        type: 'GET',
                                        dataType: 'JSON',
                                        success: function (data) 
                                        { 
                                            if(data == '')
                                            {
                                            }
                                            else
                                            {
                                                $(".prof").append("<option label='Please Select' value=''>Select any one</option>");
                                                $.each(data, function(i, item)
                                                {
                                                    $(".prof").append("<option value="+item.id+">"+item.name+" - "+item.name_ka+"</option>");      
                                                });
                                            }
                                        }
                                    }); 
                                    $.ajax({
                                        url: '{{route('intrarea.list')}}',
                                        type: 'GET',
                                        dataType: 'JSON',
                                        success: function (data) 
                                        { 
                                            if(data == '')
                                            {
                                            }
                                            else
                                            {
                                                $(".intrarea").append("<option label='Please Select' value=''>Select any one</option>");
                                                $.each(data, function(i, item)
                                                {
                                                    $(".intrarea").append("<option value="+item.id+">"+item.name+" - "+item.name_ka+"</option>");      
                                                });
                                            }
                                        }
                                    }); 
                                    
                                    //list javadari
                                    $.ajax({
                                        url: '{{route('pks.registerresp.list')}}',
                                        type: 'GET',
                                        dataType: 'JSON',
                                        success: function (data) 
                                        { 
                                            if(data == '')
                                            {
                                            }
                                            else
                                            {
                                                $(".resp").append("<option label='Please Select' value=''>Select any one</option>");
                                                $.each(data, function(i, item)
                                                {
                                                    $(".resp").append("<option value="+item.id+">"+item.name_ka+"</option>");      
                                                });
                                            }
                                        }
                                    }); 
                                    
                                     //list Karya Vibhag
                                    $.ajax({
                                        url: '{{route('pks.karyavibhag.list')}}',
                                        type: 'GET',
                                        dataType: 'JSON',
                                        success: function (data) 
                                        { 
                                            if(data == '')
                                            {
                                            }
                                            else
                                            {
                                                $(".karyavibhag").append("<option label='Please Select' value=''>Select any one</option>");
                                                $.each(data, function(i, item)
                                                {
                                                    $(".karyavibhag").append("<option value="+item.id+">"+item.name_ka+"</option>");      
                                                });
                                            }
                                        }
                                    }); 
                                    
                                    //list for only javadari sub
                                    
                                    $('.resp').on('change', function(){
                                        
                                        if($(this).val() == 6)
                                        {
                                            $(".resposub").html(" ");
                                            $( '.respsubsub' ).show();
                                            $( '.respsub' ).hide();
                                            $(".resposubsub").prop('required',true);
                                            $(".resposub").attr('required',false);
                                        }
                                        else if($(this).val() == 7)
                                        {
                                            $( '.respsubsub' ).hide();
                                            $(".resposubsub").prop('required',false);
                                            
                                            $.ajax({
                                                url: '{{route('registerrespsub.list')}}',
                                                type: 'POST',
                                                data: {_token: CSRF_TOKEN, respid:$(this).val()},
                                                dataType: 'JSON',
                                                success: function (data) 
                                                { 
                                                    $(".resposub").html(" ");
                                                    $( '.respsub' ).show();
                                                    $(".resposub").attr('required', true);
                                                    $(".resposub").append("<option label='Please Select' value=''>Select any one</option>");
                                                    $.each(data, function(i, item)
                                                    {
                                                        $(".resposub").append("<option value="+item.id+">"+item.name+" - "+item.name_ka+"</option>");      
                                                    });
                                                    
                                                }
                                            });
                                        }
                                        else
                                        {
                                            $(".resposub").html(" ");
                                            $( '.respsubsub' ).hide();
                                            $( '.respsub' ).hide();
                                            $(".resposubsub").prop('required',false);
                                            $(".resposub").attr('required',false);
                                        }
                                        
                                    });
                                    
                                    $('.prof').on('change', function(){
                                        
                                        
                                        
                                        $(".student").show();
                                        $(".studentsub").hide();
                                        
                                        $.ajax({
                                            url: '{{route('registersubcategory.list')}}',
                                            type: 'POST',
                                            data: {_token: CSRF_TOKEN, category:$(this).val()},
                                            dataType: 'JSON',
                                            success: function (data) 
                                            { 
                                                if(data == '')
                                                {
                                                }
                                                else
                                                {
                                                    $(".are").html('');
                                                    $(".are").append("<option label='Please Select' value=''>Select any one</option>");
                                                    $.each(data, function(i, item)
                                                    {
                                                        $(".are").append("<option value="+item.id+">"+item.name+" - "+item.name_ka+"</option>");      
                                                    });
                                                }
                                            }
                                        });
                                        
                                        
                                    });
                                    
                                    //list constituency
                                    
                                    $('body').on('click', '.searchval', function () {
                                        
                                        $("#searchhiddenid").val($(this).attr("id"));
                                        $("#search").val($(this).html());
                                        $('.searchlist').hide();
                                        
                                        $.ajax({
                                            
                                            url: '{{route('taluk.list')}}',
                                            type: 'POST',
                                            data: {_token: CSRF_TOKEN, nagar:$(this).attr("id")},
                                            dataType: 'JSON',
                                            success: function (data) 
                                            {
                                                $("#taluk").html('');
                                                $("#district").html('');
                                                $("#city").html('');
                                                
                                                // var city = data.city;
                                                // $("#city").html("<option value="+city.id+"  selected>"+city.name+" - "+city.name_kn+"</option>"); 
                                                // var nagar = data.nagar;
                                                // $("#taluk").html("<option value="+nagar.id+"  selected>"+nagar.name+" - "+nagar.name_kn+"</option>");
                                                var district = data.district;
                                                $.each(district, function(i, item)
                                                {
                                                    $(".taluk").append("<option value="+item.id+" >"+item.name+" - "+item.name_kn+"</option>");      
                                                });
                                                
                                                // $("#taluk").html("<option value="+district.id+"  selected>"+district.name+" - "+district.name_kn+"</option>");
                                            }
                                        }); 
                                    });
                                    
                                    
                                    // $('body').on('click', '.searchval', function () {
                                        
                                        //     $("#searchhiddenid").val($(this).attr("id"));
                                        //     $("#search").val($(this).html());
                                        //     $('.searchlist').hide();
                                        
                                        //     $.ajax({
                                            
                                            //         url: '{{route('taluk.list')}}',
                                            //         type: 'POST',
                                            //         data: {_token: CSRF_TOKEN, nagar:$(this).attr("id")},
                                            //         dataType: 'JSON',
                                            //         success: function (data) 
                                            //         {
                                                //             $("#taluk").html('');
                                                //             $("#district").html('');
                                                //             $("#city").html('');
                                                //             var city = data.city;
                                                //             $("#city").html("<option value="+city.id+"  selected>"+city.name+" - "+city.name_kn+"</option>"); 
                                                //             var nagar = data.nagar;
                                                //             $("#taluk").html("<option value="+nagar.id+"  selected>"+nagar.name+" - "+nagar.name_kn+"</option>");
                                                //             var district = data.district;
                                                //             $("#district").html("<option value="+district.id+"  selected>"+district.name+" - "+district.name_kn+"</option>");
                                                //         }
                                                //     }); 
                                                // });
                                                
                                                
                                            });
                                        </script>
                                        
                                        @endsection 