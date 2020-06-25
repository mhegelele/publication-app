@extends('layout.new')
@section('content')
   
<div class="col-lg-8 col-md-8 col-sm-8"  >
      <div class="single_sidebar" style="margin-bottom: 30px;">
<h2><span>REPORT</span></h2>
</div>


<div class="col-lg-8" style="margin-bottom: 30px;">
<div class="col-lg-6">
<a href="{{ url('reportview')}}" class="btn btn-primary">
                Back Report page
            </a>
</div>
   </div>
<table class="table table-bordered table-striped" width="50%">
           <thead>
        
            <tr><th colspan="4"><center>PUBLICATIONS DATABASE REPORT BY YEAR</center></th></tr>
   
   
   <div class="col-lg-4 col-md-4 col-sm-4">
               @foreach($c as $c) 

            <tr>
         
                  <th colspan="2"><center>YEAR {{$c->pub_year}}</center></th>
                             </tr>   @endforeach
</thead>
 <tbody >
   <tr>
                <th>PUBLICATIONS</th>
                <th>NO_PUBLICATIONS</th>
                         </tr>
  <tr>
@foreach($pubs as $pub1) 

 <td>NUMBER OF  PUBLICATIONS <td width="20px;">{{$pub1->publications1}}</td></td>
            </tr>
          @endforeach

     <tr>

</table>
<table class="table table-bordered table-striped" width="50%">

@foreach($viewpub as $view) 
 <td style="width:20px;">{{ ++$i }}</td><td>{{$view->title}}</td>
            </tr>
 @endforeach
                  
</table>
       </div>






</div>
</div>
<div class="col-lg-4 col-md-4 col-sm-4">
  <div class="single_sidebar" >
           <h2><span>Manage</span></h2>
              
          </div>
      </br>
      @if(Auth::check())
@if(Auth::user()->level === 1)
<a href="{{url('manage')}}" ><div class="citation">
           <h5> PUBLICATIONS FOR APPROVAL</h5>
          </div></a>
 <a href="{{url('users')}}" ><div class="citation" >
           <h5> APPROVED PUBLICATIONS</h5>
          </div></a>
          <a href="{{url('users')}}" ><div class="citation" >
           <h5> USERS</h5>
          </div></a>
                  <a href="{{url('reportview')}}" style="color:white;"><div class="citation" style=" background-color:#2F76A5;">
            <h5>REPORT</h5>
          </div></a>  @endif
          @endif
        
          <br><br>
  
</div>
</div>
</div>
@endsection

