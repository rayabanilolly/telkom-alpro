<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\project;
use App\gpon;
use App\odc;
use App\odp;

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
    public function index()
    {
        return view('home');
    }

    public function booking()
    {
        return view('probooking');
    }

    public function monitoring()
    {
        return view('promonitoring');
    }

    public function laporan()
    {
        return view('prolaporan');
    }

    public function gpon()
    {
        return view('alprogpon');
    }

    public function odf()
    {
        return view('alproodf');
    }

    public function odc()
    {
        return view('alproodc');
    }

    public function odp()
    {
        return view('alproodp');
    }

    public function distribusi()
    {
        return view('masdistribusi');
    }

    public function mancore()
    {
        return view('mancore');
    }
}
