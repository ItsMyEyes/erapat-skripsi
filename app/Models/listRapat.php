<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class listRapat extends Model
{
    use HasFactory;

    protected $fillable = ['judul','start','selesai','desc','ruangan','link_rapat','type_rapat','jangka_waktu','frekuensi_rapat','diselesaikan'];

    public function peserta()
    {
        return $this->hasMany('\App\Models\listPeserta','id_rapat','id');
    }

    public function ruanganDetail()
    {
        return $this->hasOne('\App\Models\ruangan','id','ruangan');
    }

    public function hasilRapat()
    {
        return $this->hasOne('\App\Models\hasilRapat','id_rapat','id');
    }

    public function dokumentasi()
    {
        return $this->hasMany('\App\Models\dokumentasi','id_rapat','id');
    }

    public function isTertutup()
    {
        return $this->type_rapat == 'tertutup';
    }

    public function isTerbuka()
    {
        return $this->type_rapat == 'terbuka';
    }

    public function isFormal()
    {
        return $this->type_rapat == 'formal';
    }

    public function isInFormal()
    {
        return $this->type_rapat == 'informal';
    }

    public function getTypeRapat()
    {
        switch ($this->type_rapat) {
            case 'tertutup':
                $type = "Rapat Tertutup";
                break;
            case 'terbuka':
                $type = "Rapat Terbuka";
                break;
            case 'formal':
                $type = "Rapat formal";
                break;
            case 'informal':
                $type = "Rapat informal";
                break;
            default:
                $type = "Rapat tidak diketahui";
                break;
        }

        return $type;   
    }

    public function getPlaceRapat()
    {
        if (isset($this->ruanganDetail) && !is_null($this->ruanganDetail)) {
           return $this->ruanganDetail->file;
        }

        return $this->link_rapat;
    }
}
