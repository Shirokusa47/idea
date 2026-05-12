<?php

use Laravel\Dusk\Browser;

it('registers a user', function () {

    $email = fake()->unique()->safeEmail();

    $this->browse(function (Browser $browser) use ($email) {
        $browser->visit('/register')
            ->type('name', 'John Doe')
            ->type('email', $email)
            ->type('password', 'password123')
            ->press('Create Account')
            ->assertPathIs('/')
            ->assertAuthenticated();
    });
});

it('requires a valid email address', function () {

    $this->browse(function (Browser $browser) {

        $browser->visit('/register')
            ->type('name', 'John Doe')
            ->type('email', '123')
            ->type('password', 'password123')
            ->press('Create Account')
            ->assertPathIs('/register');
    });
});
