<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
          theme: {
            extend: {
                height: {
                    '600': '600px',
                },
                maxWidth: {
                    'screen-400': '400px',
                },
                maxHeight: {
                    '400': '400px',
                    '500': '500px',
                },
                fontSize: {
                    'body': '1rem',
                },
                letterSpacing: {
                    widest: '.25em',
                },
            }
          }
        }
    </script>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
    </style>
    <title>@yield('titlebar')</title>
</head>

<body class="text-body">

    @include('layouts.partials.header')

    <main class="min-h-screen">
        @yield('content')
    </main>

    @include('layouts.partials.footer')

    <script>
        function redirectToProductDetail(productId) {
            window.location.href = '{{ url('product-detail') }}/' + productId;
        }
    </script>
</body>

</html>