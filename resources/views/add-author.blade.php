@extends('layout.new')
@section('content')
<header class="section2 background-dark">
  <div class="line text-center">        
    <h1 class="text-white margin-top-bottom-40 text-size-60 text-line-height-1">Publication Uploading Panel-Step 2</h1>
  
  </div>
</header>
<div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="left_content" style="margin-bottom:10px;">
<div class="col-md-11 " style="margin-left:50px;">
@if (count($errors) > 0)
    <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            {{ $error }}
            @endforeach
    </div>
@endif
@if(session()->has('success'))

<div class="alert alert-success alert-dismissable fade in">
   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   <strong>Success!</strong> {{session('success')}}
</div>
@endif
<div class="form">
<form action="{{url('add-author')}}" method="POST">
	  	<div class="col-md-2">
	  	
	   	<input class="form-control" type="text" name="fname[]" value="{{old('fname[]')}}" placeholder="First name" id="author">
	  	</div>
	  	<div class="col-md-2">
	   	<input class="form-control" type="text" name="mname[]" value="{{old('mname[]')}}" placeholder="Middle name">
	  	</div>
	  	<div class="col-md-2">
	  		<input class="form-control" type="text" name="sname[]" value="{{old('sname[]')}}" placeholder="Surname">
	  	</div>
	  	<div class="col-md-2">
	  		<select class="form-control" type="text" name="authShip[]" value="{{old('authShip[]')}}">
	  		<option value="">Authorship</option>
	  		<option value="First Author">First Author</option>
	  		<option value="Co Author">Co Author</option>
	  		<option value="Last Author">Last Author</option>
	  		</select>
	  	</div>
	  	<div class="col-md-2" >
	  	 <select class="form-control" type="text" name="centre" value="{{old('centre')}}" onchange="CheckColors(this.value);" >
	   	 	<option value="">Choose Centre</option>
	   	 	@foreach($cents as $cent)
	   	 	<option value="{{$cent->id}}">NIMR {{$cent->c_name}}</option>
	   	 	@endforeach
	   	 </select>
	  		
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
</div>
</div>
@endsection