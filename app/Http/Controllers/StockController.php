<?php

namespace App\Http\Controllers;

use App\Exports\stockExport;
use App\Http\Requests\ImportRequest;
use App\Imports\StockImport;
use App\Models\stock;
use App\Http\Requests\StorestockRequest;
use App\Http\Requests\UpdatestockRequest;
use App\Imports\CategoryImport;
use App\Models\Menu;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Maatwebsite\Excel\Facades\Excel;

class stockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $stock = stock::all();
        $menu = Menu::all();

        if ($request->expectsJson()) {
            return response()->json(['stock' => $stock], Response::HTTP_OK);
        }

        return view('stock.index', compact('stock', 'menu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('stock.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorestockRequest $request)
    {
        $validated = $request->validated();

        $stock = stock::create($validated);

        return redirect()->route('stock.index')->with('success', 'Data Stock berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, stock $stock)
    {
        if ($request->expectsJson()) {
            return response()->json(['stock' => $stock], Response::HTTP_OK);
        }

        return view('stock.show', compact('stock'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(stock $stock)
    {
        return view('stock.edit', compact('stock'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatestockRequest $request, stock $stock)
    {
        $stock->update($request->all());

        return redirect()->route('stock.index')->with('success', 'Data Stock berhasil diupdate!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, stock $stock)
    {
        $stock->delete();

        if ($request->expectsJson()) {
            return response()->json([], Response::HTTP_NO_CONTENT);
        }

        return redirect()->route('stock.index')->with('success', 'Data Stok berhasil dihapus!');
    }
    public function export()
    {
        return Excel::download(new stockExport, 'stok.xlsx');
    }

    public function import(ImportRequest $request)
    {
        $validated = $request->validated();

        Excel::import(new StockImport, $validated['file']);

        return redirect()->back()->with('success', 'Import data berhasil');
    }

    public function exportPdf()
    {
        $stock = stock::all();

        $pdf = Pdf::loadView('stock.pdf', compact('stock'));
        return $pdf->download('stock.pdf');
    }
}
