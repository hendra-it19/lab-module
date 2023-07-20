<?php

namespace App\Http\Controllers;

class LandingpagesController extends Controller
{
    //
    public function home()
    {
        $title = 'home';
        return view('landingpages.pages.home', compact('title'));
    }

    public function contact()
    {
        $title = 'contact';
        return view('landingpages.pages.contact', compact('title'));
    }

    public function services()
    {
        $title = 'services';
        return view('landingpages.pages.services', compact('title'));
    }

    public function properties()
    {
        $title = 'properties';
        return view('landingpages.pages.properties', compact('title'));
    }

    public function propertiesDetail($id)
    {
        $title = 'properties detail';
        return view('landingpages.pages.propertiesDetail', compact('title'));
    }
}
