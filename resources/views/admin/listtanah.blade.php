@extends('layouts.appAdmin')

@section('content')
<div class="container">
    <table class="table table-striped">
        <thead>
            <th>No</th>
            <th>Nama Tanah</th>
            <th>Harga</th>
            <th>Action</th>
        </thead>
        <tbody>
        <?php $i = 1;?>
            @foreach($datas as $data)
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$data->nama}}</td>
                    <td>{{$data->harga}}</td>
                    <td>
                        <div class="col-4">
                            <form action="{{url('/admin/edittanah', $data->id)}}" >
                                @csrf
                                <button class="btn btn-success">Edit</button>
                            </form>
                            
                        </div>
                    </td>
                </tr>
                <?php $i++;?>
            @endforeach
        </tbody>
    </table>
</div>
@endsection