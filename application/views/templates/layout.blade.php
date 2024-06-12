<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Rumah Sakit</title>
</head>

<link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.2/dist/full.min.css" rel="stylesheet" type="text/css" />

<body data-theme="light">
    <div class="container min-h-screen mx-auto">
        @include('templates.header')
        @yield('content')
    </div>

    <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>
