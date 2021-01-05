@extends('layouts.app')

@section('content')
    <div class="container card mt-3">
    @if(Session::has('status'))
        <div class="alert alert-success mt-3" role="alert">
        {{ Session::get('status') }}
        </div>
    @endif
    <table class="table table-striped mt-3">
        <thead class="thead-dark">
            <tr>
            <th scope="col">No</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Surat kematian</th>
            <th scope="col">Ambulance</th>
            <th scope="col">Tanah</th>
            <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;?>
            @foreach($datas as $data)
                <tr>
                    <td>{{$no}}</td>
                    <td>{{$data->updated_at}}</td>
                    <td>
                        @foreach($data->surats as $surat)
                            {{$surat->nama}}
                        @endforeach
                    </td>
                    <td>
                        @foreach($data->ambulances as $ambulance)
                            {{$ambulance->nama}}
                        @endforeach
                    </td>
                    <td>
                        @foreach($data->tanahs as $tanah)
                            {{$tanah->nama}}
                        @endforeach
                    </td>
                    <td>{{$data->status}}</td>
                </tr>
                <?php $no++;?>
            @endforeach
        </tbody>
        </table>
        <!-- <div class="row">
            <div class="col-3">&nbsp;</div>
            <div class="col-5"></div>
            <div class="col-3">
                <a href="{{url('user/buktibayar')}}" class="btn btn-primary mb-3">Lanjut Bayar</a>
            </div>
        </div> -->
       
    </div>
@endsection