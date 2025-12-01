<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WhyChooseUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('why_choose_us')->insert([
            [
                'id' => 1,
                'title' => 'Lokasi Strategis',
                'description' => 'Hanya 5 menit ke kampus UI, 10 menit ke stasiun UI, dan dekat dengan pusat perbelanjaan serta fasilitas umum lainnya.',
                'icon' => 'fa-map-marked-alt',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'title' => 'Harga Terjangkau',
                'description' => 'Mulai dari Rp 1,2 juta/bulan dengan fasilitas lengkap. Bisa cicil per minggu untuk kemudahan mahasiswa.',
                'icon' => 'fa-tag',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'title' => 'Fasilitas Premium',
                'description' => 'WiFi kecepatan tinggi, AC, TV, kamar mandi dalam, laundry, dapur umum, ruang belajar, dan area parkir luas.',
                'icon' => 'fa-star',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 4,
                'title' => 'Lingkungan Nyaman',
                'description' => 'Area hijau, taman bersih, dan suasana tenang yang kondusif untuk belajar maupun beristirahat.',
                'icon' => 'fa-home',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 5,
                'title' => 'Akses 24 Jam',
                'description' => 'Sistem akses 24 jam dengan keamanan terjamin. Bebas pulang kapan saja tanpa khawatir keamanan.',
                'icon' => 'fa-clock',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 6,
                'title' => 'Community Events',
                'description' => 'Regular events seperti movie night, makan bersama, dan workshop untuk mempererat komunitas penghuni.',
                'icon' => 'fa-calendar-alt',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 7,
                'title' => 'No DP Besar',
                'description' => 'Syarat mudah dan tidak memerlukan uang muka besar. Bisa mulai tinggal hanya dengan bayar pertama.',
                'icon' => 'fa-money-bill-wave',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 8,
                'title' => 'Management Handal',
                'description' => 'Pengelola berpengalaman lebih dari 5 tahun dan siap membantu kebutuhan penghuni kapan saja.',
                'icon' => 'fa-award',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
