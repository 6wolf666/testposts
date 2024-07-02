<?php

namespace App\Repositories\Posts;

use App\Models\Posts\Post;
use Illuminate\Database\Eloquent\Model;

class PostRepository
{
    private const SELECTED_FIELDS_FOR_ALL_POSTS = ['id', 'slug', 'title', 'short_description', 'created_at'];
    private const SELECTED_FIELDS_FOR_POST = [
        'id',
        'slug',
        'status',
        'title',
        'short_description',
        'description',
        'created_at'
    ];
    public function getActivePosts()
    {
        return Post::query()
            ->select(self::SELECTED_FIELDS_FOR_ALL_POSTS)
            ->active()
            ->paginate();
    }

    public function getPostById(int $id) : Post|Model
    {
        return Post::query()
            ->select(self::SELECTED_FIELDS_FOR_POST)
            ->where('id', $id)
            ->firstOrFail();
    }

    public function updateById(int $id, array $updateData) : Post|Model
    {
        $post = Post::query()
            ->where('id', $id)
            ->firstOrFail();

        $post->update($updateData);

        return $post;
    }

}
