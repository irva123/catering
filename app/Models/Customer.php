<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //use HasFactory;
   protected $fillable = ['nama_lengkap','alamat', 'no_handphone', 'tanggal_pemesanan', 'via_pembayaran'];
}
