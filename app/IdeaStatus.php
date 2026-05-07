<?php

namespace App;

enum IdeaStatus : string
{
    case Pending = 'pending';
    case InProgress = 'in_progress';
    case Completed = 'completed';

    public function label(): string{
        return match($this){
            self::Pending => 'Pendiente',
            self::InProgress => 'En progreso',
            self::Completed => 'Completado',
        };
    }
}
