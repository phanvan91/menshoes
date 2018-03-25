<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
class CateController extends Controller
{
    public function getAddCate(){
      return view('admin.cate.add');
    }
    public function postAddCate(Request $request){
      $this->validate($request,[
        'name' => 'required|unique:categories,name'
      ],[
        'name.required' => 'Bạn Không Được Để Trống Danh Mục',
        'name.unique' => 'Danh Mục Này Đã Tồn Tại'
      ]);
      $cate = new category;
      $cate->name = $request->name;
      $cate->slug = str_slug($request->name);
      $cate->save();
      return redirect()->route('getListCate')->with(['flash_message' => 'Bạn Đã Tạo Xong Danh Mục','flash_level'=>'success']);
    }
    public function getListCate(){
      $cates = category::all();
      return view('admin.cate.list',compact('cates'));
    }
    public function getEditCate($id){
      $cate = category::find($id);
      return view('admin.cate.edit',compact('cate'));
    }
    public function postEditCate($id,Request $request){
      $this->validate($request,[
        'name'=> 'required|unique:categories,name'
      ],[
        'name.required' => 'Vui Lòng Không Được Để Trống Danh Mục',
        'name.unique' => 'Danh Mục Này Đã Tồn Tại'
      ]);
      $cate = category::find($id);
      $cate->name = $request->name;
      $cate->slug = str_slug($request->name);
      $cate->save();
      return redirect()->route('getListCate')->with(['flash_level'=>'success','flash_message'=>'Bạn Đã Sửa Thành Công Danh Mục']);
    }
    public function getDelCate($id){
      $cate = Category::find($id);
      $cate->delete($id);
      return redirect()->route('getListCate')->with(['flash_level'=>'success','flash_message'=>'Bạn Đã Xóa Thành Công Danh Mục']);
    }
}
