@extends('layouts.admin')

@section('content')



<?php

$title = $a->posttitle;
$content = $a->postcontent;
$impath = $a->fmedia;

echo "<h1>$title</h1>";
echo "<p>$content</p>";
echo "<img class='img' src='$impath'/>";


 ?>



@endsection
