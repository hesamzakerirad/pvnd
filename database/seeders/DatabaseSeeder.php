<?php

namespace Database\Seeders;

use App\Models\ChangeLog;
use App\Models\Faq;
use App\Models\Link;
use App\Models\Profile;
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
        // User::truncate();
        ChangeLog::truncate();
        Faq::truncate();
        Link::truncate();
        Profile::truncate();

        $this->call([
            UserSeeder::class,
            ChangeLogSeeder::class,
            FaqSeeder::class,
            LinkSeeder::class,
            ProfileSeeder::class,
        ]);
    }
}
