<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <title>
        @yield('title')
    </title>
</head>
<body>
    <div class="container">
        <nav class="mt-4">
            <a href="{{url('admin')}}">DASHBOARD</a>
            <a href="{{url('admin/users')}}">QUẢN LÝ NGƯỜI DÙNG</a>
        </nav>

        <h1 class="my-4 text-center">@yield('title')</h1>

        <div class="row">
            @yield('content')
        </div>
    </div>
</body>
</html>