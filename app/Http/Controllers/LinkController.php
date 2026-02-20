<?php

namespace App\Http\Controllers;

use App\Http\Requests\Link\Shorten as ShortenLinkRequest;
use App\Models\Link;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class LinkController extends Controller
{
    public function shorten(ShortenLinkRequest $request): RedirectResponse
    {
        $link = Link::create([
            'location' => $request->input('link'),
            'user_id' => auth()->check() ? auth()->id() : null
        ]);

        return redirect()->route('home')
            ->withInput(['link' => $link->getFull()]);
    }

    public function redirect(string $uri): RedirectResponse|View
    {
        if (isProfileHandle($uri)) {
            return $this->redirectToProfile(getProfileHandle($uri));
        }

        $link = Link::query()
            ->where('uri', $uri)
            ->where(function ($query) {
                $query->whereNull('expired_at')->orWhere('expired_at', '>=', now());
            })
            ->firstOrFail();

        $location = $link->location;

        if ($link->add_utm_tags) {
            $location .= $link->utmTags();
        }

        $link->view();

        return redirect()->to($location, $link->redirect_http_code);
    }

    public function redirectToProfile(string $uri): View
    {
        $profile = \App\Models\Profile::query()
            ->with([
                'seoValues.seoKeys',
                'cover',
                'file',
                'thumbnail',
            ])
            ->where('uri', $uri)
            ->where('is_public', true)
            ->firstOrFail();

        $profile->view();

        return view('profile', [
            'profile' => $profile,
        ]);
    }
}
