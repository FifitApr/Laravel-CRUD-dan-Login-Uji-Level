<?php

namespace App\Models;

use App\Models\Agenda;
use App\Models\Kelas;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $primaryKey = "id";
    protected $fillable=[
        'id','namaguru','mapel'
    ];
    use HasFactory;
    public function kelas(){
        return $this->hasMany(Kelas::class);
    }
    public function agendas(){
        return $this->hasMany(Agenda::class);
    }

}
