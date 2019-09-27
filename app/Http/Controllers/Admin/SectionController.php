<?php

namespace App\Http\Controllers\Admin;

use App\Page;
use App\Section;
use App\Services\UploadFiles\UploadImageService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;


class SectionController extends Controller
{
    public function index()
    {
        $sections = Section::with(['translate' => function($query){
            return $query->where('lang', App::getLocale());
        }])->get();

        return view('admin.sections.index', [
            'sections' => $sections
        ]);
    }

    public function add()
    {
        $pages = Page::with(['translate' => function($query) {
            return $query->where('lang', App::getLocale());
        }])->get();

        return view('admin.sections.add', [
            'pages' => $pages
        ]);
    }

    public function store(Request $request)
    {
        $section = new Section();

        UploadImageService::uploadImages($request, $section);

        $section->idName = $request->get('idName');
        $section->className = $request->get('className');
        $section->type = $request->get('type');
        $section->page_id = $request->get('page_id');
        $section->save();

        $section->translate()->create([
            'lang' => $request->get('lang'),
            'data' => serialize($request->get('data')),
        ]);

        return redirect()
            ->route('sections.list')
            ->with(['flash_message'=> 'Секция создана успешно']);
    }

    public function edit($id)
    {
        $section = Section::with(['translate' => function($query){
            return $query->where('lang', App::getLocale());
        }])->where('id', $id)->first();

        $section->translate->data = unserialize($section->translate->data);

        $pages = Page::with(['translate' => function($query) {
            $query->where('lang', App::getLocale());
        }])->get();

        return view('admin.sections.edit', [
            'section' => $section,
            'media' => $section->getMedia('media'),
            'pages' => $pages,
        ]);
    }

    public function update(Request $request)
    {
        $section = Section::with(['translate' => function($query) {
            return $query->where('lang', App::getLocale());
        }])->where('id', $request->get('id'))->first();

        $section->idName = $request->get('idName');
        $section->className = $request->get('className');
        $section->type = $request->get('type');
        $section->page_id = $request->get('page_id');
        $section->save();

        $section->translate()->update([
            'lang' => $request->get('lang'),
            'data' => serialize($request->get('data')),
        ]);

        return redirect()
            ->route('section.edit', ['id' => $request->get('id')])
            ->with(['flash_message'=> 'Секция успешно отредактирована']);
    }

    public function delete($id)
    {
        $section = Section::find($id);
        $section->delete();
        return redirect()
            ->route('sections.list')
            ->with(['flash_message'=> 'Секция удалена успешно']);
    }
}
