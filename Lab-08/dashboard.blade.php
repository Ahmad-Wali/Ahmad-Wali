
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Course Dashboard</title>

    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>

<body>

<header class="site-header">
    <div class="container header-content">

        <a href="{{ route('dashboard') }}" class="brand">
            Course Dashboard
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-light">
                Logout
            </button>
        </form>

    </div>
</header>

<main class="container">

    <section class="welcome-section">
        <h1>Dashboard</h1>
        <p>
        Debug: {{ $viewing ? 'VIEWING FOUND' : 'VIEWING IS EMPTY' }}
        </p>

        <p>
            Welcome, <strong>{{ auth()->user()->name }}</strong>!
            Register and manage your courses below.
        </p>
    </section>

    @if (session('success'))
        <div class="notice success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="dashboard-grid">

        @include('courses.form')

        @include('courses.table')

    </div>

    @if ($viewing)
        @include('courses.details')
    @endif

</main>

</body>
</html>
