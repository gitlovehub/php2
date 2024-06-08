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
                    'screen-400': '400px', // Define max-width for screen size 400px
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
    <title>FPT Funi − Home</title>
</head>

<body class="text-body">
    @include('layouts.partials.header')

    @yield('content')

    @include('layouts.partials.footer')
</body>

</html>