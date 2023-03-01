<!doctype html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
<title>Pembayaran SPP</title>
<link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->
<link rel="stylesheet" href="{{ asset('/') }}plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('/') }}plugins/jvectormap/jquery-jvectormap-2.0.3.min.css"/>
<link rel="stylesheet" href="{{ asset('/') }}plugins/charts-c3/plugin.css"/>

<link rel="stylesheet" href="{{ asset('/') }}plugins/morrisjs/morris.min.css" />
<link rel="stylesheet" href="{{ asset('/') }}plugins/jquery-datatable/dataTables.bootstrap4.min.css">

<link  rel="stylesheet" href="{{ asset('/') }}plugins/bootstrap/css/bootstrap.min.css">
<!-- Morris Chart Css-->
<link rel="stylesheet" href="{{ asset('/') }}plugins/morrisjs/morris.css" />
<!-- Colorpicker Css -->
<link rel="stylesheet" href="{{ asset('/') }}plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" />
<!-- Multi Select Css -->
<link rel="stylesheet" href="{{ asset('/') }}plugins/multi-select/css/multi-select.css">
<!-- Bootstrap Spinner Css -->
<link rel="stylesheet" href="{{ asset('/') }}plugins/jquery-spinner/css/bootstrap-spinner.css">
<!-- Bootstrap Tagsinput Css -->
<link rel="stylesheet" href="{{ asset('/') }}plugins/bootstrap-tagsinput/bootstrap-tagsinput.css">
<!-- Bootstrap Select Css -->
<link rel="stylesheet" href="{{ asset('/') }}plugins/bootstrap-select/css/bootstrap-select.css" />
<!-- noUISlider Css -->
<link rel="stylesheet" href="{{ asset('/') }}plugins/nouislider/nouislider.min.css" />
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('/') }}plugins/select2/select2.css" />
<!-- Custom Css -->
<link rel="stylesheet" href="{{ asset('/') }}css/style.min.css">
<style>
    section.content{margin:20px 0px 20px 260px}
</style>
</head>

<body class="theme-blush">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="{{ asset('/') }}images/logo.png" width="48" height="48" alt="Aero"></div>
        <p class="mt-3">Sedang Loading ....</p>
    </div>
</div>

<!-- Overlay For Sidebars -->
<div class="overlay"></div>


