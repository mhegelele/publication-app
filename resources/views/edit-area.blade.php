@extends('layout.new')
@section('content')
  
  <header class="section2 background-dark" style="margin-left:30px;">
  <div class="line">        
    <h5 class="text-white margin-top-bottom-40 text-size-60 text-line-height-1">
 <a href="{{ url('home')}}">Home </a>&nbsp;&nbsp; /&nbsp;&nbsp;<a href="{{ url('manage')}}"> Manage</a>&nbsp;&nbsp;/&nbsp;&nbsp; <a href="{{ url('setting')}}"> Settings </a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="" style="color:#2F76A5;">Edit Research Area</a></h5>
  </div>
  <div class="pull-left">
                         
    
            </div>
</header> 
<div class="col-lg-8 col-md-8 col-sm-8" >
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
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
 <center>  <h3>RESEARCH AREAS</h3>
        <table class="table table-striped" style="width:70%;">
    <tr>
      <form method="POST" action="{{url('edit-areas')}}">
          {{csrf_field()}}
      <th>No</th>
      <th>Research Area</th>
      
    </tr>

    <tr>
      <td>{{$pubs->id}}</td>
      <input type="hidden" name="id" value="{{$pubs->id}}">
      <td><input type="text" name="area" value="{{$pubs->area}}" class="form-control" placeholder="Research Area"></td>
      
    </tr>
    <tr>
      <td colspan="2"> <input type="submit" value="Update Research Area" name="submit" class="btn btn-primary" style="margin-left: 30%" ></td>

    </tr>
</form>
  </table>
    </div>
    
  </center>
</div>
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
