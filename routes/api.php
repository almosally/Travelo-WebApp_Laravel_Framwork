<?php

use App\User;
use App\Http\Resources\UserApi as UserResource;

Route::get('/UserApi', function () {
    return new UserResource(User::all(), JSON_PRETTY_PRINT);
});

