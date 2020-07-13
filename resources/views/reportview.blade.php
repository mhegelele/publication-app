@extends('layout.new')
@section('content')
  
   <header class="section2 background-dark" style="margin-left:30px;">
  <div class="line">        
    <h5 class="text-white margin-top-bottom-40 text-size-60 text-line-height-1">
  <a href="{{ url('home')}}">Home </a>&nbsp;&nbsp; /&nbsp;&nbsp;<a href="{{ url('manage')}}"> Manage</a>&nbsp;&nbsp;/&nbsp;&nbsp; <a href="" style="color:#2F76A5;">Report</a></h5>
  </div>
  <div class="pull-left">
                         
    
            </div>
</header>  
<div class="col-lg-8 col-md-8 col-sm-8"  >
      <div class="single_sidebar" style="margin-bottom: 30px;">
<h2><span>REPORT</span></h2>
</div>


<div class="col-lg-8" style="margin-bottom: 30px;">
<div class="col-lg-6"><select class="form-control" type="text" name="centre" value="{{old('centre')}}" onChange="window.location.href=this.value">
        <option selected="true" disabled="disabled">Search Report by Center</option>  
                @foreach($cents as $c)
        <option value="tryreport/{{$c->id}}"> NIMR {{$c->c_name}}</option>
        @endforeach
       </select></div>
<div class="col-lg-6"><select class="form-control" type="text" name="centre" value="{{old('year')}}" onChange="window.location.href=this.value">
        <option selected="true" disabled="disabled">Search Report by Year</option>  
                @foreach($year as $year)
        <option value="yearreport/{{$year->pub_year}}"> Publication Year {{$year->pub_year}}</option>
        @endforeach
       </select></div>

   </div>
<table class="table table-bordered table-striped" width="50%">
           <thead>
             <tr>  <button type="button" onclick="window.location='{{ url('date_range') }}'" name="filter" id="filter" class="btn btn-info btn-sm">SEARCH BY DATE</button>  <th colspan="2"><center>

            <tr><th colspan="4"><center><b>PUBLICATIONS DATABASE REPORT</b></center></th></tr>
   
   
   <div class="col-lg-4 col-md-4 col-sm-4">

  <tr> <th colspan="2"><center>REPORTS SHOW OVERALL  SUMMARY OF PUBLICATIONS UPLOADED, APPROVED AND PENDING AND THE NUMBER OF USERS IN THE DATABASE BY CENTRE AND ROLE</center></th></tr> 
      <tr>
                  <th colspan="2"><center>PUBLICATIONS</center></th>
                  
            <tr>  
</thead>
 <tbody >
   <tr>
                <th>PUBLICATIONS</th>
                <th>NO_PUBLICATIONS</th>
                         </tr>
  <tr>
@foreach($pubs1 as $pub1) 

 <td>NUMBER OF APPROVED PUBLICATIONS <td width="20px;">{{$pub1->publications1}}</td></td>
            </tr>
            
          </a>
          @endforeach
          <tr>
@foreach($pubs10 as $pub10) 
              <td colspan="2">{{$pub10->title}}</td>
            </tr>
 @endforeach
<tr><td colspan="2"> {!! $pubs10->links() !!}</td></tr>
   <!-- <tr>
<td colspan="2"><a href="{{ route('pdfviews',['download'=>'pdf']) }}" style="color:red; margin-left:79%;  "><b>DOWNLOAD PDF</b> <span class="fa fa-file-pdf-o"></span></a></td>
  </tr> -->
              <tr>
@foreach($pubs2 as $pub2) 

 <td>NUMBER OF PENDING PUBLICATIONS <td>{{$pub2->publications2}}</td></td>
            </tr>
                    @endforeach
            <tr>
@foreach($pubs20 as $pub20) 
              <td colspan="2">{{$pub20->title}}</td>
            </tr>
 @endforeach
<tr><td colspan="2"> {!! $pubs20->links() !!}</td></tr>
  <!--  <tr>
<td colspan="2"><a href="{{ route('pdfview',['download'=>'pdf']) }}" style="color:red; margin-left:79%;  "><b>DOWNLOAD PDF</b> <span class="fa fa-file-pdf-o"></span></a></td>
  </tr> -->
            <tr>
@foreach($pubs as $pub) 

 <td><h4>TOTAL NUMBER OF UPLOADED PUBLICATIONS</h4> <td><h4>{{$pub->publications}}</h4></td></td>
            </tr>
          @endforeach
            <tr>                  <th colspan="2"><center>CENTRES</center></th>
            </tr>
                  
            </tr>    
            <tr>
                <th>CENTER NAME</th>
                <th>NO_PUBLICATIONS</th>
                         </tr>
           
          <tr href= 'tryreport/{{$c->id}}'>
          <?php  $cntrs = ""; $data = "";?>
    @foreach($centres as $centre) 
            <tr>
                <td>NIMR - {{$centre->c_name}}</td>
   <td>{{$centre->idadi}}</td>
     @endforeach

     </tr>
       <!-- <tr>
<td colspan="2"><a href="{{ route('pdfviews',['download'=>'pdf']) }}" style="color:red; margin-left:79%;  "><b>DOWNLOAD PDF</b> <span class="fa fa-file-pdf-o"></span></a></td>
  </tr> -->
      <tr>
 <tr>                  <th colspan="2"><center>USERS</center></th>
            </tr>
 <tr>
                <th>USERS ROLE</th>
                <th>NO_USERS</th>
                         </tr>
                         <tr>@foreach($users0 as $user0)
                         <td>Administrators</td> 
              <td colspan="2">{{$user0->count0}}</td>
            </tr>
 @endforeach

 <tr>@foreach($users1 as $user1)
                         <td>Staffs</td> 
              <td colspan="2">{{$user1->count1}}</td>
            </tr>
 @endforeach
                         @foreach($users as $user) 
 <td><h4>TOTAL NUMBER OF USERS</h4> <td><h4>{{$user->count1}}</h4></td></td>
            </tr>
          @endforeach
                  </tbody>
       



  <tr>
<td colspan="2"><a href="{{ route('pdfviews',['download'=>'pdf']) }}" style="color:red; margin-left:79%;  "><b>DOWNLOAD PDF</b> <span class="fa fa-file-pdf-o"></span></a></td>
  </tr>
               
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
 <a href="{{url('approved')}}" ><div class="citation" >
           <h5> APPROVED PUBLICATIONS</h5>
          </div></a>
          <a href="{{url('users')}}" ><div class="citation" >
           <h5> USERS</h5>
          </div></a>
                  <a href="{{url('reportview')}}" style="color:white;"><div class="citation" style=" background-color:#2F76A5;">
            <h5>REPORT</h5>
          </div></a>

<a href="{{url('setting')}}" ><div class="citation">
           <h5>SETTINGS</h5>
          </div></a>
            @endif
          @endif
        
          <br><br>
  
</div>
</div>
</div>
@endsection

