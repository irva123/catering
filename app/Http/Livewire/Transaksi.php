<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Customer as CustomerModel; 
use Illuminate\Support\Facades\Storage;

class Transaksi extends Component
{
    use WithFileUploads;
    public $nama_lengkap, $alamat, $no_handphone, $tanggal_pemesanan, $via_pembayaran;

    public function render()
    {
        $transaksis = CustomerModel::orderBy('created_at', 'DESC')->get();
        return view('livewire.transaksi', [
            'transaksis' => $transaksis
        ]);
    }

    public function store(){
        $this->validate([
            'nama_lengkap' => 'required',
            'alamat' => 'required',
            'no_handphone' => 'required',
            'tanggal_pemesanan' => 'required',
            'via_pembayaran' => 'required',
        ]);

        
        CustomerModel::create([
            'nama_lengkap'=> $this->nama_lengkap,
            'alamat'=> $this->alamat,
            'no_handphone'=> $this->no_handphone,
            'tanggal_pemesanan'=> $this->tanggal_pemesanan,
            'via_pembayaran'=> $this->via_pembayaran,
        ]);

        session()->flash('info', 'Transaction Successfully');
        
        $this->nama_lengkap = '';
        $this->alamat = '';
        $this->no_handphone = '';
        $this->tanggal_pemesanan = '';
        $this->via_pembayaran = '';
}
   
}