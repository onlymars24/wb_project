<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AutoUpdateService;

class MainController extends Controller
{
    public function showMain(Request $request){
        $flash = $request->session()->get('flash');
        return view('main', ['flash' => $flash]);
    }
}
