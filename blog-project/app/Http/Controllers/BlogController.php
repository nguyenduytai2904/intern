<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a static list of blog posts.
     */
    public function index()
    {
        $blogs = [
            [
                'title' => 'Getting Started with Laravel',
                'author' => 'Jane Doe',
                'excerpt' => 'A quick primer on routing, controllers, and Blade.',
                'published_at' => '2024-10-01',
            ],
            [
                'title' => 'Building a Static Blog Listing',
                'author' => 'John Smith',
                'excerpt' => 'How to return hard-coded data from a controller.',
                'published_at' => '2024-09-24',
            ],
            [
                'title' => 'Deploying PHP Apps on Linux',
                'author' => 'Alex Lee',
                'excerpt' => 'Checklist for shipping your Laravel app to production.',
                'published_at' => '2024-08-15',
            ],
        ];

        return view('blogs.index', ['blogs' => $blogs]);
    }
}
