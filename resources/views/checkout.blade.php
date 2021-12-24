@extends('layouts.app')

@section('title')
    Checkout
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h6>Basic Details</h6>
                        <hr>
                        <div class="row">
                            <div class ="col-md-8">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" class="form-control" placeholder="Enter Nama Lengkap">
                            </div>
                            <div class ="col-md-8 mt-3">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" placeholder="Enter Alamat">
                            </div>                            
                            <div class ="col-md-8 mt-3">
                                <label for="nohp">No Handphone</label>
                                <input type="text" class="form-control" placeholder="Enter No Handphone">
                            </div>
                            <div class ="col-md-8 mt-3">
                                <label for="tanggal">Tanggal Pemesanan</label>
                                <input type="text" class="form-control" placeholder="Enter Tanggal Pemesanan">
                            </div> 
                            <div class ="col-md-12 mt-3 mb-2">
                            <a href="/customers/create" class="btn btn-primary">Pesan</a>> <br><br>
                            </div>                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h6>Order Details</h6>
                       
                    </div>
                </div>
            </div>

@endsection