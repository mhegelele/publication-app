@extends('layout/new')


@section('content')
  <div class="container">
<div class="card-reg card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <!-- <img id="profile-img" class="profile-img-card-reg" src="images/NIMRI.png" /> -->
            <!-- <img id="profile-img" class="profile-img-card-reg" src="{{ url('images/NIMRI.png')}}" /> -->
            <p id="profile-name" class="profile-name-card-reg">Add new user</p>
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
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Official Email *" value="{{old('email')}}" name="email" />
                                     @if($errors->has('email'))<p>{{$errors->first('email')}}</p>@endif
                                        </div>
                                         <div class="form-group">
                                            
                                       <input type="email" class="form-control @error('email2') is-invalid @enderror" placeholder="Alternate email" value="{{old('email2')}}" name="email2" />
                                     @if($errors->has('email2'))<p>{{$errors->first('email2')}}</p>@endif
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password *" value="{{old('password')}}" name="password" />
                                         @if($errors->has('password'))<p>{{$errors->first('password')}}</p>@endif
                                        </div>
                                        
                                       
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('mname') is-invalid @enderror" placeholder="Middle Name *" value="{{old('mname')}}" name="mname" />
                                       @if($errors->has('mname'))<p>{{$errors->first('mname')}}</p>@endif
                                        </div>
                                        <div class="form-group">
                                            <input type="text" minlength="10" maxlength="10"  name="mobile" class="form-control  @error('mobile') is-invalid @enderror" placeholder="Your Phone *" value="{{old('mobile')}}"  name="mobile"/>
                                     @if($errors->has('mobile'))<p>{{$errors->first('mobile')}}</p>@endif
                                        </div>
                                        <div class="form-group">
                                            
                                       <input type="email" class="form-control @error('email2') is-invalid @enderror" placeholder="Alternate email" value="{{old('email2')}}" name="email2" />
                                     @if($errors->has('email2'))<p>{{$errors->first('email2')}}</p>@endif
                                        </div>
                                         <div class="form-group">
                                            
                                       <input type="email" class="form-control @error('level') is-invalid @enderror" placeholder="Level" value="{{old('level')}}" name="level" />
                                     @if($errors->has('level'))<p>{{$errors->first('email2')}}</p>@endif
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
      <a href="{{ url('home')}}" class="forgot-password">
                Back to home page
            </a>
        </div>
    </div>
@endsection