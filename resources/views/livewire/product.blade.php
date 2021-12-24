<div>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h2 class="font-weight-bold mb-3"> Product List </h2>
                    <table class="table table-bordered table-hovered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th width="20%">Gambar</th>
                                <th>Deskripsi</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $index=>$product)
                            <tr>
                                <td>{{$index + 1}}</td>
                                <td>{{$product->nama}}</td>
                                <td><img src ="{{ asset('storage/images/'.$product->gambar)}}" alt="product image" class="img-fluid"></td>
                                <td>{{$product->deskripsi}}</td>
                                <td>{{$product->jumlah}}</td>
                                <td>Rp{{number_format($product->harga,2,',','.')}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h2 class="font-weight-blod mb-3">Create Product </h2>
                    <form wire:submit.prevent="store">
                        <div>
                           <div class="form-group">
                           <label>Product Name</label>
                           <input wire:model="nama" type="text" class="form-control">
                            @error('nama') <small class="text-danger">{{$message}}</small>@enderror
                        </div>
                        <div>
                           <div class="form-group">
                           <label>Product Image</label>
                          <div class="custom-file">
                              <input wire:model="gambar" type="file" class="custom-file-input" id="customFile">
                              <label for="customFile" class='custom-file-label'>Choose Image</label>
                              @error('nama') <small class="text-danger">{{$message}}</small>@enderror
                            </div>
                            @if($gambar)
                                <label class="mt-2"> Image Preview:</label>
                                <img src="{{$gambar->temporaryUrl()}}" class="img-fluid" alt ="Preview Image">
                            @endif
                        </div>
                        <div>
                        <div class="form-group">
                           <label>Deskripsi</label>
                           <textarea wire:model="deskripsi" class="form-control"></textarea>
                            @error('deskripsi') <small class="text-danger">{{$message}}</small>@enderror
                        </div>
                        <div>
                        <div class="form-group">
                           <label>Jumlah</label>
                           <input wire:model="jumlah" type="number" class="form-control">
                            @error('jumlah') <small class="text-danger">{{$message}}</small>@enderror
                        </div>
                        <div>
                        <div class="form-group">
                           <label>Harga</label>
                           <input wire:model="harga" type="number" class="form-control">
                            @error('harga') <small class="text-danger">{{$message}}</small>@enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-black"> Submit Product </button>   
                        </div>
                    </form>
                </div>
            </div>
            </div class="card mt-3">
                <div class="card-body">
                    <h3>{{$nama}}</h3>
                    <h3>{{$gambar}}</h3>
                    <h3>{{$deskripsi}}</h3>
                    <h3>{{$jumlah}}</h3>
                    <h3>{{$harga}}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
