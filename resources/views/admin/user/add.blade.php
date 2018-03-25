@extends('admin.master')
@section('title','Thêm User')
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
      <label class="control-label" for="inputSuccess"> Nhập Tên Của Bạn </label>
      <input id="inputSuccess" type="text" class="form-control" name="name" value="" placeholder="Nhập Tên.....">
    </div>
    <div class="form-group has-success">
      <label class="control-label" for="email"> Nhập Email Của Bạn </label>
      <input type="email" class="form-control" name="email" id="email" placeholder="Nhập Email....." value="">
    </div>
    <div class="form-group has-success">
      <label class="control-label" for="password"> Nhập Password </label>
      <input id="password" type="password" name="pass" value="" placeholder="Nhập Password...." class="form-control">
    </div>
    <div class="form-group has-success">
      <label for="repass" class="control-label"> Nhập Lại Mật Khẩu </label>
      <input type="password" name="repass" id="repass" placeholder="Nhập Lại Password...." class="form-control" value="">
    </div>
    <input type="submit" class="btn btn-md btn-success pull-right" name="" value="Tạo User" >
  </form>
</div>
@stop
