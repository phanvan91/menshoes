@extends('admin.master')
@section('content')
<div class="col-lg-6">
  @if(count($errors) > 0)
    <ul class="alert alert-danger">
      @foreach($errors->all() as $error)
        <li> {!! $error !!} </li>
      @endforeach
    </ul>
  @endif
  <form method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
    <div class="form-group has-success">
      <label class="control-label" for="inputSuccess"> Tiêu đề slide </label>
      <input id="inputSuccess" type="text" class="form-control" name="tieude" value="" placeholder="Nhập Tên Danh Mục....">
    </div>
    <div class="form-group has-success">
      <label class="control-label" for="mota"> Mô tả </label>
      <textarea name="mota" rows="8" class="form-control" id="mota" cols="80"></textarea>
    </div>
    <div class="form-group has-success">
      <label class="control-label" for="link"> Link </label>
      <input type="text" class="form-control" name="link" id="link" value="">
    </div>
    <div class="form-group">
      <label for=""> logo </label>
      <input type="file" name="imagelogo" value="">
    </div>
    <input type="submit" class="btn btn-md btn-success pull-right" name="" value="Tạo Mới" >
  </form>
</div>
@stop
