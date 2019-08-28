<?php

namespace App\Http\Controllers\Admin;

use App\Page;
use Illuminate\Http\Request;

class PageController extends DashboardController
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
                $button = '<button type="button" name="edit"
                        id="' . $data->id . '" title="edit" 
                        class="edit btn btn-info btn-sm">
                        <i class="fa fa-edit"></i></button>';
                $button .= "&nbsp;&nbsp;&nbsp;";
                $button .= '<button type="button" name="delete"
                        id="' . $data->id . '" title="delete"
                        class="delete btn btn-danger btn-sm">
                        <i class="fa fa-times"></i></button>';
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        //
    }
}
