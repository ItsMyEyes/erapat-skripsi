<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class listPeserta extends Model
{
    use HasFactory;

    protected $fillable = ['id_rapat','id_peserta','kehadiran'];

    public function detail()
    {
        return $this->hasOne('\App\Models\User','id','id_peserta');
    }

}
