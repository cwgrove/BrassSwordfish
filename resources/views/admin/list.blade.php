@extends('layouts.admin')



@section('content')

<?php foreach($a as $post){

  $title = $post->posttitle;
  $id = $post->id;
  echo $title."<br/>";
  echo "<a href='/share/edit/$id'>Edit</a> | <a href='/$id'>View</a> <br/>";

}
?>
@endsection
