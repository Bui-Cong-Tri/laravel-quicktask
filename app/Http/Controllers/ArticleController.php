<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    const DEFAULT_LIMIT = 15;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $articles = DB::table('articles')->orderBy('created_at')->paginate(self::DEFAULT_LIMIT, ['*'], 'page', $request->input('page') ?? 1);
        return view('articles.index')->with('articles', $articles);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create')->with('id',  Auth::id());
    }

    public function createWithId(int $id)
    {
        return view('articles.create')->with('id', $id);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateArticleRequest $request)
    {
        $validated = $request->validated();
        $validated['body'] = json_encode(explode(PHP_EOL, str_replace("\r", '', $validated['body'])));
        $validated['author_id'] = $validated['author_id'];
        Db::table('articles')->insert($validated);

        return redirect()->route('articles.index')->with('success', trans('message.article.store.success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $article = DB::table('articles')->find($id);

        return view('articles.show')->with('article', $article);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $article = DB::table('articles')->where('id', $id)->get();
        $input = $article->first();
        $input->body = trim(implode(PHP_EOL, json_decode($input->body)));

        return view('articles.edit')->with('article', $input);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, int $id)
    {
        $validated = $request->validated();
        $validated['body'] = json_encode(explode(PHP_EOL, str_replace("\r", '', $validated['body'])));
        DB::table('articles')->where('id', $id)->update($validated);

        return redirect()->route('articles.show', ['article' => $id])->with('success', trans('message.article.update.success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        if (Auth::id() === $id || Auth::user()->is_admin) {
            DB::table('articles')->delete($id);

            return redirect()->route('articles.index')->with('success', trans('message.article.delete.success'));
        } else {
            return redirect()->route('articles.index')->with('fail', trans('403'));
        }
    }
}
