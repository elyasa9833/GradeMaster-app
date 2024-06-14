<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>{{ $title }} | GradeMaster</title>
</head>
<body>
    @include('partials.navbar')
    <div class="m-8">
        @yield('container')
    </div>

</body>
</html>