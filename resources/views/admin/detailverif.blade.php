@extends('layouts.appAdmin')

@section('content')
<div class="container">
    
    <div class="row justify-content-center">
        <table class="table">

            <thead class="thead-dark">
                <tr>
                <th scope="col">No</th>
                <th scope="col">Item</th>
                <th scope="col">Harga</th>
                </tr>
            </thead>
            
            <tbody>
                <?php 
                        $no = 1;
                        $total = 0;
                    ?>
                @foreach($datas->surats as $data)
                    <tr>
                        <td>{{$no}}</td>
                        <td>{{$data->nama}}</td>
                        <td>{{$data->harga}}</td>
                        <?php $no++;
                            $total += $data->harga; 
                        ?>
                    </tr>
                @endforeach

                @foreach($datas->tanahs as $data)
                    <tr>
                        <td>{{$no}}</td>
                        <td>{{$data->nama}}</td>
                        <td>{{$data->harga}}</td>
                        <?php $no++;
                        $total += $data->harga; ?>
                    </tr>
                    
                @endforeach

                @foreach($datas->ambulances as $data)
                    <tr>
                        <td>{{$no}}</td>
                        <td>{{$data->nama}}</td>
                        <td>{{$data->harga}}</td>
                        <?php $no++;
                        $total += $data->harga; ?>
                    </tr>
                @endforeach
                <tr>
                    <td colspan=2 align="right">Total</td>
                    <?php $converted = number_format($total,2,",",".");?>
                    <td>{{$converted}}</td>
                </tr>
            </tbody>
        </table>
        <br>
       
    </div> 
</div>
@endsection

