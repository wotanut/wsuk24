<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>WorldSkills Competition Information System (CIS) Dashboard</title>
    @vite('resources/css/app.css')
</head>
<body>
<div class="container">
    <header>
        <h1>WorldSkills Competition Information System (CIS) Dashboard</h1>
        <a href="{{url('logout')}}">
            <button id="logout-btn">Logout
            </button>
        </a>
    </header>
    <nav>
        <a href="{{url('register')}}" class="button">Register New Admin</a>
        <a href="{{url('/results')}}" class="button">Manage Competition Results</a>
    </nav>
    <main>
        <h2>
            Welcome to the WorldSkills Competition Information System (CIS)
            Dashboard
        </h2>
        <p>
            Use the navigation buttons above to manage admins and competition
            results.
        </p>
    </main>
</div>
</body>
</html>
