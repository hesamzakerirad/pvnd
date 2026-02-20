<?php

namespace App\Models;

use App\Concerns\Viewable;
use App\Observers\LinkObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

#[ObservedBy([LinkObserver::class])]
class Link extends Model
{
    /** @use HasFactory<\Database\Factories\LinkFactory> */
    use HasFactory;

    use Viewable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'label',
        'uri',
        'location',
        'redirect_http_code',
        'add_utm_tags',
        'is_created_using_api',
        'expired_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        //
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
            'label' => 'string',
            'uri' => 'string',
            'location' => 'string',
            'redirect_http_code' => 'string',
            'add_utm_tags' => 'boolean',
            'is_created_using_api' => 'boolean',
            'expired_at' => 'datetime',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    public function generateUri()
    {
        $length = config('url.length');

        $uri = Str::random($length);

        if ($this->uriExists($uri)) {
            return $this->generateUri();
        }

        $this->uri = $uri;

        return $this;
    }

    public function uriExists($uri): bool
    {
        return static::query()
            ->where('uri', $uri)
            ->exists();
    }

    public function isActive(): bool
    {
        if ($this->isExpired()) {
            return false;
        }

        return true;
    }

    public function isExpired(): bool
    {
        if ($this->expired_at && $this->expired_at->isPast()) {
            return true;
        }

        return false;
    }

    public function user()
    {
        return $this->belongsTo(config('auth.providers.users.model'));
    }

    public function getFull(): string
    {
        $appUrl = config('app.url');

        if (substr($appUrl, -1) != '/') {
            $appUrl .= '/';
        }

        return $appUrl.$this->uri;
    }

    public function utmTags(): string
    {
        $utms = [
            'utm_source' => 'pvnd',
            'utm_medium' => 'redirect',
            'utm_campaign' => $this->uri,
        ];

        return '?'.http_build_query($utms);
    }
}
