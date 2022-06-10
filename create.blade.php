@extends('layout1')
@section('Judul', 'Tambah Data Agenda')
@section('isi1')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('simpan-agenda') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Guru</label>
                            {{-- <input type="text" class="form-control" name="nama_guru"> --}}
                            <select class="form-control" name="namaguru_id" id="">
                                <option value="">Nama Guru</option>
                                @foreach ($dataGuru as $item)
                                    <option value="{{ $item->id }}">{{ $item->namaguru }}</option>
                                @endforeach
                            </select>
                            @error('nama_guru')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Mata Pelajaran</label>
                            {{-- <input type="text" class="form-control" name="mapel"> --}}
                            <select class="form-control" name="mapel_id" id="">
                                <option value="">Mata Pelajaran</option>
                                @foreach ($dataGuru as $item)
                                    <option value="{{ $item->id }}">{{ $item->mapel }}</option>
                                @endforeach
                            </select>
                            @error('mapel')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Materi</label>
                            <input type="text" class="form-control" name="materi">
                            @error('materi')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-4">
                            <label class="form-label">Jenis Pelajaran</label>
                            <select name="jenispelajaran" class="form-select"
                                placeholder="Input Jenis pelajaran In Here">

                                <option selected>Select Pelajaran</option>
                                <option value="Online">Online</option>
                                <option value="Ofline">Ofline</option>
                            </select>
                            @error('jenispelajaran')
                            <div class="text-warning">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Link Pembelajaran</label>
                            <input type="text" class="form-control" name="linkpembelajaran">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Absensi Siswa</label>
                            <input type="text-area" class="form-control" name="absensisiswa">
                            @error('absensisiswa')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">Kelas</label>
                                <select name="namakelas_id" class="form-select" placeholder="Input Kelas In Here">
                                    
                                <option selected disabled>Open For select</option>
                                @foreach ($dataKelas as $item)
                                <option value="{{ $item->id }}">{{ $item->namakelas }}</option>
                                @endforeach
                                </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1" class="form-label">Dokumentasi</label>
                            <input type="file" class="form-control" id="documentasi" name="documentasi">
                            @error('documentasi')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Keterangan</label>
                            <select name="keterangan" class="form-select form-control" id="">
                                <option selected>Pilih Keterangan</option>
                                <option value="hadir">Hadir</option>
                                <option value="tidak hadir">Tidak Hadir</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Waktu Mulai</label>
                            <input type="time" class="form-control" name="jampembelajaran">
                            @error('jampembelajaran')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        


                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
