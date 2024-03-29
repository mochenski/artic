<?php

namespace App\Http\Controllers\api;

use App\Article;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Article::with('tags', 'author')->get());
    }

    public function new()
    {
        return response(Article::whereNotNull('publicated_at')->orderByRaw('publicated_at DESC')->with('tags', 'author')->take(10)->get());
    }

    public function hot()
    {
        return response(Article::whereNotNull('publicated_at')->orderByRaw('updated_at DESC')->with('tags', 'author')->take(10)->get());
    }

    public function all()
    {
        return response(Article::whereNotNull('publicated_at')->with('tags', 'author')->get());
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
            'title' => 'required|min:10|max:255',
            'slug' => 'required|unique:articles,slug|min:10|max:255',
            'excerpt' => 'required|min:10|max:255',
            'body' => 'required|min:10',
            'tags' => 'exists:tags,id',
            'publicated_at' => 'nullable|date'
        ]);

        if ($validator->fails())
            return response([
                'message' => 'Failed to create article due to invalid fields',
                'error' => $validator->errors()
            ], 400);

        $user = auth()->id();
        if ($user == '')
            return response([
                'message' => 'Failed to create article, user not found',
                'error' => [
                    'user_id' => ['The user_id is not valid'],
                ]
            ], 400);

        $newArticle = $request->only('slug', 'title', 'excerpt', 'body', 'publicated_at');
        $newArticle['user_id'] = $user;
        $article = Article::create($newArticle);
        $article->tags()->attach($request['tags']);
        $article->tags;

        return response([
            'message' => 'Created new article',
            'article' => $article,
        ], 200);
    }

    /**
     * Display the specified resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $article = Article::where('slug', $slug)->with('tags', 'author')->first();

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
     * @return \Illuminate\Http\Response
     */
    public function update($slug, Request $request)
    {

        $article = Article::where('slug', $slug)->first();
        if (!$article)
            return response([
                'message' => "Article {$slug} not found"
            ], 400);


        $validator = Validator::make($request->all(), [
            'title' => 'min:10|max:255',
            'slug' => 'min:10|max:255|unique:articles,slug,' . $article->id,
            'excerpt' => 'min:10|max:255',
            'body' => 'min:10',
            'publicated_at' => 'nullable|date'
        ]);

        if ($validator->fails())
            return response([
                'message' => 'Failed to update article due to invalid fields',
                'error' => $validator->errors()
            ], 400);

        if ($article->publicated_at != null && $article->publicated_at != $request->only('publicated_at')['publicated_at'])
            return response([
                'message' => 'Failed to update article due to invalid fields',
                'error' => 'Article has already been published. Publish date can not be changed',
                'a' => $article->publicated_at,
                'r' => $request->only('publicated_at')
            ], 400);

        $newArticle = $request->only('slug', 'title', 'excerpt', 'body', 'publicated_at');
        // if ($request->only('publicated_at')['publicated_at'] != null && $article->publicated_at == null)
        //     $newArticle['publicated_at'] = Carbon::now('UTC');
        $article->update($newArticle);

        return response([
            'message' => 'Updated article',
            'article' => $article
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
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
