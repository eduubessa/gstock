<?php

declare(strict_types=1);

namespace App\Enums\Box;

enum StatusBoxEnum: string
{
    //
    case Available = 'BOX::STATUS::AVAILABLE';
    case Occupied = 'BOX::STATUS::OCCUPIED';
    case Reserved = 'BOX::STATUS::RESERVED';
    case Maintenance = 'BOX::STATUS::MAINTENANCE';
    case Cleaning = 'BOX::STATUS::CLEANING';
    case Trashed = 'BOX::STATUS::TRASHED';
    case Unavailable = 'BOX::STATUS::UNAVAILABLE';
    case Transferred = 'BOX::STATUS::TRANSFERRED';

    public function label(): string
    {
        return match ($this) {
            self::Available => 'Disponivel',
            self::Occupied => 'Ocupado',
            self::Reserved => 'Reservado',
            self::Maintenance => 'Em manutenção',
            self::Cleaning => 'Em limpeza',
            self::Trashed => 'Danificado',
            self::Unavailable => 'Indisponivel',
            self::Transferred => 'Transferido',
            default => null
        };
    }

    // TODO: Change colors to hexadecimal
    public function color(): string
    {
        return match ($this) {
            self::Available => 'green',
            self::Occupied => 'red',
            self::Reserved => 'yellow',
            self::Maintenance => 'orange',
            self::Cleaning => 'blue',
            self::Trashed => 'red',
            self::Unavailable => 'red',
            self::Transferred => 'blue',
            default => null
        };
    }
}
