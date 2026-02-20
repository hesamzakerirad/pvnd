<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use App\Models\View;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::inRandomOrder()
            ->take(5)
            ->get();

        foreach ($users as $user) {
            $profiles = Profile::factory()->for($user)->count(random_int(1, 5))->create();

            foreach ($profiles as $profile) {
                $profile->views()->saveMany(
                    View::factory()->count(random_int(5, 20))->make()
                );
            }
        }
    }
}
