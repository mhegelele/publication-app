                          <!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>NIMR | PDB</title>
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
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/card.css')}}">    <link rel="stylesheet" href="{{ url('css/icons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/datatables.min.css')}}"/>
    <!-- <link rel="stylesheet" href="{{ url('css/responsee.css')}}"> -->
    <link rel="stylesheet" href="{{ url('owl-carousel/owl.carousel.css')}}">
    <!-- <link rel="stylesheet" href="{{ url('owl-carousel/owl.theme.css')}}">      -->
    <!-- <link rel="stylesheet" href="{{ url('css/template-style.css')}}"> -->
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
 
    <script type="text/javascript" src="{{ url('js/jquery-2.1.1.js')}}"></script>
    <script type="text/javascript" src="{{ url('js/jquery-ui.min.js')}}"></script>
      <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
       <!--<script>tinymce.init({ selector:'.wysiwyg' });</script> -->
      <script type="text/javascript">

function CheckColors(val){
 var element=document.getElementById('institute');
 if(val=='others')
   element.style.display='block';
 else  
   element.style.display='none';
}
function CheckResearch(val){
 var element=document.getElementById('reserch');
 if(val=='others')
   element.style.display='block';
 else  
   element.style.display='none';
}

      </script>
<style type="text/css">
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
 .statistics{
  text-align: center;
  min-height: 360px;
  margin-top: 50px;
  /*border: 1px solid #b6b6b6;*/
  margin-top: 50px;
  padding-top: 60px;
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
 
  
  width:300px;
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

#institute{
  margin-top: 7px;
  border: 2px solid black;
  width: 100%;
    padding: 10px 18px;
  border-radius: 4px;
}
/*.citation{
  border-bottom: 2px solid #289dcc;
  border-left: 2px solid #289dcc;
  border-radius-left:2px;
}*/
</style>

<!-- </style>   -->
<body>
  <div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>

    <!-- HEADER -->
    <header id="header">
    <div class="row">
     
      <div class="col-lg-12 col-md-12 col-sm-12" >
        <div class="header_bottom">
<img alt="BANNER" src="{{ url('images/logo3.jpg')}}"class="img-responsive">
           </div>
      </div>
    </div>
  </header>
  <section id="navArea"  >
    <nav class="navbar navbar-inverse " role="navigation" >
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav main_nav">
          @if(Auth::check())
             <li class="{{ Request::segment(1) === 'home' ? 'active' : null }}">
              <a href="{{ url('')}}"><span class="fa fa-home desktop-home"></span><span class="mobile-show">Home</span></a>
            </li>
                    <li class="{{ Request::segment(1) === 'add-publication' ? 'active' : null }}" >
                      <a href="{{url('add-publication')}}">Add Publication</a>
                    </li>
                    <li class="{{ Request::segment(1) === 'uploaded-publication' ? 'active' : null }}">
                      <a href="{{url('uploaded-publication')}}">Uploaded Publications</a>
                    </li>
            @if(Auth::user()->level === 1)
            <li class="{{ Request::segment(1) === 'manage' ? 'active' : null }}">
              <a href="{{url('manage')}}">Manage</a>
            </li>
            <!-- <li><a href="{{url('test')}}">Test</a></li> -->
            @endif
            <li><a href="{{url('logout')}}">Logout</a></li>
          @else
           <li class="active"><a href="{{ url('')}}"><span class="fa fa-home desktop-home"></span><span class="mobile-show">Home</span></a></li>
           <li class="nav-right"><a href="{{ url('login')}}">Login</a></li>  
            <!-- <li><a href="{{url('register')}}">Register</a></li> -->
          @endif
                
        </ul>


      </div>
    </nav>

  </section>
 <!-- MAIN -->
    <!-- <main role="main">     -->
      <!-- Main Header -->
      <!-- <div id="content-wrapper">         -->
      @yield('content')
 <!--      </div> -->
      
    <!-- </main> -->
    
    <!-- FOOTER -->
    <footer id="footer">
<div class="footer_top">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="footer_widget wow fadeInLeftBig">
          <h2>Physical Address</h2>
      <div class="margin-left-70 margin-bottom-30">
                <p>National Institute for Medical Research<br>
                   3 Barack Obama Drive<br>
                   P.O Box 9653<br>11101 Dar es Salaam, <br> Tanzania
                </p>               
              </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="footer_widget wow fadeInDown">
            <h2>Email Address</h2>
                         <div class="float-left">
                </div>
              <div class="margin-left-70 margin-bottom-30">
                  <p>hq@nimr.or.tz<br>info@nimr.or.tz
                  </p>           
              </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="footer_widget wow fadeInRightBig">
            <h2>Contact numbers</h2>
             <strong>Tel:</strong>  +255 22 2121400  <br>
                     <strong>Fax:</strong> +255 22 2121360
                  </p>           
          </div>
        </div>
      </div>
    </div>
    <div class="footer_bottom">
      <p class="copyright"> &copy; 2019 <a href="">National Institute for Medical Research</a></p>
      <p class="developer">Developed By Alice Jonathan: Contact 0717-592556</p>
    </div>

    </footer>
    <script src="{{ url('assets/js/jquery.min.js')}}"></script> 
<script src="{{ url('assets/js/wow.min.js')}}"></script> 
<script src="{{ url('assets/js/bootstrap.min.js')}}"></script> 
<script src="{{ url('assets/js/slick.min.js')}}"></script> 
<script src="{{ url('assets/js/jquery.li-scroller.1.0.js')}}"></script> 
<script src="{{ url('assets/js/jquery.newsTicker.min.js')}}"></script> 
<script src="{{ url('assets/js/jquery.fancybox.pack.js')}}"></script> 
<script src="{{ url('assets/js/custom.js')}}"></script>
<script type="text/javascript" src="{{ url('js/responsee.js')}}"></script>

    <script type="text/javascript" src="{{ url('js/responsee.js')}}"></script>
    <!-- <script type="text/javascript" src="{{ url('js/chart.min.js')}}"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.js"></script>
    <script type="text/javascript" src="{{ url('owl-carousel/owl.carousel.js')}}"></script>
    <script type="text/javascript" src="{{ url('js/custom.js')}}"></script>
    <script type="text/javascript" src="{{ url('js/template-scripts.js')}}"></script>
    <script type="text/javascript" src="{{ url('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{ url('js/datatables.min.js')}}"></script>
    @yield('add_script')
  </body>
</html>