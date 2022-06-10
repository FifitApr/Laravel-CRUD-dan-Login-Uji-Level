<?php

namespace App\Models;

use App\Models\Guru;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = "kelas";
    protected $fillable = [
        'id','namakelas','namaguru_id','namaguru','walikelas'
    ];
    protected $primaryKey = "id";
    use HasFactory;

    public function gurus()
    {
        return $this->belongsTo(Guru::class,'namaguru_id','id');
    }
}