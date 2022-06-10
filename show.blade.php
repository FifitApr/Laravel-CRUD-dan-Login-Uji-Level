@extends('layout_')
@section('Judul', 'Data Agenda')
@section('isi')
<div class="container-fluid">
    <div class="justify-content-center">
        <div class="card">
            <div class="card-body table-responsive">
                @if ($message = Session::get('success'))
                <div class="alert alert-dark opacity-50" role="alert">
                    {{ $message }}
                </div>
                @endif

                <table class="table text-center">
                    <a href="{{ url('create-agenda') }}" class="btn btn-info my-3">Tambah++</a>
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
                            <th scope="col">Action</th>

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
                                <a href="{{ url('edit-agenda',$item->id)}}" class="btn btn-warning">Edit</a>
                                <form action="{{ url('delete-agenda', $item->id)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
