<!DOCTYPE html>
<html>

<head>
  <title>Laravel 10 Task List App</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  @yield('styles')
</head>

<body class="container mx-auto mt-10 mb-10 max-w-lg">
  <h1 class= "text-2xl mb-4">@yield('title')</h1>
  <div>
    @yield('content')
  </div>
</body>

</html>
