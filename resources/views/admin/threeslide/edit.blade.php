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
      <label class="control-label" for="inputSuccess"> Ảnh Hiện Tại </label><br>
      <img src="{!! asset('uploads/slide/slidethree/'.$threeslide['image']) !!}" alt="">
      <input type="hidden" name="img_current" value="{!! $threeslide['image'] !!}">
    </div>
    <hr>
    <div class="form-group has-success">
      <label class="control-label" for="inputSuccess"> Sửa Ảnh Slide 370x124 </label>
      <input type="file" name="img_three" value="">
    </div>
    <input type="submit" class="btn btn-md btn-success pull-left" name="" value="Sửa Ảnh" >
  </form>
</div>
@stop
