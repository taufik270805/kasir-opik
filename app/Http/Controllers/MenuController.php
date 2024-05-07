<?php

namespace App\Http\Controllers;

use App\Exports\menuExport;
use App\Http\Requests\ImportRequest;
use App\Models\Menu;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Imports\MenuImport;
use App\Models\Category;
use App\Models\Harga;
use App\Models\jenis;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menu = Menu::all();
        // $menu = Menu::with(['jenis', 'harga'])->get();
        $jenis = jenis::all();
        $harga = Harga::all();
        // dd($harga);

        return view('menu.index', compact('jenis', 'menu', 'harga'));
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
    public function store(StoreMenuRequest $request)
    {
        // dd($request->all());
        Menu::create($request->all());

        return redirect('menu')->with('success', 'Data Menu berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        $menu = Menu::find($menu);
        $categories = Category::all();
        return view('menu.edit', compact('menu', 'categories'));
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
    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        // dd($request);
        $menu->update($request->all());

        return redirect()->route('menu.index')->with('success', 'Data Menu berhasil diupdate!');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect('menu')->with('succes', 'delete data berhasill!');
    }

    public function export()
    {
        return Excel::download(new menuExport, 'menu.xlsx');
    }

    public function import(ImportRequest $request)
    {
        $validated = $request->validated();

        Excel::import(new MenuImport, $validated['file']);

        return redirect()->back()->with('success', 'Import data berhasil');
    }

    public function exportPdf()
    {
        $menu = Menu::with('jenis')->get();

        $pdf = Pdf::loadView('menu.pdf', compact('menu'));
        return $pdf->download('menu.pdf');
    }
}
