<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit()
    {
        $settings = Setting::all()->pluck('value', 'name');

        return view('backend.settings', ['settings' => $settings]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request)
    {
        $settings = Setting::all()->pluck('value', 'name');

        if($settings != null){
            $this->validate($request, [
                'site_title' => 'required|min:3|max:32',
                'site_meta_description' => 'required',
                'site_meta_keywords' => 'required',
                'site_email' => 'required|email',
                'site_url' => 'required|url'
            ]);

            Setting::where('name', 'site_title')->update(['value' => e($request->site_title)]);
            Setting::where('name', 'site_meta_description')->update(['value' => e($request->site_meta_description)]);
            Setting::where('name', 'site_meta_keywords')->update(['value' => e($request->site_meta_keywords)]);
            Setting::where('name', 'site_email')->update(['value' => e($request->site_email)]);
            Setting::where('name', 'site_url')->update(['value' => e($request->site_url)]);
        }

        Session::flash('settings_updated', 'You have successfully updated your site settings!');
        return redirect('/admin/settings');
    }

}
