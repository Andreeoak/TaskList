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
        label {
            @apply block mb-2 uppercase text-gray-700
        }

        input, textarea {
            @apply shadow-sm appearance-none border w-full px-3 py-2 text-slate-700 leading-tight focus:outline-none
        }

        .error{
            @apply text-red-500 text-sm mt-1
        }

    </style>
    {{-- blade-formater-enable --}}
</head>

<body class="container mx-auto mt-10 mb-10 max-w-lg">
  <h1 class= "text-2xl mb-4">@yield('title')</h1>
  <div>
    @if(session('success'))
        <div class="mb-10 rounded border-green-400 bg-green-100 px-4 py-3 text-lg text-green-700">
            <strong>Success!</strong>
            <div>
                {{session('success')}}
            </div>
        </div>
    @endif
    @yield('content')
  </div>
</body>

</html>