<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        @if (Auth::user()->level == 'admin')
            <a href="/admin"><img src="{{ asset('/') }}images/logo.png" width="40" alt="Aero"><span class="m-l-10">Pembayaran SPP</span></a>   
        @else
            <a href="/petugas"><img src="{{ asset('/') }}images/logo.png" width="40" alt="Aero"><span class="m-l-10">Pembayaran SPP</span></a>
        @endif
    </div>
    <div class="menu">
        <ul class="list">
            
            <li>
               <div class="user-info">
                  @if (Auth::user()->level == 'admin')
                  <a class="image" href="/admin/profile/{{ Auth::user()->id }}"><img src="{{ asset('/') }}images/profile.jpg" alt="User"></a>
                  @elseif(Auth::user()->level == 'petugas')
                  <a class="image" href="/petugas/profile/{{ Auth::user()->id }}"><img src="{{ asset('/') }}images/profile.jpg" alt="User"></a>
                  @endif
                  <div class="detail">
                      <h4>{{ Auth::user()->name }}</h4>
                      <small>{{ Auth::user()->level }}</small>                        
                  </div>
              </div>
            </li>
            @if (Auth::user()->level == 'admin')
               <li class="@if(Route::is('profile')) active @endif"><a href="/admin/profile/{{ Auth::user()->id }}"><i class="zmdi zmdi-account-circle"></i><span>Profile Saya</span></a></li><hr>
               <li class="@if(Route::is('home')) active @endif"><a href="/admin"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
               <li class="@if(Route::is('petugas')) active @endif"><a href="/admin/petugas"><i class="zmdi zmdi-accounts-alt"></i><span>Petugas</span></a></li>
               <li class="@if(Route::is('kelas')) active @endif"><a href="/admin/kelas"><i class="zmdi zmdi-layers"></i><span>Kelas</span></a></li>
               <li class="@if(Route::is('spp')) active @endif"><a href="/admin/spp"><i class="zmdi zmdi-folder-star"></i><span>Spp</span></a></li>
               <li class="@if(Route::is('siswa')) active @endif"><a href="/admin/siswa"><i class="zmdi zmdi-accounts-alt"></i><span>Siswa</span></a></li>
               <li class="@if(Route::is('pembayaran')) active @endif"><a href="/admin/pembayaran"><i class="zmdi zmdi-money-box"></i><span>Pembayaran</span></a></li>
               <li class="@if(Route::is('laporan')) active @endif"><a href="/admin/laporan"><i class="zmdi zmdi-file-text"></i><span>Laporan</span></a></li>
               <li><a href="javascript:void(0);" class="js-right-sidebar" title="Setting"><i class="zmdi zmdi-settings zmdi-hc-spin"></i><span>Setting</span></a></li>
               <li>
                <a class=" mega-menu"title="Sign Out" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                   <i class="zmdi zmdi-power"></i><span>Logout</span>
               </a>
       
               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                   @csrf
               </form>
             </li>   
            @elseif(Auth::user()->level == 'petugas')

               <li class="@if(Route::is('profile')) active @endif"><a href="/petugas/profile/{{ Auth::user()->id }}"><i class="zmdi zmdi-account-circle"></i><span>Profile Saya</span></a></li><hr>
               <li class="@if(Route::is('home')) active @endif"><a href="/petugas"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
               <li class="@if(Route::is('kelas')) active @endif"><a href="/petugas/kelas"><i class="zmdi zmdi-layers"></i><span>Kelas</span></a></li>
               <li class="@if(Route::is('spp')) active @endif"><a href="/petugas/spp"><i class="zmdi zmdi-folder-star"></i><span>Spp</span></a></li>
               <li class="@if(Route::is('siswa')) active @endif"><a href="/petugas/siswa"><i class="zmdi zmdi-accounts-alt"></i><span>Siswa</span></a></li>
               <li class="@if(Route::is('pembayaran')) active @endif"><a href="/petugas/pembayaran"><i class="zmdi zmdi-money-box"></i><span>Pembayaran</span></a></li>
               <li class="@if(Route::is('laporan')) active @endif"><a href="/petugas/laporan"><i class="zmdi zmdi-file-text"></i><span>Laporan</span></a></li>
               <li><a href="javascript:void(0);" class="js-right-sidebar" title="Setting"><i class="zmdi zmdi-settings zmdi-hc-spin"></i><span>Setting</span></a></li>
               <li>
                  <a class=" mega-menu"title="Sign Out" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                     <i class="zmdi zmdi-power"></i><span>Logout</span>
                 </a>
         
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                 </form>
               </li>  
            @endif
            
            
        </ul>
    </div>
</aside>

