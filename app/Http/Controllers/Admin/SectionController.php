<?php

namespace App\Http\Controllers\Admin;

use App\Page;
use App\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

class SectionController extends Controller
{
    public function index()
    {
        $sections = Section::with(['translate' => function($query){
            $query->where('lang', App::getLocale());
        } , 'page'])
            ->get();

        return view('admin.sections.index', [
            'sections' => $sections
        ]);
    }

    public function add()
    {
        $pages = Page::with(['translate' => function($query) {
            $query->where('lang', App::getLocale());
        }])->get();

        return view('admin.sections.add', [
            'pages' => $pages
        ]);
    }

    public function store(Request $request)
    {
        dd($request->all());
        $section = new Section();

    }

    public function edit($id)
    {

    }

    public function update(Request $request)
    {

    }

    public function delete($id)
    {

    }
}
