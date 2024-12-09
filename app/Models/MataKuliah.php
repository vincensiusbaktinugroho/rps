<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $fillable = [
        'kode',
        'nama',
        'sks',
        'jurusan',
        'semester'
    ];

    public function rps():HasMany
    {
        return $this->hasMany(Rps::class);
    }
}
