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
			<h3 class="title">Authors</h3>
		  @foreach($nauthors as $au)
 <a href="adminpublication/{{$nauthors->p_id}}">{{$au->firstname}} {{$au->middlename}} {{$au->surname}}
	&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;{{$au->role}}</a>  <br><br>
    @endforeach



	</div>
		
	</div>
	<div class="col-md-4">
		<h1 class="text-center top-border">Approve</h1>
			
			<input type="hidden" name="id" value="{{$pubs->p_id}}">
			<input type="submit" value="Approve" name="submit" class="btn btn-primary">
		</form>
		</div>
	</div>
</div>
</div>
@endsection