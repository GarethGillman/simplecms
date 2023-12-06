<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;

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

    public function setupSave(Request $request) {
        $request->validate([
            'setup' => 'required',
            'settings_website_name' => 'required|max:128',
            'setting_registrations' => 'required',
            'name' => 'required|max:32',
            'email' => 'required|max:128',
            'password' => 'required|min:10',
            'password_confirmation' => 'required',
        ]);

        if( $request->input('password') === $request->input('password_confirmation') ) {
 
            $affected = 
                DB::table('settings')
                ->where('id', 1)
                ->update([
                    'setup' => $request->input('setup'),
                    'website_name' => $request->input('settings_website_name'),
                    'registrations' => $request->input('setting_registrations')
                ]
            );

            $admin_user = 
                DB::table('users')
                ->insert([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'password' => Hash::make($request->input('password')),
                    'role' => 'admin'
                ]
            );
            
            return redirect('/login');
        } else {
            return Redirect::back()->withErrors(['error' => 'Passwords do not match']);
        }
    }

    public function view() {
        $settings = DB::table('settings')->first();

        return view('dashboard.settings.index', ['settings' => $settings]);
    }

    public function save(Request $request) {
        $request->validate([
            'website_name' => 'required|max:128',
        ]);

        if( $request->input('registrations') === 'on' ) {
            $registrations = 'on';
        } else {
            $registrations = 'off';
        }

        $affected = 
            DB::table('settings')
                ->where('id', 1)
                ->update([
                    'website_name' => $request->input('website_name'),
                    'registrations' => $registrations
                ]
        );

        return redirect('dashboard/settings')->with('success', 'Settings Updated');
    }
}
