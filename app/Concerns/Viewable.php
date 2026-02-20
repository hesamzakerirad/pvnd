<?php

namespace App\Concerns;

use App\Models\View;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Throwable;

trait Viewable
{
    /**
     * Returns the views associated with this class.
     */
    public function views(): MorphMany
    {
        return $this->morphMany(View::class, 'viewable');
    }

    /**
     * Store a view record for this class.
     *
     * @param  int|null  $recentlyViewedIn  This time amount (in minutes) is used to prevent duplicate view records.
     */
    public function view($recentlyViewedIn = 1): bool
    {
        $isRecentlyViewed = $this
            ->views()
            ->where('ip', request()->ip())
            ->where('viewed_at', '>=', now()->subMinutes($recentlyViewedIn))
            ->exists();

        if ($isRecentlyViewed) {
            return false;
        }

        try {
            $this->views()->create([
                'ip' => request()->ip(),
                'agent' => request()->userAgent(),
                'viewed_at' => now(),
            ]);
        } catch (Throwable $th) {
            return false;
        }

        return true;
    }
}
