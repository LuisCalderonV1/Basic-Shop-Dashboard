<?php

namespace App\Http\Controllers\Backend;

use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\UpdateSettingPut;

class SettingController extends Controller
{
    /**
     * Show the form for editing all the settings
     */
    public function edit()
    {
        $settings = Setting::all();
        return view('backend.settings.edit', ['settings' => $settings]);
    }

    public function update(UpdateSettingPut $request)
    {
        $validated = $request->validated();
        $settings = Setting::all();
        foreach($settings as $setting){
            if($setting->key === 'banner_image'){
                $setting->value = $this->imageUpload($request);
            }
            else{
                $setting->value = sanitize($request->input($setting->key));
            }
            $setting->save();
        }
        return back()->withStatus('Data Has Been updated');
    }

    public function imageUpload(UpdateSettingPut $request)
    {
        $image_path = public_path() . '/images/banner.*'; 
        $image_path = glob($image_path);
        foreach($image_path as $path){
            if (File::exists($path)) {
                unlink($path);
            }
        }
        
        $imageName = 'banner.' . $request->banner_image->extension();  
   
        $request->banner_image->move(public_path('images'), $imageName);
        
        return $imageName;
   
    }
}
