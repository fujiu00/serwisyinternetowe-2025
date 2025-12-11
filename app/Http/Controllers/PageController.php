<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Str;

class PageController extends Controller
{

    public function show($slug = 'home') {
        $page = Page::where('slug', $slug)->firstOrFail();
        $menu = Page::all();
        return view('client', compact('page', 'menu'));
    }


    public function adminIndex() {
        $pages = Page::all();
        return view('admin.index', compact('pages'));
    }


    public function adminEdit($id) {
        $page = Page::findOrFail($id);
        return view('admin.edit', compact('page'));
    }


    public function adminUpdate(Request $request, $id) {

        $request->validate([
            'title' => 'required|min:3|max:255', 
            'content' => 'required',             
        ], [
            'title.required' => 'Musisz podać tytuł strony!',
            'title.min' => 'Tytuł jest za krótki.',
            'content.required' => 'Treść strony nie może być pusta.'
        ]);

        $page = Page::findOrFail($id);
        $page->update([
            'title' => $request->title,
            'content' => $request->content
        ]);
        
        return redirect('/admin')->with('success', 'Zaktualizowano stronę!');
    }
    public function adminDelete($id) {
        $page = Page::findOrFail($id);
        $page->delete();
        return redirect('/admin')->with('success', 'Strona została usunięta!');
    }
    public function adminCreate() {
        return view('admin.create');
    }

    public function adminStore(Request $request) {
        $request->validate([
            'title' => 'required|min:3',
            'content' => 'required'
        ]);

        $slug = $request->slug ? Str::slug($request->slug) : Str::slug($request->title);
        
        if(Page::where('slug', $slug)->exists()) {
            $slug = $slug . '-' . time(); 
        }

        Page::create([
            'title' => $request->title,
            'slug' => $slug,
            'content' => $request->content
        ]);

        return redirect('/admin')->with('success', 'Utworzono nową stronę!');
    }
}