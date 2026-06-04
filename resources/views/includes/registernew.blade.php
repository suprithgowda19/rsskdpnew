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
    <h2><a href="#" data-back-button=""><i class="fa fa-arrow-left"></i></a> {{ __('messages.reghead') }}</h2>
    <a class=" float-end lan-btn btn changeLang" id="{{ __('messages.langid') }}" href="#" ><span>{{ __('messages.lang') }}</span></a>
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
        <h1 class="text-center mt-3 text-uppercase font-700 color-white">{{ __('messages.success1') }}</h1>
        <p class="text-center mb-0 color-white">{{ __('messages.success2') }}</p>
        <p class="text-center mb-0 color-white">{{ __('messages.success3') }}</p>
        <p class="text-center mb-0 color-white">{{ __('messages.success4') }}</p>
        
            </div>
        </div>
    </div>
    </div>

@endif



<div class="card card-style">
    <div class="content mb-0 mt-3">

        <form method="post" action="{{route('register.api')}}" >
            <!--action="{{route('register.api')}}"-->

            @csrf

            <div class="input-style input-style-always-active has-borders no-icon validate-field mb-4">
                <input type="text" class="form-control validate-text" id="form1" placeholder="{{ __('messages.regform1') }}" name="name" required>
                <label for="form1" class="color-highlight">{{ __('messages.regform1') }} (Required)</label>
                <i class="fa fa-times disabled invalid color-red-dark"></i>
                <i class="fa fa-check disabled valid color-green-dark"></i>
            </div>

            <div class="input-style input-style-always-active has-borders no-icon validate-field mb-4">
                <input type="tel" class="form-control validate-text" id="form2" placeholder="{{ __('messages.regform2') }}" name="phone" required>
                <label for="form2" class="color-highlight">{{ __('messages.regform2') }} (Required)</label>
                <i class="fa fa-times disabled invalid color-red-dark"></i>
                <i class="fa fa-check disabled valid color-green-dark"></i>
            </div>

            <!--<div class="input-style input-style-always-active has-borders no-icon validate-field mb-4">-->
            <!--    <input type="email" class="form-control validate-text" id="form3" placeholder="{{ __('messages.regform3') }}" name="email" >-->
            <!--    <label for="form3" class="color-highlight">{{ __('messages.regform3') }} (Optional)</label>-->
            <!--    <i class="fa fa-times disabled invalid color-red-dark"></i>-->
            <!--    <i class="fa fa-check disabled valid color-green-dark"></i>-->
            <!--</div>-->

            <div class="input-style input-style-always-active has-borders no-icon validate-field mb-4">
                <input type="text" class="form-control validate-text  " placeholder="{{ __('messages.regform4') }}"  name="yod"   required>
                <label for="form8" class="color-highlight">{{ __('messages.regform4') }} (Required)</label>
            </div>

            <div class="input-style input-style-always-active has-borders no-icon validate-field mb-4">
                <input type="text" class="form-control validate-text "  placeholder="{{ __('messages.regform5') }}" name="doy"  required>
                <label for="date2" class="color-highlight">{{ __('messages.regform5') }} (Required)</label>
            </div>

            <div class="input-style input-style-always-active has-borders no-icon validate-field mb-4">
                <input type="number" class="form-control validate-text pin" id="form9" placeholder="{{ __('messages.regform6') }}" name="pin" >
                <label for="form9" class="color-highlight">{{ __('messages.regform6') }} (Optional)</label>
                <i class="fa fa-times disabled invalid color-red-dark"></i>
                <i class="fa fa-check disabled valid color-green-dark"></i>
            </div>

            <!--<div class="input-style input-style-always-active has-borders no-icon validate-field mb-4">-->
            <!--    <input type="text" class="form-control validate-text grama" id="form10" placeholder="{{ __('messages.regform7') }}" name="grama" >-->
            <!--    <label for="form10  " class="color-highlight">{{ __('messages.regform7') }} (Optional)</label>-->
            <!--    <i class="fa fa-times disabled invalid color-red-dark"></i>-->
            <!--    <i class="fa fa-check disabled valid color-green-dark"></i>-->
            <!--</div>-->

            <div class="input-style input-style-always-active has-borders no-icon mb-4">
                <textarea id="form4" class="form-control" placeholder="{{ __('messages.regform8') }}" name="address" required></textarea>
                <label for="form4" class="color-highlight">{{ __('messages.regform8') }} (Required)</label>
                <i class="fa fa-times disabled invalid color-red-dark"></i>
                <i class="fa fa-check disabled valid color-green-dark"></i>
            </div>

            <!--<div class="col-md-12 input-style-always-active has-borders no-icon mb-4" style="position: relative;margin-bottom: 15px !important;">-->
            <!--    <label for="intrarea" class="color-highlight profess-tag">{{ __('messages.regform9') }} (Optional)</label>-->
            <!--    <select  multiple class="form-select intrarea profess-tag-1" name="intrarea[]" data-placeholder="{{ __('messages.regsearch') }}"  style="border-color: rgba(0, 0, 0, 0.08) !important;">-->
            <!--    </select>-->
            <!--</div>-->

            <div class="col-md-12 input-style-always-active has-borders no-icon mb-4" style="position: relative;margin-bottom: 15px !important;">
                <label for="jag" class="color-highlight profess-tag">{{ __('messages.regform16') }} (Optional)</label>
                <select  multiple class="form-select jag profess-tag-1" id="jag" name="jag[]" data-placeholder="{{ __('messages.regsearch') }}"  style="border-color: rgba(0, 0, 0, 0.08) !important;">
                </select>

            </div>

            <div class="col-md-12 input-style-always-active has-borders no-icon mb-4" style="position: relative;margin-bottom: 15px !important;">
                <label for="prof" class="color-highlight profess-tag">{{ __('messages.regform10') }} (Required)</label>
                <select required class="form-select prof profess-tag-1" name="prof" data-placeholder="{{ __('messages.regselect') }}" style="border-color: rgba(0, 0, 0, 0.08) !important;">
                </select>
            </div>

            <div class="student">
                <div class="col-md-12 has-borders no-icon mb-4" style="position: relative;margin-bottom: 15px !important;">
                    <label for="are" class="color-highlight profess-tag">{{ __('messages.regformchoose') }} (Required)</label>
                    <select required class="form-select are profess-tag-1"  name="are" data-placeholder="{{ __('messages.regformchoose') }}" style="border-color: rgba(0, 0, 0, 0.08) !important;">
                    </select>
                </div>
            </div>

            <div class="studentsub">
                <div class="input-style input-style-always-active has-borders no-icon validate-field mb-4">
                    <input type="text" class="form-control validate-text" id="form1aw" placeholder="{{ __('messages.regformother') }}" name="inst">
                    <label for="form1aw" class="color-highlight">{{ __('messages.regformother') }} (Required)</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                </div>
            </div>

            <div class="col-md-12  has-borders no-icon mb-4" style="position: relative;margin-bottom: 15px !important;">
                <label for="resp" class="color-highlight profess-tag">{{ __('messages.regform11') }} (Required)</label>
                <select required class="form-select resp profess-tag-1 selectpicker"  name="resp" data-placeholder="{{ __('messages.regselect') }}" data-live-search="true" data-live-search-placeholder="Enter Here" style="border-color: rgba(0, 0, 0, 0.08) !important;">
                </select>
            </div>

            <div class="respsub">
                <div class="col-md-12 has-borders no-icon mb-4" style="position: relative;margin-bottom: 15px !important;">
                    <label for="resposub" class="color-highlight profess-tag">{{ __('messages.regformchoose') }} (Required)</label>
                    <select  class="form-select resposub profess-tag-1"  name="resposub" data-placeholder="{{ __('messages.regselect') }}" style="border-color: rgba(0, 0, 0, 0.08) !important;">
                    </select>
                </div>
            </div>

            <div class="respsubsub">
                <div class="input-style input-style-always-active has-borders no-icon validate-field mb-4">
                    <input type="text" class="form-control validate-text resposubsub" id="resposubsub" placeholder="{{ __('messages.regform17') }}" name="javbsub" >
                    <label for="form3" class="color-highlight">{{ __('messages.regform17') }} (Required)</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                </div>
            </div>
            
             <div class="col-md-12 input-style-always-active has-borders no-icon mb-4" style="position: relative;margin-bottom: 15px !important;">
                <label for="city" class="color-highlight profess-tag">{{ __('messages.regform15') }} (Required)</label>
                <select required class="form-select city profess-tag-1" id="city" name="city" data-placeholder="{{ __('messages.regselect') }}"  style="border-color: rgba(0, 0, 0, 0.08) !important;">
                </select>
            </div>
            
            <div class="col-md-12 input-style-always-active has-borders no-icon mb-4" style="position: relative;margin-bottom: 15px !important;">
                <label for="district" class="color-highlight profess-tag">{{ __('messages.regform14') }} (Required)</label>
                <select required class="form-select district profess-tag-1" id="district" name="district" data-placeholder="{{ __('messages.regselect') }}"  style="border-color: rgba(0, 0, 0, 0.08) !important;">
                </select>
            </div>
            
            <div class="col-md-12 input-style-always-active has-borders no-icon mb-4" style="position: relative;margin-bottom: 15px !important;">
                <label for="taluk" class="color-highlight profess-tag">{{ __('messages.regform13') }} (Required)</label>
                <select required class="form-select taluk profess-tag-1" id="taluk" name="taluk" data-placeholder="{{ __('messages.regselect') }}"  style="border-color: rgba(0, 0, 0, 0.08) !important;">
                </select>
            </div>
            
             <div class="col-md-12 input-style-always-active has-borders no-icon mb-4" style="position: relative;margin-bottom: 15px !important;">
                <label for="area" class="color-highlight profess-tag">{{ __('messages.regform12') }} (Required)</label>
                <select required class="form-select area profess-tag-1" id="area" name="area" data-placeholder="{{ __('messages.regselect') }}"  style="border-color: rgba(0, 0, 0, 0.08) !important;">
                </select>
            </div>
           
            <input type="submit" class="btn btn-m btn-full rounded-sm shadow-l bg-green-dark text-uppercase font-700 mt-4" id="submit" value="{{ __('messages.regformsubmit') }}">

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
            url: '{{route('registerresp.list')}}',
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
                        $(".resp").append("<option value="+item.id+">"+item.name+" - "+item.name_ka+"</option>");      
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