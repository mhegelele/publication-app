@extends('layout.new')
@section('content')
 <section id="contentSection">
<header class="section2 background-dark">
  <div class="line text-center">        
    <h1 class="text-white margin-top-bottom-40 text-size-60 text-line-height-1">Publication Infomation</h1>
    <p>This page provides detailed information about the selected publication. Please click on any text which is underlined to find more information.</p>
  </div>
</header>
<div class="row tokeza" style="margin-bottom:30px; margin-left:200px;">
<div class="col-md-10 ">
	<div class="citation">
		<h3 class="title">Title</h3>
		<p>{{$pub->title}}</p>
	<h3 class="title">Citation</h3>
	<p>{{$pub->citation}}</p>
	@if(!empty($pub->abstract))
	<h3 class="title">Abstract</h3>
	<div class="citation text-justify">{!! $pub->abstract!!}</div>
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
	<strong>Journal:</strong> {{$pub->journal}}
	</div>
		<div class="citation">
	<strong>Start page - End page</strong> {{$pub->startpage}}-{{$pub->endpage}} 
	</div>
	</div>
</div>
</div>
</div>

</section>
@endsection