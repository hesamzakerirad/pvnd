<?php

namespace App\Concerns;

use Illuminate\Support\Collection;

trait MediaProcessor
{
    /**
     * Add incoming media to current model from request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $disk
     * @return void
     */
    public function addIncomingMedia($request, $disk = 'local')
    {
        $collections = $this->mediaCollections();

        if ($collections->isEmpty()) {
            return;
        }

        foreach ($collections as $collection) {
            if ($request->hasFile($collection)) {
                foreach ($request->file($collection) as $media) {
                    $this->addMedia($media)->toMediaCollection($collection, $disk);
                }
            }
        }
    }

    /**
     * Returns an entity media collection.
     *
     * @return \Illuminate\Support\Collection<int, string>
     */
    public function mediaCollections(): Collection
    {
        return $this->getRegisteredMediaCollections()
            ->map(fn ($collection) => $collection->name);
    }
}
