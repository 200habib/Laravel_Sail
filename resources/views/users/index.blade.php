<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Users</title>
</head>
<body>
    <h1>All Users</h1>

    <ul>
        @foreach ($users as $user)
            <li>{{ $user->name }} - {{ $user->email }}</li>
        @endforeach
    </ul>
    <form method="POST" action="/register">
    <input type="text" name="name" value="Mario">
    <button type="submit">Invia</button>
</form>

</body>
</html>
