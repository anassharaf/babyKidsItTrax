<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AdminSliderInterface;
use App\Http\Requests\Slider\DeleteSliderRequest;
use App\Http\Traits\ImagesTrait;
use App\Models\Slider;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminSliderRepository implements AdminSliderInterface
{
    use ImagesTrait;

    public function index()
    {
        $sliders = Slider::get();
        return view('Admin.slider.sliders',compact('sliders'));
    }

    public function create()
    {
        return view('Admin.slider.create');
    }

    public function store($request)
    {
        $fileName = time() . '_slider.' . $request->image->extension();
        $this->uploadImage($request->image, $fileName, 'slider');
        Slider::create([
            'image' => $fileName
        ]);
        Alert::success('Success', 'Slider Was Created !');
        return redirect(route('admin.slider.all'));
    }

    public function delete($request)
    {
        $slider =Slider::find($request->id);
        unlink(public_path($slider->image));
        $slider->delete();
        Alert::success('Success','Image was Deleted');
        return redirect()->back();
    }

    public function edit($sliderId)
    {
        $slider = Slider::find($sliderId);
        return view('Admin.slider.edit',compact('slider'));
    }


    public function update($request)
    {
        $slider =Slider::find($request->slider_id);
        if (!is_null($request->image)){
            $imageName = time() . '_slider.' . $request->image->extension();
            $this->uploadImage($request->image,$imageName,'slider',$slider->image);
            $slider->update([
                'image' => $imageName
            ]);
            Alert::success('Success','Updated Successfully');
        }
        return redirect(route('admin.slider.all'));
    }
}
