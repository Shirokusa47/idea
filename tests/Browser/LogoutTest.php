<?php

use App\Models\User;
use Laravel\Dusk\Browser;

it('logs out a user', function () {

    $user = User::factory()->create();

    $this->browse(function (Browser $browser) use ($user) {

        $browser->loginAs($user)
            ->visit('/')
            ->press('Logout')
            ->assertGuest();
    });
});
