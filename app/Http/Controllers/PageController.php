<?php

namespace App\Http\Controllers;

use App\Page;
use App\Settings;
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
        $media = [];
        $home = Page::getHomePage();
        foreach($home->sections as &$section) {
            $section->translate->data = unserialize($section->translate->data);
            if($section->getMedia('media')->count() > 0) {
                //$section->media = $section->getMedia('media');
            }
        }
        //dd($home);
        return view('pages.index',
            ['page' => $home]
        );
    }

    public function about(Request $request)
    {
        $images = [
            '0001.jpg',
            '0002.jpg',
            '0003.jpg',
            '0004.jpg',
            '0005.jpg',
            '0006.jpg',
            '0007.jpg',
            '0008.jpg',
            '0009.jpg',
            '0010.jpg',
            '0011.jpg',
            '0012.jpg',
            '0013.jpg',
            '0014.jpg',
        ];
        $about = Page::getPageBySlug($request);
        $text_data = explode('. ', strip_tags(str_replace('&nbsp;', ' ', $about->body)));

        return view('pages.about',
            ['page' => $about, 'body' => $text_data, 'images' => $images]
        );
    }

    public function contacts(Request $request)
    {
        if(trim($request->getRequestUri(), '/') == 'kontauti')
            return view('pages.contacts', [
                    'page' => Page::getPageBySlug($request),
                    'sales' => Settings::getValue('sales-contact'),
                    'other' => Settings::getValue('push-contact'),
                    'map' => Settings::getValue('map'),
                    'address' => Settings::getValue('address'),
                    'schedule' => Settings::getValue('schedule'),
                ]
            );
    }
}
