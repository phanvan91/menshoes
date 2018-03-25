@extends('front.master')
@section('content')
<div class="container_fullwidth">
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <div class="products-details">
          <div class="preview_image">
            <div class="preview-small">
              <img id="zoom_03" src="{!! asset('uploads/images/'.$product['image']) !!}" data-zoom-image="{!! asset('uploads/images/'.$product['image']) !!}" alt="">
            </div>
            <div class="thum-image">
              <ul id="gallery_01" class="prev-thum">
                <li>
                  <a href="#" data-image="{!! asset('uploads/images/'.$product['image']) !!}" data-zoom-image="{!! asset('uploads/images/'.$product['image']) !!}">
                    <img src="{!! asset('uploads/images/'.$product['image']) !!}" alt="">
                  </a>
                </li>
                @foreach($product_image_detail as $image)
                <li>
                  <a href="#" data-image="{!! asset('uploads/imagedetail/'.$image['image']) !!}" data-zoom-image="{!! asset('uploads/imagedetail/'.$image['image']) !!}">
                    <img src="{!! asset('uploads/imagedetail/'.$image['image']) !!}" alt="">
                  </a>
                </li>
                @endforeach
              </ul>
              <a class="control-left" id="thum-prev" href="javascript:void(0);">
                <i class="fa fa-chevron-left">
                </i>
              </a>
              <a class="control-right" id="thum-next" href="javascript:void(0);">
                <i class="fa fa-chevron-right">
                </i>
              </a>
            </div>
          </div>
          <div class="products-description">
            <h5 class="name">
              {!! $product['name'] !!}
            </h5>
            <p>
              <img alt="" src="images/star.png">
              <a class="review_num" href="#">
                02 Review(s)
              </a>
            </p>
            <p>
              Availability:
              <span class=" light-red">
                In Stock
              </span>
            </p>
            <p>
              {!! $product['des'] !!}
            </p>
            <hr class="border">
            <div class="price">
              Price :
              <span class="new_price">
                {!! number_format($product['pricesale'],0,',','.') !!}
                <sup>
                  VND
                </sup>
              </span>
              <span class="old_price">
                {!! number_format($product['price'],0,',','.') !!}
                <sup>
                  VND
                </sup>
              </span>
            </div>
            <hr class="border">
            <div class="wided">

              <div class="button_group">
                <a href="{!! URL::route('muahang',[$product->id,$product->slug]) !!}" class="button" >
                  Thêm Giỏ
                </a>
                <button class="button compare">
                  <i class="fa fa-exchange">
                  </i>
                </button>
                <button class="button favorite">
                  <i class="fa fa-heart-o">
                  </i>
                </button>
                <button class="button favorite">
                  <i class="fa fa-envelope-o">
                  </i>
                </button>
              </div>
            </div>
            <div class="clearfix">
            </div>
            <hr class="border">
            <img src="images/share.png" alt="" class="pull-right">
          </div>
        </div>
        <div class="clearfix">
        </div>
        <div class="tab-box">
          <div id="tabnav">
            <ul>
              <li>
                <a href="#Descraption">
                  DESCRIPTION
                </a>
              </li>
              <li>
                <a href="#Reviews">
                  REVIEW
                </a>
              </li>
              <li>
                <a href="#tags">
                  PRODUCT TAGS
                </a>
              </li>
            </ul>
          </div>
          <div class="tab-content-wrap">
            <div  id="Descraption">

                {!! $product['content'] !!}

            </div>
            <div class="tab-content" id="Reviews">
              <form>
                <div class="row">
                  <div class="col-md-6 col-sm-6">
                    <div class="form-row">
                      <label class="lebel-abs">
                        Your Name
                        <strong class="red">
                          *
                        </strong>
                      </label>
                      <input type="text" name="" class="input namefild">
                    </div>
                    <div class="form-row">
                      <label class="lebel-abs">
                        Your Email
                        <strong class="red">
                          *
                        </strong>
                      </label>
                      <input type="email" name="" class="input emailfild">
                    </div>
                    <div class="form-row">
                      <label class="lebel-abs">
                        Summary of You Review
                        <strong class="red">
                          *
                        </strong>
                      </label>
                      <input type="text" name="" class="input summeryfild">
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6">
                    <div class="form-row">
                      <label class="lebel-abs">
                        Your Name
                        <strong class="red">
                          *
                        </strong>
                      </label>
                      <textarea class="input textareafild" name="" rows="7" >
                      </textarea>
                    </div>
                    <div class="form-row">
                      <input type="submit" value="Submit" class="button">
                    </div>
                  </div>
                </div>
              </form>
            </div>

            <div class="tab-content" id="tags">
              <div class="tag">
                Add Tags :
                <input type="text" name="">
                <input type="submit" value="Tag">
              </div>
            </div>
          </div>
        </div>
        <div class="clearfix">
        </div>
        <div id="productsDetails" class="hot-products">
          <h3 class="title">
            <strong>
              Hot
            </strong>
            Products
          </h3>
          <div class="control">
            <a id="prev_hot" class="prev" href="#">
              &lt;
            </a>
            <a id="next_hot" class="next" href="#">
              &gt;
            </a>
          </div>
          <ul id="hot">
            <?php $cate = DB::table('categories')->get(); ?>
            @foreach($cate as $category)
            <li>
              <div class="row">
                <?php $pro_new = DB::table('products')->select('name','image','pricesale','id','slug')->where('id_cate',$category->id)->orderBy('id','desc')->take(3)->get() ?>
                @foreach($pro_new as $new)
                <div class="col-md-4 col-sm-4">
                  <div class="products">
                    <div class="thumbnail">
                      <a href="{!! URL::route('detail',[$new->id,$new->slug]) !!}"> <img src="{!! asset('uploads/images/'.$new->image) !!}"  width="220px" height="150px" alt="Product Name"> </a>
                    </div>
                    <div class="productname">
                      {!! $new->name !!}
                    </div>
                    <h4 class="price">
                      {!! number_format($new->pricesale,0,',','.') !!} VND
                    </h4>
                    <div class="button_group">
                      <button class="button add-cart" type="button">
                        Add To Cart
                      </button>
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
            </li>
            @endforeach
          </ul>
        </div>
        <div class="clearfix">
        </div>
      </div>
      <div class="col-md-3">
        <div class="special-deal leftbar">
          <h4 class="title">
            Sản Phẩm
            <strong>
              Cùng Loại
            </strong>
          </h4>
          <?php foreach($product_cungloai as $value) : ?>
          <div class="special-item">
            <div class="product-image">
              <a href="{!! URL::route('detail',[$value['id'],$value['slug']]) !!}">
                <img src="{!! asset('uploads/images/'.$value['image']) !!}" alt="">
              </a>
            </div>
            <div class="product-info">
              <p>
                {!! $value['name'] !!}
              </p>
              <h5 class="price">
                {!! number_format($value['pricesale'],0,',','.') !!} VND
              </h5>
            </div>
          </div>
        <?php endforeach ?>
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
        <div class="get-newsletter leftbar">
          <h3 class="title">
            Get
            <strong>
              newsletter
            </strong>
          </h3>
          <p>
            Casio G Shock Digital Dial Black.
          </p>
          <form>
            <input class="email" type="text" name="" placeholder="Your Email...">
            <input class="submit" type="submit" value="Submit">
          </form>
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
                <img src="images/fbicon.png" alt="">
              </span>
              Facebook social plugin
            </a>
          </div>
        </div>
        <div class="clearfix">
        </div>
      </div>
    </div>
    <div class="clearfix">
    </div>
    <div class="our-brand">
      <h3 class="title">
        <strong>
          Our
        </strong>
        Brands
      </h3>
      <div class="control">
        <a id="prev_brand" class="prev" href="#">
          &lt;
        </a>
        <a id="next_brand" class="next" href="#">
          &gt;
        </a>
      </div>
      <ul id="braldLogo">
        <li>
          <ul class="brand_item">
            <li>
              <a href="#">
                <div class="brand-logo">
                  <img src="images/envato.png" alt="">
                </div>
              </a>
            </li>
            <li>
              <a href="#">
                <div class="brand-logo">
                  <img src="images/themeforest.png" alt="">
                </div>
              </a>
            </li>
            <li>
              <a href="#">
                <div class="brand-logo">
                  <img src="images/photodune.png" alt="">
                </div>
              </a>
            </li>
            <li>
              <a href="#">
                <div class="brand-logo">
                  <img src="images/activeden.png" alt="">
                </div>
              </a>
            </li>
            <li>
              <a href="#">
                <div class="brand-logo">
                  <img src="images/envato.png" alt="">
                </div>
              </a>
            </li>
          </ul>
        </li>
        <li>
          <ul class="brand_item">
            <li>
              <a href="#">
                <div class="brand-logo">
                  <img src="images/envato.png" alt="">
                </div>
              </a>
            </li>
            <li>
              <a href="#">
                <div class="brand-logo">
                  <img src="images/themeforest.png" alt="">
                </div>
              </a>
            </li>
            <li>
              <a href="#">
                <div class="brand-logo">
                  <img src="images/photodune.png" alt="">
                </div>
              </a>
            </li>
            <li>
              <a href="#">
                <div class="brand-logo">
                  <img src="images/activeden.png" alt="">
                </div>
              </a>
            </li>
            <li>
              <a href="#">
                <div class="brand-logo">
                  <img src="images/envato.png" alt="">
                </div>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</div>
<div class="clearfix">
</div>
@stop
