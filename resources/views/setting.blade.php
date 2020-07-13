@extends('layout.new')
@section('content')
  
  <header class="section2 background-dark" style="margin-left:30px;">
  <div class="line">        
    <h5 class="text-white margin-top-bottom-40 text-size-60 text-line-height-1">
 <a href="{{ url('home')}}">Home </a>&nbsp;&nbsp; /&nbsp;&nbsp;<a href="{{ url('manage')}}"> Manage</a>&nbsp;&nbsp;/&nbsp;&nbsp; <a href="" style="color:#2F76A5;">Settings</a>&nbsp;&nbsp; /&nbsp;&nbsp;<a href="{{url('trash')}}">Trash</a></h5>
  </div>
  <div class="pull-left">
                         
    
            </div>
</header> 
<div class="col-lg-8 col-md-8 col-sm-8" >
   
  
 <div style="margin-top:1%;">
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Centres</a></li>
    <li><a data-toggle="tab" href="#menu1">Research Area</a></li>
    <li><a data-toggle="tab" href="#menu2">Publication Type</a></li>
     </ul>
</div>
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <div class="row">
<div class="col-lg-4" style="margin-left: 15%"> <h3>CENTRES</h3></div>
<div class="col-lg-4"> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"  style="margin-left: 85%"><span class="glyphicon glyphicon-plus"></span></button></div>
    
</div> 
 <center>
        <table class="table table-striped" style="width:70%;">
    <tr>
      <th>No</th>
      <th>Centre Name</th>
      <th>Action</th>
    </tr>
    @foreach ($text as $key => $item)
    <tr>
      <td>{{ ++$key }}</td>
      <td>{{ $item->c_name }}</td>
      <td><a href="centres/{{$item->id}}"  class="fa fa-edit" href=""></a></td> 
    </tr>
    @endforeach
  </table>
    </div>

    <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Centre</h4>
      </div>
      <div class="modal-body">
 <form method="POST" action="{{url('add-centre')}}">
  {{csrf_field()}}

         <div class="row">
              <div class="form-group col-md-10">
                <label for="Club">Centre Name:</label>
                <input type="text" class="form-control" name="c_name" id="club" placeholder="Centre Name">
                 <input type="submit" value="Save Centre" name="submit" class="btn btn-primary" style="margin-left: 30%; margin-top: 2%;" >
              </div>
          </div>
       
         </form>                             
                                    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
    <div id="menu1" class="tab-pane fade">
       <div class="row">
<div class="col-lg-4" style="margin-left: 15%"> <h3>RESEARCH AREAS</h3></div>
<div class="col-lg-4"> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1"  style="margin-left: 85%"><span class="glyphicon glyphicon-plus"></span></button></div>
    
</div> 
      <center>  
        <table class="table table-striped" style="width:70%;">
    <tr>
      <th>No</th>
      <th>Research Area</th>
      <th>Action</th>
    </tr>
    @foreach ($pubs as $key => $item)
    <tr>
      <td>{{ ++$key }}</td>
      <td>{{ $item->area }}</td>
      <td><a href="areas/{{$item->id}}" class=" fa fa-edit" href=""></a></td>
    </tr>
    @endforeach
  </table>
    </div>


    <div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Research Area</h4>
      </div>
      <div class="modal-body">
 <form method="POST" action="{{url('add-area')}}">
  {{csrf_field()}}

         <div class="row">
              <div class="form-group col-md-10">
                <label for="Club">Research Area:</label>
                <input type="text" class="form-control" name="area" id="club" placeholder="Research Area">
                 <input type="submit" value="Save Research Area" name="submit" class="btn btn-primary" style="margin-left: 30%; margin-top: 2%;" >
              </div>
          </div>
       
         </form>                             
                                    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
    <div id="menu2" class="tab-pane fade">
      <div class="row">
<div class="col-lg-4" style="margin-left: 15%"> <h3>PUBLICATION TYPE</h3></div>
<div class="col-lg-4"> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2"  style="margin-left: 85%"><span class="glyphicon glyphicon-plus"></span></button></div>
    
</div> 
      <center> 
        <table class="table table-striped" style="width:70%;">
    <tr>
      <th>No</th>
      <th>Publication Type</th>
      <th>Action</th>
    </tr>
    @foreach ($pub as $key => $item)
    <tr>
      <td>{{ ++$key }}</td>
      <td>{{ $item->type }}</td>
      <td><a href="types/{{$item->id}}" class=" fa fa-edit" href=""></a></td>
    </tr>
    @endforeach
  </table>
    </div>

    <div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Publication Type</h4>
      </div>
      <div class="modal-body">
 <form method="POST" action="{{url('add-type')}}">
  {{csrf_field()}}

         <div class="row">
              <div class="form-group col-md-10">
                <label for="Club">Publication Type:</label>
                <input type="text" class="form-control" name="type" id="club" placeholder="Publication Type">
                 <input type="submit" value="Save Publication Type" name="submit" class="btn btn-primary" style="margin-left: 30%; margin-top: 2%;" >
              </div>
          </div>
       
         </form>                             
                                    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
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
