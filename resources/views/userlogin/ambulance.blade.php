@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">
                <h4 class="text-center">Pemesanan Ambulan</h4>
            </div>
        </div>
        <div class="row mt-3"></div>
        <div class="row mt-3"></div>
        <div class="row mt-3"></div>
        <div class="row mt-3"></div>
        <div class="row mt-3"></div>
        <div class="row mt-3"></div>

        <div class="row mt-3">
            <div class="col-md-12">
                <form action="{{url('/user/prosesambulance')}}" method="post">
                    @csrf
                    <input type="hidden" name="userid" value="{{ Auth::user()->id }}">
                    <div class="form-group">
                        <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="jeniskelamin" placeholder="Jenis Kelamin">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="kota" placeholder="Kota">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="telepon" placeholder="Telepon">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="alamat" placeholder="Alamat">
                    </div>

                    <button class=" btn btn-primary mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
    
@endsection