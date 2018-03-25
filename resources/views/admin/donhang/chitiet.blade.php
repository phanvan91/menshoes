@extends('admin.master')
@section('content')
<div class="col-lg-12">
      <table width="100%" class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
              <th>STT</th>
              <th>Hình Ảnh</th>
              <th>Tên Sản Phẩm</th>
              <th>Giá</th>
              <th>Số Lượng</th>
          </tr>
        </thead>

        <tbody>
          <?php $stt = 0 ?>
          <?php $tam = 1  ?>
          @foreach($order as $value)
          <?php $stt +=1 ?>

          <tr class="odd gradeX">
              <td>{!! $stt !!}</td>
              <td> <img src="{!! asset('uploads/images/'.$value['image']) !!}" width="100px" alt=""> </td>
              <td>{!! $value['name'] !!}</td>
              <td>{!! number_format($value['price'],0,',','.') !!} VND </td>
              <td>{!! $value['qty'] !!}</td>
          </tr>
          <?php $tam = $tam +($value['price']*$value['qty']) ?>
          @endforeach
          <tr>
            <td class="pull-right" colspan="5"> Tổng : <?php echo number_format($tam,0,',','.') ?> VND</td>
          </tr>
        </tbody>
      </table>
      <!-- /.table-responsive -->
</div>
<div class="col-lg-6 col-lg-offset-3">
  <form class="" method="post">
    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
    <div class="form-group">
      <label>Trạng Thái</label>
      <div class="radio">
        <label for="optionsRadios1">
          <input id="optionsRadios1" type="radio" name="status" @if($customer['status'] == 0 ) checked  @endif value="0" > Chưa Xử Lí
        </label>
      </div>
      <div class="radio">
        <label for="optionsRadios2">
          <input type="radio" id="optionsRadios2" name="status" @if($customer['status'] == 1 ) checked  @endif value="1"> Đang Xử Lí
        </label>
      </div>
      <div class="radio">
        <label for="optionsRadios3">
          <input type="radio" id="optionsRadios3" name="status"  @if($customer['status'] == 2 ) checked  @endif value="2"> Đã Xử Lí
        </label>
      </div>
      <input type="submit" name="submit" value="Thực Hiện" class="btn btn-default">
    </div>
  </form>


</div>
@stop
