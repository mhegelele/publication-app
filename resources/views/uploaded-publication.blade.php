@extends('layout.new')
@section('content')
   
<div class="col-lg-12 col-md-10 col-sm-12" >
   
     <div class="single_sidebar" style="margin-bottom: 30px;">
<h2><span>UPLOADED PUBLICATIONS</span></h2>
</div>

HELLO: {{ Auth::user()->name }}


	<table>
	<!-- 	<tr>
			<th>No</th>
			<th>Title</th>
			<th>Description</th>
		</tr> -->
		<div id="home" class="tab-pane fade in active">
      @foreach($pubs as $p)
      <a href="adminpublication/{{$p->p_id}}">
      <div class="citation">
        <!-- <div class="new-pub-box"> -->
           {{$p->title}}<br>{{$p->journal}} ({{$p->pub_year}}).
        <!-- </div> -->
      </div>
      </a>
      @endforeach
      </div>
	</table>
</br></br>
</div>

@endsection
