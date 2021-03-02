<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        $settings = Setting::first();
        return view('settings.settings')->with(['settings' => $settings]);
    }

    public function update(Request $request)
    {
        $request->validate([
            
            'blog_name'     => 'required|min:3|max:50',
            'phone_number'  => 'required',
            'blog_email'    => 'required',
            'address'       => 'required'
        ]);

        $settings = Setting::first();
        $settings->blog_name    = $request['blog_name'];
        $settings->phone_number = $request['phone_number'];
        $settings->blog_email   = $request['blog_email'];
        $settings->address      = $request['address'];

        $settings->update();
        return redirect()->back()->with('settings_updated', 'Settings has been updated!');
    }
}
