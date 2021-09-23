<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;

class AssignRoleToNewUser {

    public function handle(Registered $event)
    {
        $event->user->assignRole('user');
    }
}