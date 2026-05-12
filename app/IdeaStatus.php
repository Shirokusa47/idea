<?php

declare(strict_types=1);

namespace App;

enum IdeaStatus: string
{
    case Pending = 'pending';
    case InProgress = 'in_progress';
    case Completed = 'completed';

    public function label(): string
    {
        return match ($this) {
            self::Pending => 'Pendiente',
            self::InProgress => 'En progreso',
            self::Completed => 'Completado',
        };
    }

    // Devuelve un array con todos los valores posibles del enum
    // Ejemplo: ['pending', 'in_progress', 'completed']
    public static function values(): array
    {
        return array_map(fn ($status) => $status->value, self::cases());
    }
}
