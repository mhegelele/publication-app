@extends('layout.new')
@section('content')
  
  <header class="section2 background-dark" style="margin-left:30px;">
  <div class="line">        
    <h5 class="text-white margin-top-bottom-40 text-size-60 text-line-height-1">
 <a href="{{ url('home')}}">Home </a>&nbsp;&nbsp; /&nbsp;&nbsp;<a href="{{ url('uploadedpublication')}}">Uploaded Publication</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="" style="color:#2F76A5;">Add Author</a></h5>
  </div>
  <div class="pull-left">
                         
    
            </div>
</header> 
<div class="col-lg-12 col-md-12 col-sm-12" >
  <div class="row">
  <div class="col-md-10 col-md-offset-1">
    @if(session()->has('success'))
      <div class="alert alert-success alert-dismissable fade in">
        <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
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
@endsection
