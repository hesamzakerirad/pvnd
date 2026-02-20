<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class View extends Model
{
    use HasFactory;

    protected $table = 'viewables';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'viewable_id',
        'viewable_type',
        'ip',
        'agent',
        'viewed_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'viewable_id' => 'integer',
        'viewable_type' => 'string',
        'ip' => 'string',
        'agent' => 'string',
        'viewed_at' => 'datetime',
    ];

    /**
     * Get the parent viewable model (post or video).
     */
    public function viewable(): MorphTo
    {
        return $this->morphTo();
    }
}
