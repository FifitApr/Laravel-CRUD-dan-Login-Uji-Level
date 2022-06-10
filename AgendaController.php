<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Guru;
use App\Models\Kelas;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataGuru = Guru::all();
        $dataKelas = Kelas::all();
        $dataagenda = Agenda::with('gurus','kelas')->get();
        return view ('agenda.show', compact('dataagenda','dataGuru','dataKelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataGuru = Guru::all();
        $dataKelas = Kelas::all();
        $dataagenda = Agenda::with('gurus','kelas')->paginate();
        return view('agenda.create',compact('dataGuru','dataKelas','dataagenda'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataAgenda = Agenda::create($request->all());
        if ($request->hasFile('documentasi')) {
            $request->file('documentasi')->move ('fotoagenda/',$request->file('documentasi')->getClientOriginalName());
            $dataAgenda->documentasi = $request->file('documentasi')->getClientOriginalName();
            $dataAgenda->save();
        }

        return Redirect('/agenda');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataGuru = Guru::all();
        $dataKelas = Kelas::all();
        $agenda = Agenda::findorfail($id);
        return view('agenda.edit', compact('agenda','dataGuru','dataKelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataAgenda = Agenda::findorfail($id);
        $dataAgenda->update($request->all());
        if ($request->hasFile('documentasi')) {
            $request->file('documentasi')->move ('fotoagenda/',$request->file('documentasi')->getClientOriginalName());
            $dataAgenda->documentasi = $request->file('documentasi')->getClientOriginalName();
            $dataAgenda->save();
        }
        return redirect('/agenda');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agenda = Agenda::findorfail($id);
        $agenda->delete();
        return back();
    }
}
