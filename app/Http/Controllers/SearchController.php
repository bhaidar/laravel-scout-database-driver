<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $posts = Post::search(trim($request->get('search')) ?? '')
            ->query(function ($query) {
                $query->join('categories', 'posts.category_id', 'categories.id')
                    ->select(['posts.id', 'posts.title', 'posts.body', 'categories.name as category'])
                    ->orderBy('posts.id', 'DESC');
            })
            ->get();

        return response()->json(data: $posts, status: 200);
    }
}
