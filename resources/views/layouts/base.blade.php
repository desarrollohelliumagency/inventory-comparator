<!doctype html>
<html lang="en" class="text-gray-900 leading-tight">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Document</title>
</head>
<body class="min-h-screen bg-gray-100">
<nav class="">
    <ul class="flex">
        <li class="mr-1 border-2 border-solid p-4 hover:bg-gray-400">
            <a href="" class="text-blue-500 hover:text-blue-800">Form import</a>
        </li>
        <li class="mr-1 border-2 border-solid p-4 hover:bg-gray-400">
            <a href="" class="text-blue-500 hover:text-blue-800">Show results</a>
        </li>
    </ul>
</nav>
@yield('content')
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
