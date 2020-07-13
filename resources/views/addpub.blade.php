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
   <strong>{{session('success')}}</strong> 
</div>
@endif
<div class="form">
<form action="{{url('add-publication')}}" method="POST">
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
	  	<label for="journal" class="col-md-2">Journal Title</label>
	  	<div class="col-md-10">
	   	 <input class="form-control" type="text" name="journal" value="{{old('journal')}}"  id="journal">
	  	</div>
	</div>
	<div class="form-group row">
	<div class="col-md-2">
	  	<label for="author">Authors</label>
	  	<div class="col-md-1 pull-right">
		<span class="fa fa-plus"id="add-auth" title="Add field"></span>

	  	</div>
	</div>
	  	<div class="col-md-2">
	  	<input type="hidden" name="uploader" value="{{Auth::id()}}">
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
	  	 <select class="form-control" type="text" name="inst" value="{{old('inst')}}">
	   	 	<option value="">Choose Centre</option>
	   	 	@foreach($cents as $c)
	   	 	<option value="{{$c->id}}">NIMR {{$c->c_name}}</option>
	   	 	@endforeach
	   	 </select>
	  		<input type="text" name="autInst[]" id="institute" placeholder="Institute name" style='display:none;'/>
	  	</div>

	</div>

	<div id="more-authors"></div>
	<div class="form-group row">
	  	<label for="year" class="col-md-2">Article Information</label>
	  	<div class="col-md-2">
	   	<select class="form-control" type="text" name="pub_year" value="{{old('pub_year')}}"  id="year">
	  	<option value="">Publication Year</option>
	  	<?php
	  	$year = date("Y");
	  	for($x=0; $x <50;$x++){
	  		echo "<option>".($year - $x)."</option>";
	  	}
	  	?>
	  	</select>
	  	</div>
	  	<div class="col-md-2">
	   	 <input class="form-control" placeholder="Volume" type="text" name="volume" value="{{old('volume')}}"  id="volume">
	  	</div>
	  	<div class="col-md-2">
	   	 <input class="form-control" type="text" placeholder="Start Page" name="startpage" value="{{old('startpage')}}"  id="startpage">
		 	   	 
	  	</div>
	  	<div class="col-md-2">

		 <input class="form-control" placeholder="Issue" type="text" name="issue" value="{{old('issue')}}"  id="issue">
	  	</div>
		
	  	<div class="col-md-2">
	<input class="form-control" placeholder="End Page" type="text" name="endpage" value="{{old('endpage')}}"  id="endpage">
	  	</div>
	</div>
	<div class="form-group row">
	  	<label for="pub-type" class="col-md-2">Publication Type</label>
	  	<div class="col-md-10">
	  		<div class="col-md-6" style="margin-left:-2%;">
	   	 <select class="form-control" type="text" name="pub_type" value="{{old('pub_type')}}"  id="pub-type">
	   	 <option value="" selected disabled>Choose Publication Type</option>
	   	 @foreach($pubTypes as $type)
	   	 <option value="{{$type->id}}">{{$type->type}}</option>
	   	 @endforeach
	   	 </select>
	   	 </div>
	   	<div class="col-md-6" style="margin-left:2%;">
	
	<select class="form-control" type="text" name="centre" value="{{old('centre')}}">
	   	 	<option value="" selected disabled>Publication Centre</option>
	   	 	@foreach($cents as $c)
	   	 	<option value="{{$c->id}}">NIMR {{$c->c_name}}</option>
	   	 	@endforeach
	   	 </select>
	   	 
	  	</div>
	</div>
</div>
	<div class="form-group row">
	  	<label for="research-area" class="col-md-2">Research Area</label>
	  	<div class="col-md-10">
	   	 <select onchange="CheckResearch(this.value);" class="form-control" type="text" name="researchArea" value="{{old('researchArea')}}">
	   	 	<option value="" selected disabled >Choose Research Area</option>
	   	 	@foreach($area as $a)
	   	 	<option value="{{$a->id}}">{{$a->area}}</option>
	   	 	@endforeach
	   	 	<option value="others">Other</option>
	   	 </select>
	  	</div>
	</div>
	<div class="form-group row" id="reserch" style='display:none;'>
		<div class="col-md-2"></div>
	  	<label class="col-md-2 text-right">Specify Research Area</label>
	  	<div class="col-md-8">
	   	 <input class="form-control" type="text" name="otherResearchArea">
	  	</div>
	</div>

	<div class="form-group row">
	  	<label for="doi" class="col-md-2">Link to journal</label>
	  	<div class="col-md-10">
	   	 <input class="form-control" type="text" name="link" value="{{old('contact')}}"  id="doi">
	  	</div>
	</div>
	<div class="form-group row">
	  	<label for="doi" class="col-md-2">DOI</label>
	  	<div class="col-md-10">
	   	 <input class="form-control" type="text" name="doi" value="{{old('doi')}}"  id="doi">
	  	</div>
	</div>
		<div class="form-group row">
	  	<label for="publication-title" class="col-md-2">Abstract</label>
	  	<div class="col-md-10">
	   	 <textarea class="wysiwyg form-control" type="text" name="abstract" id="publication-abstract">{{old('abstract')}}</textarea>
	  	@if($errors->has('title'))<p>{{$errors->first('title')}}</p>@endif
	  	</div>
	</div>
	<div class="form-group row">
	  	<div class="col-md-10 col-md-offset-2">
	   	 {{ csrf_field() }}
	   	 <input class="btn btn-primary" type="submit" name="submit" value="Add Publication">
	  	</div>
	</div>
	</div>
</form>
</div>
</div>
</div>
@endsection