@extends('layout.new')
@section('content')
   
   <header class="section2 background-dark" style="margin-left:20px;">
  <div class="line">        
    <div class="single_sidebar" style="margin-bottom: 30px;">
<h2><span>UPLOADED PUBLICATIONS</span></h2>
</div>
  </div>
 
</header>
<div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="left_content" style="margin-bottom:10px; margin-left:30px;">
  
<!-- 
HELLO: {{ Auth::user()->name }}

 -->
	<table>
	<!-- 	<tr>
			<th>No</th>
			<th>Title</th>
			<th>Description</th>
		</tr> -->
		<div id="home" class="tab-pane fade in active">
      @foreach($pubs as $p)
     <a href="uploadedpublication/{{$p->p_id}}">
      <div class="citation">
        <!-- <div class="new-pub-box"> -->
         
           {{$p->title}}<br>{{$p->journal}} ({{$p->pub_year}}).
        <!-- </div> -->
        <br>
       
        <div style="color:red"> {{$p->status}} </div>
      </div>
 </a>
      
      @endforeach
      @foreach($pub as $ps)
      <a href="uppublication/{{$ps->p_id}}">
      <div class="citation">
        <!-- <div class="new-pub-box"> -->
           {{$ps->title}}<br>{{$ps->journal}} ({{$ps->pub_year}}).
        <!-- </div> -->
        <br>
        <div style="color:blue"> {{$ps->status}} </div>
      </div>

      </a>
      @endforeach
      </div>
	</table>
</br></br>
</div>

@endsection
