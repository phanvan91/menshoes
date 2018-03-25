<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\slide;
use App\slidethreeimage;
use App\category;
use App\product;
use Mail;
use Cart;
use App\customer;
use App\order;
class FrontController extends Controller
{
    public function index(){
      $slide = slide::orderBy('id','desc')->take(3)->get()->toArray();
      $threeslide = slidethreeimage::orderBy('id','desc')->take(3)->get()->toArray();
      $categories = category::all()->toArray();
      return view('front.index.index',compact('slide','threeslide','categories'));
    }
    public function cate($id){
      $cate = category::all();
      $products = product::select('id','name','pricesale','image','slug')->where('id_cate',$id)->orderBy('id','desc')->paginate(6);
      return view('front.cate.cate',compact('products','cate'));
    }
    public function detail($id){
      $product = product::find($id);
      $product_image_detail = product::find($id)->imagedetailproduct->toArray();
      $product_cungloai = product::select('name','image','pricesale','id','slug')->where('id_cate',$product['id_cate'])->where('id','<>',$id)->orderBy('id','desc')->take(3)->get()->toArray();
      return view('front.detail.detail',compact('product','product_image_detail','product_cungloai'));
    }
    public function getcontact(){
      return view('front.contact.contact');
    }
    public function postcontact(Request $request){
      $data = ['hoten'=>$request->name,'email'=>$request->email,'textmess'=>$request->textmess];
      Mail::send('front.contact.mail',$data,function($msg){
        $msg->from('phanvan91@gmail.com','phanvan');
        $msg->to('phanvan91@gmail.com','phanvanmail');
        $msg->subject('phanvan');
      });
      return redirect()->route('trangchu');
    }
    public function muahang($id){
      $product_buy = product::where('id',$id)->first();
      Cart::add(['id'=>$id,'name'=>$product_buy['name'],'qty'=>1,'price'=>$product_buy['pricesale'],'options'=>['image'=>$product_buy['image']]]);
      $content = Cart::content();
      return redirect()->back();
    }
    public function getgiohang(){
      $content = Cart::content();
      $total = Cart::subtotal();
      return view('front.giohang.giohang',compact('content','total'));
    }
    public function xoagiohang($id){
      Cart::remove($id);
      return redirect()->back();
    }
    public function update_giohang(Request $request){
      if($request->ajax()){
        $rowid = $request->get('rowid');
        $qty = $request->get('qty');
        Cart::update($rowid,$qty);
      }
      return 'ok';
    }
    public function postgiohang(Request $request){
      $this->validate($request,[
        'tenkhachhang' => 'required',
        'sdtkhachhang' => 'required',
        'emailkhachhang' => 'required|email'
      ],[
        'tenkhachhang.required' => 'Vui lòng khách hàng nhập tên',
        'sdtkhachhang.required' => 'Vui lòng khách hàng nhập số điện thoại',
        'emailkhachhang.required' => 'Vui lòng khách hàng nhập email',
        'emailkhachhang.email' => 'Vui lòng khách hàng nhập đúng email'
      ]);
      $customer = new customer;
      $customer->name = $request->tenkhachhang;
      $customer->email = $request->emailkhachhang;
      $customer->phone_number = $request->sdtkhachhang;
      $customer->status = 0;
      $customer->save();

      $content = Cart::content();
      if(!empty($content)){
        foreach($content as $value){
          $order = new order;
          $order->name = $value->name;
          $order->qty = $value->qty;
          $order->price = $value->price;
          $order->image = $value->options['image'];
          $order->id_cus = $customer->id;
          $order->save();
        }
      }
      Cart::destroy();
      return redirect()->route('trangchu');
    }
}
