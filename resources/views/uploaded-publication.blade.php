@extends('layout.new')
@section('content')
   
   <header class="section2 background-dark" style="margin-left:2%; margin-right:2.5%;">
  <div class="line"> 

    <h5 class="text-white margin-top-bottom-40 text-size-60 text-line-height-1">
<a href="{{ url('home')}}">Home </a>&nbsp;&nbsp; 
  &nbsp;&nbsp;/&nbsp;&nbsp; <a href="" style="color:#2F76A5;">Uploaded Publication</a></h5>
         
    <div class="single_sidebar" style="margin-bottom: 30px;">
<h2><span>UPLOADED PUBLICATIONS</span></h2>
</div>
  </div>
 
</header>
<div class="row">
      <div class="col-lg-11 col-md-11 col-sm-11" style="margin-left:2%">
       
  
<!-- 
HELLO: {{ Auth::user()->name }}

 -->
	<table>
		<div id="home" class="tab-pane fade in active">
      <form method="POST" action="{{url('deletepublication/id')}}">
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
        {!! $pubs->links() !!}
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
