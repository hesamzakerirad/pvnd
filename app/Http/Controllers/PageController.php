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
            ->where('group', 'general')
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

        return view('change-logs', compact('changeLogs'));
    }
}
