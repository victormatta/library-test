<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InitPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("static.initPage");
    }
}
