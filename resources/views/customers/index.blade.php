@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('DATA CUSTOMER') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                    <table class="table table-responsive table-striped">
                        <thead>
                            <tr>
                                <th>Nama Lengkap</th>                              
                                <th>Alamat Lengkap</th>
                                <th>No.Handphone</th>
                                <th>Tanggal Pemesanan</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($customer as $m)
                            <tr>
                              <td>{{$m->nama_lengkap }}</td>                              
                              <td>{{$m->alamat}}</td>
                              <td>{{$m->no_handphone}}</td>
                              <td>{{$m->tanggal_pemesanan}}</td>
                            </tr> 
                          @endforeach 
                        </tbody>
                    </table>

                </div>
            </div>
            </div>
    </div>
  
</div>
@endsection