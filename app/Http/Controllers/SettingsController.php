<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SettingsController extends Controller
{
    public function setup() {
        $setup = DB::table('settings')->where('id', 1)->first()->setup;
        if( $setup === 'true' ) {
            return view('setup.index');
        } else {
            return view('dashboard.errors.404');
        }
    }

    public function save(Request $request) {
        $request->validate([
            'setup' => 'required',
            'settings_website_name' => 'required|max:128',
            'setting_registrations' => 'required',
         ]);
 
         $affected = 
         DB::table('settings')
         ->where('id', 1)
         ->update([
            'setup' => $request->input('setup'),
            'website_name' => $request->input('settings_website_name'),
            'registrations' => $request->input('setting_registrations')
        ]);
 
         return redirect('/login');
    }
}
