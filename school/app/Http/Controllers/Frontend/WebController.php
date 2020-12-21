<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Information;
class WebController extends Controller
{
    //
    public function index()
    {	
    	$infos = Information::all();
        return view('frontend.information', compact('infos'));
        // return view('admin.layout.app');
    }
}
