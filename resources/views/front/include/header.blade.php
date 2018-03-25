<div class="container">
  <div class="row">
    <div class="col-md-2 col-sm-2">
      <div class="logo">
        <a href="">
          <img src="front/images/logo.png" alt="FlatShop">
        </a>
      </div>
    </div>
    <div class="col-md-10 col-sm-10">
      <div class="header_top">
        <div class="row">

          <div class="col-md-6">
            <!-- <ul class="topmenu">
              <li>
                <a href="#">
                  About Us
                </a>
              </li>
              <li>
                <a href="#">
                  News
                </a>
              </li>
              <li>
                <a href="#">
                  Service
                </a>
              </li>
              <li>
                <a href="#">
                  Recruiment
                </a>
              </li>
              <li>
                <a href="#">
                  Media
                </a>
              </li>
              <li>
                <a href="#">
                  Support
                </a>
              </li>
            </ul> -->
          </div>
          <div class="col-md-3">
            <ul class="usermenu">
              <li>
                <a href="checkout.html" class="log">
                  Login
                </a>
              </li>
              <li>
                <a href="checkout2.html" class="reg">
                  Register
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="clearfix">
      </div>
      <div class="header_bottom">
        <ul class="option">
          <li id="search" class="search">
            <form>
              <input class="search-submit" type="submit" value="">
              <input class="search-input" placeholder="Enter your search term..." type="text" value="" name="search">
            </form>
          </li>
          <li class="option-cart">
            <a href="{!! URL::route('getgiohang') !!}" class="cart-icon">
              cart
              <span class="cart_no">
                <?php echo Cart::count(); ?>
              </span>
            </a>
            <ul class="option-cart-item">
              @if(Cart::count() == 0)
              <li>Chưa có sản phẩm</li>
              @else
              <?php foreach(Cart::content() as $cart) : ?>
              <li>
                <div class="cart-item">
                  <div class="image">
                    <img src="{!! asset('uploads/images/'.$cart->options['image']) !!}" alt="">
                  </div>
                  <div class="item-description">
                    <p class="name">
                      {!! $cart->name !!}
                    </p>
                    <p>
                      Size:
                      <span class="light-red">
                        One size
                      </span>
                      <br>
                      Quantity:
                      <span class="light-red">
                        {!! $cart->qty !!}
                      </span>
                    </p>
                  </div>
                  <div class="right">
                    <p class="price">
                      {!! number_format($cart->price,0,',','.') !!} VND
                    </p>
                    </a>
                  </div>
                </div>
              </li>
            <?php endforeach ?>
            @endif
            </ul>
          </li>
        </ul>
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">
              Toggle navigation
            </span>
            <span class="icon-bar">
            </span>
            <span class="icon-bar">
            </span>
            <span class="icon-bar">
            </span>
          </button>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active dropdown">
              <a href="" >
                Trang Chủ
              </a>
            </li>
            <?php $cate = DB::table('categories')->get();?>
            @foreach($cate as $category)
            <li>
              <a href="{!! URL::route('cate',[$category->id,$category->slug]) !!}">
                {{$category->name}}
              </a>
            </li>
            @endforeach
            <li>
              <a href="{!! URL::route('getgiohang') !!}">
                Giỏ Hàng
              </a>
            </li>
            <li>
              <a href="{!! URL::route('contact') !!}">
                contact us
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
