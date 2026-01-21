<?php

declare(strict_types=1);

namespace App\Traits;

use App\Models\Permission;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait HasPermission
{
    //
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class)->withTimestamps();
    }

    public function hasPermission(string $permission): bool
    {
        $direct = $this->permissions()->where('slug', $permission)->exists();
        $viaRole = $this->roles()->whereHas('permissions', fn ($q) => $q->where('slug', $permission))->exists();

        return $direct || $viaRole;
    }

    public function assignPermission(Permission|string $permission)
    {
        $permission = $permission instanceof Permission ? $permission->id : Permission::where('slug', $permission)->firstOrFail()->id;
        $this->permissions()->syncWithoutDetaching([$permission]);
    }

    public function unassignPermission($query, string $permission)
    {
        return $query->whereHas('permissions', fn ($q) => $q->where('slug', $permission))
            ->orWhereHas('roles.permissions', fn ($q) => $q->where('slug', $permission));
    }
}
