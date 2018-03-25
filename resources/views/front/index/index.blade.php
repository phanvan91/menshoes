@extends('front.master')

@section('content')
<div id="home" class="hom-slider">
   <div class="container">
      <div id="sequence">
         <div class="sequence-prev"><i class="fa fa-angle-left"></i></div>
         <div class="sequence-next"><i class="fa fa-angle-right"></i></div>
         <ul class="sequence-canvas">
           @foreach($slide as $value)
            <li>
               <div class="flat-caption caption2 formLeft delay400 text-center">
                  <h1>{!! $value['title'] !!}</h1>
               </div>
               <div class="flat-caption caption3 formLeft delay500 text-center">
                  <p>{!! $value['des'] !!}</p>
               </div>
               <div class="flat-button caption4 formLeft delay600 text-center"><a class="more" href="#">More Details</a></div>
               <div class="flat-image formBottom delay200" data-bottom="true"><img src="{!! asset('uploads/slide/'.$value['image']) !!}" alt=""></div>
            </li>
            @endforeach
         </ul>
      </div>
   </div>
   <div class="promotion-banner">
      <div class="container">
         <div class="row">
           @foreach($threeslide as $three)
            <div class="col-md-4 col-sm-4 col-xs-4">
               <div class="promo-box"><img src="{!! asset('uploads/slide/slidethree/'.$three['image']) !!}" alt=""></div>
            </div>
            @endforeach
         </div>
      </div>
   </div>
</div>
<div class="clearfix"></div>
<div class="container_fullwidth">
   <div class="container">
     @foreach($categories as $cate)
     <?php $products = DB::table('products')->select('name','pricesale','image','slug','id')->orderBy('id','desc')->where('id_cate',$cate['id'])->take(4)->get();?>
      <div class="hot-products">
         <h3 class="title"><strong>Hot</strong> {!!$cate['name']!!} </h3>
         <ul>
            <li>
               <div class="row">
                 @foreach($products as $product)
                  <div class="col-md-3 col-sm-6">
                     <div class="products">
                        <div class="thumbnail"><a href="{!! URL::route('detail',[$product->id,$product->slug]) !!}"><img src="{!! asset('uploads/images/'.$product->image) !!}" width="220px" height="150px" alt="Product Name"></a></div>
                        <div class="productname">{!! $product->name !!}</div>
                        <h4 class="price">{!! number_format($product->pricesale,0,',','.') !!} VND</h4>
                        <div class="button_group"><a href="{!! URL::route('muahang',[$product->id,$product->slug]) !!}" class="button add-cart" >Thêm Giỏ Hàng</a><button class="button compare" type="button"><i class="fa fa-exchange"></i></button><button class="button wishlist" type="button"><i class="fa fa-heart-o"></i></button></div>
                     </div>
                  </div>
                  @endforeach
               </div>
            </li>
         </ul>
      </div>
      <div class="clearfix"></div>
      @endforeach
      <div class="our-brand">
         <h3 class="title"><strong>Our </strong> Brands</h3>
         <div class="control"><a id="prev_brand" class="prev" href="#">&lt;</a><a id="next_brand" class="next" href="#">&gt;</a></div>
         <ul id="braldLogo">
            <li>
               <ul class="brand_item">
                  <li>
                     <a href="#">
                        <div class="brand-logo"><img src="front/images/envato.png" alt=""></div>
                     </a>
                  </li>
                  <li>
                     <a href="#">
                        <div class="brand-logo"><img src="front/images/themeforest.png" alt=""></div>
                     </a>
                  </li>
                  <li>
                     <a href="#">
                        <div class="brand-logo"><img src="front/images/photodune.png" alt=""></div>
                     </a>
                  </li>
                  <li>
                     <a href="#">
                        <div class="brand-logo"><img src="front/images/activeden.png" alt=""></div>
                     </a>
                  </li>
                  <li>
                     <a href="#">
                        <div class="brand-logo"><img src="front/images/envato.png" alt=""></div>
                     </a>
                  </li>
               </ul>
            </li>
            <li>
               <ul class="brand_item">
                  <li>
                     <a href="#">
                        <div class="brand-logo"><img src="front/images/envato.png" alt=""></div>
                     </a>
                  </li>
                  <li>
                     <a href="#">
                        <div class="brand-logo"><img src="front/images/themeforest.png" alt=""></div>
                     </a>
                  </li>
                  <li>
                     <a href="#">
                        <div class="brand-logo"><img src="front/images/photodune.png" alt=""></div>
                     </a>
                  </li>
                  <li>
                     <a href="#">
                        <div class="brand-logo"><img src="front/images/activeden.png" alt=""></div>
                     </a>
                  </li>
                  <li>
                     <a href="#">
                        <div class="brand-logo"><img src="front/images/envato.png" alt=""></div>
                     </a>
                  </li>
               </ul>
            </li>
         </ul>
      </div>
   </div>
</div>
<div class="clearfix"></div>
@endsection
