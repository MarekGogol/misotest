<?php

namespace App\Http\Controllers;

use App\Models\Article\Article;
use Illuminate\Http\Request;
use Validator;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::all();

        return view('layouts.articles', compact('articles'));
    }

    public function show($slug)
    {
        $article = Article::findBySlugOrFail($slug);

        return $article;
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'content' => 'required',
            'image' => 'required|file',
        ])->validate();

        $file = $request->file('image');

        $filename = $file->getClientOriginalName();

        $file->storeAs('articles/image', $filename, 'uploads');

        Article::create([
            'name' => $request->get('name'),
            'content' => $request->get('content'),
            'image' => $filename,
        ]);

        return ['ok'];
    }
}
