@extends('base')
@section('main')
<div class="row">
    <div class="col-sm-12">
        <h3><i class="fas fa-trash"></i>&nbsp;Delete Pegawai</h3>    
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
        <table class="table table-striped">
            <tbody>
                <tr>
                    <td><b>NIP</b></td>
                    <td>{{$data->nip}}</td>
                </tr>
                <tr>
                    <td><b>Nama Pegawai</b></td>
                    <td>{{$data->nama_pegawai}}</td>
                </tr>
                <tr>
                    <td><b>Alamat</b></td>
                    <td>{{$data->alamat}}</td>
                </tr>
            </tbody>
        </table>
        <p><b>Are you sure delete this record ?</b></p>
        <table>
            <tr>
                <td><a href="{{ route('pegawai.index')}}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-alt-circle-left"></i>&nbsp;Cancel</a></td>
                <td>
                    <form action="{{ route('pegawai.destroy', $data->pegawai_id)}}" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-trash"></i>&nbsp;Delete</button>
                    </form>
                </td>
            <tr>
        </table>    
    <div>
</div>
@endsection