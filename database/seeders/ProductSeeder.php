<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->insert([
            'nama' => 'Nasi Ayam Rica-rica',
            'gambar' => asset('images/nasi.jpg'),
            'deskripsi' => '1 potong ayam dengan bumbu pedas + 1 nasi putih + lalapan+ sambal',
            'jumlah' => 20,
            'harga' => 15000
        ]);
    }
}
