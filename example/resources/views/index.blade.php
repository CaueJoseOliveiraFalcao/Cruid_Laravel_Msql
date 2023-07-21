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
        <h1>Criar Usuario</h1>
        <form action="/createuser" method="POST">
            @csrf
            <label for="name">Nome : </label>
            <input type="text" name='name'>
            <label for="email">Email :</label>
            <input type="text" name="email">
            <label for="password">Password :</label>
            <input type="text" name="password"> 
            <input type="submit" value="Enviar">
        </form>
        <h1>Usuarios</h1>
        @if (isset($allusers))
            @foreach ($allusers as $user)
            <form method="POST" action="/delete/{{$user->email}}">
                @csrf
                @method('DELETE')
               <h1>User Name = {{$user->name}} <button href="#">Deletar Usuario</button></h1>
            </form>
               @endforeach
        @else
            <h1>Don't have any user</h1>
        @endif
    </body>
</html>
