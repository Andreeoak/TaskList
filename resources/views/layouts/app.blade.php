<!DOCTYPE html>
<html>

<head>
  <title>Laravel 10 Task List App</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    {{-- blade-formater-disable --}}
    <style type="text/tailwindcss">
        .btn {
            @apply mt-2 rounded-md px-2 py-1 text-center  text-slate-700 font-medium shadow-sm ring-1 ring-slate-700 hover:bg-slate-300
        }
        .link{
            @apply font-medium text-gray-700 underline decoration-pink-700
        }

    </style>
    {{-- blade-formater-enable --}}
  @yield('styles')
</head>

<body class="container mx-auto mt-10 mb-10 max-w-lg">
  <h1 class= "text-2xl mb-4">@yield('title')</h1>
  <div>
    @yield('content')
  </div>
</body>

</html>
