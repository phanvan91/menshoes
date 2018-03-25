@extends('admin.master')
@section('title','Sửa Sản Phẩm')
@section('content')
<form method="post" name="editproduct" enctype="multipart/form-data">
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
        @if($cate->id == old('id_product',isset($product)?$product['id_cate']:null))
        <option selected value="{!! $cate->id !!}">{!! $cate->name !!}</option>
        @else
        <option value="{!! $cate->id !!}">{!! $cate->name !!}</option>
        @endif
        @endforeach
      </select>
    </div>
    <div class="form-group has-success">
      <label class="control-label" for="inputSuccess"> Tên Sản Phẩm </label>
      <input id="inputSuccess" type="text" class="form-control" name="name" value="{!! old('name',isset($product)?$product['name']:null) !!}" placeholder="Nhập Tên Sản Phẩm....">
    </div>
    <div class="form-group has-success">
      <label class="control-label" for="inputSuccess"> Giá Sản Phẩm </label>
      <input id="inputSuccess" type="text" class="form-control" name="price" value="{!! old('price',isset($product)?$product['price']:null) !!}" placeholder="Nhập Giá Sản Phẩm....">
    </div>
    <div class="form-group has-success">
      <label class="control-label" for="inputSuccess"> Giá Sale Sản Phẩm</label>
      <input id="inputSuccess" type="text" class="form-control" name="pricesale" value="{!! old('pricesale',isset($product)?$product['pricesale']:null) !!}" placeholder="Nhập GIá Sale Sản Phẩm....">
    </div>
    <div class="form-group has-success">
      <label class="control-label" for="inputSuccess"> Mô Tả Sản Phẩm </label>
      <textarea name="des" class="form-control" rows="8" cols="80">{!! old('des',isset($product)?$product['des']:null) !!}</textarea>
      <script type="text/javascript"> ckeditor('des')</script>
    </div>
    <div class="form-group has-success">
      <label class="control-label" for="inputSuccess"> Nội Dung Sản Phẩm </label>
      <textarea name="content" class="form-control" rows="8" cols="80">{!! old('content',isset($product)?$product['content']:null) !!}</textarea>
      <script type="text/javascript"> ckeditor('content')</script>
    </div>
    <div class="form-group has-success">
      <label class="control-label" for="inputSuccess"> Hình ảnh sản phẩm </label><br>
      <img src="uploads/images/{!! $product->image !!}" width="150px" class="img-responsive" alt=""><br>
      <input type="hidden" name="img_current" value="{!! $product->image !!}">
      <label class="control-label" for="inputSuccess" for=""> Thay Hình Ảnh </label>
      <input type="file" name="img_product" value="">
    </div>
    <input type="submit" class="btn btn-md btn-info pull-right" name="" value="Sửa Sản Phẩm" >

</div>
<div class="col-lg-1">
</div>
<div class="col-lg-5">
  @foreach($img_detail as $key => $image)
  <div class="form-group" id="{!! $key !!}">
    <img src="uploads/imagedetail/{!! $image['image'] !!}" idhinh="{!! $image['id'] !!}" id="{!!$key!!}"  width="150px" alt="">
    <a href="javascript:void(0)" type="button" class="btn btn-danger btn-circle" id="del_img"> <i class="fa fa-times"></i> </button> </a>
  </div>
  @endforeach
  <button type="button" class="btn btn-info" id="addimagedetail" name="button">Tạo Hình Ảnh Phụ</button>
  <div class="insert">

  </div>
</div>
</form>
@stop
