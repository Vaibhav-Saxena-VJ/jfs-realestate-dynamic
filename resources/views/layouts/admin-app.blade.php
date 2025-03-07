<!DOCTYPE html>
<html lang="en" data-textdirection="ltr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <meta name="csrf-token" content="GdyPYOKZAR3FMLesHiRNpzvZDkKB9Th0na5rBXoI">

 @auth
 
 @php
 $user=Auth::user();
 $role=$user->role_id;
 @endphp
 
 @if($role==4)
  <title>Associate Portal - JFinserv</title>
 @else
  <title>Admin Portal - JFinserv</title>
 @endif
 
 @endauth
 
  <!-- <link rel="shortcut icon" type="image/x-icon" href="images\logo\favicon.ico"> -->
  <link rel="icon" href="{{config('app.baseURL')}}/images/logo/fav.png" type="image/x-icon">
<script type="text/javascript" src="{{asset('assets\js\jquery.min.js')}}"></script>
<link href="{{asset('assets/summernote/summernote-bs4.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600')}}">
  <link rel="stylesheet" href="{{asset('vendors\css\vendors.min.css?id=a09a0e3f1b4a384cbbce')}}">
  <link rel="stylesheet" href="{{asset('vendors\css\ui\prism.min.css?id=2b6ec658f3078cb5a481')}}">

  <!-- vendor css files -->
  <link rel="stylesheet" href="{{asset('vendors\css\charts\apexcharts.css?id=d3b53e6191f8e9844532')}}">
  <link rel="stylesheet" href="{{asset('vendors\css\extensions\tether-theme-arrows.css?id=2399fd15ec68bd930226')}}">
  <link rel="stylesheet" href="{{asset('vendors\css\extensions\tether.min.css?id=62155a3948cbf17b1bf4')}}">
  <link rel="stylesheet" href="{{asset('vendors\css\extensions\shepherd-theme-default.css?id=b6c8ae91da678dcf5c4c')}}">

  <link rel="stylesheet" href="{{asset('css\bootstrap.css?id=98c1b5bba782c43d2bc3')}}">
  <link rel="stylesheet" href="{{asset('css\bootstrap-extended.css?id=b2e120f2146fa76154fd')}}">
  <link rel="stylesheet" href="{{asset('css\colors.css?id=a0cd3dcd259da4263102')}}">
  <link rel="stylesheet" href="{{asset('css\components.css?id=5a2f2ed465a9eb244d13')}}">
  <link rel="stylesheet" href="{{asset('css\themes\dark-layout.css?id=9bb62817ffd3425a9f65')}}">
  <link rel="stylesheet" href="{{asset('css\themes\semi-dark-layout.css?id=a01d87d1930befd3f900')}}">

<!--   <link rel="stylesheet" href="{{asset('vendors\css\editors\quill\katex.min.css?id=5b2eab19f157133d8b2f')}}">
  <link rel="stylesheet" href="{{asset('vendors\css\editors\quill\monokai-sublime.min.css?id=2bd355b6557c287e187e')}}">
  <link rel="stylesheet" href="{{asset('vendors\css\editors\quill\quill.snow.css?id=2ee7ff53f78832309fa9')}}">
  <link rel="stylesheet" href="{{asset('vendors\css\editors\quill\quill.bubble.css?id=bb254c78f1a4bb92e692')}}"> -->
   
    <link rel="stylesheet" href="{{asset('vendors\css\tables\datatable\datatables.min.css?id=5a73106bc8032d95933a')}}">

<link rel="stylesheet" href="{{asset('vendors\css\forms\select\select2.min.css?id=9f54e6414f87e0d14b9e')}}">

  <link rel="stylesheet" href="{{asset('css\core\menu\menu-types\vertical-menu.css?id=31d588213cea00d082ab')}}">
  <link rel="stylesheet" href="{{asset('css\core\colors\palette-gradient.css?id=481306dac133dfb42a7b')}}">
   <!--<link href="{{asset('assets\css\toaster.css')}}" rel="stylesheet" type="text/css" media="all">-->
   <link rel="stylesheet" href="{{asset('css/toaster.css')}}" rel="stylesheet" type="text/css" media="all">
  <!-- Page css files -->
  <link rel="stylesheet" href="{{asset('css\pages\dashboard-analytics.css?id=b17eb3726287a7ca7bfd')}}">
  <link rel="stylesheet" href="{{asset('css\pages\card-analytics.css?id=f7ad7dc3d53f6ce16623')}}">
  <link rel="stylesheet" href="{{asset('css\plugins\tour\tour.css?id=b04a8f8d2fc18ca33a5a')}}">
  
  <link rel="stylesheet" href="{{asset('css\custom-laravel.css?id=f796e995f1ed0a769668')}}">
<!-- <script type="text/javascript" src="{{asset('assets\js\jquery.min.js')}}"></script> -->
  <style type="text/css">
    .tippy-popper{
      display: none !important;
    }
    .ql-editor {
    height: 200px;
    }
    #dashboard-analytics .bg-analytics {
    background: linear-gradient(118deg,#1e90ff,rgba(30, 144, 255, 0.7));
}
.nav-item a:hover{
     background: linear-gradient(118deg,#1e90ff,rgba(30, 144, 255, 0.7));
}
body.vertical-layout.vertical-menu-modern.menu-expanded .footer {
     margin-left: 10%;
}
/*.footer {   */
/*   position:fixed;*/
/*   left:0px;*/
/*   bottom:0px;*/
/*   height:30px;*/
/*   width:100%;*/
/*   margin-bottom:30px;*/

/*}*/

/* IE 6 */
* html .footer {
   position:absolute;
   top:expression((0-(footer.offsetHeight)+(document.documentElement.clientHeight ? document.documentElement.clientHeight : document.body.clientHeight)+(ignoreMe = document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop))+'px');
}
  </style>
</head>

<body class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static menu-expanded pace-done" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="dark-layout" data-shepherd-step="step-1">
 <div class="app-content content">
   @yield('content')
   <div class="app-content content">


     <script src="{{asset('vendors\js\vendors.min.js?id=0eef70ca571453be304a')}}"></script>
     <script src="vendors\js\ui\prism.min.js?id=fde910813cf7141eae50')}}"></script>
     <!-- vendor files -->
     <script src="{{asset('vendors\js\charts\apexcharts.min.js?id=bbb1adadc937c1636f35')}}"></script>
     <script src="{{asset('vendors\js\extensions\tether.min.js?id=1c4a5999a2b43cdd3aaa')}}"></script>
     <script src="{{asset('vendors\js\extensions\shepherd.min.js?id=60f87e0f49e292c0ba2c')}}"></script>

     <script src="{{asset('js\core\app-menu.js?id=1af0c508d476f944cf3c')}}"></script>
     <script src="{{asset('js\core\app.js?id=405ccce09a9af4e90cff')}}"></script>
     <script src="{{asset('js\scripts\components.js?id=2ab188ae0fa7b622cdb1')}}"></script>
     <script src="{{asset('js\scripts\customizer.js?id=bd6e1f733770a42402a7')}}"></script>
     <script src="{{asset('js\scripts\footer.js?id=b382ec364916c35eff84')}}"></script>
     <!--<script type="text/javascript" src="{{asset('assets\js\toaster.min.js')}}"></script>-->
      <script type="text/javascript" src="{{config('app.baseURL')}}/js/toaster.min.js"></script>
     
     <!-- Page js files -->
     <script src="{{asset('js\scripts\pages\dashboard-analytics.js?id=6ef85083f3c1840937ad')}}"></script>

     <!-- vendor files -->
<!--      <script src="{{asset('vendors\js\editors\quill\katex.min.js?id=51236ca553d5c37c4690')}}"></script>
     <script src="{{asset('vendors\js\editors\quill\highlight.min.js?id=8e417c082a73a048c1d7')}}"></script>
     <script src="{{asset('vendors\js\editors\quill\quill.min.js?id=c2734fd6895bdfba1324')}}"></script> -->
     <script src="{{asset('vendors\js\extensions\jquery.steps.min.js?id=4c5e9f4e84d32b7df69a')}}"></script>
     <script src="{{asset('vendors\js\forms\validation\jquery.validate.min.js?id=aad785d450d475b0fd63')}}"></script>
<script src="{{asset('js\scripts\forms\select\form-select2.js?id=0d4bdc2132f9a7397ee3')}}"></script>


     <!-- Page js files -->
     <!-- <script src="{{asset('js\scripts\editors\editor-quill.js?id=691c662cfbbea80edac3')}}"></script> -->

     <script src="{{asset('js\scripts\datatables\datatable.js?id=6ff59147c9820a80f8ea')}}"></script>


        <script src="{{asset('vendors\js\tables\datatable\datatables.min.js?id=97fd6a774fc6211e7619')}}"></script>
       
        <script src="{{asset('vendors\js\tables\datatable\buttons.bootstrap.min.js?id=77c8d7c4b64bceb0251c')}}"></script>
        <script src="{{asset('vendors\js\tables\datatable\datatables.bootstrap4.min.js?id=b63fdeeb4941fd4cab8a')}}"></script>

<script src="{{asset('assets/summernote/summernote-bs4.min.js')}}"></script>

<script src="{{asset('js/scripts/datatables/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('js/scripts/datatables/jszip.min.js')}}"></script>
<script src="{{asset('js/scripts/datatables/pdfmake.min.js')}}"></script>
<script src="{{asset('js/scripts/datatables/vfs_fonts.js')}}"></script>
<script src="{{asset('js/scripts/datatables/buttons.html5.min.js')}}"></script>
<script src="{{asset('js/scripts/datatables/buttons.print.min.js')}}"></script>


     <script>
       @if(Session::has('message'))
       var type = "{{ Session::get('alert-type', 'info') }}";
       switch(type){
        case 'info':
        toastr.info("{{ Session::get('message') }}");
        break;

        case 'warning':
        toastr.warning("{{ Session::get('message') }}");
        break;
        case 'success':
        toastr.success("{{ Session::get('message') }}");
        break;
        case 'error':
        toastr.error("{{ Session::get('message') }}");
        break;
      }
      @endif
    </script>

  </body>
  </html>