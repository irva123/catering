
<div>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h2 class="font-weight-bold mb-3"> Data Customer </h2>
                    <table class="table table-bordered table-hovered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Alamat</th>
                                <th>No.Handphone</th>
                                <th>Tanggal Pemesanan</th>
                                <th>Via Pembayaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transaksis as $index=>$transaksi)
                            <tr>
                                <td>{{$index + 1}}</td>
                                <td>{{$transaksi->nama_lengkap}}</td>                               
                                <td>{{$transaksi->alamat}}</td>
                                <td>{{$transaksi->no_handphone}}</td>
                                <td>{{$transaksi->tanggal_pemesanan}}</td>
                                <td>{{$transaksi->via_pembayaran}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>