<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PrinciplesSeeder::class,
            WhyChooseUsSeeder::class,
            FrequentlyAskedQuestionsSeeder::class,
            PrivacyPoliciesSeeder::class,
            UsersSeeder::class,
            ContactsSeeder::class,
            TestimonialsSeeder::class,
            ProfilesSeeder::class,
            TermsConditionsSeeder::class,
        ]);
    }
}
