@extends('admin.master')
@section('title','Danh Sách User')
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
                  <th>Tên User</th>
                  <th>Email</th>
                  <th>Sửa</th>
                  <th>Xóa</th>
              </tr>
            </thead>

            <tbody>
              <?php $stt=0 ?>
              @foreach($users as $user)
              <?php $stt+=1 ?>
              <tr class="odd gradeX">
                  <td>{!! $stt !!}</td>
                  <td>{!! $user->name !!}</td>
                  <td>{!! $user->email !!}</td>
                  <td class="center"> <a href="{!! URL::route('getEditUser',$user->id) !!}"> <i class="glyphicon glyphicon-edit"></i> </a> </td>
                  <td class="center"> <a onclick="return confirm('Bạn Có Muốn Xóa User Này Không?')" href="{!! URL::route('getDelUser',$user->id) !!}"> <i class="glyphicon glyphicon-remove"></i> </a> </td>
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
