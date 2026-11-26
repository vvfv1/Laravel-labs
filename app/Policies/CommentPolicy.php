<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CommentPolicy
{
    public function create(User $user): Response
    {
        return Response::allow();
    }

    public function delete(User $user, Comment $comment): Response
    {
        return Response::deny('Только модератор может удалять комментарии.');
    }
}
