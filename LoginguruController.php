<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Guru;
use App\Models\Kelas;
use Illuminate\Http\Request;

class LoginguruController extends Controller
{
    public function index()
    {
        $dataGuru = Guru::all();
        $dataKelas = Kelas::all();
        $dataagenda = Agenda::with('gurus','kelas')->get();
        return view ('agenda.tampil_guru', compact('dataagenda','dataGuru','dataKelas'));
    }

    // public function create()
    // {
    //     $dataGuru= Guru::all();
    //     $dataKelas= kelas::all();
    //     return view('tampil_guru', compact('dataGuru','dataKelas'));
    // }

    public function store(Request $request)
    {
        $dataAgenda = Agenda::create($request->all());

        if($request->hasFile('documentasi')){
            $request->file('documentasi')->move('fotoagenda/.', $request->file('documentasi')->getClientOriginalName());
            $dataAgenda->documentasi = $request->file('documentasi')->getClientOriginalName();
            $dataAgenda->save();
        }            


        return Redirect('/login-guru')->with('success', 'Data Berhasil Ditambahkan');
    }
}
