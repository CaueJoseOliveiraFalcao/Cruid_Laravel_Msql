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
               <h1>User Name = {{$user->name}} <a href="#" onclick="event.preventDefault(); deleteUser('{{$user->email}}')">Deletar Usuario</a></h1>
            @endforeach
        @else
            <h1>Don't have any user</h1>
        @endif
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script>
            const deleteUser = (email) =>{
                if (confirm('Tem certeza que deseja excluir o usuario')) {
                    axios.delete('/delete/' + email, {
                        headers : {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => {
                        alert("Usuario Excluido com Sucesso")
                    })
                    .catch(err => {
                        console.log(err);
                        alert("Ocorreu um erro ao tentar deletar o usuario")
                    })
                }
                }
            
        </script>
        
    </body>
</html>
