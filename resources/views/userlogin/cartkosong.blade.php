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

           <tr>
                <td colspan=4 align="center">Kosong</td>
           </tr>
        
       
    </div>
@endsection