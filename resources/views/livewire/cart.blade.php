<div class="row">
    <div class="col-md-8">
        <div class = "card">
            <div class="card-header bg-white">
                    <div class="col-md-6"><h3 class="font-weight-bold">Product List</h3>
                </div>
            </div>
            <div class = "card-body">
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <img src="{{ asset('storage/images/'.$product->gambar)}}" alt="product" style="object-fit: cover;width:100%;height:280px">
                                </div>  
                                <div class="card-footer bg-white">
                                    <h6 class="text-center font-weight-bold">{{$product->nama}}</h6>
                                    <h6 class="text-center font-weight-bold" style="color:grey">Rp{{number_format($product->harga,2,',','.')}} </h6>
                                    <button wire:click="addItem({{$product->id}})" class="btn btn-primary btn-sm btn-block"> Add To Cart</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class ="card-header bg-white">
            <h2 class="font-weight-bold">Cart</h2>
                
            </div>
            <div class = "card-body">
                @if(session()->has('error'))
                    <p class="text-danger font-weight-bold">
                        {{session('error')}}
                    </p>
                @endif
                
                <table class="table table-sm table-bordered table-hovered">
                    <thead class="bg-white">
                        <tr>
                            <th class="font-weight-bold">No</th>
                            <th class="font-weight-bold">Nama</th>
                            <th class="font-weight-bold">Jumlah</th>
                            <th class="font-weight-bold">Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($carts as $index=>$cart)
                        <tr>
                            <td>
                                {{$index + 1}}
                                <br>
                                <i class="fas fa-trash" wire:click="removeItem('{{$cart['rowId']}}')"class="font-weight-bold text-secondary" style="font-size:13px;color:grey;"></i></a>
                            </td>
                            <td>
                            <a href="#" class="font-weight-bold text-dark">{{$cart['name']}}</a>
                            <br>
                            <a href="">Rp{{number_format($cart['pricesingle'],2,',','.')}}</a>
                            </td>
                            <td>
                                <button class="btn btn-primary btn-sm" style="padding:7px 10px" wire:click="decreaseItem('{{$cart['rowId']}}')"><i class="fas fa-minus"></i></a></button>
                                {{$cart['qty']}}
                                <button class="btn btn-primary btn-sm" style="padding:7px 10px" wire:click="increaseItem('{{$cart['rowId']}}')"><i class="fas fa-plus" ></i></a></button>
                            </td>
                            <td>Rp{{number_format($cart['price'],2,',','.')}}</td>
                        @empty
                            <td colspan="3"><h6 class="text-center">Empty Cart</h6></td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="font-weight-bold">Cart Summary</h4>
                <h5 class="font-weight-bold">Total: Rp{{number_format($summary['total'],2,',','.')}}</h5>
            
            <div class="mt-4">
                
                <a wire:click="checkout({{$product->id}})"  class="btn btn-success btn-block" href="{{ url('/transaksi') }}">Checkout</a>
            </div>
        </div>
    </div>
</div>
</div>
