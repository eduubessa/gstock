<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

final class Box extends Model
{
    /** @use HasFactory<\Database\Factories\BoxFactory> */
    use HasFactory, HasUuids, SoftDeletes;

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function logs()
    {
        return $this->hasMany(BoxLog::class);
    }
}
