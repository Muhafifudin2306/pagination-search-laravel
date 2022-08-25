<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    

    protected $table = 'genres';
    protected $primaryKey = 'genre_id';

    protected $fillable = [
        'genre_id',
        'nama_genre'
    ];

    public function movie()
    {
        return $this->hasMany(Movie::class);
    }
}
