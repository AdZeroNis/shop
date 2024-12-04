<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
class SliderController extends Controller
{
   public function create(){
        return view("Admin.slider.createSlider");
   }
   public function sliderImage(Request $request){
    if($request->hasFile("image")){
        $imageName=time().".".$request->image->extension();
        $request->image->move(public_path("AdminAssets\Slider-image"),$imageName);
        $dataForm=$request->all();
        $dataForm["image"]=$imageName;

        slider::create($dataForm);
        Alert::success('موفقیت', 'دسته بندی با موفقیت اضافه شد');
        return redirect()->route("Account.Slider.Sliders");
        }


   }
   public function Sliders(){
    $sliders=slider::all();
    return view("Admin.slider.Sliders",compact("sliders"));
}
public function Delete($id){
    $slider=slider::find($id);
       // حذف تصویر قبلی اگر وجود داشت
       $picture = public_path("AdminAssets\Slider-image/") . $slider->image;
       if(File::exists($picture)){
           File::delete($picture);
       }
     $slider->delete();
     Alert::success('موفقیت', 'دسته بندی با موفقیت حذف شد');
     return redirect()->route("Account.Slider.Sliders");
}
}

