@extends('admin.main')

@section('menubar_script')
@parent
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/vendors/datatables.css')}}">
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
                  <h3>SSV Report</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admindashboard')}}">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">SSV Report</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <!-- Server Side Processing start-->
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header pb-0">
                      <h5>SSV Report</h5>
                    
             <div class="text-end mt-2" >
                <a role="button" class="btn btn-primary" href="{{ route('adminexcel.download.ssv') }}">Excel</a>
              </div>
                   </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="display" id="report" style="width:100%">
                        <thead>
                         <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Mobile</th>
                             <th>varga</th>
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
                             <th>Mandala / Vasathi</th>
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
                            <td>{{$reg->varga}}</td>
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
              <!-- Server Side Processing end-->
              
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>

@endsection

@section('footerbar')
@parent
@endsection


@section('footerbar_script')
@parent

<script src="{{asset('admin/assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
   
    <script type="text/javascript">

			"use strict";

		 $(document).ready(function(){

				// Variables
				var SITEURL = '{{url('')}}';

				// Csrf Field
				$.ajaxSetup({
					headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				
				
				//  $('#report').DataTable();
				 $('#report').DataTable({
            "processing" : true,
            "serverSider" : true, 
            dom: '<lBf<t>>',
            buttons: [
            {
                extend: 'csv',
                filename: 'RSSKDP Registration list',
                title:'RSSKDP Registration list',
                exportOptions: {
                    columns: [ 1, 2, 3, 4, 5 ]
                }
            },
            {
                extend: 'excel',
                filename: 'RSSKDP Registration list',
                title:'RSSKDP Registration list',
                exportOptions: {
                    columns: [ 1, 2, 3, 4, 5 ]
                }
            },
            {
                extend: 'pdf',
                filename: 'RSSKDP Registration list',
                footer: 'true',
                orientation: 'landscape',
                title:'RSSKDP Registration list',
                exportOptions: {
                    columns: [ 1, 2, 3, 4, 5 ],
                    modifier: {
                        selected: true
                    }
                }
            },
            ]

        });
    
                
				
				
				
			});
        
    </script>
    
    	

  
@endsection