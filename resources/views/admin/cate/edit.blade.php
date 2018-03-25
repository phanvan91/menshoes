@extends('admin.master')
@section('title','Sửa Danh Mục')
@section('content')
<div class="col-lg-6">
  @if(count($errors) > 0)
    <ul class="alert alert-danger">
      @foreach($errors->all() as $error)
        <li> {!! $error !!} </li>
      @endforeach
    </ul>
  @endif
  <form method="post">
    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
    <div class="form-group has-success">
      <label class="control-label" for="inputSuccess"> Tạo Mới Danh Mục </label>
      <input id="inputSuccess" type="text" class="form-control" name="name" value="{!! old('name',isset($cate)?$cate->name:null) !!}" placeholder="Nhập Tên Danh Mục....">
    </div>
    <input type="submit" class="btn btn-md btn-success pull-right" name="" value="Tạo Danh Mục" >
  </form>
</div>
@stop
