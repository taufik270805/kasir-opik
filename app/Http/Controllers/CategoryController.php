<?php

namespace App\Http\Controllers;

use App\Exports\categoryExport;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Maatwebsite\Excel\Facades\Excel;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Category::all();

        if ($request->expectsJson()) {
            return response()->json(['categories' => $categories], Response::HTTP_OK);
        }

        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create($request->validated());

        if ($request->expectsJson()) {
            return response()->json(['category' => $category], Response::HTTP_CREATED);
        }

        return redirect()->route('category.index')->with('success', 'Data Category berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Category $category)
    {
        if ($request->expectsJson()) {
            return response()->json(['category' => $category], Response::HTTP_OK);
        }

        return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->all());
    
        return redirect()->route('category.index')->with('success', 'Data Category berhasil diupdate!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Category $category)
    {
        $category->delete();

        if ($request->expectsJson()) {
            return response()->json([], Response::HTTP_NO_CONTENT);
        }

        return redirect()->route('category.index')->with('success', 'Data Category berhasil dihapus!');
    }
    public function export()
    {
        return Excel::download(new categoryExport, 'category.xlsx');
    }
}
