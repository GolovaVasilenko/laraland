<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.index',
            ['page' => Page::getHomePage()]
        );
    }

    public function about(Request $request)
    {
        return view('pages.about',
            ['page' => Page::getPageBySlug($request)]
        );
    }

    public function contacts(Request $request)
    {
        if($request)
            return view('pages.contacts',
                ['page' => Page::getPageBySlug($request)]
            );
    }
}
