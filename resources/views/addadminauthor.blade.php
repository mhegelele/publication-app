@extends('layout.new')
@section('content')
  
  <header class="section2 background-dark" style="margin-left:30px;">
  <div class="line">        
    <h5 class="text-white margin-top-bottom-40 text-size-60 text-line-height-1">
 <a href="{{ url('home')}}">Home </a>&nbsp;&nbsp; /&nbsp;&nbsp;<a href="{{ url('manage')}}"> Manage</a>&nbsp;&nbsp;/&nbsp;&nbsp; <a href="{{ url('setting')}}"> Settings </a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="" style="color:#2F76A5;">Edit Centre</a></h5>
  </div>
  <div class="pull-left">
                         
    
            </div>
</header> 
<div class="col-lg-8 col-md-8 col-sm-8" >
  <div class="row">
  <div class="col-md-10 col-md-offset-1">
    @if(session()->has('success'))
      <div class="alert alert-success alert-dismissable fade in">
        <a href="{{url('management')}}" class="close" data-dismiss="alert" aria-label="close">&times;</a>
         {{session('success')}}
      </div>
    @endif
  </div>

</div>
  <div class="row" style="margin-left:10%">
  <form action="{{url('addauthors')}}" method="POST">
<div class="form-group row">
  <div class="col-md-2">
      <label for="author">Add Author</label>
      <div class="col-md-1 pull-right">
    <!-- <span class="fa fa-plus"id="add-auth" title="Add field"></span> -->

      </div>
  </div></div>
  <div class="form-group row">
      <div class="col-md-6">
      <input type="hidden" name="p_id" value="{{$p_id}}">
      <input class="form-control" type="text" name="firstname"  placeholder="First name" >
      </div>
    </div>
    <div class="form-group row">
      <div class="col-md-6">
      <input class="form-control" type="text" name="middlename"  placeholder="Middle name">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-md-6">
        <input class="form-control" type="text" name="surname" placeholder="Surname">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-md-6">
        <select class="form-control" type="text" name="role" >
        <option value="">Authorship</option>
        <option value="First Author">First Author</option>
        <option value="Co Author">Co Author</option>
        <option value="Last Author">Last Author</option>
        </select>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-md-6" >
       <select class="form-control" type="text" name="institution" >
        <option value="">Choose Centre</option>
        @foreach($c as $cents)
        <option value="{{$cents->id}}">NIMR {{$cents->c_name}}</option>
        @endforeach
       </select>
        <!-- <input type="text" name="autInst[]" id="institute" placeholder="Institute name" style='display:none;'/> -->
      </div>

  </div>
<div class="form-group row">
      <div class="col-md-10 col-md-offset-2">
       {{ csrf_field() }}
       <input class="btn btn-primary" type="submit" name="submit" value="Add Author">
      </div>
  </div>
</div>
</form>
</div>
<div class="col-lg-4 col-md-4 col-sm-4">
  <div class="single_sidebar" >
           <h2><span>Manage</span></h2>
              
          </div>
      </br>
      

<a href="{{url('manage')}}" >
  <div class="citation" >
           <h5> PUBLICATIONS FOR APPROVAL</h5>
          </div></a>
 <a href="{{url('approved')}}" ><div class="citation" >
           <h5> APPROVED PUBLICATIONS</h5>
          </div></a>
          <a href="{{url('users')}}" ><div class="citation" >
           <h5> USERS</h5>
          </div></a>
          
          <a href="{{url('reportview')}}"><div class="citation" >
            <h5>REPORT</h5>
          </div></a> 
           <a href="{{url('setting')}}"  style="color:white;"><div class="citation" style=" background-color:#2F76A5;">
            <h5>SETTING</h5>
          </div></a>  
    
          <br><br>
  
</div>


@endsection
