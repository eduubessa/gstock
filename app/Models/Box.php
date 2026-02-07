<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\BoxFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

final class Box extends Model
{
    /** @use HasFactory<BoxFactory> */
    use HasFactory, HasUuids, SoftDeletes;

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function logs()
    {
        return $this->hasMany(BoxLog::class);
    }
}
