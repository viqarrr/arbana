<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Information;
use App\Models\Post;
use Illuminate\Http\Request;

class PublicPostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $contacts = Contact::all();
        $information = Information::first();

        return view('news', compact('posts', 'contacts', 'information'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $contacts = Contact::all();
        $information = Information::first();


        // Ambil 3 post lain selain yang sedang ditampilkan
        $otherPosts = Post::where('id', '!=', $post->id)
            ->latest()
            ->take(3)
            ->get();

        return view('detail-news', compact('post', 'contacts', 'otherPosts', 'information'));
    }
}
