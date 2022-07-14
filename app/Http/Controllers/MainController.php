<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function showMain(Request $request){
        $flash = $request->session()->get('flash');
        return view('main', ['flash' => $flash]);
    }
}
