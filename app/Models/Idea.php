<?php

namespace App\Models;

use App\IdeaStatus;
use Database\Factories\IdeaFactory;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

class Idea extends Model
{
    /** @use HasFactory<IdeaFactory> */
    use HasFactory;

    protected $casts = [
        'links' => AsArrayObject::class,
        'status' => IdeaStatus::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function steps(): HasMany
    {
        return $this->hasMany(Step::class);
    }

    public function ideas()
    {
        return $this->hasMany(Idea::class);
    }

    // Método estático que calcula cuántas ideas hay por cada status
    // para un usuario específico
    public static function statusCounts(User $user): Collection
    {
        // Consulta SQL: SELECT status, COUNT(*) as count FROM ideas
        // WHERE user_id = ? GROUP BY status
        $counts = $user->ideas()
            ->selectRaw('status, count(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status');

        // Mapeamos todos los statuses posibles
        // Si un status no tiene ideas, lo ponemos en 0
        return Collection::make(IdeaStatus::cases())
            ->mapWithKeys(fn ($status) => [
                $status->value => $counts->get($status->value, 0),
            ])
            // Agregamos "all" con el total de ideas del usuario
            ->prepend($user->ideas()->count(), 'all');
    }
}
