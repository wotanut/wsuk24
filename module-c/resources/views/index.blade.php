<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>WorldSkills Competition Information System (CIS)</title>
    @vite('resources/css/app.css')
</head>
<body>
<div class="container">
    <header>
        <h1>WorldSkills Competition Information System (CIS)</h1>
        <button id="logout-btn">
            <a href="{{url('/logout')}}">Logout</a>
        </button>
    </header>
    <nav>
        <a href="{{url('/login')}}" class="button">Log In</a>
    </nav>

    <main>
        <p>
            Need access? Please contact your system administrator to request an
            account.
        </p>
    </main>
</div>
</body>
</html>
