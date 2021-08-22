<?php

namespace App\Http\Controllers;

use App\Models\Emoji;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $emojies=Emoji::all();
        return view('site.home',['emojies'=>$emojies]);
    }
    public function userprofile()
    {
        $emojies=Emoji::all();
        return view('site.user.profile',['emojies'=>$emojies]);
    }
    public function adminpanel()
    {
        $emojies=Emoji::all();
        return view('site.admin.panel',['emojies'=>$emojies]);
    }
}
