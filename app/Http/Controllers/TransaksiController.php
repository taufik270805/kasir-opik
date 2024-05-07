<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use App\Http\Requests\StoretransaksiRequest;
use App\Http\Requests\UpdatetransaksiRequest;
use App\Models\jenis;
use App\Models\Menu;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = transaksi::all();
        $jenis = jenis::all();
        $menu = Menu::all();
        return view('transaksi.index', compact('transaksis', 'jenis', 'menu'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatetransaksiRequest $request, transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(transaksi $transaksi)
    {
        //
    }
    public function faktur($nofaktur)
    {
        $data = transaksi::where('id', $nofaktur)->with(['detailTransaksi'])->first();
    }
}
