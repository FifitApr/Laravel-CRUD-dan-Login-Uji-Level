@extends('layout_')

@section('judul','Data Kelas')
@section('isi')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-11">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center">Data Kelas</h1>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        {{$message}}
                    </div>
                    @endif
                    <a href="{{ url('create-kelas')}}" class="btn btn-info">Tambah++</a>

                    {{-- table --}}
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Nama Kelas</th>
                                <th scope="col">Wali Kelas</th>
                                <th scope="col">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataKelas as $item)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$item->namakelas}}</td>
                                <td>{{$item->gurus->namaguru}}</td>
                                <td>
                                    <a href="{{ url('edit-kelas',$item->id) }}" class="btn btn-warning">edit</a>
                                    <form action="{{ url('delete-kelas',$item->id)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">delete</button>
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
</div>
@endsection