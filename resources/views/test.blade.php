@extends('layout.master')
@section('content')
     <section id="contentSection">
<div class="row">
<div class="col-lg-8 col-md-8 col-sm-8">
<div class="left_content">
  <div class="single_post_content">
            <h2><span>LIST OF PUBLICATIONS</span></h2>
<div class="row">
<div class="col-xs-12">
    <div class="search1">

<input id="searchPubs" class="searchPubs" type="text" name="search" placeholder="Search">
</div>
</div>
</div>
<br>
<table id="homePublications" style="width:100%">
</table>
</div>
</div>
</div>
      <div class="col-lg-4 col-md-4 col-sm-4">
  <div class="single_sidebar" style="margin-bottom: 100px;">
           <h2><span>Centers</span></h2>
                 <ul class="centers">
           <li class="centers">
            <?php  $cntrs = ""; $data = "";?>
    @foreach($centres as $centre)
        <?php
          $cntrs .= "\"$centre->c_name\",";
          $data .= $centre->idadi.",";
          ?>
           <a href='{{url("center/$centre->id")}}'>nimr - {{$centre->c_name}} <span class="badge">{{$centre->idadi}}</span></a>
            @endforeach
           </li>
            
           </ul>
          </div>
          <br><br>
  <div class="statistics">
  <canvas id="myChart" width="1000" height="1000"></canvas>
  </div>
</div>
</div>
</section>
@endsection
@section('add_script')
<script>
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: <?php echo '['.rtrim($cntrs,",").']'?>,
        datasets: [{
            label: '# of Votes',
            data: <?php echo '['.rtrim($data,",").']'?>,
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 206, 86)',
                'rgb(75, 192, 192)',
                'rgb(153, 102, 255)',
                'rgb(255, 159, 64)',
                'rgb(230, 159, 64)',
                'rgb(21, 59, 164)',
                'rgb(63, 159, 64)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(230, 159, 64, 1)',
                'rgba(21, 59, 164, 1)',
                'rgba(63, 159, 64,1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        title: {
            display: true,
            position: 'bottom',
            text: 'Publications by center'
        }
    }
});
$(document).ready(function() {

    fill_datatable();

    function fill_datatable(search = ''){
    var dataTable = $('#homePublications').DataTable({
        "processing":true,
        "serverSide":true,
        "searching":false,
        "ajax":{
            url:"{{url('publicationlist_datatable')}}",
            type:"POST",
            data:{search_value:search,"_token": "{{ csrf_token() }}"}
        },
        "columnDefs":[{
            "targets":0,
            "data":"citation",
            "render":function(data, type, row,meta){
              url =  '{{url("publication")}}/'+row.id;
          
                return '<div class="citation"><a href="'+url+'">'+data+'</a></div>';
            }
        }],
    });
}


$("#searchPubs").keyup(function(e){
    $('#homePublications').DataTable().destroy();
    fill_datatable($(this).val());
});
} );
</script>
@endsection
