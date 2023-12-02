<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Models\Page;

class PageController extends Controller
{
    // Page Create / Edit Form
    public function form() {
        return view('dashboard.pages.form');
    }

    // Page Create Functions
    public function create(Request $request) {
        $request->validate([
           'page_title' => 'required|max:255',
           'page_urlslug' => 'required|max:64|unique:pages',
           'page_content' => '',
           'page_seotitle' => 'max:60',
           'page_seodesc' => 'max:300',
           'page_status' => 'required'
        ]);

        $page = new Page;
        $page->title = $request->input('page_title');
        $page->slug = $request->input('page_urlslug');
        $page->content = $request->input('page_content');
        $page->seotitle = $request->input('page_seotitle');
        $page->seodesc = $request->input('page_seodesc');
        $page->status = $request->input('page_status');
        $page->save();

        return redirect('pages/edit/'.$page->id)->with('success', 'Page Created');
    }

    // Admin Pages List
    public function index() {
        return view('dashboard.pages.index');
    }

    public function edit(Request $request) {
        $page_id = $request->id;
        if( $page_id ) {
            $page_request = DB::table('pages')->where('id', $page_id)->first();

            if( $page_id ) {
                return view('dashboard.pages.edit', ['page' => $page_request]);
            }
        }
    }

    public function view(Request $request) {
        $page_slug = $request->slug;
        if( $page_slug ) {
            $page_request = DB::table('pages')->where('slug', $page_slug)->count();
            if( $page_request > 0 ) {
                $page_request = DB::table('pages')->where('slug', $page_slug)->first();
                return view('dashboard.pages.view', ['page' => $page_request]);
            } else {
                return view('theme.errors.404', ['page' => $page_slug]);
            }
        }
    }
}
