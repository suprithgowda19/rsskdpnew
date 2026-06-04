@extends('admin.main')

@section('menubar_script')
@parent
<link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/chartist.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/owlcarousel.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/prism.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/datatables.css')}}">
@endsection

@section('menubar')
@parent
@endsection

@section('leftmenu')
@parent
@endsection

@section('content')

<div class="page-body">

  @if(\Session::get('succes'))
  <div class="position-fixed top-25 end-0 p-3 " style="z-index:1;">
    <div class="toast defaul-show-toast align-items-center text-white bg-success position-relative" aria-live="assertive" data-bs-autohide="true" aria-atomic="false">
      <div class="toast-body">{{ \Session::get('succes') }}   
        <button class="btn-close btn-close-white position-absolute top-50 end-0 translate-middle" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
    </div>
  </div>
  @endif
  {{ \Session::forget('succes') }}
  <div class="container-fluid">    
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-sm-6">
          <h3>Dashboard</h3>
        </div>
        <div class="col-12 col-sm-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a class="home-item" href="{{route('admindashboard')}}"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item"> Dashboard</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid default-dash">
    <div class="row"> 
      <div class="col-xl-6 xl-100 box-col-12">
        <div class="widget-joins card">
          <div class="card-header pb-0">
            <div class="media">
              <div class="">
                <h5>Swayamsevak Registration</h5>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row gy-4">
              <div class="col-sm-6">
                <div class="widget-card">
                  <div class="media align-self-center">
                    <div class="widget-icon bg-light-primary">
                      <svg class="fill-danger" width="41" height="46" viewBox="0 0 41 46" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.5245 23.3155C24.0019 23.3152 26.3325 16.8296 26.9426 11.5022C27.6941 4.93936 24.5906 0 17.5245 0C10.4593 0 7.35423 4.93899 8.10639 11.5022C8.71709 16.8296 11.047 23.316 17.5245 23.3155Z"></path>
                        <path d="M31.6878 26.0152C31.8962 26.0152 32.1033 26.0214 32.309 26.0328C32.0007 25.5931 31.6439 25.2053 31.2264 24.8935C29.9817 23.9646 28.3698 23.6598 26.9448 23.0998C26.2511 22.8273 25.6299 22.5567 25.0468 22.2485C23.0787 24.4068 20.5123 25.5359 17.5236 25.5362C14.536 25.5362 11.9697 24.4071 10.0019 22.2485C9.41877 22.5568 8.79747 22.8273 8.10393 23.0998C6.67891 23.6599 5.06703 23.9646 3.82233 24.8935C1.6698 26.5001 1.11351 30.1144 0.676438 32.5797C0.315729 34.6148 0.0734026 36.6917 0.00267388 38.7588C-0.0521202 40.36 0.738448 40.5846 2.07801 41.0679C3.75528 41.6728 5.48712 42.1219 7.23061 42.4901C10.5977 43.2011 14.0684 43.7475 17.5242 43.7719C19.1987 43.76 20.8766 43.6249 22.5446 43.4087C21.3095 41.6193 20.5852 39.4517 20.5852 37.1179C20.5853 30.9957 25.5658 26.0152 31.6878 26.0152Z"></path>
                        <path d="M31.6878 28.2357C26.7825 28.2357 22.8057 32.2126 22.8057 37.1179C22.8057 42.0232 26.7824 46 31.6878 46C36.5932 46 40.57 42.0232 40.57 37.1179C40.57 32.2125 36.5931 28.2357 31.6878 28.2357ZM35.5738 38.6417H33.2118V41.0037C33.2118 41.8453 32.5295 42.5277 31.6879 42.5277C30.8462 42.5277 30.1639 41.8453 30.1639 41.0037V38.6417H27.802C26.9603 38.6417 26.278 37.9595 26.278 37.1177C26.278 36.276 26.9602 35.5937 27.802 35.5937H30.1639V33.2318C30.1639 32.3901 30.8462 31.7078 31.6879 31.7078C32.5296 31.7078 33.2118 32.3901 33.2118 33.2318V35.5937H35.5738C36.4155 35.5937 37.0978 36.276 37.0978 37.1177C37.0977 37.9595 36.4155 38.6417 35.5738 38.6417Z"></path>
                      </svg>
                    </div>
                    <div class="media-body">
                      <h6>Total</h6>
                      <h5>{{$reports['count']}}</h5>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="widget-card">
                  <div class="media align-self-center">
                    <div class="widget-icon bg-light-primary">
                      <svg class="fill-danger" width="41" height="46" viewBox="0 0 41 46" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.5245 23.3155C24.0019 23.3152 26.3325 16.8296 26.9426 11.5022C27.6941 4.93936 24.5906 0 17.5245 0C10.4593 0 7.35423 4.93899 8.10639 11.5022C8.71709 16.8296 11.047 23.316 17.5245 23.3155Z"></path>
                        <path d="M31.6878 26.0152C31.8962 26.0152 32.1033 26.0214 32.309 26.0328C32.0007 25.5931 31.6439 25.2053 31.2264 24.8935C29.9817 23.9646 28.3698 23.6598 26.9448 23.0998C26.2511 22.8273 25.6299 22.5567 25.0468 22.2485C23.0787 24.4068 20.5123 25.5359 17.5236 25.5362C14.536 25.5362 11.9697 24.4071 10.0019 22.2485C9.41877 22.5568 8.79747 22.8273 8.10393 23.0998C6.67891 23.6599 5.06703 23.9646 3.82233 24.8935C1.6698 26.5001 1.11351 30.1144 0.676438 32.5797C0.315729 34.6148 0.0734026 36.6917 0.00267388 38.7588C-0.0521202 40.36 0.738448 40.5846 2.07801 41.0679C3.75528 41.6728 5.48712 42.1219 7.23061 42.4901C10.5977 43.2011 14.0684 43.7475 17.5242 43.7719C19.1987 43.76 20.8766 43.6249 22.5446 43.4087C21.3095 41.6193 20.5852 39.4517 20.5852 37.1179C20.5853 30.9957 25.5658 26.0152 31.6878 26.0152Z"></path>
                        <path d="M31.6878 28.2357C26.7825 28.2357 22.8057 32.2126 22.8057 37.1179C22.8057 42.0232 26.7824 46 31.6878 46C36.5932 46 40.57 42.0232 40.57 37.1179C40.57 32.2125 36.5931 28.2357 31.6878 28.2357ZM35.5738 38.6417H33.2118V41.0037C33.2118 41.8453 32.5295 42.5277 31.6879 42.5277C30.8462 42.5277 30.1639 41.8453 30.1639 41.0037V38.6417H27.802C26.9603 38.6417 26.278 37.9595 26.278 37.1177C26.278 36.276 26.9602 35.5937 27.802 35.5937H30.1639V33.2318C30.1639 32.3901 30.8462 31.7078 31.6879 31.7078C32.5296 31.7078 33.2118 32.3901 33.2118 33.2318V35.5937H35.5738C36.4155 35.5937 37.0978 36.276 37.0978 37.1177C37.0977 37.9595 36.4155 38.6417 35.5738 38.6417Z"></path>
                      </svg>
                    </div>
                    <div class="media-body">
                      <h6>Today</h6>
                      <h5>{{$reports['today']}}</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid default-dash">
    <div class="row">
      <div class="col-xl-4 col-md-6 dash-35 dash-xl-50">
        <div class="card ongoing-project">
          <div class="card-header card-no-border">
            <div class="media media-dashboard">
              <div class="media-body"> 
                <h5 class="mb-0">Vibhag Profile (Insights)</h5>
              </div>
            </div>
          </div>
          <div class="card-body pt-0">
            <div class="table-responsive custom-scrollbar">
              <table class="table table-bordernone">
                <thead> 
                  <tr> 
                    <th> <span>Vibhag's - (code)</span></th>
                    <th> <span>Count</span></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($reports['vibhag'] as $vibhag) 
                  <tr>
                    <td>
                      <div class="media">
                        <div class="media-body ps-2">
                          <div class="avatar-details"><span>{{$vibhag->name}} - ({{$vibhag->vibhag_code}})</span></div>
                          <input type="hidden" id="vibhag-{{$vibhag->id}}" value="{{$vibhag->name}}">
                        </div>
                      </div>
                    </td>
                    <td>
                      @php
                      $id = $vibhag->id;
                      $v_count = DB::table('customers')->where('city', $id)->where('status', 1)->count();
                      @endphp
                      <div class="badge badge-light-primary">{{$v_count}} <a href="{{route('report.vibhag.export.id', ['id'=>$vibhag->id])}}"><i class="fa fa-download" aria-hidden="true"></i></a></div>

                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-md-6 dash-35 dash-xl-50">
          
          <div class="widget-joins card">
          <div class="card-header pb-0">
            <div class="media">
              <center>
                <h5>Vasathi Report</h5>
              </center>
            </div>
          </div>
          <div class="card-body">
            <div class="row gy-4">
              <div class="col-sm-12">
                <div class="widget-card">
                  <div class="media align-self-center">
                    <div class="widget-icon bg-light-primary">
                      <a role="button"  href="{{ route('vasathiall.download') }}"><i class="fa fa-download" aria-hidden="true"></i></a>
                    </div>
                    <div class="media-body">
                      <h6>Total</h6>
                      <h5>{{$reports['vasathi']}}</h5>
                    </div>
                  </div>
                </div>
              </div>
              
             
            </div>
          </div>
        </div>
        
      </div>
     
    </div>
  </div>
  <div class="container-fluid default-dash">
    <div class="row">
      <div class="col-sm-12 col-xl-4 col-md-6 dash-35 dash-xl-50">
       <div class="card">
          <div class="card-header pb-0">
            <h5>Career Pie Chart</h5>
          </div>
          <div class="card-body p-0 chart-block">
            <div class="chart-overflow" id="tpie-chart1"></div>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-xl-6 box-col-6">
        
        <div class="card">
          <div class="card-header pb-0">
            <h5>Javabdhari Pie Chart</h5>
          </div>
          <div class="card-body p-0 chart-block">
            <div class="chart-overflow" id="jpie-chart1"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
 <div class="container-fluid default-dash">
    <div class="row">
      <div class="col-xl-4 col-md-6 dash-35 dash-xl-50">
        <div class="card">
          <div class="widget-feedback card-body">
            <div class="feedback-top text-center">
              <h3>VIBHAG</h3>
            </div>
            <div id="feedback-chart"></div>
            <ul>
              <li class="font-roboto">
                <div class="widget-icon ">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up font-success"><line x1="12" y1="19" x2="12" y2="5"></line><polyline points="5 12 12 5 19 12"></polyline></svg>
                </div>

                <h4>{{$reports['max_vibhag']->vibname}}  </h4>
                <h5 class="font-success">{{$reports['max_vibhag']->vibh_cnt}}</h5>
              </li>
              <li class="font-roboto">
                <div class="widget-icon ">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down font-danger"><line x1="12" y1="5" x2="12" y2="19"></line><polyline points="19 12 12 19 5 12"></polyline></svg>
                </div>
                <h4>{{$reports['min_vibhag']->vibname}}</h4>
                <h5 class="font-danger">{{$reports['min_vibhag']->vibh_cnt}}</h5>
              </li>
            </ul>
          </div>
        </div>
        <div class="card">
          <div class="widget-feedback card-body">
            <div class="feedback-top text-center">
              <h3>BHAG</h3>
            </div>
            <div id="feedback-chart"></div>
            <ul>
              <li class="font-roboto">
                <div class="widget-icon ">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up font-success"><line x1="12" y1="19" x2="12" y2="5"></line><polyline points="5 12 12 5 19 12"></polyline></svg>
                </div>
                <h4>{{$reports['max_bhag']->bhag_name}}</h4>
                <h5 class="font-success">{{$reports['max_bhag']->bhag_cnt}}</h5>
              </li>
              <li class="font-roboto">
                <div class="widget-icon ">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down font-danger"><line x1="12" y1="5" x2="12" y2="19"></line><polyline points="19 12 12 19 5 12"></polyline></svg>
                </div>
                <h4>{{$reports['min_bhag']->bhag_name}}</h4>
                <h5 class="font-danger">{{$reports['min_bhag']->bhag_cnt}}</h5>
              </li>
            </ul>
          </div>
        </div> 
      </div>
      <div class="col-xl-4 col-md-6 dash-35 dash-xl-50">
        <div class="card">
          <div class="widget-feedback card-body">
            <div class="feedback-top text-center">
              <h3>NAGAR</h3>
            </div>
            <div id="feedback-chart"></div>
            <ul>
              <li class="font-roboto">
                <div class="widget-icon ">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up font-success"><line x1="12" y1="19" x2="12" y2="5"></line><polyline points="5 12 12 5 19 12"></polyline></svg>
                </div>
                <h4>{{$reports['max_nagar']->nagar_name}}</h4>
                <h5 class="font-success">{{$reports['max_nagar']->nagar_cnt}}</h5>
              </li>
              <li class="font-roboto">
                <div class="widget-icon ">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down font-danger"><line x1="12" y1="5" x2="12" y2="19"></line><polyline points="19 12 12 19 5 12"></polyline></svg>
                </div>
                <h4>{{$reports['min_nagar']->nagar_name}}</h4>
                <h5 class="font-danger">{{$reports['min_nagar']->nagar_cnt}}</h5>
              </li>
            </ul>
          </div>
        </div>
        <div class="card">
          <div class="widget-feedback card-body">
            <div class="feedback-top text-center">
              <h3>VASATHI</h3>
            </div>
            <div id="feedback-chart"></div>
            <ul>
              <li class="font-roboto">
                <div class="widget-icon ">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up font-success"><line x1="12" y1="19" x2="12" y2="5"></line><polyline points="5 12 12 5 19 12"></polyline></svg>
                </div>
                <h4>{{$reports['max_vasathi']->vasathi_name}}</h4>
                <h5 class="font-success">{{$reports['max_vasathi']->vasathi_cnt}}</h5>
              </li>
              <li class="font-roboto">
                <div class="widget-icon ">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down font-danger"><line x1="12" y1="5" x2="12" y2="19"></line><polyline points="19 12 12 19 5 12"></polyline></svg>
                </div>
                <h4>{{$reports['min_vasathi']->vasathi_name}}</h4>
                <h5 class="font-danger">{{$reports['min_vasathi']->vasathi_cnt}}</h5>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
 
    <div class="container-fluid default-dash">
      <div class="row">
        <div class="col-xl-6 xl-100 box-col-12">
          <div class="card">
            <div class="card-header">
              <div class="text-end mt-2" >
                <a role="button" class="btn btn-primary" href="{{ route('excel.download') }}">Excel</a>
              </div>
            </div>
            <div class="card-body">
              <div class="dt-ext table-responsive">
                <table class="display mt-2" id="basic-2">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Mobile</th>
                      <th>Email</th>
                      <th>Yr. of birth</th>
                      <th>Sangha Pravesha yr.</th>
                      <th>Career</th>
                      <th>career sub</th>
                      <th>Javabdari</th>
                      <th>Javabdari gat.</th>
                      <th>Javabdari viv.</th>
                      <th>Vibhag</th>
                      <th>Bhag / Jille</th>
                      <th>Nagar / Taluk</th>
                      <th>mandala / Vasathi</th>
                      <th>address</th>
                      <th>Pin</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($reports['reg'] as $reg) 
                    <tr>
                      <td>#{{$reg->reg_id}}</td>
                      <td class="text-capitalize">{{$reg->username}}</td>
                      <td>{{$reg->phone}}</td>
                      <td>{{$reg->email}}</td>
                      <td>{{$reg->yod}}</td>
                      <td>{{$reg->doy}}</td>
                      <td>{{$reg->career}}</td>
                      <td>{{$reg->careersub}}</td>
                      <td>{{$reg->javb}}</td>
                      <td>{{$reg->javbsub}}</td>
                      <td>{{$reg->javbviv}}</td>
                      <td>{{$reg->vibname}}</td>
                      <td>{{$reg->bname}}</td>
                      <td>{{$reg->nname}}</td>
                      <td>{{$reg->vname}}</td>
                      <td>{{$reg->address}}</td>
                      <td>{{$reg->pin}}</td>
                    </tr>
                    @endforeach
                  </tbody>

                </table>
                <div class="text-end m-4" > {{$reports['reg']->links()}}</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @endsection

  @section('footerbar')
  @parent
  @endsection

  @section('footerbar_script')
  @parent

  <script src="{{ asset('admin/assets/js/chart/google/google-chart-loader.js') }}"></script>
   <!--<script src="{{ asset('admin/assets/js/chart/google/google-chart.js') }}"></script>-->
  <script type="text/javascript">
    google.charts.load('current', {packages: ['corechart', 'bar']});
    google.charts.load('current', {'packages':['line']});
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawBasic);
    function drawBasic() {

      if ($("#ppie-chart1").length > 0) {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     5],
          ['Eat',      10],
          ['Commute',  15],
          ['Watch TV', 20],
          ['Sleep',    25]
          ]);
        var options = {
          title: 'Career Piechart',
          width:'100%',
          height: 500,
          colors: ["#f8d62b", "#51bb25" , "#a927f9"  , zetaAdminConfig.secondary , zetaAdminConfig.primary ]
        };
        var chart = new google.visualization.PieChart(document.getElementById('ppie-chart1'));
        chart.draw(data, options);
      }

    }
  </script>

  <script src="{{ asset('admin/assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>

  <script type="text/javascript">

    $(document).ready(function(){


      $('#basic-2').DataTable( {
        dom: '<<t>>'
      } );

      $('#basic-1').DataTable({

        dom: '<f<t>p>'
      });

      $.ajax({
        type: "get",
        url: "{{route('report.career')}}",
        dataType: 'JSON',
        success: function (resp) 
        {
          oth = resp[0].careercount;
          std = resp[1].careercount;
          wrk = resp[2].careercount;

          function sum_three(nums)
          {
            return nums[0] + nums[1] + nums[2];
          }

          var total = sum_three([+oth, +std, +wrk]);
          toth = parseFloat(oth * 100 / total);
          tstd = parseFloat(std * 100 / total);
          twrk = parseFloat(wrk * 100 / total);

          google.charts.setOnLoadCallback(drawBasic);
          function drawBasic() {

            if ($("#tpie-chart1").length > 0) {
              var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Student',     tstd],
                ['Working Proffesional',      twrk],
                ['others',  toth]
                ]);

              var options = {
                width:'100%',
                height: 400,
                colors: ["#a927f9"  , zetaAdminConfig.secondary , zetaAdminConfig.primary ]
              };
              var chart = new google.visualization.PieChart(document.getElementById('tpie-chart1'));
              chart.draw(data, options);
            }

          }

        },
        error: function (data) {
          console.log('Error:', data);
        }
      });
      $.ajax({
        type: "get",
        url: "{{route('report.javb')}}",
        dataType: 'JSON',
        success: function (resp) 
        {
            console.log(resp);
            
            gat = resp[0].respcount;
            vas = resp[1].respcount;
            viv = resp[2].respcount;
            san = resp[3].respcount;
            sha = resp[4].respcount;
            pra = resp[5].respcount; 
            no = resp[6].respcount;
            muk = resp[7].respcount;
            toli = resp[8].respcount;
            
            function sum_nine(nums)
          {
            return nums[0] + nums[1] + nums[2] + nums[3] + nums[4] + nums[5] + nums[6] + nums[7] + nums[8];
          }
          
          var total = sum_nine([+gat, +vas, +viv, +san, +sha, +pra, +no, +muk, +toli]);
          tgat = parseFloat(gat * 100 / total);
          tvas = parseFloat(vas * 100 / total);
          tviv = parseFloat(viv * 100 / total);
          tsan = parseFloat(san * 100 / total);
          tsha = parseFloat(sha * 100 / total);
          tpra = parseFloat(pra * 100 / total);
          tno = parseFloat(no * 100 / total);
          tmuk = parseFloat(muk * 100 / total);
          toli = parseFloat(toli * 100 / total);
          
          
          google.charts.setOnLoadCallback(drawBasic);
          function drawBasic() {

            if ($("#jpie-chart1").length > 0) {
              var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Gathividhi',     tgat],
                ['Vasathi/Mandala Pramukh',      tvas],
                ["Vivida Kshetra",  tviv],
                ["Sangha ",     tsan],
                ["Shakha Karyavaaha",      tsha],
                ["Pravasi Karyakartha",  tpra],
                ["No",     tno],
                ["Mukhya Shikshak",      tmuk],
                ["Shakha Toli",  toli]
                ]);

              var options = {
                width:'100%',
                height: 400,
                colors: ["#1d1f24" ,"#a927f9"  , zetaAdminConfig.light_1 , zetaAdminConfig.danger , zetaAdminConfig.warning ,zetaAdminConfig.info , zetaAdminConfig.success , zetaAdminConfig.secondary , zetaAdminConfig.primary ]
              };
              var chart = new google.visualization.PieChart(document.getElementById('jpie-chart1'));
              chart.draw(data, options);
            }

          }
         
          

        },
        error: function (resp) {
          console.log('Error:', resp);
        }
      });


    });
  </script>


  @endsection