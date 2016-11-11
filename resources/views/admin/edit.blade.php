@extends('layouts.admin')







@section('content')


<form method="post" action="/share/edit/{{$a->id}}" class="form-horizontal" enctype="multipart/form-data">

<fieldset>
<!-- Form Name -->
<legend>Tell your story</legend>
{{ csrf_field() }}
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="title">Title</label>
  <div class="col-md-4">
  <input id="title" name="title" type="text" value="{{$a->posttitle}}" class="form-control input-md">
  <span class="help-block">help</span>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="postcontent">Content</label>
  <div class="col-md-4">
    <textarea class="form-control" id="postcontent" name="postcontent">{{$a->postcontent}}</textarea>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Post Type</label>
  <div class="col-md-4">
    <select id="selectbasic" name="posttype" class="form-control">
      <option value="1">Video</option>
      <option value="2">Post</option>
    </select>
  </div>
</div>

<!-- File Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="fmedia">Add a pic or video</label>
  <div class="col-md-4">
    <input id="fmeadia" name="fmedia" class="input-file" type="file">
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="sub">Submit</label>
  <div class="col-md-4">
    <button id="sub" name="sub" class="btn btn-primary">Submit</button>
  </div>
</div>

</fieldset>
</form>

@endsection
