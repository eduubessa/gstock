<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\BoxLogFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

final class BoxLog extends Model
{
    /** @use HasFactory<BoxLogFactory> */
    use HasFactory, SoftDeletes;

    public function box(): BelongsTo
    {
        return $this->belongsTo(Box::class);
    }

    public function actor(): MorphTo
    {
        return $this->morphTo();
    }
}
