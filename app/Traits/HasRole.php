<?php

declare(strict_types=1);

namespace App\Traits;

use App\Models\Role;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait HasRole
{
    //
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function hasRole(string|array $roles): bool
    {
        $roles = is_array($roles) ? $roles : [$roles];

        return $this->roles()->whereIn('slug', $roles)->exists();
    }

    public function assignRole(Role|string $role): void
    {
        $role = $role instanceof Role ? $role->id : Role::where('slug', $role)->firstOrFail()->id;
        $this->roles()->syncWithoutDetaching([$role]);
    }

    public function unassingRole(Role|string $role): void
    {
        $role = $role instanceof Role ? $role->id : Role::where('slug', $role)->first()->id;
        $this->roles()->detach($role);
    }

    public function scopeWithRole($query, string|array $roles)
    {
        $roles = is_array($roles) ? $roles : [$roles];

        return $query->whereHas('roles', fn ($q) => $q->whereIn('slug', $roles));
    }
}
