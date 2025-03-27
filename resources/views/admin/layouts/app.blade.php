<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Plugin css -->
    <link rel="stylesheet" href="{{ asset('AdminLinks/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLinks/assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('AdminLinks/assets/css/style.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Admin Panel</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.categories') }}">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.products') }}">Products</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Plugin js -->
    <script src="{{ asset('AdminLinks/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- Main js -->
    <script src="{{ asset('AdminLinks/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('AdminLinks/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('AdminLinks/assets/js/misc.js') }}"></script>
    <script src="{{ asset('AdminLinks/assets/js/settings.js') }}"></script>
    <script src="{{ asset('AdminLinks/assets/js/todolist.js') }}"></script>
</body>
</html>