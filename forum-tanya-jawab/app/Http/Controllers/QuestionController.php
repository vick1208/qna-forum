<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use App\Models\Reply;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Question Create',
            'active' => 'Question',
            'data_kategori' => Category::all()
        ];
        return view('post.create-edit', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData =  $request->validate([
            'title' => ['required', 'min:3', 'max:50'],
            'category_id' => ['required'],
            'detail' => ['required'],
        ]);
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['slug'] = SlugService::createSlug(Question::class, 'slug', $request->title);
        Question::create($validatedData);
        return redirect('/')->with('sukses', 'Question Berhasil Dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $data = [
            'title' => 'Home',
            'active' => 'home',
            'this_post' => Question::with(['category', 'user', 'replies'])->where('slug', $slug)->first(),
            'data_kategori' => Category::paginate()
        ];
        if (empty($data['this_post'])) return abort(404);
        return view('post.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $data = [
            'title' => 'Question Create',
            'active' => 'Question',
            'question' => Question::where('slug', $slug)->first(),
            'data_kategori' => Category::all()
        ];
        return view('post.create-edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $validatedData =  $request->validate([
            'title' => ['required', 'min:3', 'max:50'],
            'category_id' => ['required'],
            'detail' => ['required'],
        ]);
        $validatedData['user_id'] = auth()->user()->id;
        Question::where('slug', $slug)->update([
            'title' => $validatedData['title'],
            'category_id' => $validatedData['category_id'],
            'detail' => $validatedData['detail'],
        ]);
        return redirect("/post" . "/" . $slug)->with('sukses', 'Question Berhasil Dibuat!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Reply::where('question_id', $id)->delete();
        Question::destroy($id);
        return redirect('/')->with('sukses', "Question Berhasil Dihapus !");
    }
}
