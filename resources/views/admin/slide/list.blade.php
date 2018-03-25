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
          Danh Sách Các Slide
      </div>
      <!-- /.panel-heading -->
      <div class="panel-body">
          <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
              <tr>
                  <th>STT</th>
                  <th>Tiêu Đề</th>
                  <th>Sửa</th>
                  <th>Xóa</th>
              </tr>
            </thead>

            <tbody>
              <?php $stt = 0 ?>
              @foreach($slide as $value)
              <?php $stt+=1 ?>
              <tr class="odd gradeX">
                  <td>{!!$stt!!}</td>
                  <td>{{$value['title']}}</td>
                  <td class="center"> <a href="{!! URL::route('getEditSlide',$value['id']) !!}"> <i class="glyphicon glyphicon-edit"></i> </a> </td>
                  <td class="center"> <a href="{!! URL::route('getDelSlide',$value['id']) !!}" onclick="return confirm('Bạn Có Muốn Xóa Slide Này Không?')" > <i class="glyphicon glyphicon-remove"></i> </a> </td>
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
