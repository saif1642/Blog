<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Session;
class SettingController extends Controller
{
    public function index(){

        return view('admin.settings')->with('setting',Setting::first());
    }
    public function update(){
        $this->validate(request(),[
            'site_name' => 'required',
            'address' => 'required',
            'contact_email' => 'required|email',
            'contact_number' => 'required',
        ]);

        $setting = Setting::first();

        $setting->site_name = request()->site_name;
        $setting->address = request()->address;
        $setting->contact_email = request()->contact_email;
        $setting->contact_number = request()->contact_number;

        $setting->save();
        Session::flash('success','Site Settings updated successfully!');
        return redirect()->back();


    }
}
