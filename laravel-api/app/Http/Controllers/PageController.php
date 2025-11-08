<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function index(){
        $pages = Page::all();
    return view('index', compact('pages'));
    }

    public function create(){
        return view('create');
    }

     public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'link' => 'required|string|max:255|unique:page,link',
            'section_name' => 'required|string|max:255',
            'section_type' => 'required|string|max:255',
            'content' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'background_color' => 'nullable|string|max:50',
            'text_color' => 'nullable|string|max:50',
            'font_size' => 'nullable|string|max:20',
            'padding' => 'nullable|string|max:20',
            'margin' => 'nullable|string|max:20',
            'border_radius' => 'nullable|string|max:20',
            'font_family' => 'nullable|string|max:50',
        ]);

        $page = new Page();
        $page->fill([
            'name' => $validated['name'],
            'link' => $validated['link'],
            'section_name' => $validated['section_name'] ?? null,
            'section_type' => $validated['section_type'] ?? null,
            'content' => $validated['content'] ?? null,
            'settings' => [
                'meta_title' => $validated['meta_title'] ?? '',
                'meta_description' => $validated['meta_description'] ?? '',
            ],
            'styling' => [
                'background_color' => $validated['background_color'] ?? '',
                'text_color' => $validated['text_color'] ?? '',
                'font_size' => $validated['font_size'] ?? '',
                'padding' => $validated['padding'] ?? '',
                'margin' => $validated['margin'] ?? '',
                'border_radius' => $validated['border_radius'] ?? '',
                'font_family' => $validated['font_family'] ?? '',
            ],
            'active' => $request->has('active'),
            'order' => $request->order ?? 1,
        ]);
        $page->save();

        return redirect()->back()->with('success', 'Page created successfully!');
    }

    public function show(Page $page)
    {
        return view('show', compact('page'));
    }


//     public function destroy(){

//     }

    public function showByLink($link)
{
    $page = Page::where('link', $link)->firstOrFail();
    return view('page', compact('page'));
}



}
