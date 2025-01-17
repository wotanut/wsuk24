<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register New Admin</title>
    @vite('resources/css/app.css')
</head>
<body>
<div class="container">
    <header>
        <h1>Register New Admin</h1>
        <a href="{{url('/dashboard')}}" class="button">Back to Dashboard</a>
    </header>
    <main>
        <form id="register-form">
            <input
                type="text"
                id="new-username"
                placeholder="New Username"
                required
            />
            <input
                type="password"
                id="new-password"
                placeholder="New Password"
                required
            />
            <label for="permission">Permissions</label>
            <select id="permission" required>
                <option value="">Select Permission</option>

                @foreach($permissionsAvail as $permission)
                    <option value="{{$permission->name}}">{{$permission->name}}</option>
                @endforeach
            </select>
            <button type="submit">Register Admin</button>
        </form>
    </main>
</div>
</body>
</html>
