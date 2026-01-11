<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TermsConditionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('terms_conditions')->insert([
            [
                'id' => 1,
                'title' => 'Syarat & Ketentuan Booking S\'Kos',
                'version' => '1.0',
                'effective_date' => Carbon::now(),
                'content' => '
                    <h3>1. Ketentuan Booking</h3>
                    <p>Booking kamar hanya bisa dilakukan dengan transfer booking fee sebesar Rp 500.000 yang tidak refundable. Booking fee akan dikurangkan dari total pembayaran pertama.</p>

                    <h3>2. Pembayaran</h3>
                    <p>Pembayaran sewa harus dilunasi paling lambat tanggal 5 setiap bulan. Keterlambatan dikenakan denda 1% per hari dari total sewa. Pembayaran bisa dilakukan via transfer bank, QRIS, atau tunai di kantor pengelola.</p>

                    <h3>3. Kontrak & Masa Tinggal</h3>
                    <p>Minimal kontrak adalah 6 bulan. Penghuni yang ingin berhenti sebelum waktunya wajib memberitahukan pengelola 30 hari sebelumnya. Uang sewa yang sudah dibayarkan tidak bisa diminta kembali.</p>

                    <h3>4. Deposit</h3>
                    <p>Penghuni wajib membayar deposit sebesar satu bulan sewa sebagai jaminan kerusakan dan kunci. Deposit akan dikembalikan maksimal 7 hari kerja setelah kontrak selesai, setelah pengecekan kondisi kamar.</p>

                    <h3>5. Peraturan Penghuni</h3>
                    <p>Penghuni wajib:</p>
                    <ul>
                        <li>Menjaga kebersihan dan kerapian kamar</li>
                        <li>Tidak melakukan kegiatan ilegal di area kos</li>
                        <li>Menjaga ketenangan terutama jam 22:00 - 07:00</li>
                        <li>Tamu wajib lapor ke satpam dan meninggalkan identitas</li>
                        <li>Tidak merokok di dalam kamar (area merokok tersedia)</li>
                        <li>Menggunakan fasilitas bersama dengan bijak</li>
                    </ul>

                    <h3>6. Pembatalan & Pengembalian</h3>
                    <p>Pembatalan booking sebelum tanggal efektif akan dikenakan potongan 50% dari booking fee. Pembatalan setelah tanggal efektif booking fee hangus sepenuhnya.</p>

                    <h3>7. Kerusakan & Perbaikan</h3>
                    <p>Kerusakan akibat kelalaian penghuni akan ditagihkan sesuai biaya perbaikan. Kerusakan sistem (listrik, air) akan diperbaiki maksimal 24 jam setelah dilaporkan.</p>

                    <h3>8. Force Majeure</h3>
                    <p>Pihak kos tidak bertanggung jawab atas kerugian akibat bencana alam, kerusuhan, atau keadaan di luar kendali kami.</p>

                    <h3>9. Perubahan Ketentuan</h3>
                    <p>Pengelola berhak mengubah ketentuan sewaktu-waktu dengan pemberitahuan 7 hari sebelumnya. Ketentuan baru berlaku sejak tanggal yang ditetapkan.</p>

                    <h3>10. Kontak Pengelola</h3>
                    <p>Untuk pertanyaan lebih lanjut, hubungi: admin@s-kos.com atau 0812-3456-7890 (WhatsApp/Telp)</p>',
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
