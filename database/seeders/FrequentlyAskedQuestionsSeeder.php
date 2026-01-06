<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FrequentlyAskedQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('frequently_asked_questions')->insert([
            [
                'id' => 1,
                'question' => 'Berapa lama minimal masa kontrak?',
                'answer' => 'Minimal kontrak adalah 6 bulan. Untuk mahasiswa baru bisa request kontrak 3 bulan pertama dengan konfirmasi khusus.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'question' => 'Apakah boleh membawa hewan peliharaan?',
                'answer' => 'Mohon maaf, untuk menjaga kenyamanan bersama hewan peliharaan tidak diperbolehkan di area kos.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'question' => 'Bagaimana proses booking kamar?',
                'answer' => 'Cukup hubungi kami via WhatsApp, lakukan survey kamar, transfer booking fee Rp 500 ribu, dan kamar langsung dipesan.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 4,
                'question' => 'Apakah ada biaya tambahan selain sewa kamar?',
                'answer' => 'Harga sudah termasuk listrik, air, WiFi, dan cleaning service. Tidak ada biaya tambahan tersembunyi.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 5,
                'question' => 'Bagaimana jika ingin berhenti sewa sebelum kontrak habis?',
                'answer' => 'Penghuni wajib memberitahukan 1 bulan sebelumnya. Uang sewa yang sudah dibayarkan tidak bisa dikembalikan.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 6,
                'question' => 'Apakah ada parkir untuk motor dan mobil?',
                'answer' => 'Area parkir motor luas tersedia gratis. Untuk mobil tersedia parkir terbatas dengan biaya tambahan Rp 200 ribu/bulan.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 7,
                'question' => 'Apakah bisa berganti kamar jika tidak cocok?',
                'answer' => 'Bisa, berganti kamar tersedia jika ada kamar kosong yang sama atau upgrade tipe. Syarat dan ketentuan berlaku.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 8,
                'question' => 'Bagaimana sistem keamanan di malam hari?',
                'answer' => 'Satpam jaga 24 jam, CCTV area umum, dan akses masuk menggunakan akses card. Tamu wajib lapor ke satpam.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 9,
                'question' => 'Apakah ada dapur umum?',
                'answer' => 'Tersedia dapur umum lengkap dengan kompor gas, rice cooker, kulkas, dan peralatan masak yang bisa digunakan bersama.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 10,
                'question' => 'Bagaimana proses pengembalian deposit?',
                'answer' => 'Deposit akan dikembalikan maksimal 7 hari kerja setelah kontrak selesai, setelah ada pengecekan kondisi kamar.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
