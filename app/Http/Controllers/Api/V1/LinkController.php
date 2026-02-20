<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Link\Shorten as ShortenLinkRequest;
use App\Models\Link;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

class LinkController extends Controller
{
    public function shorten(ShortenLinkRequest $request): JsonResponse
    {
        $link = Link::create([
            'location' => $request->input('link'),
            'user_id' => auth()->check() ? auth()->id() : null,
            'is_created_using_api' => true,
        ]);

        return ok([
            'link' => $link->getFull(),
            'token' => request()->bearerToken(),
        ], __('response.short_link_created'), 201);
    }
}
