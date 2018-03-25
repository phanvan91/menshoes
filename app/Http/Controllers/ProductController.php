<?php

namespace App\Http\Controllers;


use App\category;
use App\Http\Requests\ProductRequest;
use App\product;
use App\imagedetailproduct;
use Auth;
use Request;
use File;
class ProductController extends Controller
{
    public function getAddProduct(){
      $cates = category::all();
      return view('admin.product.add',compact('cates'));
    }
    public function postAddProduct(ProductRequest $request){
      $nameimage = $request->file('img_product')->getClientOriginalName();
      $product = new product;
      $product->name = $request->name;
      $product->slug = str_slug($request->name);
      $product->price = $request->price;
      $product->pricesale = $request->pricesale;
      $product->des = $request->des;
      $product->content = $request->content;
      $product->image = $nameimage;
      $product->id_user = Auth::user()->id;
      $product->id_cate = $request->id_product;
      $request->file('img_product')->move('uploads/images/',$nameimage);
      $product->save();
      if($request->hasFile('imagedetail')){
        foreach($request->imagedetail as $value){
          $img_detail = new imagedetailproduct;
          $img_detail->image = $value->getClientOriginalName();
          $img_detail->id_product = $product->id;
          $value->move('uploads/imagedetail/',$value->getClientOriginalName());
          $img_detail->save();
        }
      }
      return redirect()->route('getListProduct')->with(['flash_level'=>'success','flash_message'=>'Bạn Đã Tạo Sản Phẩm Thành Công']);
    }
    public function getListProduct(){
      $products = product::select('name','image','id_cate','id')->orderBy('id','desc')->get()->toArray();
      return view('admin.product.list',compact('products'));
    }
    public function getEditProduct($id){
      $cates = category::all();
      $product = product::find($id);
      $img_detail = product::find($id)->imagedetailproduct->toArray();
      return view('admin.product.edit',compact('cates','product','img_detail'));
    }
    public function postEditProduct($id,Request $request){
      $product = product::find($id);
      $product->name = Request::input('name');
      $product->slug = str_slug(Request::input('name'));
      $product->price = Request::input('price');
      $product->pricesale = Request::input('pricesale');
      $product->des = Request::input('des');
      $product->content = Request::input('content');
      $product->id_user = Auth::user()->id;
      $product->id_cate = Request::input('id_product');
      if(!empty(Request::File('img_product'))){
        $img_name = Request::File('img_product')->getClientOriginalName();
        $product->image = $img_name;
        Request::File('img_product')->move('uploads/images/',$img_name);
        $img_current = 'uploads/images/'.Request::input('img_current');
        if(File::exists($img_current)){
          File::delete($img_current);
        }
      }
      $product->save();
      if(!empty(Request::File('imagedetail'))){
        foreach(Request::File('imagedetail') as $value){
          $image_detail = new imagedetailproduct;
          $image_detail->image = $value->getClientOriginalName();
          $image_detail->id_product = $id;
          $value->move('uploads/imagedetail/',$value->getClientOriginalName());
          $image_detail->save();
        }
      }
      return redirect()->route('getListProduct')->with(['flash_level'=>'success','flash_message'=>'Bạn Đã Sửa Sản Phẩm Thành Công']);
    }

    public function getDelProduct($id){
      $image_detai = product::find($id)->imagedetailproduct->toArray();
      foreach($image_detai as $value){
        File::delete('uploads/imagedetail/'.$value['image']);
      }
      $product = product::find($id);
      File::delete('uploads/images/'.$product['image']);
      $product->delete($id);
      return redirect()->route('getListProduct')->with(['flash_level'=>'success','flash_message'=>'Bạn Đã Xóa Sản Phẩm Thành Công']);
    }


    public function del_img_detai($id){
      if(Request::ajax()){
        $idhinh = (int)Request::get('idhinh');
        $imgdetail = imagedetailproduct::find($idhinh);
        if(!empty($imgdetail)){
          $img = 'uploads/imagedetail/'.$imgdetail->image;
          if(File::exists($img)){
            File::delete($img);
          }
          $imgdetail->delete();
        }
      }
    return 'ok';
  }
}
