
        <div class="col-md-9">
            <h2>Halaman Transaksi</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_lengkap">Nama Lengkap</label>
                                <input wire:model="nama_lengkap" type="text" class="form-control" id="nama_lengkap">
                                @error('nama_lengkap') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea wire:model="alamat" type="alamat" class="form-control" id="alamat"></textarea>
                                @error('alamat') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="form-group">
                                <label for="no_handphone">No Handphone</label>
                                <input wire:model="no_handphone" type="text" class="form-control" id="no_handphone" >
                                @error('no_handphone') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="form-group">
                                <label for="tanggal_pemesanan">Tanggal Pengiriman</label>
                                <input wire:model="tanggal_pemesanan" class="form-control" id="tanggal_pemesanan" rows="3">
                                @error('tanggal_pemesanan') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="form-group">
                                <label for="via_pembayaran">Via Pembayaran</label>
                                <input wire:model="via_pembayaran" class="form-control" id="via_pembayaran" rows="3">
                                @error('via_pembayaran') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <p style="font-size:12px" class="text-primary">*Pembayaran dapat dilakukan via LinkAja:0857463524/ Bank BRI:1111222233334444</p>
                        </div>
                    </div>
                    <a wire:click="store" class="btn btn-success btn-sm mt-3" style="font-size:16px" href="{{ url('/sukses') }}">Simpan Transaksi</a>
                </div>
            </div>
        </div>
    </div>
</div>