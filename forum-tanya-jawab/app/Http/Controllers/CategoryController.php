<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data_kategori = Category::paginate(6);
        $data = [
            'title' => 'Category',
            'active' => 'Category',
            'data_kategori' => $data_kategori,
        ];
        return view('admin.category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_kategori = Category::paginate(6);
        $data = [
            'title' => 'Category',
            'active' => 'Category',
            'data_kategori' => $data_kategori
        ];
        return view('admin.category.create-edit', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData =  $request->validate([
            'name' => ['required', 'min:3', 'max:250', 'unique:categories']
        ]);
        Category::create($validatedData);
        return redirect('/category')->with('sukses', 'Tambah Category Berhasil!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $Category, Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $Category)
    {
        $data_kategori = Category::paginate(6);
        $data = [
            'title' => 'Category',
            'active' => 'Category',
            'category' => $Category,
            'data_kategori' => $data_kategori
        ];
        return view('admin.category.create-edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $Category)
    {
        $validatedData =  $request->validate([
            'name' => ['required', 'min:3', 'max:250', 'unique:categories']
        ]);
        Category::where('id', $Category->id)->update($validatedData);
        return redirect('/category')->with('sukses', "Category Berhasil Diedit !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $Category)
    {
        Category::destroy($Category->id);
        return redirect('/category')->with('sukses', "Category Berhasil Dihapus !");
    }
}
