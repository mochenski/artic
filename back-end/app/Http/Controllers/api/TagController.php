<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Tag::all());
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
            'name' => 'required|unique:tags,name|min:1|max:255',
        ]);

        if ($validator->fails())
            return response([
                'message' => 'Failed to create tag due to invalid fields',
                'error' => $validator->errors()
            ], 400);

        $newTag = $request->only('name');
        $tag = Tag::create($newTag);

        return response([
            'message' => 'Created new tag',
            'article' => $tag
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update($name, Request $request)
    {

        $tag = Tag::where('name', $name)->first();
        if (!$tag)
            return response([
                'message' => "Tag {$name} not found"
            ], 400);

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:tags,name|min:1|max:255',
        ]);

        if ($validator->fails())
            return response([
                'message' => 'Failed to update tag due to invalid fields',
                'error' => $validator->errors()
            ], 400);

        $newTag = $request->only('name');
        $tag->update($newTag);

        return response([
            'message' => 'Updated tag',
            'article' => $tag
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($name)
    {
        $tag = Tag::where('name', $name)->first();
        if (!$tag)
            return response([
                'message' => "Tag {$name} not found"
            ], 400);

        $tag->delete();

        return response([
            'message' => "Tag {$name} destroyed"
        ], 200);
    }
}
