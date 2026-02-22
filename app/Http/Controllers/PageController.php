<?php

namespace App\Http\Controllers;

use App\Models\ChangeLog;
use App\Models\Faq;

class PageController extends Controller
{
    public function home()
    {
        // $stats = [
        //     'links_count' => round(\App\Models\Link::count()),
        //     'profiles_count' => round(\App\Models\Profile::count()),
        //     'users_count' => round(\App\Models\User::count()),
        // ];

        $stats = [
            'links_count' => '12000+',
            'profiles_count' => '1500+',
            'users_count' => '4000+',
        ];

        $faq = Faq::query()
            ->where('order', 1)
            ->get();

        return view('home', compact([
            'stats',
            'faq',
        ]));
    }

    public function changeLogs()
    {
        $changeLogs = ChangeLog::query()
            ->latest()
            ->get()
            ->each(function (&$log) {
                $log->created_at = verta($log->created_at);
            });

        $faq = Faq::query()
            ->where('group', 'general')
            ->get();

        return view('change-logs', compact('changeLogs', 'faq'));
    }

    public function yekvand()
    {
        $faq = Faq::query()
            ->where('group', 'profile')
            ->get();

        return view('yekvand', compact('faq'));
    }

    public function api()
    {
        $faq = Faq::query()
            ->where('group', 'api')
            ->get();

        return view('api', compact('faq'));
    }

    public function sitemap()
    {
        $pages = [
            [
                'title' => 'تماس با ما',
                'route' => route('contact'),
            ],
            [
                'title' => 'ثبت‌نام در سایت',
                'route' => route('filament.user.auth.register'),
            ],
            [
                'title' => 'خانه',
                'route' => route('home'),
            ],
            [
                'title' => 'دانشنامه',
                'route' => route('blog'),
            ],
            [
                'title' => 'مسیر رشد',
                'route' => route('change-logs'),
            ],
            [
                'title' => 'وب‌سرویس',
                'route' => route('api'),
            ],
            [
                'title' => 'ورود به حساب کاربری',
                'route' => route('filament.user.auth.login'),
            ],
            [
                'title' => 'یک‌وند',
                'route' => route('yekvand'),
            ],
        ];

        return view('sitemap', compact('pages'));
    }
}
