<!DOCTYPE html>
<html lang="en"> 
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
  <title>RSSKDP</title>
  <!-- Google font-->
  <link rel="preconnect" href="https://fonts.googleapis.com/">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
  <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>
  <!-- ico-font-->
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/icofont/icofont.min.css') }}">
  <!-- Themify icon-->
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/themify.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css"/>
  <!-- Flag icon-->
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/flag-icon.css') }}">
  <!-- Feather icon-->
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/feather-icon.css') }}">
  <!-- Plugins css start-->
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/scrollbar.css') }}">
  @section('menubar_script')
  @show

  <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/animate.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/date-picker.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/photoswipe.css') }}">
  <!-- Plugins css Ends-->
  <!-- Bootstrap css-->
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/bootstrap.css') }}">
  <!-- App css-->
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/style.css') }}">
  <link id="color" rel="stylesheet" href="{{ asset('admin/assets/css/color-1.css') }}" media="screen">
  <!-- Responsive css-->
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/responsive.css') }}">

  <style>
    .customizer-links{
      display : none;
    }
    .page-wrapper.compact-wrapper .page-body-wrapper div.sidebar-wrapper .sidebar-main .simplebar-offset {
      height: auto;
    }
  </style>
</head>
<body>     
  <!-- Loader starts-->
  <div class="loader-wrapper">
    <div class="loader">
      <div class="loader-bar"></div>
      <div class="loader-bar"></div>
      <div class="loader-bar"></div>
      <div class="loader-bar"></div>
      <div class="loader-bar"></div>
      <div class="loader-ball"></div>
    </div>
  </div>
  <!-- Loader ends-->
  <!-- tap on top starts-->
  <div class="tap-top"><i data-feather="chevrons-up"></i></div>
  <!-- tap on tap ends-->
  <!-- page-wrapper Start-->
  <div class="page-wrapper compact-wrapper" id="pageWrapper">
    @section('menubar')
    <!-- Page Header Start-->
    <div class="page-header">
      <div class="header-wrapper row m-0"> 
        <div class="header-logo-wrapper col-auto p-0">
          <div class="logo-wrapper">
            <a href="{{ route('vibhag.admindashboard') }}">
              <img class="img-fluid" src="{{ asset('admin/assets/images/logo/logo.png') }}" alt=""> 
            </a>
            <span class="text-warning">RSSKDP</span>
          </div>
          <div class="toggle-sidebar">
            <div class="status_toggle sidebar-toggle d-flex">        
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g> 
                  <g> 
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M21.0003 6.6738C21.0003 8.7024 19.3551 10.3476 17.3265 10.3476C15.2979 10.3476 13.6536 8.7024 13.6536 6.6738C13.6536 4.6452 15.2979 3 17.3265 3C19.3551 3 21.0003 4.6452 21.0003 6.6738Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3467 6.6738C10.3467 8.7024 8.7024 10.3476 6.6729 10.3476C4.6452 10.3476 3 8.7024 3 6.6738C3 4.6452 4.6452 3 6.6729 3C8.7024 3 10.3467 4.6452 10.3467 6.6738Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M21.0003 17.2619C21.0003 19.2905 19.3551 20.9348 17.3265 20.9348C15.2979 20.9348 13.6536 19.2905 13.6536 17.2619C13.6536 15.2333 15.2979 13.5881 17.3265 13.5881C19.3551 13.5881 21.0003 15.2333 21.0003 17.2619Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3467 17.2619C10.3467 19.2905 8.7024 20.9348 6.6729 20.9348C4.6452 20.9348 3 19.2905 3 17.2619C3 15.2333 4.6452 13.5881 6.6729 13.5881C8.7024 13.5881 10.3467 15.2333 10.3467 17.2619Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                  </g>
                </g>
              </svg>
            </div>
          </div>
        </div>
        <div class="left-side-header col ps-0 d-none d-md-block">

        </div>
        <div class="nav-right col-10 col-sm-6 pull-right right-header p-0">
          <ul class="nav-menus">
            <li>
              <div class="mode animated backOutRight">
                <svg class="lighticon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g>
                    <g>                 
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M18.1377 13.7902C19.2217 14.8742 16.3477 21.0542 10.6517 21.0542C6.39771 21.0542 2.94971 17.6062 2.94971 13.3532C2.94971 8.05317 8.17871 4.66317 9.67771 6.16217C10.5407 7.02517 9.56871 11.0862 11.1167 12.6352C12.6647 14.1842 17.0537 12.7062 18.1377 13.7902Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </g>
                  </g>
                </svg>
                <svg class="darkicon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M17 12C17 14.7614 14.7614 17 12 17C9.23858 17 7 14.7614 7 12C7 9.23858 9.23858 7 12 7C14.7614 7 17 9.23858 17 12Z"></path>
                  <path d="M18.3117 5.68834L18.4286 5.57143M5.57144 18.4286L5.68832 18.3117M12 3.07394V3M12 21V20.9261M3.07394 12H3M21 12H20.9261M5.68831 5.68834L5.5714 5.57143M18.4286 18.4286L18.3117 18.3117" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
              </div>
            </li>
            <li class="profile-nav onhover-dropdown pe-0 py-0 me-0">
              <div class="media profile-media">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g> 
                    <g> 
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M9.55851 21.4562C5.88651 21.4562 2.74951 20.9012 2.74951 18.6772C2.74951 16.4532 5.86651 14.4492 9.55851 14.4492C13.2305 14.4492 16.3665 16.4342 16.3665 18.6572C16.3665 20.8802 13.2505 21.4562 9.55851 21.4562Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M9.55849 11.2776C11.9685 11.2776 13.9225 9.32356 13.9225 6.91356C13.9225 4.50356 11.9685 2.54956 9.55849 2.54956C7.14849 2.54956 5.19449 4.50356 5.19449 6.91356C5.18549 9.31556 7.12649 11.2696 9.52749 11.2776H9.55849Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                      <path d="M16.8013 10.0789C18.2043 9.70388 19.2383 8.42488 19.2383 6.90288C19.2393 5.31488 18.1123 3.98888 16.6143 3.68188" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                      <path d="M17.4608 13.6536C19.4488 13.6536 21.1468 15.0016 21.1468 16.2046C21.1468 16.9136 20.5618 17.6416 19.6718 17.8506" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </g>
                  </g>
                </svg>
              </div>
              <ul class="profile-dropdown onhover-show-div">
                <!--<li><a href="{{ route('vibhag.adminprofile.edit') }}"><i data-feather="user"></i><span>Edit Profile </span></a></li>-->
                <li><a href="{{ route('vibhag.adminLogout') }}"><i data-feather="log-in"> </i><span>Log Out</span></a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- Page Header Ends-->
    @show
    <!-- Page Body Start-->
    <div class="page-body-wrapper">
      @section('leftmenu')
      <!-- Page Sidebar Start-->
      <div class="sidebar-wrapper"> 
        <div>
          <div class="logo-wrapper"><a href="{{ route('vibhag.admindashboard') }}"><img class="img-fluid for-light" src="{{ asset('admin/assets/images/logo/small-logo.png') }}" alt=""><img class="img-fluid for-dark" src="{{ asset('admin/assets/images/logo/small-white-logo.png') }}" alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
          </div>
          <div class="logo-icon-wrapper"><a href="{{ route('vibhag.admindashboard') }}"><img class="img-fluid" src="{{ asset('admin/assets/images/logo-icon.png') }}" alt=""></a></div>
          <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
              <ul class="sidebar-links" id="simple-bar">
                <li class="back-btn"><a href="{{ route('vibhag.admindashboard') }}"><img class="img-fluid" src="{{ asset('admin/assets/images/logo-icon.png') }}" alt=""></a>
                  <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true">        </i></div>
                </li>
                <li class="sidebar-list">
                  <a class="sidebar-link sidebar-title link-nav" href="{{ route('vibhag.admindashboard') }}">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g>
                        <g> 
                          <path d="M9.07861 16.1355H14.8936" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M2.3999 13.713C2.3999 8.082 3.0139 8.475 6.3189 5.41C7.7649 4.246 10.0149 2 11.9579 2C13.8999 2 16.1949 4.235 17.6539 5.41C20.9589 8.475 21.5719 8.082 21.5719 13.713C21.5719 22 19.6129 22 11.9859 22C4.3589 22 2.3999 22 2.3999 13.713Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </g>
                      </g>
                    </svg>
                    <span class="">Dashboard</span>
                  </a>
                </li>
                
                <li class="sidebar-list">
                  <a class="sidebar-link sidebar-title link-nav" href="{{ route('ssv.admindashboard') }}">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g> 
                        <g> 
                          <path d="M6.07056 16.4588C6.07056 16.4588 6.88256 14.8218 8.06456 14.8218C9.24656 14.8218 9.85056 16.1968 11.1606 16.1968C12.4696 16.1968 13.9386 12.7488 15.4226 12.7488C16.9046 12.7488 17.9706 15.1398 17.9706 15.1398" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M10.1393 9.10487C10.1393 9.96487 9.44229 10.6629 8.58129 10.6629C7.72129 10.6629 7.02429 9.96487 7.02429 9.10487C7.02429 8.24487 7.72129 7.54688 8.58129 7.54688C9.44229 7.54788 10.1393 8.24487 10.1393 9.10487Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M2.75024 12C2.75024 18.937 5.06324 21.25 12.0002 21.25C18.9372 21.25 21.2502 18.937 21.2502 12C21.2502 5.063 18.9372 2.75 12.0002 2.75C5.06324 2.75 2.75024 5.063 2.75024 12Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </g>
                      </g>
                    </svg><span>SSV Report</span>
                  </a>
                </li>
                 <li class="sidebar-list">
                  <a class="sidebar-link sidebar-title link-nav" href="{{ route('pks.admindashboard') }}">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g> 
                        <g> 
                          <path d="M6.07056 16.4588C6.07056 16.4588 6.88256 14.8218 8.06456 14.8218C9.24656 14.8218 9.85056 16.1968 11.1606 16.1968C12.4696 16.1968 13.9386 12.7488 15.4226 12.7488C16.9046 12.7488 17.9706 15.1398 17.9706 15.1398" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M10.1393 9.10487C10.1393 9.96487 9.44229 10.6629 8.58129 10.6629C7.72129 10.6629 7.02429 9.96487 7.02429 9.10487C7.02429 8.24487 7.72129 7.54688 8.58129 7.54688C9.44229 7.54788 10.1393 8.24487 10.1393 9.10487Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M2.75024 12C2.75024 18.937 5.06324 21.25 12.0002 21.25C18.9372 21.25 21.2502 18.937 21.2502 12C21.2502 5.063 18.9372 2.75 12.0002 2.75C5.06324 2.75 2.75024 5.063 2.75024 12Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </g>
                      </g>
                    </svg><span>PKS Report</span>
                  </a>
                </li>
                <!--<li class="sidebar-list">-->
                <!--  <a class="sidebar-link sidebar-title link-nav" href="{{route('adminnews')}}">-->
                <!--    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                <!--      <g> -->
                <!--        <g> -->
                <!--          <path d="M12.0002 2.75C5.06324 2.75 2.75024 5.063 2.75024 12C2.75024 18.937 5.06324 21.25 12.0002 21.25C18.9372 21.25 21.2502 18.937 21.2502 12" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>-->
                <!--          <path fill-rule="evenodd" clip-rule="evenodd" d="M19.5285 4.30364V4.30364C18.5355 3.42464 17.0185 3.51664 16.1395 4.50964C16.1395 4.50964 11.7705 9.44464 10.2555 11.1576C8.73853 12.8696 9.85053 15.2346 9.85053 15.2346C9.85053 15.2346 12.3545 16.0276 13.8485 14.3396C15.3435 12.6516 19.7345 7.69264 19.7345 7.69264C20.6135 6.69964 20.5205 5.18264 19.5285 4.30364Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>-->
                <!--          <path d="M15.009 5.80078L18.604 8.98378" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>-->
                <!--        </g>-->
                <!--      </g>-->
                <!--    </svg><span>News</span>-->
                <!--  </a>-->
                <!--</li>-->
                <!--<li class="sidebar-list">-->
                <!--  <a class="sidebar-link sidebar-title link-nav" href="{{route('adminactivities')}}">-->
                <!--    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                <!--      <g> -->
                <!--        <g> -->
                <!--          <path d="M6.91699 14.854L9.90999 10.965L13.324 13.645L16.253 9.86499" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>-->
                <!--          <path fill-rule="evenodd" clip-rule="evenodd" d="M19.6671 2.3501C20.7291 2.3501 21.5891 3.2101 21.5891 4.2721C21.5891 5.3331 20.7291 6.1941 19.6671 6.1941C18.6051 6.1941 17.7451 5.3331 17.7451 4.2721C17.7451 3.2101 18.6051 2.3501 19.6671 2.3501Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>-->
                <!--          <path d="M20.7555 9.26898C20.8885 10.164 20.9495 11.172 20.9495 12.303C20.9495 19.241 18.6375 21.553 11.6995 21.553C4.76246 21.553 2.44946 19.241 2.44946 12.303C2.44946 5.36598 4.76246 3.05298 11.6995 3.05298C12.8095 3.05298 13.8005 3.11198 14.6825 3.23998" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>-->
                <!--        </g>-->
                <!--      </g>-->
                <!--    </svg><span>Resources</span>-->
                <!--  </a>-->
                <!--</li>-->
                <!--<li class="sidebar-list">-->
                <!--  <a class="sidebar-link sidebar-title link-nav" href="{{route('adminscheme')}}">-->
                <!--    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                <!--      <g> -->
                <!--        <g> -->
                <!--          <path d="M11.0791 13.8496H7.4314" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>-->
                <!--          <path d="M15.4774 12.1712H15.3752" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>-->
                <!--          <path d="M17.2081 15.5833H17.1059" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>-->
                <!--          <path d="M8.51392 2.21606C8.5206 2.93015 9.1058 3.50295 9.81989 3.49626H10.828C11.9306 3.48767 12.8328 4.37169 12.8481 5.47432V6.48148" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>-->
                <!--          <path fill-rule="evenodd" clip-rule="evenodd" d="M21.8121 13.8953C21.8121 8.33539 19.4255 6.48145 12.2646 6.48145C5.10271 6.48145 2.71606 8.33539 2.71606 13.8953C2.71606 19.4562 5.10271 21.3092 12.2646 21.3092C19.4255 21.3092 21.8121 19.4562 21.8121 13.8953Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>-->
                <!--        </g>-->
                <!--      </g>-->
                <!--    </svg><span>Insight</span>-->
                <!--  </a>-->
                <!--</li>-->
                <!--<li class="sidebar-list">-->
                <!--  <a class="sidebar-link sidebar-title link-nav" href="{{route('adminabout')}}">-->
                <!--    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                <!--      <g> -->
                <!--        <g> -->
                <!--          <path fill-rule="evenodd" clip-rule="evenodd" d="M21.2502 12C21.2502 18.937 18.9372 21.25 12.0002 21.25C5.06324 21.25 2.75024 18.937 2.75024 12C2.75024 5.063 5.06324 2.75 12.0002 2.75C18.9372 2.75 21.2502 5.063 21.2502 12Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>-->
                <!--          <path d="M12.0002 15.895V12" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>-->
                <!--          <path d="M12.0045 8.5H11.9955" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>-->
                <!--        </g>-->
                <!--      </g>-->
                <!--    </svg><span>Faq</span>-->
                <!--  </a>-->
                <!--</li>-->
                <!--<li class="sidebar-list">-->
                <!--  <a class="sidebar-link sidebar-title link-nav" href="{{route('admincontent')}}">-->
                <!--    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                <!--      <g> -->
                <!--        <g> -->
                <!--          <path d="M13.3352 19.5078H19.7122" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>-->
                <!--          <path fill-rule="evenodd" clip-rule="evenodd" d="M16.0578 4.85901V4.85901C14.7138 3.85101 12.8078 4.12301 11.7998 5.46601C11.7998 5.46601 6.78679 12.144 5.04779 14.461C3.30879 16.779 4.95379 19.651 4.95379 19.651C4.95379 19.651 8.19779 20.397 9.91179 18.112C11.6268 15.828 16.6638 9.11701 16.6638 9.11701C17.6718 7.77401 17.4008 5.86701 16.0578 4.85901Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>-->
                <!--          <path d="M10.5042 7.21143L15.3682 10.8624" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>-->
                <!--        </g>-->
                <!--      </g>-->
                <!--    </svg><span>Content</span>-->
                <!--  </a>-->
                <!--</li>-->
                <!--<li class="sidebar-list">-->
                <!--  <a class="sidebar-link sidebar-title link-nav" href="{{route('vibhag.report')}}">-->
                <!--    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                <!--      <g>-->
                <!--        <g>-->
                <!--          <path fill-rule="evenodd" clip-rule="evenodd" d="M2.75024 12C2.75024 5.063 5.06324 2.75 12.0002 2.75C18.9372 2.75 21.2502 5.063 21.2502 12C21.2502 18.937 18.9372 21.25 12.0002 21.25C5.06324 21.25 2.75024 18.937 2.75024 12Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>-->
                <!--          <path d="M15.2045 13.8999H15.2135" stroke="#130F26" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>-->
                <!--          <path d="M12.2045 9.8999H12.2135" stroke="#130F26" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>-->
                <!--          <path d="M9.19557 13.8999H9.20457" stroke="#130F26" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>-->
                <!--        </g>-->
                <!--      </g>-->
                <!--    </svg><span>Report</span>-->
                <!--  </a>-->
                <!--</li>-->
                
              </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
          </nav>
        </div>
      </div>
      @show

      @yield('content')

      @section('footerbar')
      <!-- footer start-->
      <footer class="footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 footer-copyright text-center">
              <p class="mb-0">Copyright {{ date('Y') }} © Mcware Technologies  </p>
            </div>
          </div>
        </div>
      </footer>
      @show

    </div>

  </div>

  <!-- latest jquery-->
  <script src="{{ asset('admin/assets/js/jquery-3.5.1.min.js') }}"></script>
  <!-- Bootstrap js-->
  <script src="{{ asset('admin/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
  <!-- feather icon js-->
  <script src="{{ asset('admin/assets/js/icons/feather-icon/feather.min.js') }}"></script>
  <script src="{{ asset('admin/assets/js/icons/feather-icon/feather-icon.js') }}"></script>
  <!-- scrollbar js-->
  <script src="{{ asset('admin/assets/js/scrollbar/simplebar.js') }}"></script>
  <script src="{{ asset('admin/assets/js/scrollbar/custom.js') }}"></script>
  <!-- Sidebar jquery-->
  <script src="{{ asset('admin/assets/js/config.js') }}"></script>
  <!-- Plugins JS start-->
  <script src="{{ asset('admin/assets/js/sidebar-menu.js') }}"></script>

  <script src="{{ asset('admin/assets/js/notify/bootstrap-notify.min.js') }}"></script>
  <script src="{{ asset('admin/assets/js/notify/index.js') }}"></script>
  <script src="{{ asset('admin/assets/js/height-equal.js') }}"></script>
  @section('footerbar_script')
  @show

  <!-- Plugins JS Ends-->
  <!-- Theme js-->
  <script src="{{asset('admin/assets/js/toasts/toasts-custom.js')}}"></script>
  <script src="{{ asset('admin/assets/js/script.js') }}"></script>
  <script src="{{ asset('admin/assets/js/theme-customizer/customizer.js') }}"></script>
  <!-- login js-->
  <!-- Plugin used-->

</body>
</html>
@show