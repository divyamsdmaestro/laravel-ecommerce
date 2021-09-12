<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    //
    public function nandex()
    {
        // echo "Hai";exit;
        return view('frontend.index');
    }
}
