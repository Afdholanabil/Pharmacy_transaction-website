<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @auth
    <p>Selamat Anda Sudah Masuk !</p>
    <form action="/logout" method="POST">
        @csrf
    <button>Keluar</button>
    </form>
    @else
    <div>
        <h2>Register</h2>
        <form action="{{ url('/register') }}" method="post">
            @csrf
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Register</button>
        </form>
    </div>
    <div>
            <h2>Login</h2>
            <form action="{{ url('/login') }}" method="post">
                @csrf
                <label for="email">Email</label>
                <input type="email" id="email" name="emailLogin" required>
                <label for="password">Password</label>
                <input type="password" id="password" name="passwordLogin" required>
            <button type="submit">Login</button>
        </form>
    </div>
    @endauth
    
</body>
</html>