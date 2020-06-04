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
<div class="card-reg card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card-reg" src="images/NIMRI.png" />
            <p id="profile-name" class="profile-name-card-reg">Registration form</p>
      </br>
             <div class="row register-form">
               @if (count($errors) > 0)

      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach

          </ul>

      </div>



    @endif



    @if ($message = Session::get('success'))

          <div class="alert alert-success">

              <p>{{ $message }}</p>

          </div>

    @endif
               <form method="POST" action="{{url('reg_account')}}">
                       {{ csrf_field()}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('fname') is-invalid @enderror" placeholder="First Name *" value="{{old('fname')}}" name="fname" />
                                    @if($errors->has('fname'))<p class="danger">{{$errors->first('fname')}}</p>@endif
                                        </div>
                                                                                
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('sname') is-invalid @enderror" placeholder="Last Name *" value="{{old('sname')}}" name="sname" />
                                        @if($errors->has('sname'))<p>{{$errors->first('sname')}}</p>@endif
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder=" @nimr.or.tz Official Email * " value="{{old('email')}}" name="email" />
                                     @if($errors->has('email'))<p>{{$errors->first('email')}}</p>@endif
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password *" value="{{old('password')}}" name="password" />
                                         @if($errors->has('password'))<p>{{$errors->first('password')}}</p>@endif
                                        </div>
                                        
                                       
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('mname') is-invalid @enderror" placeholder="Middle Name " value="{{old('mname')}}" name="mname" />
                                       @if($errors->has('mname'))<p>{{$errors->first('mname')}}</p>@endif
                                        </div>
                                        <div class="form-group">
                                            <input type="text" minlength="10" maxlength="10"  name="mobile" class="form-control  @error('mobile') is-invalid @enderror" placeholder="Phone Number*" value="{{old('mobile')}}"  name="mobile"/>
                                     @if($errors->has('mobile'))<p>{{$errors->first('mobile')}}</p>@endif
                                        </div>
                                        <div class="form-group">
                                            
                                       <input type="email" class="form-control @error('email2') is-invalid @enderror" placeholder="Alternate email" value="{{old('email2')}}" name="email2" />
                                     @if($errors->has('email2'))<p>{{$errors->first('email2')}}</p>@endif
                                        </div>
                                       <div class="form-group">
                                            <input type="password"  class="form-control @error('cpassword') is-invalid @enderror" name="cpassword" placeholder="Confirm Password *" value="{{old('cpassword')}}" />
                                     @if($errors->has('cpassword'))<p>{{$errors->first('cpassword')}}</p>@endif
                                        </div>
                                        <!-- <input type="submit" class="btnRegister"  value="REGISTER"/> -->
                                        <input type="submit" class="btn  btn-primary btn-block btn-signin"  value="REGISTER"/>
                                    </div>
                                       </form>
                                </div>
                  <a href="{{ url('login')}}" class="forgot-password">
                Login
            </a></br>
      <a href="{{ url('')}}" class="forgot-password">
                Back to home page
            </a>
        </div>
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