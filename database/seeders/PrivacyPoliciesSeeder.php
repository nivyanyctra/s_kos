<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PrivacyPoliciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('privacy_policies')->insert([
            [
                'id' => 1,
                'title' => 'Kebijakan Privasi Contact Message',
                'version' => '1.0',
                'effective_date' => Carbon::now(),
                'content' => '
                    <h3>1. Pengumpulan Informasi</h3>
                    <p>Kami mengumpulkan informasi pribadi Anda seperti nama, email, nomor telepon, dan pesan yang Anda kirimkan melalui formulir kontak kami. Informasi ini digunakan untuk merespon pertanyaan dan permintaan Anda.</p>

                    <h3>2. Penggunaan Informasi</h3>
                    <p>Informasi yang Anda berikan hanya akan digunakan untuk:</p>
                    <ul>
                        <li>Merespon pertanyaan dan keluhan Anda</li>
                        <li>Memberikan informasi mengenai kamar dan promo</li>
                        <li>Melakukan follow-up terkait minat Anda pada kos kami</li>
                        <li>Memperbaiki kualitas layanan kami</li>
                    </ul>

                    <h3>3. Perlindungan Data</h3>
                    <p>Kami menjaga keamanan informasi Anda dengan sistem enkripsi dan hanya staf berwenang yang bisa mengaksesnya. Data tidak akan dijual, disewakan, atau dibagikan kepada pihak ketiga tanpa persetujuan Anda.</p>

                    <h3>4. Retensi Data</h3>
                    <p>Data Anda akan disimpan selama maksimal 1 tahun sejak terakhir interaksi. Setelah itu, data akan dihapus secara permanen dari sistem kami.</p>

                    <h3>5. Hak Anda</h3>
                    <p>Anda berhak meminta akses, perbaikan, atau penghapusan data pribadi Anda kapan saja dengan menghubungi kami melalui email admin@s-kos.com atau WhatsApp 0812-3456-7890.</p>

                    <h3>6. Perubahan Kebijakan</h3>
                    <p>Kebijakan ini dapat diperbarui sewaktu-waktu. Perubahan akan diumumkan di website kami dan berlaku sejak tanggal yang ditetapkan.</p>

                    <h3>7. Kontak Kami</h3>
                    <p>Jika ada pertanyaan tentang kebijakan ini, hubungi: admin@s-kos.com atau 0812-3456-7890</p>',
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
