
<!DOCTYPE html>
<html>
    
<head>
  <title>NIMR PUBLICATIONS</title>

     <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/font-awesome.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/font.css')}}">
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/li-scroller.css')}}">
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/slick.css')}}">
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/jquery.fancybox.css')}}">
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/theme.css')}}">
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/style.css')}}">
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/reg.css')}}">
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/card.css')}}">
</head>

<body>
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
  <div class="container">
  
        <div class="card card-container">
           
            <img id="profile-img" class="profile-img-card" src="{{ url('images/NIMRI.png')}}" />
            <p id="profile-name" class="profile-name-card">Staff Login</p>
                   @if (count($errors) > 0)

      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach

          </ul>

      </div>
    @endif

     @if ($error = Session::get('error'))

          <div class="alert alert-danger">

              <p>{{ $error }}</p>

          </div>

    @endif
            <form class="form-signin" action="{{url('login')}} " method="POST">
              {!! csrf_field() !!}
                <span id="reauth-email" class="reauth-email"></span>
                <input class="form-control" type="text" name="email" value="{{old('email')}}" id="username" placeholder="User Email">
      @if($errors->has('email'))@endif
    <div class="error">{{ $errors->first('email') }}</div>
   
                <!-- <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus> -->
                <!-- <input type="password" id="inputPassword" class="form-control" placeholder="Password" required> -->
                <input class="form-control" type="password" name="password"  value="{{old('password')}}" id="cpassword" placeholder="Password">
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <input class="btn btn-primary btn-block" type="submit" name="submit" value="Log in">
                <!-- <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">SIGN IN</button> -->
            </form><!-- /form -->
            <a href="{{ url('forgetpassword')}}" class="forgot-password">
                Forgot password?
            </a></br>
            <a href="{{url('register')}}"  class="forgot-password">
                   Register new account
            </a></br>
      <a href="{{ url('')}}" class="forgot-password">
                Back to home page
            </a>
        </div><!-- /card-container -->


    </div>
<script src="{{ url('assets/js/jquery.min.js')}}"></script> 
<script src="{{ url('assets/js/wow.min.js')}}"></script> 
<script src="{{ url('assets/js/bootstrap.min.js')}}"></script> 
<script src="{{ url('assets/js/slick.min.js')}}"></script> 
<script src="{{ url('assets/js/jquery.li-scroller.1.0.js')}}"></script> 
<script src="{{ url('assets/js/jquery.newsTicker.min.js')}}"></script> 
<script src="{{ url('assets/js/jquery.fancybox.pack.js')}}"></script> 
<script src="{{ url('assets/js/custom.js')}}"></script>
</body>
</html>






<!-- <header class="section1 background-dark">       
<div class="row">
  <div class="col-md-4 col-md-offset-4 form-box">
  <h1 class="text-white margin-top-bottom-40 text-size-60 text-line-height-1 text-center">Sign In</h1>
  <div class="form-cont">
  <p class="form-error">
  
  <form action="{{url('login')}} " method="POST" class="loginForm">
  {!! csrf_field() !!}
  <div class="form-group row">
       <div class="col-md-12">
      
      <input class="form-control" type="text" name="email" value="{{old('email')}}" id="username" placeholder="User Email">
	    @if($errors->has('email'))@endif
		<div class="error">{{ $errors->first('email') }}</div>
    </div>
  </div>
  <div class="form-group row">
    <!-- <label for="cpassword" class="col-md-2">Password</label> -->
    <!-- <div class="col-md-12">
      <input class="form-control" type="password" name="password"  value="{{old('password')}}" id="cpassword" placeholder="Password">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-md-12">
      <input class="btn btn-primary btn-block" type="submit" name="submit" value="Log in">
    </div>
  </div>
  <a href="{{url('register')}}">Or Create account</a>
  </form>
  </div>
  </div>
  </div>    
  </header>
  <div id="content-wrapper">
  </div> -->
 -->