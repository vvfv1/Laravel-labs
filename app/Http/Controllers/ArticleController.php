<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // Список новостей
    public function index()
    {
        $articles = Article::paginate(5);

        return view('articles.index', compact('articles'));
    }

    // Форма создания новости
    public function create()
    {
        return view('articles.create');
    }

    // Сохранение новости
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|url|max:255',
        ]);

        Article::create($validated);

        return redirect()
            ->route('articles.index')
            ->with('success', 'Новость успешно добавлена!');
    }

    // Просмотр отдельной новости
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    // Форма редактирования новости
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    // Обновление новости
    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|url|max:255',
        ]);

        $article->update($validated);

        return redirect()
            ->route('articles.index')
            ->with('success', 'Новость успешно обновлена!');
    }
    // Удаление новости
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()
            ->route('articles.index')
            ->with('success', 'Новость успешно удалена!');
    }
}