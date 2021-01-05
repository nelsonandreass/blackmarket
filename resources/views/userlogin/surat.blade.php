@extends('layouts.app')

@section('content')
    <div class="container">
    
        <div class="row mt-3">
            <div class="col-md-12">
                <h4 class="text-center">Pengurusan Surat Kematian</h4>
            </div>
        </div>
       
        <div class="row mt-3"></div>
        <div class="row mt-3"></div>
        <div class="row mt-3"></div>
        @if(Session::has('status'))
            <div class="alert alert-danger mt-3" role="alert">
            {{ Session::get('status') }}
            </div>
        @endif
        <div class="row mt-3">
            <div class="col-md-12">
                <form action="{{url('/user/prosessurat')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="left col-md-8">
                            <h4 class="mb-3 text-left">FORM PENGURUSAN SURAT KEMATIAN</h4>
                            <input type="hidden" name="userid" value="{{ Auth::user()->id }}">

                            <div class="form-group">
                                <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="jeniskelamin" placeholder="Jenis Kelamin">
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-control" name="tgllahir" placeholder="Tgl Lahir/Umur">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="agama" placeholder="Agama">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="alamat" placeholder="Alamat">
                            </div>

                            <h4 class="mt-3">Telah Meninggal Dunia Pada:</h4>
                            <div class="form-group">
                                <input type="text" class="form-control" name="hari" placeholder="Hari">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="tanggal" placeholder="Tanggal">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="pukul" placeholder="Pukul">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="bertempat" placeholder="Bertempat di">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="penyebab" placeholder="Penyebab Kematian">
                            </div>

                            <h4 class="mt-3">Surat Keterangan ini dibuat berdasarkan keterangan pelapor</h4>
                            <div class="form-group">
                                <input type="text" class="form-control" name="namapelapor" placeholder="Nama Lengkap">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="NIK" placeholder="NIK">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="tgllahirpelapor" placeholder="Tgl Lahir/Umur">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="alamatpelapor" placeholder="Alamat">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="hubungan" placeholder="Hubungan pelapor dengan yang meninggal">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row mt-3"></div>
                            <div class="row mt-3"></div>
                            <div class="row mt-3"></div>
                            <div class="row mt-3"></div>
                            <div class="row mt-3"></div>
                            <div class="row mt-3"></div>
                            <div class="row mt-3"></div>
                            <div class="row mt-3"></div>
                            <div class="row mt-3"></div>
                            <div class="row mt-3"></div>
                            <div class="row mt-3"></div>
                            <div class="row mt-3"></div>
                            <div class="row mt-3"></div>
                            <div class="row mt-3"></div>
                            <div class="row mt-3"></div>
                            <div class="row mt-3"></div>
                            <div class="row mt-3"></div>
                            <div class="row mt-3"></div>
                            <div class="row mt-3"></div>
                            <div class="row mt-3"></div>
                            <div class="row mt-3"></div>
                            <div class="row mt-3"></div>
                            <div class="row mt-3"></div>
                            <div class="row mt-3"></div>
                            <div class="row mt-3"></div>
                            <div class="row mt-3"></div>
                            <div class="row mt-3"></div>
                            <div class="row mt-3"></div>
                            <div class="row mt-3"></div>
                            <div class="row mt-3"></div>
                            <div class="row mt-3"></div>
                            <div class="row mt-3"></div>
                            <div class="row mt-3"></div>
                            <div class="row mt-3"></div>
                            <div class="row mt-3"></div>
                            <div class="row mt-3"></div>
                            <div class="row mt-3"></div>
                            <div class="row mt-3"></div>
                            <div class="row mt-3"></div>
                            <div class="row mt-3"></div>
                            <div class="row mt-3"></div>
                            <div class="row mt-3"></div>
                            <div class="row mt-3"></div>
                            <div class="row mt-3"></div>
                            <div class="row mt-3"></div>
                            <div class="row mt-3"></div>
                            <div class="row mt-3"></div>
                            <div class="row mt-3"></div>
                            <div class="row mt-3"></div>
                            <div class="row mt-3"></div>
                            <div class="row mt-3"></div>
                            <div class="row mt-3"></div>
                            <div class="row mt-3"></div>
                            <div class="row mt-3"></div>

                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <a href="/home" class="btn btn-danger">kembali</a>
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-primary">Daftar</button>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
    
@endsection