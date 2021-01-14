<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Board;
use App\Http\Requests\BoardRequest;

class BoardController extends Controller
{

    public function index()
    {
        $items = Board::all();
        return view('auth.index', ['items' => $items]);
    }


    public function create()
    {
        return view('auth.upload');
    }


    public function store(BoardRequest $request)
    {
        $validated = $request->validated();
        $post = new Board;
        $form = $request->all();
        unset($form['_token']);
        $post->fill($form)->save();
        return redirect('/board')->with($validated);
    }


    public function show($id)
    {
        $post = Board::find($id);
        return view('/auth.edit', ['form' => $post]);
    }


    public function edit(Request $request)
    {
    }


    public function update(BoardRequest $request, $id)
    {
        $validated = $request->validated();
        $post = Board::find($id);
        $form = $request->all();
        unset($form['_token']);
        $post->fill($form)->save();
        return redirect('/board')->with($validated);
    }


    public function destroy($id)
    {
        $post = Board::find($id);
        $post->delete();
        return redirect('/board');
    }
}
