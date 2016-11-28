<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;

class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
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
        $photos = Photo::where('public', 0)->offset($offset)->limit(6)->get();
        return view('lte.demo', ['photos' => $photos]);
    }
}
