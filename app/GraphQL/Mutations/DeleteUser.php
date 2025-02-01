<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\User;

final readonly class DeleteUser
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        $user = User::find($args['id']);
        $status = $user->delete();

        return [
            'status' => (bool)$status,
            'message' => "User id: $user->id deleted successfuly!"
        ];
    }
}
