@extends('base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h3><i class="fas fa-edit"></i>&nbsp;Edit Pegawai</h3>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <br /> 
        @endif
        <form method="post" action="{{ route('pegawai.update', $data->pegawai_id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">
                <label for="nip">NIP:</label>
                <input type="text" class="form-control" name="nip" value="{{ $data->nip }}" />
            </div>
            <div class="form-group">
                <label for="nama_pegawai">Nama Pegawai:</label>
                <input type="text" class="form-control" name="nama_pegawai" value="{{ $data->nama_pegawai }}" />
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" class="form-control" name="alamat" value="{{ $data->alamat }}" />
            </div>
            <a href="{{ route('pegawai.index')}}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-alt-circle-left"></i>&nbsp;Back</a>&nbsp;
            <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i>&nbsp;Update</button>
        </form>
    </div>
</div>
@endsection