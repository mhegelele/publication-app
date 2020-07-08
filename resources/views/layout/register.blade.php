
<!DOCTYPE html>
<html>
    
<head>
  <title>NIMR PUBLICATIONS</title>

  
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="{{ url('assets/css/bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/font-awesome.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('css/datatables.min.css')}}"/>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/font.css')}}">
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/li-scroller.css')}}">
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/slick.css')}}">
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/jquery.fancybox.css')}}">
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/theme.css')}}">
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/style.css')}}">
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/reg.css')}}">
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/card.css')}}">
 <script type="text/javascript" src="{{ url('js/jquery-2.1.1.js')}}"></script>
    <script type="text/javascript" src="{{ url('js/jquery-ui.min.js')}}"></script>
      <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<style> 
.search1 input[type=text] {
  width: 200px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
  background-color: white;
  background-image: url('searchicon.png');
  background-position: 10px 10px; 
  background-repeat: no-repeat;
  padding: 8px 15px 8px 30px;
  -webkit-transition: width 0.4s ease-in-out;
  transition: width 0.4s ease-in-out;
}

.search1 input[type=text]:focus {
  width: 70%;
}

.button1 {
  /* background-color: #4CAF50; Green */
  background-color: #2F76A5;
  border: none;
  color: white;
  padding: 8px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 18px;
  border-radius: 4px;
  margin: 4px 2px;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  cursor: pointer;
}
.button1:hover {
  background-color: #3e8e41;
}
.centers ul {
 
  list-style-type: none;
}
 
.centers li {
  
  float: left;
  margin-right: 0px;
    list-style-type: none;
	color:white;
	text-decoration: none;
	  display: block;
  padding-right: 50px;
}
 
.centers  li:last-child {
  
}
 
.centers li a {
 
  
  width:350px;
    display: block
  font: 20ps;

  padding-top:20px;
  padding-right:60px;
  text-transform: uppercase;

 
}
 .citation{
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;
  /*border-radius: 5px;*/
  box-shadow:1px 1px 2px #002633;
  border-left:4px solid #002633;
  padding: 5px 10px;
  margin-top: 15px;
}
.centers  li a:hover {
   background-color:#e7e7e7;
   color:black;
}
 
.nimr-center{
     width:100%;
     font-size: 20sp;
     padding: 5px;
     text-transform: uppercase;
    
}

</style>
</head>

<body>
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="fluid_container">
   <div class="container">
<div class="card-reg card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card-reg" src="{{ url('images/NIMRI.png')}}" />
	<!-- <div class="fluid_container"> -->
	
         @yield('content')
    <!-- </div> -->
   
<script src="{{ url('assets/js/jquery.min.js')}}"></script> 
<script src="{{ url('assets/js/wow.min.js')}}"></script> 
<script src="{{ url('assets/js/bootstrap.min.js')}}"></script> 
<script src="{{ url('assets/js/slick.min.js')}}"></script> 
<script src="{{ url('assets/js/jquery.li-scroller.1.0.js')}}"></script> 
<script src="{{ url('assets/js/jquery.newsTicker.min.js')}}"></script> 
<script src="{{ url('assets/js/jquery.fancybox.pack.js')}}"></script> 
<script src="{{ url('assets/js/custom.js')}}"></script>
<script type="text/javascript" src="{{ url('js/responsee.js')}}"></script>
    <!-- <script type="text/javascript" src="{{ url('js/chart.min.js')}}"></script>
    /<script src="https://cdnjs.clou -->
    <script type="text/javascript" src="{{ url('owl-carousel/owl.carousel.js')}}"></script>
    <script type="text/javascript" src="{{ url('js/custom.js')}}"></script>
    <script type="text/javascript" src="{{ url('js/template-scripts.js')}}"></script>
    <script type="text/javascript" src="{{ url('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{ url('js/datatables.min.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

    @yield('add_script')
</body>
</html>
