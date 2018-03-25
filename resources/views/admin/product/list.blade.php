@extends('admin.master')
@section('title','Danh Sách Sản Phẩm')
@section('content')
<div class="col-lg-12">
  @if(Session::has('flash_message'))
  <div class="alert alert-{!! Session::get('flash_level') !!}">
    {!! Session::get('flash_message') !!}
  </div>
    @endif
</div>
<div class="col-lg-12">
  <div class="panel panel-default">
      <div class="panel-heading">
          Danh Sách Các Quản Trị Viên
      </div>
      <!-- /.panel-heading -->
      <div class="panel-body">
          <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
              <tr>
                  <th>Hình Ảnh</th>
                  <th>Tên Sản Phẩm</th>
                  <th>Loại</th>
                  <th>Sửa</th>
                  <th>Xóa</th>
              </tr>
            </thead>

            <tbody>
              @foreach($products as $product)
              <tr class="odd gradeX">
                  <td> <img class="img-responsive" width="100px" src="uploads/images/{!! $product['image'] !!}" alt=""> </td>
                  <td>{!! $product['name'] !!}</td>
                  <?php $cate = DB::table('categories')->where('id',$product['id_cate'])->first()?>
                  <td>{!! $cate->name !!}</td>
                  <td class="center"> <a href="{!!URL::route('getEditProduct',$product['id'])!!}"> <i class="glyphicon glyphicon-edit"></i> </a> </td>
                  <td class="center"> <a href="{!! URL::route('getDelProduct',$product['id']) !!}" onclick="return confirm('Bạn Có Muốn Xóa User Này Không?')" > <i class="glyphicon glyphicon-remove"></i> </a> </td>
              </tr>
              @endforeach
            </tbody>

          </table>
          <!-- /.table-responsive -->

      </div>
      <!-- /.panel-body -->
  </div>
</div>
@stop
