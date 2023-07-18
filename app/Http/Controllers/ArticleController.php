<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $articles = Article::all();

        // return view('articles.index')->with('articles', $articles);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $article = Article::create($request->all());

        // return redirect()->route('articles.index')->with('success', "Article created successfully!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $article = Article::find($id);

        // return view('articles.show')->with('article', $article);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $article = Article::find($id);

        // return view('articles.edit')->with('article', $article);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $article = Article::find($id);
        // $article->fill($request->all());
        // $article->save();

        // return redirect()->route('articles.show', ['article' => $id])->with('success', "Article updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Article::destroy($id);

        // return redirect()->route('articles.index')->with('success', "Article deleted successfully!");
    }
}
