<?php

declare(strict_types=1);

namespace App\Enums\User;

enum StatusUserEnum: string
{
    //
    case Active = 'PHX::USER::STATUS::ACTIVE';
    case Inactive = 'PHX::USER::STATUS::INACTIVE';
    case Pending = 'PHX::USER::STATUS::PENDING';
    case Banned = 'PHX::USER::STATUS::BANNED';

    public function label(): string
    {
        return match ($this) {
            self::Active => 'Activo',
            self::Inactive => 'Inactivo',
            self::Pending => 'Pendente',
            self::Banned => 'Banido',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::Active => 'success',
            self::Inactive => 'danger',
            self::Pending => 'warning',
            default => 'gray'
        };
    }
}

