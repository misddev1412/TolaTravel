<?php

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function list($cat_slug = null)
    {
        $categories = Category::query()
            ->where('categories.type', Category::TYPE_POST)
            ->where('categories.status', Category::STATUS_ACTIVE)
            ->join('posts', 'posts.category', 'like', DB::raw("CONCAT('%', categories.id, '%')"))
            ->select('categories.id as id', 'categories.name as name', 'categories.slug as slug', DB::raw("count(posts.category) as post_count"))
            ->groupBy('categories.id')
            ->orderBy('categories.name')
            ->get();

        $posts = Post::query()
            ->with('categories')
            ->with('user')
            ->where('type', Post::TYPE_BLOG)
            ->where('status', Post::STATUS_ACTIVE);

        $category = null;
        if ($cat_slug) {
            $category = Category::query()->where('slug', $cat_slug)->first();
            $posts->where('category', 'like', "%{$category->id}%");
        }

        $posts = $posts->paginate(15);

        $post_total = Post::query()
            ->where('type', Post::TYPE_BLOG)
            ->where('status', Post::STATUS_ACTIVE)
            ->count();

        // SEO Meta
        if ($category) {
            $title = $category->seo_title ? $category->seo_title : $category->name;
            $description = $category->seo_description ? $category->seo_description : '';
        } else {
            $title = "Blog";
            $description = "";
        }
        SEOMeta($title, $description);

        return view('frontend.post.blog_list', [
            'categories' => $categories,
            'category' => $category,
            'posts' => $posts,
            'post_total' => $post_total,
            'cat_slug' => $cat_slug,
        ]);
    }

    public function detail($slug, $id)
    {
        $post = Post::query()
            ->with('categories')
            ->with('user')
            ->where('id', $id)
            ->first();

        if (!$post) abort(404);

        $related_posts = Post::query()
            ->with('categories')
            ->where('type', Post::TYPE_BLOG)
            ->limit(3)
            ->get();

        ($post->type === Post::TYPE_BLOG) ? $view_name = "frontend.post.blog_detail" : $view_name = "frontend.post.page_detail";

        // SEO Meta
        $title = $post->seo_title ? $post->seo_title : $post->title;
        $description = $post->seo_description ? $post->seo_description : '';
        SEOMeta($title, $description);

        return view($view_name, [
            'post' => $post,
            'related_posts' => $related_posts,
        ]);
    }
}