<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Models\Page;

class PageController extends Controller
{
    // Page Create / Edit Form
    public function form() {
        return view('dashboard.pages.new');
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

        return redirect('dashboard/pages/edit/'.$page->id)->with('success', 'Page Created');
    }

    // Admin Pages List
    public function index() {
        $pages_array = DB::table('pages')->get();
        return view('dashboard.pages.index', ['pages' => $pages_array]);
    }

    // Admin Page Edit
    public function edit(Request $request) {
        $page_id = $request->id;
        if( $page_id ) {
            $page_request = DB::table('pages')->where('id', $page_id)->first();

            if( $page_request ) {
                return view('dashboard.pages.edit', ['page' => $page_request]);
            } else {
                return view('dashboard.errors.404');
            }
        }
    }

    public function update(Request $request) {
        $request->validate([
            'page_title' => 'required|max:255',
            'page_urlslug' => 'required|max:64|unique:pages',
            'page_content' => '',
            'page_seotitle' => 'max:60',
            'page_seodesc' => 'max:300',
            'page_status' => 'required'
         ]);

         $page_id = $request->input('page_id');
         $page_count = DB::table('pages')->where('id', $page_id)->count();
         if( $page_count > 0 ) {
            $page_request = DB::table('pages')->where('id', $page_id)->first();

            if( $page_request->title != $request->input('page_title') ) {
                $affected = DB::table('pages')->where('id', $page_id)->update(['title' => $request->input('page_title')]);
                return redirect('dashboard/pages/edit/'.$page_request->id)->with('success', 'Page Updated');
            }

            if( $page_request->slug != $request->input('page_urlslug') ) {
                $affected = DB::table('pages')->where('id', $page_id)->update(['slug' => $request->input('page_urlslug')]);
                return redirect('dashboard/pages/edit/'.$page_request->id)->with('success', 'Page Updated');
            }

            if( $page_request->content != $request->input('page_content') ) {
                $affected = DB::table('pages')->where('id', $page_id)->update(['content' => $request->input('page_content')]);
                return redirect('dashboard/pages/edit/'.$page_request->id)->with('success', 'Page Updated');
            }

            if( $page_request->seotitle != $request->input('page_seotitle') ) {
                $affected = DB::table('pages')->where('id', $page_id)->update(['seotitle' => $request->input('page_seotitle')]);
                return redirect('dashboard/pages/edit/'.$page_request->id)->with('success', 'Page Updated');
            }

            if( $page_request->seodesc != $request->input('page_seodesc') ) {
                $affected = DB::table('pages')->where('id', $page_id)->update(['seodesc' => $request->input('page_seodesc')]);
                return redirect('dashboard/pages/edit/'.$page_request->id)->with('success', 'Page Updated');
            }

            if( $page_request->status != $request->input('page_status') ) {
                $affected = DB::table('pages')->where('id', $page_id)->update(['status' => $request->input('page_status')]);
                return redirect('dashboard/pages/edit/'.$page_request->id)->with('success', 'Page Updated');
            }
         }
 
         return redirect('dashboard/pages/edit/'.$page->id)->with('success', 'Page Created');
    }

    // Admin Page Delete
    public function delete(Request $request) {
        $page_id = $request->id;
        if( $page_id ) {
            $page_request = DB::table('pages')->where('id', $page_id)->first();

            if( $page_request ) {
                $deleted = DB::table('pages')->where('id', $page_id)->delete();
            } else {
                return view('dashboard.errors.404');
            }
        }
    }

    // Public Page View
    public function view(Request $request) {
        $page_slug = $request->slug;
        if( $page_slug ) {
            $page_request = DB::table('pages')->where('slug', $page_slug)->count();
            if( $page_request > 0 ) {
                $page_request = DB::table('pages')->where('slug', $page_slug)->first();
                if( $page_request->status == 'published' ) {
                    return view('dashboard.pages.view', ['page' => $page_request]);
                } else {
                    return view('theme.errors.404', ['page' => $page_slug]);
                }
            } else {
                return view('theme.errors.404', ['page' => $page_slug]);
            }
        }
    }    
}