<!-- Right Sidebar -->
<aside id="rightsidebar" class="right-sidebar">
   <ul class="nav nav-tabs sm">
       <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#setting"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a></li>
       <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#chat"><i class="zmdi zmdi-comments"></i></a></li>
   </ul>
   <div class="tab-content">
       <div class="tab-pane active" id="setting">
           <div class="slim_scroll">
               <div class="card">
                   <h6>Theme Option</h6>
                   <div class="light_dark">
                       <div class="radio">
                           <input type="radio" name="radio1" id="lighttheme" value="light" checked="">
                           <label for="lighttheme">Light Mode</label>
                       </div>
                       <div class="radio mb-0">
                           <input type="radio" name="radio1" id="darktheme" value="dark">
                           <label for="darktheme">Dark Mode</label>
                       </div>
                   </div>
               </div>
               <div class="card">
                   <h6>Color Skins</h6>
                   <ul class="choose-skin list-unstyled">
                       <li data-theme="purple"><div class="purple"></div></li>
                       <li data-theme="blue"><div class="blue"></div></li>
                       <li data-theme="cyan"><div class="cyan"></div></li>
                       <li data-theme="green"><div class="green"></div></li>
                       <li data-theme="orange"><div class="orange"></div></li>
                       <li data-theme="blush" class="active"><div class="blush"></div></li>
                   </ul>                                        
               </div>
               <div class="card">
                   <h6>General Settings</h6>
                   <ul class="setting-list list-unstyled">
                       <li>
                           <div class="checkbox rtl_support">
                               <input id="checkbox1" type="checkbox" value="rtl_view">
                               <label for="checkbox1">RTL Version</label>
                           </div>
                       </li>
                       <li>
                           <div class="checkbox ms_bar">
                               <input id="checkbox2" type="checkbox" value="mini_active">
                               <label for="checkbox2">Mini Sidebar</label>
                           </div>
                       </li>
                       <li>
                           <div class="checkbox">
                               <input id="checkbox3" type="checkbox" checked="">
                               <label for="checkbox3">Notifications</label>
                           </div>                        
                       </li>
                       <li>
                           <div class="checkbox">
                               <input id="checkbox4" type="checkbox">
                               <label for="checkbox4">Auto Updates</label>
                           </div>
                       </li>
                       <li>
                           <div class="checkbox">
                               <input id="checkbox5" type="checkbox" checked="">
                               <label for="checkbox5">Offline</label>
                           </div>
                       </li>
                       <li>
                           <div class="checkbox">
                               <input id="checkbox6" type="checkbox" checked="">
                               <label for="checkbox6">Location Permission</label>
                           </div>
                       </li>
                   </ul>
               </div>                
           </div>                
       </div>  
   </div>
</aside>

<!-- Main Content -->

<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>@yield('page')</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item active">@yield('page')</li>
                </ul>
                <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
            </div>
            {{-- <div class="col-lg-5 col-md-6 col-sm-12">                
                <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
            </div> --}}
        </div>
    </div>
    <div class="container-fluid">
       @yield('content')
    </div>
</section>




<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>


<!-- Jquery Core Js --> 
<script src="{{ asset('/') }}bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) --> 
<script src="{{ asset('/') }}bundles/vendorscripts.bundle.js"></script> <!-- slimscroll, waves Scripts Plugin Js -->

<script src="{{ asset('/') }}bundles/jvectormap.bundle.js"></script> <!-- JVectorMap Plugin Js -->
<script src="{{ asset('/') }}bundles/sparkline.bundle.js"></script> <!-- Sparkline Plugin Js -->
<script src="{{ asset('/') }}bundles/c3.bundle.js"></script>

<script src="{{ asset('/') }}bundles/mainscripts.bundle.js"></script>
<script src="{{ asset('/') }}js/pages/index.js"></script>
<script src="{{ asset('/') }}js/admin.js"></script>
<script src="{{ asset('/') }}js/demo.js"></script>
<script src="{{ asset('/') }}js/fullscreen.js"></script>
<!-- Jquery Core Js --> 
<script src="{{ asset('/') }}bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 
<script src="{{ asset('/') }}bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 

<!-- Jquery DataTable Plugin Js --> 
<script src="{{ asset('/') }}bundles/datatablescripts.bundle.js"></script>
<script src="{{ asset('/') }}plugins/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
<script src="{{ asset('/') }}plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('/') }}plugins/jquery-datatable/buttons/buttons.colVis.min.js"></script>
<script src="{{ asset('/') }}plugins/jquery-datatable/buttons/buttons.flash.min.js"></script>
<script src="{{ asset('/') }}plugins/jquery-datatable/buttons/buttons.html5.min.js"></script>
<script src="{{ asset('/') }}plugins/jquery-datatable/buttons/buttons.print.min.js"></script>
<script src="{{ asset('/') }}plugins/bootstrap/js/bootstrap.min.js"></script>

<script src="{{ asset('/') }}bundles/mainscripts.bundle.js"></script><!-- Custom Js --> 
<script src="{{ asset('/') }}js/pages/tables/jquery-datatable.js"></script>
<script src="{{ asset('/') }}plugins/select2/select2.min.js"></script> <!-- Select2 Js -->
<script src="{{ asset('/') }}js/bootstrap.js"></script> <!-- Select2 Js -->

</body>
</html>