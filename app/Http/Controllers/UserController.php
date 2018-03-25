<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\User;
use Hash;
use Auth;
class UserController extends Controller
{
    public function getAddUser(){
      $usercurent = Auth::user()->id;
      if($usercurent == 1){
        return view('admin.user.add');
      }else{
        return redirect()->route('getListUser')->with(['flash_message' => 'Bạn Không Có Quyền Truy Cập','flash_level' => 'danger']);
      }

    }
    public function postAddUser(UserRequest $request){
      $user = new User;
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = Hash::make($request->pass);
      $user->remember_token = $request->_token;
      $user->save();
      return redirect()->route('getListUser')->with(['flash_message' => 'Đã Tạo Thành công user','flash_level' => 'success']);
    }
    public function getListUser(){
      $users = User::all();
      return view('admin.user.list',compact('users'));
    }
    public function getEditUser($id){
      $user = User::find($id);
      $usercurent = Auth::user()->id;
      if($usercurent == 1){
        return view('admin.user.edit',compact('user'));
      }elseif($usercurent == $id){
        return view('admin.user.edit',compact('user'));
      }else{
        return redirect()->route('getListUser')->with(['flash_message' => 'Bạn Không thể sửa user này','flash_level' => 'danger']);
      }

    }
    public function postEditUser($id,Request $request){
      $this->validate($request,[
        'name'=>'required',
        'pass' => 'required',
        'repass' => 'same:pass',
      ],[
        'name.required' => 'Vui Lòng Nhập Tên',
        'pass.required' => 'Vui Lòng Nhập Password',
        'repass.same' => '2 Password Phải Giống Nhau'
      ]);
      $user = User::find($id);
      if(Hash::check($request->passhientai,$user['password'])){
        $user->name = $request->name;
        $user->password = Hash::make($request->pass);
        $user->remember_token = $request->_token;
        $user->save();
        return redirect()->route('getListUser')->with(['flash_message' => 'Bạn đã sửa dữ liệu thành công','flash_level' => 'success']);
      }else{
        return redirect()->back()->with(['flash_message' => 'Password Hiện Tại Không Đúng','flash_level' => 'danger']);
      }
    }
    public function getDelUser($id){
      $user = User::find($id);
      $usercurent = Auth::user()->id;
      if($usercurent == $id){
        return redirect()->back()->with(['flash_message' => 'Bạn Không Được Xóa Chính Bạn','flash_level' => 'danger']);
      }elseif($usercurent == 1){
        $user->delete($id);
        return redirect()->back()->with(['flash_message' => 'Bạn Đã Xóa Thành Công','flash_level' => 'success']);
      }else{
        return redirect()->back()->with(['flash_message' => 'Bạn Không Được Xóa Thành Viên Khác','flash_level' => 'danger']);
      }
    }
    public function logout(){
      Auth::logout();
      return redirect()->route('login');
    }
}
