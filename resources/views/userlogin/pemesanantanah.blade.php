@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <img src="" alt="jumbotron">
            </div>
        </div>

        <div class="row">
            <h4>Pemesanan Tanah</h4>
        </div>
       
        <div class="row mt-3">
        @foreach($datas as $data)
        <div class="col-md-4" style="height: 300px;" >
            <div class="card mt-3">
                <?php 
                    $foto = substr ($data->foto,7);
                ?>
                <img class="card-img-top" src="{{ url('/storage/'.$foto) }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$data->nama}}</h5>
                    <form action="{{url('/user/prosestanah', $data->id)}}" method="POST">
                        @csrf
                        <button class="btn btn-primary">Tambah ke Keranjang</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        </div>
    </div>
@endsection