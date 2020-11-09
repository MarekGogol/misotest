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

        return view('layouts.article', compact('article'));
    }

    /**
     * Validacia pomocou crudadminu, nic spolocne s laravelom
     *
     * @return  [type]
     */
    public function update($id)
    {
        $article = Article::findOrFail($id);

        //Bud Article::validator(), alebo ked pracujeme nad zaznamom, tak $article->validator().
        //Validacia sa v tychto dvoch prikladoch moze spravat inak, napr obrazok je povinny len ked nie je vyplneny,
        //pri existujucom zazname uz obrazok existuje, tak validacia prejde aj bez obrazku... A dalsie podobne pravidla
        //sa mozu ukazat.
        $validator = $article->validator()->only(['name', 'content', 'image'])->merge([
            'author' => 'required|numeric'
        ])->validate();

        $article->update($validator->getData());

        //Pri vytvarani
        // Article::create($validator->getData());

        return ['ok'];
    }

    /**
     * Validacia pomocou cisteho laravelu
     *
     * @param  Request  $request
     */
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
