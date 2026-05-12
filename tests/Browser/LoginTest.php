<?php

use App\Models\User;
use Laravel\Dusk\Browser;

it('logs in a user', function () {

    $user = User::factory()->create([
        'password' => 'password123',
    ]);

    $this->browse(function (Browser $browser) use ($user) {

        $browser->visit('/login')
            ->waitFor('input[name=email]')
            ->type('email', $user->email)
            ->type('password', 'password123')
            ->press('Sign In')
            ->assertPathIs('/')
            ->assertAuthenticated();

    });
});
