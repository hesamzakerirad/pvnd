<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChangeLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'content' => 'جرقه ایده سرویس پیوند در ذهن من ([حسام راد](https://hesamrad.com))',
                'created_at' => Carbon::create(2025, 3, 22),
                'updated_at' => Carbon::create(2025, 3, 22),
            ],
            [
                'content' => 'شروع ایده‌پردازی و توسعه محصول',
                'created_at' => Carbon::create(2026, 2, 3),
                'updated_at' => Carbon::create(2026, 2, 3),
            ],
        ];

        DB::table('change_logs')->insert($data);
    }
}
