<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Board;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function board()
    {
        $items = Board::all();
        return view('auth.index', ['items' => $items]);
    }

    public function upload()
    {
        return view('auth.upload');
    }

    public function create(Request $request)
    {
        $this->validate($request, Board::$rules);
        $post = new Board;
        $form = $request->all();
        unset($form['_token']);
        $post->fill($form)->save();
        return redirect('/index');
    }
    public function remove(Request $request)
    {
        $post = Board::find($request->id);
        $post->delete();

        return redirect('/index');
    }
    public function edit(Request $request)
    {
        $post = Board::find($request->id);
        return view('auth.edit', ['form' => $post]);
    }
    public function update(Request $request)
    {
        $this->validate($request, Board::$rules);
        $post = Board::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $post->fill($form)->save();
        return redirect('/index');
    }
}
