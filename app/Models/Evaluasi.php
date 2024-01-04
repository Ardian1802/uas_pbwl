<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;

class Evaluasi extends Model
{
    use HasFactory;

    protected $table = 'tb_evaluasi'; 

    protected $fillable = [
        'id_kegiatan', 'id_peserta', 'efektivitas', 'aspek_perbaikan', 'rekomendasi'
    ];

    public function kegiatan(): HasOne
    {
        return $this->hasOne(Kegiatan::class, 'id', 'id_kegiatan');
    }

    public function peserta(): HasOne
    {
        return $this->hasOne(Peserta::class, 'id', 'id_peserta');
    }

}
