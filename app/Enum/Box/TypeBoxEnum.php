<?php

declare(strict_types=1);

namespace App\Enum\Box;

enum TypeBoxEnum: string
{
    //
    case Normal = 'BOX::TYPE::NORMAL';
    case Premium = 'BOX::TYPE::PREMIUM';
    case VIP = 'BOX::TYPE::VIP';

    public function label(): string
    {
        return match ($this) {
            self::Normal => 'Normal',
            self::Premium => 'Premium',
            self::VIP => 'VIP',
            default => null
        };
    }
}
