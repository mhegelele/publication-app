@extends('layout.new')
@section('content')
 <section id="contentSection">
<header class="section2 background-dark">
  <div class="line text-center">

         
    <h1 class="text-white margin-top-bottom-40 text-size-60 text-line-height-1">Publication Infomation</h1>
    <p>This page provides detailed information about the selected publication.</p>
  </div>
</header>
<div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="left_content" style="margin-bottom:20px;">
	<div class="citation">
		<h3 class="title">Title</h3>
		<p>{{$pub->title}}</p>
	</div>
		<div class="citation">
	<h3 class="title">Citation</h3>
	<p>{{$pub->citation}}</p>
</div>
	<div class="citation">
	@if(!empty($pub->abstract))
	<h3 class="title">Abstract</h3>
	<div class="text-justify">{!! $pub->abstract!!}</div>
	@endif
	</div>
<br>
<div class="citation">
	<strong>DOI:</strong>
	<a href=" https://doi.org/{{$pub->doi}}" target="_blank">{{$pub->doi}}</a>
</div>
	<div class="citation">
	<strong>Publication year:</strong> {{$pub->pub_year}}
	</div>
	<div class="citation">
	<strong>Publication Type:</strong> {{$pub->type}}
	</div>
	<div class="citation">
	<strong>Research Area:</strong> {{$pub->area}}
	</div>
	<div class="citation">
	<strong>Journal:</strong> {{$pub->journal}}
	</div>
	<div class="citation">
	<strong>Start page - End page: </strong> {{$pub->startpage}} - {{$pub->endpage}} 
	</div>
	<div class="citation">
	<strong>Volume: </strong> {{$pub->volume}} 
	</div>
	<div class="citation">
	<strong>Uploaded Date: </strong> {{$pub->uploadedDate}} 
	</div>
		<div class="citation">
	<strong>Approved Date: </strong> {{$pub->approvedDate}} 
	</div>
	<!-- <div class="citation">
	<strong>Centre: </strong> {{$pub->c_name}} 
	</div> -->
	<table class="table table-striped">
	<tr><th><strong>Authors</strong></th></tr>
	<tr>
		<td>@foreach($authors as $author) {{$author->firstname}} {{$author->middlename}}  {{$author->surname}} {{$author->role}}  <br>
	  @endforeach</td>
	</tr>
</table>
	</div>

</div>
</div>

</section>
@endsection