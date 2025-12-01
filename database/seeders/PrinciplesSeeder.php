<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PrinciplesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('principles')->insert([
            [
                'id' => 1,
                'title' => 'Keamanan 24 Jam',
                'description' => 'Sistem keamanan lengkap dengan CCTV dan satpam bergilir setiap hari untuk menjamin kenyamanan penghuni.',
                'icon' => 'fa-shield-alt',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'title' => 'Kebersihan Terjamin',
                'description' => 'Layanan cleaning service rutin setiap minggu untuk area umum dan koridor agar selalu nyaman dihuni.',
                'icon' => 'fa-broom',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'title' => 'Transparansi Harga',
                'description' => 'Tidak ada biaya tersembunyi. Semua tarif dan ketentuan jelas sejak awal untuk kenyamanan pembayaran.',
                'icon' => 'fa-handshake',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 4,
                'title' => 'Komunitas Positif',
                'description' => 'Menghubungkan penghuni melalui event dan kegiatan sosial untuk menciptakan lingkungan yang saling mendukung.',
                'icon' => 'fa-users',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 5,
                'title' => 'Responsif & Cepat',
                'description' => 'Tim management siap membantu keluhan dan permintaan penghuni dengan respon maksimal 24 jam.',
                'icon' => 'fa-headset',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
