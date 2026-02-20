<?php

namespace App\Models;

use App\Concerns\MediaProcessor;
use App\Concerns\Viewable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Collection;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Profile extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\ProfileFactory> */
    use HasFactory;

    use InteractsWithMedia;
    use MediaProcessor;
    use Viewable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'uri',
        'label',
        'position',
        'title',
        'bio',
        'links',
        'is_public',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id' => 'integer',
            'user_id' => 'integer',
            'uri' => 'string',
            'label' => 'string',
            'position' => 'string',
            'title' => 'string',
            'bio' => 'string',
            'links' => 'array',
            'is_public' => 'boolean',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function seo(): Collection
    {
        $seo = [];
        $seoValues = $this->seoValues()->get();

        if ($seoValues->isEmpty()) {
            return $seoValues;
        }

        $seoKeys = SeoKey::query()
            ->whereIn('id', $seoValues->pluck('seo_key_id')->toArray())
            ->get();

        if ($seoKeys->isEmpty()) {
            return $seoKeys;
        }

        foreach ($seoKeys as $tag) {
            $seo[$tag->key] = $seoValues->where('seo_key_id', $tag->id)->value('value');
        }

        return collect($seo);
    }

    public function seoValues()
    {
        return $this->hasMany(SeoValue::class);
    }

    /**
     * Resgisters all types of media to be used on this class.
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('cover');
        $this->addMediaCollection('file');
        $this->addMediaCollection('thumbnail');
    }

    /**
     * Register conversions on desired media files.
     */
    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('cover')
            ->format('webp');

        $this->addMediaConversion('thumbnail')
            ->format('webp');
    }

    public function cover(): MorphOne
    {
        return $this->morphOne(Media::class, 'model')
            ->where('collection_name', 'cover')
            ->latest();
    }

    public function file(): MorphOne
    {
        return $this->morphOne(Media::class, 'model')
            ->where('collection_name', 'file')
            ->latest();
    }

    public function thumbnail(): MorphOne
    {
        return $this->morphOne(Media::class, 'model')
            ->where('collection_name', 'thumbnail')
            ->latest();
    }

    public function getFull(): string
    {
        $appUrl = config('app.url');

        if (substr($appUrl, -1) != '/') {
            $appUrl .= '/';
        }

        return $appUrl . '@' . $this->uri;
    }
}
