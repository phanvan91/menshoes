<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\customer;
use App\order;
class DonHangController extends Controller
{
    public function getDonHang(){
      $customer = customer::all();
      return view('admin.donhang.donhang',compact('customer'));
    }
    public function getChiTiet($id){
      $customer = customer::find($id);
      $order = customer::find($id)->order->toArray();
      return view('admin.donhang.chitiet',compact('order','customer'));
    }
    public function postChiTiet($id,Request $request){
      $customer = customer::find($id);
      $customer->status = $request->status;
      $customer->save();
      return redirect()->route('getDonHang')->with(['flash_level'=>'success','flash_message'=>'Bạn Đã thay đổi trạng thái thành công']);
    }
    public function getXoaDonHang($id){
      $customer = customer::find($id);
      $customer->delete($id);
      return redirect()->back()->with(['flash_level'=>'danger','flash_message'=>'Bạn Đã Xóa Thành Công Đơn Hàng']);
    }
}
