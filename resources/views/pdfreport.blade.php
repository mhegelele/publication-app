<!DOCTYPE html>
<html>
    
<head>
   <title>NIMR PUBLICATIONS</title>

     <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/font-awesome.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/font.css')}}">
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/li-scroller.css')}}">
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/slick.css')}}">
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/jquery.fancybox.css')}}">
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/theme.css')}}">
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/style.css')}}">
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/reg.css')}}">
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/card.css')}}">
</head>

<body>

  <div class="container">

      
<table class="table table-no-bordered table-striped" width="100%">
           <thead>
            
             <tr>  <th colspan="2"><center>
  <img alt="LOGO" src="{{ url('images/NIMRI.png')}}"class="img-responsive" width="10%" height="10%"></center></th></tr> 
            <tr><th colspan="4"><center>PUBLICATIONS DATABASE REPORT</center></th></tr>
   <div class="col-lg-4 col-md-4 col-sm-4">

  <tr> <th colspan="2"><center>THIS REPORT SHOWS OVERAL SUMMARY OF THE PUBLICATION UPLOADED, PUBLISHED AND PENDING,
   ALSO SHOWS NUMBER OF USER IN PUBLICATION WITH THEIR ROLE AND CENTERS AVAILABLE. SHOWS HOW MANY
    PUBLICATION BEING PUBLISHED IN SPECIFIC YEAR</center></th></tr> 
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
          @endforeach
            <tr>

              <tr>
@foreach($pubs2 as $pub2) 

 <td>NUMBER OF PENDING PUBLICATIONS <td>{{$pub2->publications2}}</td></td>
            </tr>
          @endforeach
            <tr>

            <tr>
@foreach($pubs as $pub) 

 <td>TOTAL NUMBER OF UPLOADED PUBLICATIONS <td>{{$pub->publications}}</td></td>
            </tr>
          @endforeach
            <tr>                  <th colspan="2"><center>CENTERS</center></th>
            </tr>
              <tr>   <td>TOTAL NUMBER OF CENTERS</td>   
                           @foreach($centers as $center) 

 <td>{{$center->centre}}</td>
            </tr>
          @endforeach
            </tr>    
            <tr>
                <th>CENTER NAME</th>
                <th>NO_PUBLICATIONS</th>
                         </tr>
           
          
          <?php  $cntrs = ""; $data = "";?>
    @foreach($centres as $centre) 
            <tr>
                <td>NIMR - {{$centre->c_name}}</td>
   <td>{{$centre->idadi}}</td>
     @endforeach
                  </tbody>
       
<tr><th colspan="2"><center>USERS</center></th></tr>
@foreach($roles as $role)
<tr> 
 <td>{{$role->role_name}}</td>
 <td>{{$role->levels}}</td>
            </tr>
          @endforeach
<tr>

                @foreach($users as $user) 

 <td>TOTAL USERS </td><td>{{$user->count1}}</td>
            </tr>
          @endforeach
          <tr><th colspan="2"><center>YEARS</center></th></tr>
          <tr>
                <th>YEARS</th>
                <th>NO_PUBLICATIONS</th>
                         </tr>
          @foreach($years as $year) 
 <td>{{$year->pub_year}}</td>
 <td>{{$year->years1}}</td>
            </tr>
          @endforeach

<tr>

<td colspan="2"><center>ALL RIGHT ARE RESERVED @ 2020 BY 
    <a href="https://www.nimr.or.tz/" style="color:blue;">NIMR HEADQUATERS</a></center></td>
  <!-- <td>
<img alt="LOGO" src="{{ url('images/NIMRI.png')}}"class="img-responsive" width="70%" height="70%">
  </td> -->
  </tr>
                 
</table>
       </div>






</div>
</div>
<script src="{{ url('assets/js/jquery.min.js')}}"></script> 
<script src="{{ url('assets/js/wow.min.js')}}"></script> 
<script src="{{ url('assets/js/bootstrap.min.js')}}"></script> 
<script src="{{ url('assets/js/slick.min.js')}}"></script> 
<script src="{{ url('assets/js/jquery.li-scroller.1.0.js')}}"></script> 
<script src="{{ url('assets/js/jquery.newsTicker.min.js')}}"></script> 
<script src="{{ url('assets/js/jquery.fancybox.pack.js')}}"></script> 
<script src="{{ url('assets/js/custom.js')}}"></script>
</body>
</html>