<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'question' => 'پیوند چیست؟ هزینه استفاده از آن چقدر است؟',
                'answer' => 'پیوند یک سرویس کوتاه‌کننده آدرس‌های اینترنتی است و هیچ هزینه‌ای برای استفاده ندارد.',
                'group' => 'general',
                'order' => 1,
            ],
            [
                'question' => 'آیا در استفاده از پیوند محدودیت دارم؟',
                'answer' => 'خیر؛ پیوند به صورت نامحدود در اختیار شماست.',
                'group' => 'general',
                'order' => '2',
            ],
            [
                'question' => 'تک‌وند چیست؟',
                'answer' => 'تک‌وند یک آدرس اینترنتی و اختصاصی برای شماست که شما در آن برای خود یک هویت دیجیتال ایجاد می‌کنید.',
                'group' => 'general',
                'order' => '3',
            ],
        ];

        DB::table('faqs')->insert($data);
    }
}
