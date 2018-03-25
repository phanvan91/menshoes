@extends('admin.master')
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
                  <th>STT</th>
                  <th>Tên Khách Hàng</th>
                  <th>Số Điện Thoại</th>
                  <th>Email</th>
                  <th>Trạng Thái</th>
                  <th>Chi Tiết Đơn Hàng</th>
                  <th>Xóa</th>
              </tr>
            </thead>

            <tbody>
              <?php $stt = 0 ?>
              @foreach($customer as $cus)
              <?php $stt+=1 ?>
              <tr class="odd gradeX">
                  <td>{!! $stt !!}</td>
                  <td>{!! $cus['name'] !!}</td>
                  <td>0{!! $cus['phone_number'] !!}</td>
                  <td>{!! $cus['email'] !!}</td>
                  <td>
                    @if($cus['status'] == 0 )
                      <b>Chưa xử lí</b>
                      @elseif($cus['status'] == 1)
                        <b>Đang Xử Lí</b>
                        @else
                          <b>  Đã Xử Lí</b>
                            @endif
                  </td>
                  <td class="center"> <a href="{!! URL::route('getChiTiet',$cus['id']) !!}"> <i class="glyphicon glyphicon-edit"></i> </a> </td>
                  <td class="center"> <a href="{!! URL::route('getXoaDonHang',$cus['id']) !!}" onclick="return confirm('Bạn Có Muốn Xóa User Này Không?')" > <i class="glyphicon glyphicon-remove"></i> </a> </td>
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
