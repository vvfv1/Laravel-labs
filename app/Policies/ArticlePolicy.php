<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ArticlePolicy
{
    public function viewAny(User $user): Response
    {
        return Response::allow();
    }

    public function view(User $user, Article $article): Response
    {
        return Response::allow();
    }

    public function create(User $user): Response
    {
        return Response::deny('Только модератор может создавать новости.');
    }

    public function update(User $user, Article $article): Response
    {
        return Response::deny('Только модератор может редактировать новости.');
    }

    public function delete(User $user, Article $article): Response
    {
        return Response::deny('Только модератор может удалять новости.');
    }

    public function restore(User $user, Article $article): Response
    {
        return Response::deny('Только модератор может восстанавливать новости.');
    }

    public function forceDelete(User $user, Article $article): Response
    {
        return Response::deny('Только модератор может окончательно удалять новости.');
    }
}
