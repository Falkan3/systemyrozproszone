<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use App\Http\Controllers\PhotoController;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!isset($request->offset))
            $offset = 0;
        else
            $offset = $request->offset;
        $photos = app('App\Http\Controllers\PhotoController')->index($offset);
        return view('lte.demo', ['photos' => $photos]);
    }

    public function PreviousPhoto(Request $request)
    {
        $offset = $request->input('offset');

        if($offset > 6)
        {
            $photos = app('App\Http\Controllers\PhotoController')->index($offset);
        }
        else
            $photos = app('App\Http\Controllers\PhotoController')->index();
        return view('lte.demo', ['photos' => $photos]);
    }

    public function NextPhoto(Request $request)
    {
        $offset = $request->input('offset');

        $photos = app('App\Http\Controllers\PhotoController')->index($offset);
        return view('lte.demo', ['photos' => $photos]);
    }
}
