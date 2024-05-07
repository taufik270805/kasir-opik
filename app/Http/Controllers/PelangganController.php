<?php

namespace App\Http\Controllers;

use App\Exports\pelangganExport;
use App\Models\pelanggan;
use App\Http\Requests\StorepelangganRequest;
use App\Http\Requests\UpdatepelangganRequest;
use App\Imports\pelangganimport;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator as FacadesValidator;


class pelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pelanggan = pelanggan::all();

        if ($request->expectsJson()) {
            return response()->json(['pelanggan' => $pelanggan], Response::HTTP_OK);
        }

        return view('pelanggan.index', compact('pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorepelangganRequest $request)
    {
        $pelanggan = pelanggan::create($request->validated());

        if ($request->expectsJson()) {
            return response()->json(['pelanggan' => $pelanggan], Response::HTTP_CREATED);
        }

        return redirect()->route('pelanggan.index')->with('success', 'Data Pelanggan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, pelanggan $pelanggan)
    {
        if ($request->expectsJson()) {
            return response()->json(['pelanggan' => $pelanggan], Response::HTTP_OK);
        }

        return view('pelanggan.show', compact('pelanggan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pelanggan $pelanggan)
    {
        return view('pelanggan.edit', compact('pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepelangganRequest $request, pelanggan $pelanggan)
    {
        $pelanggan->update($request->all());
    
        return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil diupdate!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, pelanggan $pelanggan)
    {
        $pelanggan->delete();

        if ($request->expectsJson()) {
            return response()->json([], Response::HTTP_NO_CONTENT);
        }

        return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil dihapus!');
    }
    public function export()
    {
        return Excel::download(new pelangganExport, 'pelanggan.xlsx');
    }

    public function importData(Request $request){
    
        Excel::import(new pelangganimport, $request->import);
    
        return redirect('pelanggan')->with('success', 'Data berhasil diimport');
    
    }
  
}
