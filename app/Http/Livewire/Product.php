<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product as ProductModel; 
use Illuminate\Support\Facades\Storage;

class Product extends Component
{
    use WithFileUploads;
    public $nama, $gambar, $deskripsi, $jumlah, $harga;

    public function render()
    {
        $products = ProductModel::orderBy('created_at', 'DESC')->get();
        return view('livewire.product', [
            'products' => $products
        ]);
    }

    public function previewImage(){
        $this->validate([
            'gambar'=> 'image|max:2048'
        ]);
    }

    public function store(){
        $this->validate([
            'nama' => 'required',
            'gambar' => 'image|max:2048|required',
            'deskripsi' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
        ]);

        $imageName = md5($this->gambar.microtime().'.'.$this->gambar->extension());

        Storage::putFileAs(
            'public/images',
            $this->gambar,
            $imageName
        );

        ProductModel::create([
            'nama'=> $this->nama,
            'gambar'=> $imageName,
            'deskripsi'=> $this->deskripsi,
            'jumlah'=> $this->jumlah,
            'harga'=> $this->harga,
        ]);

        session()->flash('info', 'Product Created Successfully');
        
        $this->nama = '';
        $this->gambar = '';
        $this->deskripsi = '';
        $this->jumlah = '';
        $this->harga = '';
    }
}
