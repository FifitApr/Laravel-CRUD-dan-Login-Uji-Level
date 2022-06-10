@extends('layout1')

@section('isi1')

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
  
    <div class="container-fluid">
      <div class="row justify-content-center">
          <div class="col-8">
              <div class="card">
                  <div class="card-body">
                      <form action="{{ route('guru-save') }}" method="POST" enctype="multipart/form-data">
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
                              <label for="exampleInputEmail1" class="form-label">Jenis Pelajaran</label>
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

  <div class="container-fluid mt-5">
    <div class="justify-content-center">
        <div class="card">
            <div class="card-body table-responsive">
                @if ($message = Session::get('success'))
                <div class="alert alert-dark opacity-50" role="alert">
                    {{ $message }}
                </div>
                @endif

                <table class="table text-center">
                    {{-- <a href="{{ url('create-agenda') }}" class="btn btn-info my-3">Tambah++</a> --}}
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama Guru</th>
                            <th scope="col">Mapel</th>
                            <th scope="col">Materi</th>
                            <th scope="col">Jenis</th>
                            <th scope="col">Link Belajar</th>
                            <th scope="col">Absensi</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Dokumentasi</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Waktu Mulai</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataagenda as $item)

                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{ $item->gurus->namaguru }}</td>
                            <td>{{ $item->gurus->mapel }}</td>
                            <td>{{ $item->materi }}</td>
                            <td>{{ $item->jenispelajaran }}</td>
                            <td>{{ $item->linkpembelajaran }}</td>
                            <td>{{ $item->absensisiswa }}</td>
                            <td>{{ $item->kelas->namakelas }}</td>
                            <td>
                                <img src="{{ asset('fotoagenda/'.$item->documentasi) }}" alt="" style="width: 90px">
                            </td>
                            <td>{{ $item->keterangan }}</td>
                            <td>{{ $item->jampembelajaran }}</td>

                            <td>
                                {{-- <a href="{{ url('edit-agenda',$item->id)}}" class="btn btn-warning">Edit</a> --}}
                                {{-- <form action="{{ url('delete-agenda', $item->id)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">Delete</button>
                                </form> --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>



@endsection