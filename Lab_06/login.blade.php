<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <!-- Display Validation Errors -->
    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <!-- Display Registration Success Message -->
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <h1>Login to your account</h1>
    <form method="POST" action="{{ route('login.store') }}">
        @csrf

        <div>
            <label for="email">Email Address</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" required>
        </div>

        <div>
            <label for="password">Password</label>
            <input id="password" name="password" type="password" required>
        </div>

        <button type="submit">Login</button>
    </form>

    <a href="{{ route('register') }}">Don't have an account? Register here</a>

</body>
</html>
