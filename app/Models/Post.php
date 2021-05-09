<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Post
{

    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    static public function all()
    {
        return cache()->remember('posts.all', now()->addSeconds(5), function () {
            return collect(File::files(resource_path("posts/")))
                ->map(fn ($file) => YamlFrontMatter::parseFile($file))
                ->map(fn ($document) => new Post(
                    $document->title,
                    $document->excerpt,
                    $document->date,
                    $document->body(),
                    $document->slug
                ))
                ->sortByDesc('date');
        });
    }

    static public function find($slug)
    {
        // of all the blog posts, find the one with a slug that matches the one that was requested.
        return static::all()->firstWhere('slug', $slug);
    }
    static public function findOrFail($slug)
    {
        // of all the blog posts, find the one with a slug that matches the one that was requested.
        $post =  static::find($slug);
        if (!$post) {
            throw new ModelNotFoundException();
        }
        return $post;
    }
}
