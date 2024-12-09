<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rps extends Model
{
    protected $guarded = [];
    // protected $fillable = [
    //     'mata_kuliah_id',
    //     'kode',
    //     'rumpun_mk',
    //     'bobot_sks',
    //     'semester',
    //     'tanggal_penyusunan',
    //     'pengembang_rps',
    //     'koordinator_rmk',
    //     'ketua_prodi',
    //     'cpl_prodi_id',
    //     'cp_matakuliah',
    //     'deskripsi_mk',
    //     'pustaka_utama',
    //     'pustaka_pendukung',
    //     'media_perangkat_lunak',
    //     'media_perangkat_keras',
    //     'team_teaching',
    //     'matakuliah_syarat'
    // ];

        public function Matakuliah()
        {
            return $this->belongsTo(MataKuliah::class);
        }
}

