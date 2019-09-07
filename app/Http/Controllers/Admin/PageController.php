<?php

namespace App\Http\Controllers\Admin;

use App\Page;
use App\PagesTranslate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;


class PageController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function index()
    {
        return view('admin.pages.index');
    }

    public function ajax()
    {
        return datatables()->of(Page::getAllPages())
            ->addColumn('action', function($data) {
                $button = '<a href="' . route('pages.edit', ['id' => $data->id]). '" name="edit"
                        id="' . $data->id . '" title="edit" 
                        class="edit btn btn-info btn-sm">
                        <i class="fa fa-edit"></i></a>';
                $button .= "&nbsp;&nbsp;&nbsp;";
                $button .= '<a href="' . route('pages.remove', ['id' => $data->id]). '" name="delete"
                        id="' . $data->id . '" title="delete"
                        class="delete btn btn-danger btn-sm">
                        <i class="fa fa-times"></i></a>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'slug' => 'required',
        ]);

        $data = $request->all();
        $page = Page::create([
            'slug' => $data['slug']
        ]);

        $page->translate()->create([
            'title' => $data['title'],
            'body' => $data['body'],
            'lang' => App::getLocale(),
            'meta_title' => $data['meta_title'],
            'meta_description' => $data['meta_description']
        ]);

        return redirect()->route('pages.list')
            ->with(['flash_message'=> trans('pages.success_created')]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::with(['translate' => function($query) {
            $query->where('lang' , App::getLocale());
        }])
            ->where('id' , $id)
            ->first();

        return view('admin.pages.edit', ['page' => $page]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
        ]);

        $data = $request->all();

        $page_translate = PagesTranslate::where('page_id', $request->get('id'))
            ->where('lang', App::getLocale())
            ->first();

        $page_translate->title = $data['title'];
        $page_translate->body = $data['body'];
        $page_translate->lang = App::getLocale();
        $page_translate->meta_title = $data['meta_title'];
        $page_translate->meta_description = $data['meta_description'];
        $page_translate->save();

        return redirect()->route('pages.edit', ['id' => $data['id']])
            ->with(['flash_message'=> trans('pages.success_update')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::where('id', $id)->first();
        $page->delete();

        return redirect()->route('pages.list')
            ->with(['flash_message'=> trans('pages.success_delete')]);
    }
}
