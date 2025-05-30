<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::with('userprofile')
            ->orderBy('created_at', 'desc')
            ->get();

        return $this->Ok($posts, "Posts have been retrieved");
    }


    public function store(Request $request)
    {
        $inputs = $request->all();


        $validator = validator()->make($inputs, [
            "created_by" => "required|integer|min:1|max:9",
            "description" => "required|string|max:255",
            "media_link" => "sometimes|string",
            "thumbnail_link" => "sometimes|string",
        ]);

        if ($validator->fails()) {
            return $this->BadRequest($validator, "Error creating post!");
        }

        $post = Post::create($validator->validated());

        return $this->Created($post, "Post by user id: $post->id has been created!");
    }


    public function show(string $id)
    {

    }


    public function update(Request $request, string $id)
    {

    }
    public function destroy(string $id)
    {

        $post = Post::find($id);

        if (empty($post)) {
            return $this->NotFound("Post id $id does not exist!");
        }

        $post->delete();

        return $this->Ok($post, "Post id: $id has been deleted!");
    }
}
