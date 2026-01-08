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
        // Buat directory jika belum ada
        Storage::disk('public')->makeDirectory('profiles');

        // Copy logo
        $sourceLogoPath = public_path('images/logo.png');
        if (File::exists($sourceLogoPath)) {
            $logoPath = Storage::disk('public')->putFile('profiles', new \Illuminate\Http\File($sourceLogoPath));
        } else {
            $logoPath = null;
        }

        // Copy photo
        $sourcePhotoPath = public_path('images/profile-skos.png');
        if (File::exists($sourcePhotoPath)) {
            $photoPath = Storage::disk('public')->putFile('profiles', new \Illuminate\Http\File($sourcePhotoPath));
        } else {
            $photoPath = null;
        }

        // Copy video
        $sourceVideoPath = public_path('videos/profile-video.mp4');
        if (File::exists($sourceVideoPath)) {
            Storage::disk('public')->makeDirectory('profiles'); // bisa digabung atas
            $videoPath = Storage::disk('public')->putFile('profiles', new \Illuminate\Http\File($sourceVideoPath));
        } else {
            $videoPath = null;
        }

        DB::table('profiles')->insert([
            [
                'id' => 1,
                'name' => "S'Kos",
                'slogan' => 'Rumah Kedua untuk Masa Depanmu',
                'description' => 'S\'Kos adalah kos eksklusif untuk mahasiswa dan pekerja muda di area Cirebon. Dengan konsep modern, fasilitas lengkap, dan komunitas positif, kami hadir untuk mendukung kenyamanan penghuni.',
                'story' => 'Berdiri sejak 2012, S\'Kos dimulai dari visi untuk menciptakan tempat tinggal yang bukan hanya sekadar kos, tapi rumah kedua yang nyaman dan aman. Dengan pengalaman, kami paham betul kebutuhan mahasiswa dan pekerja muda akan tempat tinggal yang strategis, terjangkau, dan berkualitas. Setiap hari kami berkomitmen untuk meningkatkan pelayanan dan menciptakan lingkungan yang kondusif untuk belajar, berkembang, dan bersosialisasi.',
                'logo_path' => $logoPath,
                'photo_path' => $photoPath,
                'video_path' => $videoPath,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
