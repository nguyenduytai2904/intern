@extends('layouts.app')

@section('title', 'Static Blog List')

@section('content')
    <h1>Static Blog List</h1>
    @forelse ($blogs as $blog)
        <article class="blog-card">
            <h2>{{ $blog['title'] }}</h2>
            <small>By {{ $blog['author'] }} · {{ \Carbon\Carbon::parse($blog['published_at'])->toFormattedDateString() }}</small>
            <p>{{ $blog['excerpt'] }}</p>
        </article>
    @empty
        <p>No blog posts yet.</p>
    @endforelse
@endsection
