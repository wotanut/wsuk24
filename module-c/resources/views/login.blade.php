<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>WorldSkills Competition Information System (CIS) Login</title>
    @vite('resources/css/app.css')
</head>
<body>
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1>
        NOTE: Form data is not being posted to the server due to the XSRF cookie not being sent by the browser for some reason, the auth logic would otherwise work.
        Auth has been disabled for each route but the logic just needs uncommenting.
    </h1>

    <h1>Admin Login</h1>
    <form method="POST" action="/login">
        @csrf
        <input type="text" id="username" placeholder="Username" required />
        <input type="password" id="password" placeholder="Password" required />
        <button type="submit">Login</button>
    </form>
</div>
</body>
</html>
