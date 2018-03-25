@extends('front.master')
@section('content')
<div class="container_fullwidth">
  <div class="container shopping-cart">
    <div class="row">
      @if(count($errors) > 0)
        <ul class="alert alert-danger">
          @foreach($errors->all() as $error)
            <li> {!! $error !!} </li>
          @endforeach
        </ul>
      @endif
      <div class="col-md-12">
        <h3 class="title">
          Shopping Cart
        </h3>
        <div class="clearfix">
        </div>
        <form class="" method="post">

          <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <table class="shop-table">
          <thead>
            <tr>
              <th>
                Hình Ảnh
              </th>
              <th>
                Sản Phẩm
              </th>
              <th>
                Giá
              </th>
              <th>
                Số Lượng
              </th>
              <th>
                Tổng Giá
              </th>
              <th>
                Xóa
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach($content as $product)
            <tr>
              <td>
                <img src="{!! asset('uploads/images/'.$product->options['image']) !!}" alt="">
              </td>
              <td>
                <div class="shop-details">
                  <div class="productname">
                    {!! $product->name !!}
                  </div>

                  <p>
                    Product Code :
                    <strong class="pcode">
                      Dress 120
                    </strong>
                  </p>
                </div>
              </td>
              <td>
                <h5>
                  {!! number_format($product->price,0,',','.') !!} VND
                </h5>
              </td>
              <td>
                <input  type="number" class="qty1" name="qty" value="{!! $product->qty !!}" style="width:60px"><br>
                <a id="{!! $product->rowId !!}" class="update" > <i style="font-size:200%;margin:10px 0px" class="glyphicon glyphicon-refresh"></i> </a>
              </td>
              <td>
                <h5>
                  <strong class="red">
                    {!! number_format($product->price*$product->qty,0,',','.') !!}
                  </strong>
                </h5>
              </td>
              <td>
                <a href="{!! URL::route('xoagiohang',$product->rowId) !!}">
                  <img src="front/images/remove.png" alt="">
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <td colspan="6">
                <button type="button" id="tieptuc" class=" pull-right">
                  Tiếp Tục Mua Hàng
                </button>
              </td>
            </tr>
          </tfoot>
        </table>
        <div class="clearfix">
        </div>
        <div class="row">

          <div class="col-md-1 col-sm-6"></div>
          <div class="col-md-5 col-sm-6">
            <div class="shippingbox">

              <div class="grandtotal">
                <h5>
                   TOTAL :
                </h5>
                <span>
                  {!! $total !!} VND
                </span>
              </div>
            </div>
          </div>
          <div class="col-md-5 col-sm-6">
            <div class="shippingbox">
              <h5>
                Thanh Toán
              </h5>
                <label>
                  Nhập Tên Khách Hàng
                </label>
                <input type="text" name="tenkhachhang">
                <div class="clearfix"></div>
                <label>
                  Số Điện Thoại Khách Hàng
                </label>
                <input type="text" name="sdtkhachhang">
                <div class="clearfix"></div>
                <label>
                  Email Khách Hàng
                </label>
                <input type="email" name="emailkhachhang">
                <div class="clearfix"></div>
                <input type="submit" name="thanhtoan" class="btn btn-info " value="Thanh Toán">

            </div>
          </div>

        </div>
      </div>
    </div>

  </form>
</div>
<div class="clearfix">
</div>
@stop
@section('scrip')
  <script src="admin/vendor/jquery/jquery.min.js"></script>
  <script type="text/javascript">
    $(".update").click(function(){
      var rowid = $(this).attr('id');
      var qty = $(this).parent().find('.qty1').val();
      var token = $("input[name= '_token']").val();
      $.ajax({
        url : 'update/' +rowid+'/'+qty,
        type : 'GET',
        cache : false,
        data : {"rowid" : rowid,"qty" : qty, "_token" : token},
        success : function(data){
          if(data == 'ok'){
            alert('thay đổi thành công');
            window.location = 'giohang';
          }
        }
      });
    });
  </script>
  <script type="text/javascript">
    $("#tieptuc").click(function(){
      window.location =" <?php echo URL::route('trangchu') ?>";
    });
  </script>
@stop
