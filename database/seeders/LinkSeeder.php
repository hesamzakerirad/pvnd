<?php

namespace Database\Seeders;

use App\Models\Link;
use App\Models\User;
use App\Models\View;
use Illuminate\Database\Seeder;

class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::inRandomOrder()
            ->take(5)
            ->get();

        // This is used in api documentation blade view.
        Link::create([
            'uri' => 'gg',
            'location' => 'https://google.com',
        ]);

        foreach ($users as $user) {
            $links = Link::factory()->for($user)->count(random_int(1, 5))->create();

            foreach ($links as $link) {
                $link->views()->saveMany(
                    View::factory()->count(random_int(5, 20))->make()
                );
            }
        }
    }
}
