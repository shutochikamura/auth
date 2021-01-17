<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Board;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class LikeController extends Controller
{

    public function store(Board $item, $id)
    {
        $item = Board::find($id);

        $item->users()->attach(Auth::id());
        return redirect()->route('board.index');
    }

    public function destroy(Board $item, $id)
    {
        $item = Board::find($id);
        $item->users()->detach(Auth::id());
        return redirect()->route('board.index');
    }
}
