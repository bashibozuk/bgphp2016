<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    //

    protected $fillable = ['name', 'status', 'created_by'];
    public static function getRules()
    {
        return [
            'name' => 'required|min:5',
        ];
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
