@extends('layouts.appAdmin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <a href="{{ url('admin/home')}}" class="btn btn-primary">Belum di verifikasi</a>
        </div>
        <div class="col-md-2">
            <a href="" class="btn btn-secondary">Sudah di verifikasi</a>
        </div>
    </div>
    @if(Session::has('status'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('status') }}
        </div>
    @endif
    
    <div class="row justify-content-center">
    
        <table class="table table-striped mt-3">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">User</th>
                    <th scope="col">Detail</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;?>
                @forelse($datas as $data)
                    @foreach($data->users as $user) 
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$user->name}}</td>
                            <td>
                                <form action="{{ url('admin/detailverif' , $data->id) }}">
                                    <button class="btn btn-primary">Detail</button>
                                </form>
                            </td>
                        </tr>
                        <?php $no++;?>
                    @endforeach
                @empty
                    <tr>
                        <td colspan = 3 class="text-center">Tidak ada order</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
    </div> 
</div>
@endsection