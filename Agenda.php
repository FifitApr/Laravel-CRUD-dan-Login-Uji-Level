<?php

namespace App\Models;

use App\Models\Guru;
use App\Models\Kelas;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $fillable = [
        'namaguru_id','mapel_id','materi','jenispelajaran','linkpembelajaran','namakelas_id','absensisiswa','documentasi','keterangan','jampembelajaran',
    ];
    
    public function gurus()
    {
        return $this->belongsTo(Guru::class,'namaguru_id','id');
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class,'namakelas_id','id');
    }

}
