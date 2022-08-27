<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{

    protected $table = 'movies';
    protected $primaryKey = 'id';
    protected $fillable = [
        'judul',
        'tanggal',
        'genre_id',
        'rating',
        'created_at',
        'update_at'
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genre_id');
    }
}
