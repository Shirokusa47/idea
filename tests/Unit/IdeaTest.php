<?php

use App\Models\Idea;
use App\Models\User;

// Test 1: Verifica que una idea pertenece a un usuario
it('belongs to a user', function () {
    // Crea una idea falsa en la base de datos (junto con un usuario falso)
    $idea = Idea::factory()->create();

    // Verifica que al acceder a $idea->user nos devuelve un User
    expect($idea->user)->toBeInstanceOf(User::class);
});

// Test 2: Verifica que una idea puede tener pasos
it('can have steps', function () {
    // Crea una idea falsa en la base de datos
    $idea = Idea::factory()->create();

    // Al inicio no tiene pasos, debe estar vacío
    expect($idea->steps)->toBeEmpty();

    // Agregamos un paso a la idea
    $idea->steps()->create([
        'description' => 'Do the thing',
    ]);

    // fresh() recarga la idea desde la BD para ver los cambios
    // Ahora debe tener exactamente 1 paso
    expect($idea->fresh()->steps)->toHaveCount(1);
});
