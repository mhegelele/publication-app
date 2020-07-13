@extends('layout.new')
@section('content')
  
  <header class="section2 background-dark" style="margin-left:30px;">
  <div class="line">        
    <h5 class="text-white margin-top-bottom-40 text-size-60 text-line-height-1">
<a href="{{ url('home')}}">Home </a>&nbsp;&nbsp; /&nbsp;&nbsp;<a href="{{ url('manage')}}"> Manage</a>&nbsp;&nbsp; /&nbsp;&nbsp;<a href="{{ url('setting')}}"> Settings</a>&nbsp;&nbsp;/&nbsp;&nbsp; <a href="" style="color:#2F76A5;">Trash</a></h5>
  </div>
  <div class="pull-left">
                         
    
            </div>
</header> 
<div class="col-lg-8 col-md-8 col-sm-8" >
   
     <div class="single_sidebar" style="margin-bottom: 30px;">
<h2 class="text-white margin-top-bottom-40"><span>
   PUBLICATIONS FOR RESTORE</span></h2>
</div>




	<table>
		
		<div id="home" class="tab-pane fade in active">
      @foreach($pubs as $p)
      <a href="trashs/{{$p->p_id}}">
      <div class="citation">
        <!-- <div class="new-pub-box"> -->
           {{$p->title}}<br>{{$p->journal}} ({{$p->pub_year}}).
        <!-- </div> -->
      </div>
      </a>
      @endforeach
      </div>
	</table>
{!! $pubs->links() !!}
</div>
<div class="col-lg-4 col-md-4 col-sm-4">
  <div class="single_sidebar" >
           <h2><span>Manage</span></h2>
              
          </div>
      </br>
      

<a href="{{url('manage')}}" >
  <div class="citation" >
           <h5> PUBLICATIONS FOR APPROVAL</h5>
          </div></a>
 <a href="{{url('approved')}}" ><div class="citation" >
           <h5> APPROVED PUBLICATIONS</h5>
          </div></a>
          <a href="{{url('users')}}" ><div class="citation" >
           <h5> USERS</h5>
          </div></a>
          
          <a href="{{url('reportview')}}"><div class="citation" >
            <h5>REPORT</h5>
          </div></a> 
           <a href="{{url('setting')}}"  style="color:white;"><div class="citation" style=" background-color:#2F76A5;">
            <h5>SETTING</h5>
          </div></a>  
    
          <br><br>
  
</div>


@endsection
