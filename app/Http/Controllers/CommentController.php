<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Article $article)
    {
        $this->authorize('create', Comment::class);

        $validated = $request->validate([
            'body' => 'required|string|max:2000',
        ]);

        $article->comments()->create([
            'user_id' => $request->user()->id,
            'body' => $validated['body'],
        ]);

        return redirect()
            ->route('articles.show', $article)
            ->with('success', 'Комментарий успешно добавлен!');
    }

    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);

        $articleId = $comment->article_id;

        $comment->delete();

        return redirect()
            ->route('articles.show', $articleId)
            ->with('success', 'Комментарий успешно удалён!');
    }
}
