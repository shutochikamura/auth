<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Board extends Model
{
    protected $guarded = array('id');
    public static $rules = array(
        'title' => 'required',
        'comment' => 'required|max:140'
    );

    public function getData()
    {
        return $this->user->name;
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
