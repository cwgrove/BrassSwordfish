@extends('layouts.admin')

@section('content')

<div class="row">
<div class="container">

  <h1>Video</h1>
  @foreach ($a as $vid)

<?php
$posturl = $vid->posttitle;
$series = str_replace(' ', '-', $posturl);
?>
    <div class="col-xs-4">
        <a href="{{ $series }}">
          <img width="50px" src="{{ $vid->fmedia }}"/>
          <h3>{{ $vid->posttitle }}</h3>
          <p>{{ $vid->postcontent }}</p>
        </a>
    </div>
  @endforeach


</div>
</div>


<hr/>


<div class="row">
<div class="container">

   <h1>Post</h1>
  @foreach ($b as $post)
  <?php
  $posturl = $post->posttitle;
  $series = str_replace(' ', '-', $posturl);
  ?>

    <div class="col-xs-4">
        <a href="{{ $series }}">
          <img width="50px" src="{{ $post->fmedia }}"/>
          <h3>{{ $post->posttitle }}</h3>
          <p>{{ $post->postcontent }}</p>
        </a>
    </div>
  @endforeach


</div>
</div>



@endsection
