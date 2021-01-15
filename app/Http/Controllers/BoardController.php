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
        return view('board.index', compact('items'));
    }


    public function create()
    {
        return view('board.add');
    }


    public function store(BoardRequest $request)
    {
        $post = new Board;
        $form = $request->all();
        unset($form['_token']);
        $post->fill($form)->save();
        return redirect('/board');
    }


    public function show($id)
    {
        $form = Board::find($id);
        return view('/board.edit', compact('form'));
    }


    public function edit(Request $request)
    {
    }


    public function update(BoardRequest $request, $id)
    {
        $post = Board::find($id);
        $form = $request->all();
        unset($form['_token']);
        $post->fill($form)->save();
        return redirect('/board');
    }


    public function destroy($id)
    {
        $post = Board::find($id);
        $post->delete();
        return redirect('/board');
    }
}
