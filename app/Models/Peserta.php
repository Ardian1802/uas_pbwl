<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;

    protected $table = 'tb_peserta'; 

    protected $fillable = [
        'id_kegiatan', 'nama_peserta', 'peran'
    ];

    public function kegiatan(): HasOne
    {
        return $this->hasOne(Kegiatan::class, 'id', 'id_kegiatan');
    } 

}
