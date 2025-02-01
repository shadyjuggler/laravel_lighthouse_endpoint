<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\User;

final readonly class UpdateUser
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        $user = User::findOrFail($args['id']);

        if (isset($args['name'])) {
            $user->name = $args['name'];
        }
        if (isset($args['email'])) {
            $user->email = $args['email'];
        }
        if (isset($args['password'])) {
            $user->password = \Hash::make($args['password']);
        }

        $user->save();

        return $user;
    }
}
