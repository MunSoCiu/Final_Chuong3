<!DOCTYPE html>
<html>
<head>
    <title>Course Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="d-flex">

    {{-- SIDEBAR --}}
    <div class="bg-dark text-white p-3" style="width:250px; min-height:100vh;">
        <h4>📚 CMS</h4>
        <hr>

        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="/" class="nav-link text-white">🏠 Home</a>
            </li>
            <li class="nav-item">
                <a href="/dashboard" class="nav-link text-white">📊 Dashboard</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('courses.index') }}" class="nav-link text-white">📘 Courses</a>
            </li>
        </ul>
    </div>

    {{-- CONTENT --}}
    <div class="p-4 w-100">
        @include('components.alert')

        @yield('content')
    </div>

</div>

</body>
</html>