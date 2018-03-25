<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="shortcut icon" href="images/favicon.png">
      <base href="{!! asset('') !!}" >
      <title>Welcome to FlatShop</title>
      <link href="front/css/bootstrap.css" rel="stylesheet">
      <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,700,500italic,100italic,100' rel='stylesheet' type='text/css'>
      <link href="front/css/font-awesome.min.css" rel="stylesheet">
      <link rel="stylesheet" href="front/css/flexslider.css" type="text/css" media="screen"/>
      <link href="front/css/sequence-looptheme.css" rel="stylesheet" media="all"/>
      <link href="front/css/style.css" rel="stylesheet">

      <!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script><![endif]-->
   </head>
   <body >
      <div class="wrapper">
        <div class="header">
          @include('front.include.header')
        </div>
         <div class="clearfix"></div>
         @yield('content')
         <div class="footer">
         @include('front.include.footer')
         </div>
      </div>
      <!-- Bootstrap core JavaScript==================================================-->
	  <script type="text/javascript" src="front/js/jquery-1.10.2.min.js"></script>

	  <script type="text/javascript" src="front/js/jquery.easing.1.3.js"></script>
	  <script type="text/javascript" src="front/js/bootstrap.min.js"></script>
    <script defer src="front/js/jquery.flexslider.js"></script>
	  <script type="text/javascript" src="front/js/jquery.sequence-min.js"></script>
	  <script type="text/javascript" src="front/js/jquery.carouFredSel-6.2.1-packed.js"></script>
    <script type="text/javascript" src='front/js/jquery.elevatezoom.js'>
       </script>
	  <script type="text/javascript" src="front/js/script.min.js" ></script>
      @yield('scrip')
      <script type="text/javascript">
        $(".alert").delay(3000).slideUp();
      </script>
   </body>
</html>
