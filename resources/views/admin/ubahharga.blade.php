@extends('layouts.appAdmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{url('/admin/ubahharga')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Pengurusan Surat Kematian</label>
                    <input type="text" class="form-control" name="surat" value="{{$surat}}">
                </div>
                <div class="form-group">
                    <label for="">Pemesanan Ambulance</label>
                    <input type="text" class="form-control" name="ambulance" value="{{$ambulance}}">
                </div>
                
                <button class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection