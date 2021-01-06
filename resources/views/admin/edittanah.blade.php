@extends('layouts.appAdmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{url('/admin/processedittanah' , $data->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Foto</label>
                    <input type="file" class="form-control" name="foto">
                </div>
                <div class="form-group">
                    <label for="">Nama Tanah</label>
                    <input type="text" class="form-control" name="nama" value="{{$data->nama}}">
                </div>
                <div class="form-group">
                    <label for="">Harga</label>
                    <input type="number" class="form-control" name="harga" value="{{$data->harga}}">
                </div>
                <button class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection