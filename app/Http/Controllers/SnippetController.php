<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class SnippetController extends Controller
{
    public function index()
    {
        return view('snippet.index');
    }
}
