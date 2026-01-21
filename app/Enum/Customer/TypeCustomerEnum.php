<?php

declare(strict_types=1);

namespace App\Enum\Customer;

enum TypeCustomerEnum: string
{
    //
    case Personal = 'CUSTOMER::TYPE::PERSONAL';
    case Company = 'CUSTOMER::TYPE::COMPANY';

    public function label(): string
    {
        return match ($this) {
            self::Personal => 'Singular',
            self::Company => 'Empresa',
            default => null
        };
    }
}
