<?php

namespace App\Http\Controllers;

use App\Exports\jenisExport;
use App\Http\Requests\ImportRequest;
use App\Models\Jenis;
use App\Http\Requests\StoreJenisRequest;
use App\Http\Requests\UpdateJenisRequest;
use App\Imports\JenisImport;
use App\Models\Category;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Maatwebsite\Excel\Facades\Excel;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenis = Jenis::all();
        $kategori = Category::all();
        // dd($jenis[0]->kategori->nama);

        return view('jenis.index', compact('jenis', 'kategori'));
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
    public function store(StoreJenisRequest $request)
    {
        // dd($request);
        Jenis::create($request->all());

        return redirect('jenis')->with('success',   'Data Jenis berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jenis $jenis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jenis $jenis)
    {
        $jenis = Jenis::find($jenis);
        $jenis = Jenis::all();
        return view('jenis.edit', compact('jenis', 'jenis'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(UpdateMenuRequest $request, Menu $menu)
    // {
    //     try {
    //         DB::beginTransaction();
    //         $validate = $request->validated();
    //         $menu->update($validate);
    //         DB::commit();
    //         return redirect('menu')->with('succes', 'data berhasil di ubah');
    //     } catch (\Exception $e) {
    //         return redirect('menu')->withErrors(['message' => 'terjadi kesalahan']);
    //     }
    // }
    public function update(UpdateJenisRequest $request, Jenis $jeni)
    {
        $jeni->update($request->all());

        return redirect()->route('jenis.index')->with('success', 'Data Jenis berhasil diupdate!');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jenis $jeni)
    {
        $jeni->delete();

        return redirect('jenis')->with('succes', 'delete data berhasill!');
    }
    public function export()
    {
        return Excel::download(new jenisExport, 'jenis.xlsx');
    }

    public function import(ImportRequest $request)
    {
        $validated = $request->validated();

        Excel::import(new JenisImport, $validated['file']);

        return redirect()->back()->with('success', 'Import data berhasil');
    }

    public function exportPdf()
    {
        $jenis = Jenis::all();

        $pdf = Pdf::loadView('jenis.pdf', compact('jenis'));
        return $pdf->download('jenis.pdf');
    }
}
