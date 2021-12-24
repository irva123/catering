<!DOCTYPE html> 
<html> 
<head>
    <title>Laporan Customer</title> 
</head>
<body> 
    <style type="text/css">
        table tr td, 
        table tr th{
            font-size: 9pt;
        }
    </style>
        <h4 align="center">CUSTOMER REPORT</h4>
    <b>Nama</b> : {{ $customer->nama_lengkap }} <br> 
    <b>Alamat</b> : {{ $customer-> pesanan}} <br> 
    <b>No Telepon</b> : {{ $customer->no_telepon }}
    <b>Tanggal Pengiriman</b> : {{ $customer->tanggal_pemesanan }} <br> 
    <b>Via Pembayaran</b> : {{ $customer->via_pembayaran }} <br>  <br><br> 
    <table class="table table-responsive table-striped"> 
        <thead> 
            <tr>
                <th>Nama</th>           
                <th>Alamat</th>
                <th>No Telepon</th> 
                <th>Tanggal Pengiriman</th> 
                <th>Via Pembayaran</th>  
            </tr> 
        </thead>  
        <tbody> 
            @foreach ($costumer->customers $cs) 
            <tr> 
                <td>{{ $cc->nama_lengkap }}</td> 
                <td>{{ $cs->alamat}}</td>
                <td>{{ $cs->no_telepon}}</td>  
                <td>{{ $cs->tanggal_pemesanan}}</td> 
                <td>{{ $cs->via_pembayaran}}</td> 
            </tr> 
            @endforeach 
        </tbody> 
    </table> 
</body> 
</html>