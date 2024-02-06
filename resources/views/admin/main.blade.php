<!-- layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel Example')</title>
</head>
<body>
    <header>
       <h1>ADMIN PANEL</h1>
    </header>

    <nav>
        <ul>  
            <li><a href="/list_users">SHOW USERS</a></li>
            <li><a href="/add_user">ADD USER</a></li>
        </ul>
    </nav>

    <section>
        @yield('content')
    </section>

    <footer>
        <p>&copy; {{ date('Y') }} Laravel Example</p>
    </footer>
</body>
</html>
