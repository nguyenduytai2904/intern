<?php

// convert to string and split url by '/'
// urldecode for space 20%
$requestUri = urldecode(trim($_SERVER['REQUEST_URI'], '/'));


// basic route
$routes = [
    'hello' => function () {
        echo "Hello laravel";
    },
    'hello/{name}' => function ($name) {
        echo "Hello, " . htmlspecialchars($name);
    }
];

foreach ($routes as $pattern => $callback) {
    // Convert the route pattern to a regex
    $regexPattern = preg_replace_callback('/{(\w+)}/', function ($matches) {
        // get match any alphanumeric characters, underscores, or hyphens
        return '([\p{L}\p{N}\s_%\-]+)';
    }, $pattern);

    // Add start and end delimiters for precise matching
    $regexPattern = '@^' . $regexPattern . '$@';
    echo var_dump($regexPattern) . "<br>";

    // Check if the requested URI matches the regex pattern
    if (preg_match($regexPattern, $requestUri, $matches)) {
        // Remove the full match (index 0) to get only the captured parameters
        array_shift($matches);

        // Call the associated callback with the captured parameters
        call_user_func_array($callback, $matches);
        exit; // Stop processing after a match is found
    }
}


echo "404 not found";
