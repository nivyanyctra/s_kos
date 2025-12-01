<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TestimonialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('testimonials')->insert([
            [
                'id' => 1,
                'name' => 'Rizky Febriansyah',
                'role' => 'Mahasiswa FE UI',
                'text' => 'Tinggal di S\'Kos sangat nyaman! WiFi-nya cepat, lingkungannya tenang jadi enak buat belajar, dan satpamnya baik semua. Lokasinya juga strategis banget, deket kampus dan banyak tempat makan. Rekomen banget buat mahasiswa!',
                'rating' => 5,
                'image' => 'testimonial-rizky.jpg',
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'name' => 'Dewi Lestari',
                'role' => 'Mahasiswa FISIP UI',
                'text' => 'Setelah 2 tahun tinggal di sini, aku bener-bener merasa seperti rumah sendiri. Management responsif banget kalau ada masalah, kebersihan selalu terjaga. Event komunitasnya juga seru dan bikin kenal banyak teman baru!',
                'rating' => 5,
                'image' => 'testimonial-dewi.jpg',
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
