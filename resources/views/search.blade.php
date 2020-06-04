@extends('layout.new')
@section('content')
<header class="section2 background-dark">
  <div class="line">        
    <h1 class="text-white margin-top-bottom-40 text-size-60 text-center text-line-height-1">Search Results</h1>
  </div>
</header>
<div id="content-wrapper">
<div class="row tokeza">
<div class="col-md-10 col-md-offset-1 min-robo" style="margin-bottom:30px;">
	@if(count($text) > 0)
	@foreach($text as $res)
	<div class="citation-search">
  <a href='{{url("publication/$res->p_id")}}' class="found">
    <?php
      $text = $res->citation;
      foreach ($search as $key) {
        $text = preg_replace('/(\S*'. $key .'\S*)/i', '<b>$1</b>', $text);
        # code...
      }
      echo $text;
    ?>
  </a>

	</div>
	@endforeach
	@else
	<h1>Sorry! No results found for your search.</h1>
	<div class="row">
    <div class="col-md-8 center">
      <form action="{{url('search-query')}}" method="POST">
        {{csrf_field()}}
          <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search&hellip;">
            <span class="input-group-btn">
                <input type="submit" name="submit" value="Go!" class="btn btn-default">
            </span>
            </div>
      </form>
    </div>       
  </div>
	@endif
</div>
@endsection