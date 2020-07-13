@extends('layout.new')
@section('content')
<header class="section2 background-dark" style="margin-left:30px;">
  <div class="line">        
    <h5 class="text-white margin-top-bottom-40 text-size-60 text-line-height-1">
 <a href="{{ url('home')}}">Home </a>&nbsp;&nbsp; /&nbsp;&nbsp;<a href="{{ url('manage')}}"> Manage</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="" style="color:#2F76A5;">Edit Author</a></h5>
  </div>
  <div class="pull-left">
                         
    
            </div>
</header> 
<div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="left_content">
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

<form method="POST" action="{{url('editauthor')}}">
			{{csrf_field()}}
	<div class="col-md-7 screen-height" style="margin-left:50px;">
			
		<div class="letter-box">
			<h3 class="title">Authors</h3>
		  @foreach($nauthors as $au)

		  <table class="table table-striped">

<tr><td>First name</td>   <td><input type="text" name="firstname" value="{{$au->firstname}}" class="form-control" placeholder="First name"></td></tr>
<tr><td>Middle name</td>   <td><input type="text" name="middlename" value="{{$au->middlename}}" class="form-control" placeholder="Middle name"></td></tr>
<tr><td>Last name</td>   <td><input type="text" name="surname" value="{{$au->surname}}" class="form-control" placeholder="Last name"></td></tr>
<tr><td>Role</td>   <td><input type="text" name="role" value="{{$au->role}}" class="form-control" placeholder="Role"></td></tr>
		  <tr><td colspan="2">
                <input type="hidden" name="au_id" value="{{$au->au_id}}">
		  	<input type="submit" value="Save Author" name="submit" class="btn btn-primary"></td></tr>
		  </table>
	</div>
		
	</div>
	
			
			
			
			@endforeach
		</form>
		</div>
	</div>
</div>
</div>
@endsection