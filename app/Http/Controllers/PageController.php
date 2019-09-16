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

    public function getPage(Request $request)
    {
        return view('pages.index',
            ['page' => Page::getPageBySlug($request)]
        );
    }
}
