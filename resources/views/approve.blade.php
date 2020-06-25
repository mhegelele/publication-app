@extends('layout.new')
@section('content')
<header class="section2 background-dark" style="margin-left:50px;">
  <div class="line">        
    <h1 class="text-white margin-top-bottom-40 text-size-60 text-line-height-1">Publication Approval</h1>
  </div>
  <div class="pull-left">
              <!--   <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a> -->
            
  	<a href="{{ url('manage')}}" class="btn btn-primary">
                Back Manage page
            </a>
            </div>
</header>
<div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="left_content">
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

<form method="POST" action="{{url('approve')}}">
			{{csrf_field()}}
	<div class="col-md-7 screen-height" style="margin-left:50px;">
		<div class="letter-box">
			<h3 class="title">Title</h3>
			 <textarea class="form-control" id="comment" name="title"
rows="5" cols="20">{{$pubs->title}}</textarea>
			<!-- <p><input type="textarea" name="Title" value=""></p> -->
		</div>
		<div class="letter-box">
			<h3 class="title">Citation</h3>
			<textarea class="form-control" id="comment" name="citation"
rows="5" cols="30">{{$pubs->citation}}</textarea>
			<!-- <p>{{$pubs->citation}}</p> -->
		</div>
	<div class="letter-box text-justify">
			<h3 class="title">Abstract</h3>
			<textarea class="form-control" id="comment" name="abstract"
rows="5" cols="20">{{$pubs->abstract}}</textarea>
			<!-- <p>{{$pubs->citation}}</p> -->
		</div>

	
		<div class="letter-box">
			<h3 class="title">Authors</h3>
		  @foreach($nauthors as $au)
 <a href="">{{$au->firstname}} {{$au->middlename}} {{$au->surname}}
	&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;{{$au->role}}</a>  <br><br>
    @endforeach



	</div>
		<div class="letter-box">
			<h3 class="title">Other Infomation</h3>
		<table class="table">
			<tr>
				<td>Pulbication Year</td>
				<td><input type="text" name="pub_year" value="{{$pubs->pub_year}}" class="form-control" placeholder="Publication year"></td>
				<!-- {{$pubs->pub_year}} -->
			</tr>
			<tr>
				<td>Pulbication Type</td>
				<td>{{$pubs->type}}</td>
			</tr>
			<tr>
				<td>Research Area</td>
				<td>{{$pubs->area}}</td>
			</tr>
			<tr>
				<td>Journal</td>
				<td><input type="text" name="journal" value="{{$pubs->journal}}" class="form-control" placeholder="Jornal"></td>
			</tr>
			<tr>
				<td>Volume</td>
				<td><input type="text" name="volume" value="{{$pubs->volume}}" class="form-control" placeholder="Volume"></td>
			</tr>
			<tr>
				<td>Pages</td>
				<td><input type="text" name="startpage" value="{{$pubs->startpage}}" class="form-control" placeholder="Startpage"> 
					<input type="text" name="endpage" value="{{$pubs->endpage}}" class="form-control" placeholder="Endpage"></td>
			</tr>
			<tr>
				<td>Doi</td>
				<td><a href="https://doi.org/{{$pubs->doi}}">{{$pubs->doi}}</a></td>
			</tr>
			<tr>
			<td>Upload Date</td>
			<td>{{$pubs->uploadedDate}}</td>
			</tr>
		</table>
		</div>

	</div>
	<div class="col-md-4">
		<h1 class="text-center top-border">Approve</h1>
	<div class="uploader">		
		<p>
			Uploader name: {{$uploader->name}} {{$uploader->mname}} {{$uploader->sname}}
			<br><br>Uploader Email: {{$uploader->email}}
			<br><br>Uploader Mobile: {{$uploader->mobile}}
		</p>
		
			<input type="hidden" name="id" value="{{$pubs->p_id}}">
			<input type="submit" value="Approve" name="submit" class="btn btn-primary" {{session()->has('success')? 'disabled':''}}>
		</form>
		</div>
	</div>
</div>
</div>
@endsection