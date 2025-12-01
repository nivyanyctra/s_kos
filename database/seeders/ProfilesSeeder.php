<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sourcePath = public_path('images/logo.png');
        $fileName = 'logo.png';
        $destinationPath = 'images/' . $fileName;

        Storage::makeDirectory('images');

        if (File::exists($sourcePath)) {
            $fileContent = File::get($sourcePath);
            Storage::put($destinationPath, $fileContent);
        }
        DB::table('profiles')->insert([
            [
                'id' => 1,
                'name' => "S'Kos",
                'slogan' => 'Rumah Kedua untuk Masa Depanmu',
                'description' => 'S\'Kos adalah kos eksklusif untuk mahasiswa dan pekerja muda di area Cirebon. Dengan konsep modern, fasilitas lengkap, dan komunitas positif, kami hadir untuk mendukung kenyamanan penghuni.',
                'story' => 'Berdiri sejak 2012, S\'Kos dimulai dari visi untuk menciptakan tempat tinggal yang bukan hanya sekadar kos, tapi rumah kedua yang nyaman dan aman. Dengan pengalaman, kami paham betul kebutuhan mahasiswa dan pekerja muda akan tempat tinggal yang strategis, terjangkau, dan berkualitas. Setiap hari kami berkomitmen untuk meningkatkan pelayanan dan menciptakan lingkungan yang kondusif untuk belajar, berkembang, dan bersosialisasi.',
                'logo_path' => $destinationPath,
                'photo_path' => 'profile-skos.jpg',
                'video_path' => 'profile-video.mp4',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
