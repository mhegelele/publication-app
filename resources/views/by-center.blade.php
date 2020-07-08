@extends('layout.new')
@section('content')
 <section id="contentSection">
    <div class="row">

      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_post_content">
            <h2><span>NIMR-{{$name->c_name}}</span></h2>
            <div class="">

@foreach($text as $f)
<div class="citation">
  <a href='{{url("publication/$f->p_id")}}'> {{$f->citation}}</a></strong><br>
</div>
@endforeach
<div>{{$text->links()}}</div>


              
            </div>
          </div>
          
          
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <aside class="right_content">
        
        
          <div class="single_sidebar">
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
          
          <div>
     
    
  </section>
  @endsection