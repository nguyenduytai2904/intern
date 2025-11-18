<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Blog')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f7f7f8;
            color: #1f2933;
            margin: 0;
            padding: 2rem;
        }
        .container {
            max-width: 720px;
            margin: 0 auto;
        }
        h1 {
            margin-bottom: 1rem;
            font-size: 2rem;
        }
        .blog-card {
            background: #fff;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 10px 35px rgba(15, 23, 42, 0.08);
            margin-bottom: 1.25rem;
        }
        .blog-card h2 {
            margin: 0 0 .25rem;
            font-size: 1.5rem;
        }
        .blog-card small {
            color: #64748b;
        }
        .blog-card p {
            margin-top: 0.75rem;
            line-height: 1.6;
        }
    </style>
    @stack('head')
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
    @stack('scripts')
</body>
</html>

