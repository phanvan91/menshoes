<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <base href="{!! asset('') !!}">
    <title>Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="admin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <link rel="stylesheet" href="admin/vendor/datatables-plugins/dataTables.bootstrap.css">
    <link rel="stylesheet" href="admin/vendor/datatables-responsive/dataTables.responsive.css">

    <!-- Custom CSS -->
    <link href="admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="admin/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <script type="text/javascript">
      var baseURL = "{!! url('/') !!}";
    </script>
    <script type="text/javascript" src="admin/ck/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="admin/ck/ckfinder/ckfinder.js"></script>
    <script type="text/javascript" src="admin/ck/function.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        @include('admin.include.nav')

        <div id="page-wrapper">
          <div class="row">
              <div class="col-lg-12">
                  <h1 class="page-header">@yield('title','Dashboard')</h1>
              </div>
              <!-- /.col-lg-12 -->
              <div class="col-lg-12">
                <ul class="nav nav-pills">
                  <li role="presentation" class="active"><a href="">Trang Chính</a></li>
                  <li role="presentation"><a href="{!! URL::route('getListUser') !!}">Quản lí User</a></li>
                  <li role="presentation"><a href="{!!URL::route('getListCate')!!}">Quản lí Danh mục</a></li>
                  <li role="presentation"><a href="{!! URL::route('getListProduct') !!}">Quản lí Sản phẩm</a></li>
                  <li class="pull-right"> <a href="#">Xin chào  {!! Auth::user()->name !!}</a> </li>
                </ul>
                <hr>
              </div>
            @yield('content')


        </div>
      </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="admin/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="admin/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="admin/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="admin/vendor/raphael/raphael.min.js"></script>
    <script src="admin/vendor/morrisjs/morris.min.js"></script>
    <script src="admin/data/morris-data.js"></script>

    <script src="admin/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="admin/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="admin/vendor/datatables-responsive/dataTables.responsive.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="admin/dist/js/sb-admin-2.js"></script>
    <script>
      $(document).ready(function() {
          $('#dataTables-example').DataTable({
              responsive: true
          });
      });
    </script>

    <script type="text/javascript">
      $(".alert").delay(3000).slideUp();
    </script>
    <script type="text/javascript">
      $("#addimagedetail").click(function(){
        $(".insert").append('<div class="form-group"> <input type="file" name="imagedetail[]"> </div>')
      });
    </script>
    <script type="text/javascript">
      $("a#del_img").click(function(){
        var url = 'http://localhost/menshoes/public/admin-men/product/del-img-detal/';
        var idhinh = $(this).parent().find("img").attr("idhinh");
        var _token = $("form[name = 'editproduct']").find("input[name = '_token']").val();
        var urlhinh = $(this).parent().find("img").attr("src");
        var remove = $(this).parent().find("img").attr("id");
        $.ajax({
          url : url + idhinh,
          type : 'GET',
          cache : false,
          data : {"_token":_token,"idhinh":idhinh,"urlhinh":urlhinh},
          success : function(data){
            if(data == 'ok'){
              $("#"+remove).remove();
            }else{
              alert('errors');
            }
          }
        });
      });
    </script>
</body>

</html>
