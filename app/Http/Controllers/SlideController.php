<?php

namespace App\Http\Controllers;
use File;
use Illuminate\Http\Request;
use App\slide;
use App\slidethreeimage;
class SlideController extends Controller
{
    public function getAddSlide(){
      return view('admin.slide.slide');
    }
    public function postAddSlide(Request $request){
      $this->validate($request,[
        'tieude' => 'required',
        'mota' => 'required',
        'link' => 'required',
        'imagelogo' => 'required'
      ],[
        'tieude.required' => 'Vui Lòng Nhập Tiêu Đề',
        'mota.required' => 'Vui Lòng Nhập Mô Tả',
        'link.required' => 'Vui Lòng Nhập Link',
        'imagelogo.required'=>'Vui Lòng Nhập Logo',
      ]);
      $slide = new slide;
      $slide->title = $request->tieude;
      $slide->des = $request->mota;
      $slide->link = $request->link;
      $img_name = $request->file('imagelogo')->getClientOriginalName();
      $slide->image = $img_name;
      $request->file('imagelogo')->move('uploads/slide/',$img_name);
      $slide->save();
      return redirect()->route('getListSlide');
    }
    public function getListSlide(){
      $slide = slide::all();
      return view('admin.slide.list',compact('slide'));
    }
    public function getEditSlide($id){
      $slide = slide::find($id);
      return view('admin.slide.edit',compact('slide'));
    }
    public function postEditSlide($id,Request $request){
      $slide = slide::find($id);
      $slide->title = $request->tieude;
      $slide->des = $request->mota;
      $slide->link = $request->link;
      if(!empty($request->file('imagelogo'))){
        $img_name = $request->file('imagelogo')->getClientOriginalName();
        $slide->image = $img_name;
        $request->file('imagelogo')->move('uploads/slide/',$img_name);
        $img_current = 'uploads/slide/'.$request->img_current;
        if(File::exists($img_current)){
          File::delete($img_current);
        }
      }
      $slide->save();
      return redirect()->route('getListSlide');
    }
    public function getDelSlide($id){
      $slide = slide::find($id);
      File::delete('uploads/slide/'.$slide['image']);
      $slide->delete($id);
      return redirect()->route('getListSlide');
    }


    public function getAddThreeSlide(){
      return view('admin.threeslide.add');
    }
    public function postAddThreeSlide(Request $request){
      $this->validate($request,[
        'img_three' => 'required|image'
      ],[
        'img_three.required' => 'Vui Lòng Không Được Để Trống Ảnh',
        'img_three.image' => 'File Này Không Phải File Ảnh'
      ]);
      $slidethree = new slidethreeimage;
      $img_name = $request->file('img_three')->getClientOriginalName();
      $slidethree->image = $img_name;
      $request->file('img_three')->move('uploads/slide/slidethree',$img_name);
      $slidethree->save();
      return redirect()->route('getListThreeSlide');
    }
    public function getListThreeSlide(){
      $threeslide = slidethreeimage::all();
      return view('admin.threeslide.list',compact('threeslide'));
    }
    public function getEditThreeSlide($id){
      $threeslide = slidethreeimage::find($id);
      return view('admin.threeslide.edit',compact('threeslide'));
    }
    public function postEditThreeSlide($id,Request $request){
      $this->validate($request,[
        'img_three' => 'required|image'
      ],[
        'img_three.required' => 'Vui lòng không để trống ảnh',
        'img_three.image' => 'File này không phải file ảnh'
      ]);
      $threeslide = slidethreeimage::find($id);
      $img_name = $request->file('img_three')->getClientOriginalName();
      $threeslide->image = $img_name;
      $request->file('img_three')->move('uploads/slide/slidethree',$img_name);
      $img_current = 'uploads/slide/slidethree/'.$request->img_current;
      if(File::exists($img_current)){
        File::delete($img_current);
      }
      $threeslide->save();
      return redirect()->route('getListThreeSlide');
    }
    public function getDelThreeSlide($id){
      $threeslide = slidethreeimage::find($id);
      File::delete('uploads/slide/slidethree'.$threeslide['image']);
      $threeslide->delete($id);
      return redirect()->route('getListThreeSlide');
    }
}
