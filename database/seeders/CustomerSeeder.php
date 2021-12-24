<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            'nama_lengkap' => 'Alvis Zidan',
            'alamat' => 'Jl.Kedungsari No.2B RT01 RW03, Kec.Magersari',
            'no_handphone' => '0881234567890',
            'tanggal_pemesanan' => '23/12/2021',
        ]);
    }
}
