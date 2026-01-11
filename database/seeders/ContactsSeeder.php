<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contacts')->insert([
            [
                'id' => 1,
                'address' => 'Jl. Tugu Dalam, Kel. Kalijaga, Kec. Harjamukti, Kota Cirebon, Jawa Barat, 45144 (RT 03, RW 04, No. 05)',
                'business_hours' => 'Senin - Minggu: 08:00 - 20:00 WIB',
                'email' => 'info@s-kos.com',
                'phone' => '0851-7525-8106',
                'instagram' => '@skos',
                'facebook' => 'S\'Kos',
                'x' => '@skos',
                'youtube' => 'S\'Kos',
                'map_embed' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d990.5341968375715!2d108.54715441904067!3d-6.753168018414338!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f1d98ddb01431%3A0x91a1aa84085e40de!2sGriya%20onah!5e0!3m2!1sen!2sid!4v1764577292498!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
