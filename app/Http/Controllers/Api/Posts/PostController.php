<?php

namespace App\Http\Controllers\Api\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\PostUpdateRequest;
use App\Models\Posts\Post;
use App\Repositories\Posts\PostRepository;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Symfony\Component\HttpFoundation\JsonResponse;

class PostController extends Controller implements HasMiddleware
{

    public function __construct(protected PostRepository $postRepository)
    {
    }

    public static function middleware(): array
    {
        return [
            new Middleware('auth:sanctum', except: ['index', 'show', 'fake']),
        ];
    }

    public function fake()
    {
        Post::factory()->count(10)->create();
        return response()
            ->json($this->postRepository->getAllPosts());
    }

    public function index() : JsonResponse
    {
        return response()
            ->json($this->postRepository->getActivePosts());
    }

    public function show(int $id) : JsonResponse
    {
        return response()
            ->json($this->postRepository->getPostById($id));
    }

    public function update(PostUpdateRequest $postUpdateRequest, int $id)
    {
        return response()
            ->json($this->postRepository->updateById($id, $postUpdateRequest->getAllUpdateData()));
    }

    public function store(Request $request)
    {
    }

    public function destroy(string $id)
    {
    }
}
