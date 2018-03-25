@extends('front.master')
@section('content')
<div class="container_fullwidth">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="category leftbar">
          <h3 class="title">
            Danh Mục Sản Phẩm
          </h3>
          <ul>
            @foreach($cate as $category)
            <li>
              <a href="#">
                {!! $category['name'] !!}
              </a>
            </li>
            @endforeach
          </ul>
        </div>
        <div class="clearfix">
        </div>
        <div class="branch leftbar">
          <h3 class="title">
            Branch
          </h3>
          <ul>
            <li>
              <a href="#">
                New
              </a>
            </li>
            <li>
              <a href="#">
                Sofa
              </a>
            </li>
            <li>
              <a href="#">
                Salon
              </a>
            </li>
            <li>
              <a href="#">
                New Trend
              </a>
            </li>
            <li>
              <a href="#">
                Living room
              </a>
            </li>
            <li>
              <a href="#">
                Bed room
              </a>
            </li>
          </ul>
        </div>
        <div class="clearfix">
        </div>
        <div class="price-filter leftbar">
          <h3 class="title">
            Price
          </h3>
          <form class="pricing">
            <label>
              $
              <input type="number">
            </label>
            <span class="separate">
              -
            </span>
            <label>
              $
              <input type="number">
            </label>
            <input type="submit" value="Go">
          </form>
        </div>
        <div class="clearfix">
        </div>
        <div class="product-tag leftbar">
          <h3 class="title">
            Products
            <strong>
              Tags
            </strong>
          </h3>
          <ul>
            <li>
              <a href="#">
                Lincoln us
              </a>
            </li>
            <li>
              <a href="#">
                SDress for Girl
              </a>
            </li>
            <li>
              <a href="#">
                Corner
              </a>
            </li>
            <li>
              <a href="#">
                Window
              </a>
            </li>
            <li>
              <a href="#">
                PG
              </a>
            </li>
            <li>
              <a href="#">
                Oscar
              </a>
            </li>
            <li>
              <a href="#">
                Bath room
              </a>
            </li>
            <li>
              <a href="#">
                PSD
              </a>
            </li>
          </ul>
        </div>
        <div class="clearfix">
        </div>
        <div class="others leftbar">
          <h3 class="title">
            Others
          </h3>
        </div>
        <div class="clearfix">
        </div>
        <div class="others leftbar">
          <h3 class="title">
            Others
          </h3>
        </div>
        <div class="clearfix">
        </div>
        <div class="fbl-box leftbar">
          <h3 class="title">
            Facebook
          </h3>
          <span class="likebutton">
            <a href="#">
              <img src="images/fblike.png" alt="">
            </a>
          </span>
          <p>
            12k people like Flat Shop.
          </p>
          <ul>
            <li>
              <a href="#">
              </a>
            </li>
            <li>
              <a href="#">
              </a>
            </li>
            <li>
              <a href="#">
              </a>
            </li>
            <li>
              <a href="#">
              </a>
            </li>
            <li>
              <a href="#">
              </a>
            </li>
            <li>
              <a href="#">
              </a>
            </li>
            <li>
              <a href="#">
              </a>
            </li>
            <li>
              <a href="#">
              </a>
            </li>
          </ul>
          <div class="fbplug">
            <a href="#">
              <span>
                <img src="front/images/fbicon.png" alt="">
              </span>
              Facebook social plugin
            </a>
          </div>
        </div>
        <div class="clearfix">
        </div>
        <div class="leftbanner">
          <img src="front/images/banner-small-01.png" alt="">
        </div>
      </div>
      <div class="col-md-9">
        <div class="banner">
          <div class="bannerslide" id="bannerslide">
            <ul class="slides">
              <li>
                <a href="#">
                  <img src="front/images/banner-01.jpg" alt=""/>
                </a>
              </li>
              <li>
                <a href="#">
                  <img src="front/images/banner-02.jpg" alt=""/>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="clearfix">
        </div>
        <div class="products-grid">
          <div class="toolbar">
            <div class="sorter">

            </div>
            <div class="pager">
              @if($products->currentPage() !=1 )
              <a href="{!! $products->url($products->currentPage() -1 )  !!}" class="prev-page">
                <i class="fa fa-angle-left">
                </i>
              </a>
              @endif
              @for($i=1; $i <= $products->lastPage() ; $i++)
              <a href="{!! $products->url($i)  !!}" class="{!! ($products->currentPage() == $i)? 'active' : '' !!}">
                {!!$i!!}
              </a>
              @endfor
              @if($products->currentPage() != $products->lastPage())
              <a href="{!! $products->url($products->currentPage() +1 )  !!}" class="next-page">
                <i class="fa fa-angle-right">
                </i>
              </a>
              @endif
            </div>
          </div>
          <div class="clearfix">
          </div>
          <div class="row">
            @foreach($products as $product)
            <div class="col-md-4 col-sm-6">
              <div class="products">
                <div class="thumbnail">
                  <a href="{!! URL::route('detail',[$product['id'],$product['slug']]) !!}">
                    <img src="{!! asset('uploads/images/'.$product['image']) !!}" width="220px" height="150px" alt="Product Name">
                  </a>
                </div>
                <div class="productname">
                  {!! $product['name'] !!}
                </div>
                <h4 class="price">
                  {!! number_format($product['pricesale'],0,',','.') !!} VND
                </h4>
                <div class="button_group">
                  <a href="{!! URL::route('muahang',[$product->id,$product->slug]) !!}" class="button add-cart" type="button">
                    Thêm Giỏ
                  </a>
                  <button class="button compare" type="button">
                    <i class="fa fa-exchange">
                    </i>
                  </button>
                  <button class="button wishlist" type="button">
                    <i class="fa fa-heart-o">
                    </i>
                  </button>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          <div class="clearfix">
          </div>
          <div class="toolbar">
            <div class="pager">
              @if($products->currentPage() !=1 )
              <a href="{!! $products->url($products->currentPage() -1 )  !!}" class="prev-page">
                <i class="fa fa-angle-left">
                </i>
              </a>
              @endif
              @for($i=1; $i <= $products->lastPage() ; $i++)
              <a href="{!! $products->url($i)  !!}" class="{!! ($products->currentPage() == $i)? 'active' : '' !!}">
                {!!$i!!}
              </a>
              @endfor
              @if($products->currentPage() != $products->lastPage())
              <a href="{!! $products->url($products->currentPage() +1 )  !!}" class="next-page">
                <i class="fa fa-angle-right">
                </i>
              </a>
              @endif
            </div>
          </div>
          <div class="clearfix">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="clearfix"></div>
@stop
