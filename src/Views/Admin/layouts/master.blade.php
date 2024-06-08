<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
          theme: {
            extend: {
                lineHeight: {
                    '48': '48px',
                },
            }
          }
        }
    </script>
    <title>
        @yield('title')
    </title>
</head>
<body>
    @include('layouts.partials.aside')

    <section class="container max-w-screen-xl m-auto pt-10 ps-40">
        <h1 class="text-2xl uppercase font-bold text-center">@yield('title')</h1>

        <div class="grid place-items-center">
            @yield('badges')
        </div>

        <main style="min-height: 100vh">
            @yield('content')
        </main>
    </section>

    @include('layouts.partials.footer')

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>