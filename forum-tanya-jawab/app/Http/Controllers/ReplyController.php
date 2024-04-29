<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function store(Request $request)
    {
        $validatedData =  $request->validate([
            'detail' => ['required', 'min:3', 'max:250'],
            'question_id' => ['required'],
        ]);
        $validatedData['user_id'] = auth()->user()->id;
        Reply::create($validatedData);

        return back()->with('sukses', 'Question Berhasil Dibuat!');
    }

    public function destroy($id)
    {
        Reply::destroy($id);
        return back()->with('sukses', "Question Berhasil Dihapus !");
    }

    public function update(Request $request, $id)
    {
        $validatedData =  $request->validate([
            'detail' => ['required', 'min:3', 'max:250'],
        ]);
        Reply::where('id', $id)->update(['detail' => $request->detail]);
        return back()->with('sukses', "Question Berhasil Diedit !");
    }
}
