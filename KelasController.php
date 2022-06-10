<?php 
 
namespace App\Http\Controllers; 
 
use App\Models\Guru; 
use App\Models\kelas; 
use Illuminate\Http\Request; 
 
class KelasController extends Controller 
{ 
    /** 
     * Display a listing of the resource. 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function index() 
    { 
        $dataGuru = Guru::all(); 
        $dataKelas = Kelas::with('gurus')->paginate(); 
        return view('kelas.tampil', compact('dataKelas','dataGuru')); 
    } 
 
    /** 
     * Show the form for creating a new resource. 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function create() 
    { 
        $dataGuru = Guru::all(); 
        $kelas = Kelas::with('gurus')->paginate(); 
        return view('kelas.tambah', compact('kelas','dataGuru')); 
 
    } 
 
    /** 
     * Store a newly created resource in storage. 
     * 
     * @param  \Illuminate\Http\Request  $request 
     * @return \Illuminate\Http\Response 
     */ 
    public function store(Request $request) 
    { 
        $kelas = Kelas::create($request->all()); 
        $kelas->save(); 
         
 
        return Redirect('/kelas')->with('success','Data Ditambahkan'); 
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
        $guru= Guru::all(); 
        $kelas = Kelas::findorfail($id); 
        return view('kelas.edit',compact('kelas','guru')); 
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
        $kelas = Kelas::findorfail($id); 
        $kelas->update ($request->all()); 
        return Redirect('/kelas')->with('success','Data Diupdate'); 
    } 
 
    /** 
     * Remove the specified resource from storage. 
     * 
     * @param  int  $id 
     * @return \Illuminate\Http\Response 
     */ 
    public function destroy($id) 
    { 
        $kelas = Kelas::findorfail($id); 
        $kelas->delete(); 
        return back()->with('destroy','Data dihapus'); 
    } 
}
