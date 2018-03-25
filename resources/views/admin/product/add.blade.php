@extends('admin.master')
@section('title','Thêm Sản Phẩm')
@section('content')
<form method="post" enctype="multipart/form-data">
<div class="col-lg-6">
  @if(count($errors) > 0)
    <ul class="alert alert-danger">
      @foreach($errors->all() as $error)
        <li> {!! $error !!} </li>
      @endforeach
    </ul>
  @endif

    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
    <div class="form-group has-success">
      <select class="form-control" name="id_product">
        <option value="">Lựa Chọn Danh Mục Sản Phẩm</option>
        @foreach($cates as $cate)
        @if($cate->id == old('id_product'))
        <option selected value="{!! $cate->id !!}">{!! $cate->name !!}</option>
        @else
        <option value="{!! $cate->id !!}">{!! $cate->name !!}</option>
        @endif
        @endforeach
      </select>
    </div>
    <div class="form-group has-success">
      <label class="control-label" for="inputSuccess"> Tên Sản Phẩm </label>
      <input id="inputSuccess" type="text" class="form-control" name="name" value="{!! old('name') !!}" placeholder="Nhập Tên Sản Phẩm....">
    </div>
    <div class="form-group has-success">
      <label class="control-label" for="inputSuccess"> Giá Sản Phẩm </label>
      <input id="inputSuccess" type="text" class="form-control" name="price" value="{!! old('price') !!}" placeholder="Nhập Giá Sản Phẩm....">
    </div>
    <div class="form-group has-success">
      <label class="control-label" for="inputSuccess"> Giá Sale Sản Phẩm</label>
      <input id="inputSuccess" type="text" class="form-control" name="pricesale" value="{!! old('pricesale') !!}" placeholder="Nhập GIá Sale Sản Phẩm....">
    </div>
    <div class="form-group has-success">
      <label class="control-label" for="inputSuccess"> Mô Tả Sản Phẩm </label>
      <textarea name="des" class="form-control" rows="8" cols="80">{!! old('des') !!}</textarea>
      <script type="text/javascript"> ckeditor('des')</script>
    </div>
    <div class="form-group has-success">
      <label class="control-label" for="inputSuccess"> Nội Dung Sản Phẩm </label>
      <textarea name="content" class="form-control" rows="8" cols="80">{!! old('content') !!}</textarea>
      <script type="text/javascript"> ckeditor('content')</script>
    </div>
    <div class="form-group has-success">
      <label class="control-label" for="inputSuccess"> Hình ảnh sản phẩm </label>
      <input type="file" name="img_product" value="">
    </div>
    <input type="submit" class="btn btn-md btn-success pull-right" name="" value="Tạo Sản Phẩm" >

</div>
<div class="col-lg-1">
</div>
<div class="col-lg-5">
  <button type="button" class="btn btn-info" id="addimagedetail" name="button">Tạo Hình Ảnh Phụ</button>
  <div class="insert">

  </div>
</div>
</form>
@stop
