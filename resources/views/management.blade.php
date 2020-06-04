@extends('layout.new')
@section('content')
<section id="contentSection">
<header class="section2 background-dark">
  <div class="line text-center">        
    <h1 class="text-white margin-top-bottom-40 text-size-60 text-line-height-1">Publication Management Panel</h1>
  </div>
</header>
<div id="content-wrapper">
<div class="row tokeza">
	<div class="col-md-8 screen-height" style="margin-left:10px; width:67%;">
		<ul class="nav nav-tabs">
		  <li class="active"><a data-toggle="tab" href="#home">Approve Uploaded</a></li>
		  <li><a data-toggle="tab" href="#menu1">Users</a></li>
		  <li><a data-toggle="tab" href="#menu2">Report</a></li>
		</ul>
		<div class="tab-content">
		  <div id="home" class="tab-pane fade in active">
		  @foreach($pubs as $p)
		  <a href="approve/{{$p->p_id}}">
		  <div class="citation">
		  	<!-- <div class="new-pub-box"> -->
		  		 {{$p->title}}<br>{{$p->journal}} ({{$p->pub_year}}).
		    <!-- </div> -->
		  </div>
		  </a>
		  @endforeach
		  </div>
		  <div id="menu1" class="tab-pane fade">
		    <h3>Users</h3>
		    <p>Some content in menu 1.</p>
		  </div>
		  <div id="menu2" class="tab-pane fade">
		    <h3>Report</h3>
		    <p>Some content in menu 2.</p>
		  </div>
		</div>
	</div>
	<div class="col-md-3 ">
	<div id="latest-box" >
		<h3 class="text-center box-title"><span>RECENTLY APPROVED</span><br></h3>
			@foreach($text as $t)
			<div class="citation-search"><a href='{{url("/publication/$t->p_id")}}'>{{$t->citation}}</b></a></div>
		</br>
			@endforeach
		</div>
		   
	</div>
</div>
</div>
</section>
@endsection