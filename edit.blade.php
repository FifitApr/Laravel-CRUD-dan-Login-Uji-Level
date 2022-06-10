@extends('layout1')

@section('judul','From Edit')
@section('isi1')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('update-kelas', $kelas->id) }}" method="POST">
                        <h1>Tambah Data Kelas</h1>
                        {{ csrf_field() }}
                        @method ('PUT')
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Kelas</label>
                            <input name="namakelas" value="{{$kelas->namakelas}}" type="text" class="form-control" id="exampleInputEmail1">
                            @error('namakelas')
                            <div class="text-warning">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">walikelas</label>
                            {{-- <input name="nama_guru" value="{{$kelas->nama_guru}}" type="text" class="form-control" id="exampleInputPassword1"> --}}
                            <select class="form-control" name="namaguru_id" id="">
                                <option value="">Wali Kelas</option>
                                {{-- <option value="{{ $kelas->nama_guru }}">{{ $item->kelas->nama_guru }}</option> --}}
                                @foreach ($guru as $item)
                                    <option value="{{ $item->id }}">{{ $item->namaguru }}</option>
                                @endforeach
                            </select>
                            @error('namaguru_id')
                            <div class="text-warning">{{$message}}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection