<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    </head>
    <body class="antialiased">
        @if (@isset($allusers))
            @foreach ($allusers as $user)
               <h1>User Name = {{$user->name}}   {{$user->id}}</h1>
            @endforeach
        @else
            <h1>Don't have any user</h1>
        @endif
        
        
    </body>
</html>
