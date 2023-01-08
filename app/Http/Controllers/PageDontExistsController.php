<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageDontExistsController extends Controller
{
    public function index(Request $request)
    {
        return view('pageNotFound');
    }
}
