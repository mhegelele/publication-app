@extends('layout.new')
@section('content')
<header class="section2 background-dark">
  <div class="line text-center">        
    <h1 class="text-white margin-top-bottom-40 text-size-60 text-line-height-1">Publication Uploading Panel</h1>
    <!-- <p class="margin-bottom-0 text-size-16">Fill the form below </p> -->
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
	
<form action="{{url('testpublication')}}" method="POST">
	<input type="hidden" name = "_token" value = "<?php echo csrf_token(); ?>"> 
	<div class="form-group row">
	  	<label for="publication-title" class="col-md-2">Publication Title</label>
	  	<div class="col-md-10">
	   	 <textarea  class="form-control" type="text" name="title" id="publication-title">{{old('title')}}</textarea>
	  	</div>
	</div>
	<div class="form-group row">
	  	<label for="publication-citation" class="col-md-2">Citation</label>
	  	<div class="col-md-10">
	   	 <textarea  class="form-control" type="text" name="citation" id="publication-citation">{{old('citation')}}</textarea>
	  	</div>
	</div>
	<div class="form-group row">
<input type="submit" value ="Add Publication" >
	</div>
	  		</div>
</form>
</div>
</div>
</div>
@endsection