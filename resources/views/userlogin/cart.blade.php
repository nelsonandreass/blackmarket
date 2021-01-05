@extends('layouts.app')

@section('content')
    <div class="container card mt-3 cart">
    @if(Session::has('status'))
        <div class="alert alert-success mt-3" role="alert">
        {{ Session::get('status') }}
        </div>
    @endif
    <table class="table table-striped mt-3">
        <thead class="thead-dark">
            <tr>
            <th scope="col">No</th>
            <th scope="col">Item</th>
            <th scope="col">Harga</th>
            <th scope="col">Update</th>
            </tr>
        </thead>
        <tbody>

            <?php 
                $no = 1;
                $total = 0;
            ?>
                @foreach($surats as $data)
                
                    <tr>
                        <td>{{$no}}</td>
                        <td>{{$data->nama}}</td>
                        <td>{{$data->harga}}</td>
                        <td>
                            <form action="{{url('/user/hapusSurat' , $data->id)}}" method="POST">
                                @csrf
                                <input type="hidden" name="cartid" value="{{$datas->id}}">
                                <button class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                        <?php $no++;
                            $total += $data->harga; 
                        ?>
                    </tr>
                @endforeach

                @foreach($tanahs as $data)
                    <tr>
                        <td>{{$no}}</td>
                        <td>{{$data->nama}}</td>
                        <td>{{$data->harga}}</td>
                        <td>
                            <form action="{{url('/user/hapusTanah' , $data->id)}}" method="POST">
                            @csrf
                            <input type="hidden" name="cartid" value="{{$datas->id}}">

                                <button class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                        <?php $no++;
                        $total += $data->harga; ?>
                    </tr>
                    
                @endforeach

                @foreach($ambulances as $data)
                    <tr>
                        <td>{{$no}}</td>
                        <td>{{$data->nama}}</td>
                        <td>{{$data->harga}}</td>
                        <td>
                            <form action="{{url('/user/hapusAmbulance' , $data->id)}}" method="POST">
                            @csrf
                            <input type="hidden" name="cartid" value="{{$datas->id}}">

                                <button class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                        <?php $no++;
                        $total += $data->harga; ?>
                    </tr>
                @endforeach
        
            @if(is_null($datas))
                <tr>
                    <td colspan=4 align="center">Kosong</td>
                </tr>
            @else
                <tr>
                    <td colspan=3 align="right">Total</td>
                    <?php $converted = number_format($total,2,",",".");?>
                    <td>{{$converted}}</td>
                </tr>
            @endif
        </tbody>
        </table>
            @if(is_null($datas))
                <tr>
                    <td></td>
                </tr>
            @else
                <div class="row">
                    <div class="col-3">&nbsp;</div>
                    <div class="col-5"></div>
                    <div class="col-3">
                        <a href="{{url('user/buktibayar' , $datas['id'])}}" class="btn btn-primary mb-3">Lanjut Bayar</a>
                    </div>
                </div>
            @endif
        
       
    </div>
@endsection