<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\User;

final readonly class Users
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args) {
        return User::all();
    }
}
