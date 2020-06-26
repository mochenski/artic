<?php

namespace App\Http\Controllers\api;

use App\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Article::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'slug' => 'required|unique:articles,slug|max:255',
            'excerpt' => 'required|min:10|max:255',
            'body' => 'required|min:10'
        ]);

        if ($validator->fails())
            return response([
                'message' => 'Failed to create article due to invalid credentials',
                'error' => $validator->errors()
            ], 400);

        $newArticle = $request->only('slug', 'title', 'excerpt', 'body');
        $article = Article::create($newArticle);

        return response([
            'message' => 'Created new article',
            'article' => $article
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $article = Article::where('slug', $slug)->first();
        if (!$article)
            return response([
                'message' => "Article {$slug} not found"
            ], 400);

        return response($article, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $article = Article::where('slug', $slug)->first();
        if (!$article)
            return response([
                'message' => "Article {$slug} not found"
            ], 400);

        $article->delete();

        return response([
            'message' => 'Article destroyed'
        ], 200);
    }
}
