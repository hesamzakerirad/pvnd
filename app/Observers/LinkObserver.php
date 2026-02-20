<?php

namespace App\Observers;

use App\Models\Link;

class LinkObserver
{
    /**
     * Handle the Link "creating" event.
     */
    public function creating(Link $link): void
    {
        if (empty($link->uri)) {
            $link->generateUri();
        }
    }

    /**
     * Handle the Link "created" event.
     */
    public function created(Link $link): void
    {
        //
    }

    /**
     * Handle the Link "updated" event.
     */
    public function updated(Link $link): void
    {
        //
    }

    /**
     * Handle the Link "deleted" event.
     */
    public function deleted(Link $link): void
    {
        //
    }

    /**
     * Handle the Link "restored" event.
     */
    public function restored(Link $link): void
    {
        //
    }

    /**
     * Handle the Link "force deleted" event.
     */
    public function forceDeleted(Link $link): void
    {
        //
    }
}
