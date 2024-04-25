<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category.index', ['title' => 'Category']);
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        dd($request);
    }
    public function edit()
    {
        return view('category.edit');
    }
    public function update(Request $request, string $id)
    {
        dd([$request, $id]);
    }

    public function destroy(string $id)
    {
        dd($id);
        return redirect('/category');
    }
}
