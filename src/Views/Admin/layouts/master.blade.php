<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>
        @yield('title')
    </title>
</head>
<body>
    @include('layouts.partials.header')

    <section class="container max-w-screen-xl m-auto pt-[80px]">
        <h1 class="text-2xl uppercase font-semibold text-center pt-4">@yield('title')</h1>

        <div class="grid place-items-center">
            @yield('badges')
        </div>

        <main style="min-height: 100vh">
            @yield('content')
        </main>
    </section>

    @include('layouts.partials.footer')
</body>
</html>