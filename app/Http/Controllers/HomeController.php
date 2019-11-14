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

    public function mancore()
    {
        return view('mancore');
    }

    // Mitra Menu
    public function mitra()
    {
        return view('mitra');
    }

    // Pengguna Menu
    public function pengguna()
    {
        return view('pengguna');
    }

    // Pengguna Menu
    public function splitter()
    {
        return view('splitter');
    }

    // Master Menu
    public function regional()
    {
        return view('masregional');
    }

    public function witel()
    {
        return view('maswitel');
    }

    public function sto()
    {
        return view('massto');
    }

    public function statusCons()
    {
        return view('masstatuscons');
    }

    public function statusInventory()
    {
        return view('masstatusinventory');
    }

    public function statusProject()
    {
        return view('masstatusproject');
    }

    public function odcSpek()
    {
        return view('masodcspek');
    }

    public function odpSpek()
    {
        return view('masodpspek');
    }

    public function gponMerk()
    {
        return view('masgponmerk');
    }

    public function distribusi()
    {
        return view('masdistribusi');
    }
}
