<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

  <!-- Scripts -->
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  <link rel="stylesheet" href="/bower_components/light-bootstrap-dashboard/assets/css/light-bootstrap-dashboard.css">
  <script src="{{ mix('js/app.js') }}" defer></script>
  <script src="{{ mix('js/outputFile.js') }}" defer></script>
</head>

<body class="dark font-sans antialiased">
  <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
    @include('layouts.navigation')

    <!-- Page Heading -->
    @if (isset($header))
      <header class="bg-white shadow dark:bg-gray-800">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
          {{ $header }}
        </div>
      </header>
    @endif

    <!-- Page Content -->
    <main>
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 mt-4 -mb-8">
          @if (Session::has('fail'))
            <div class="bg-red-500 text-white p-4 rounded-lg shadow-md mb-4 dark:bg-red-800 mx-auto">
              {{Session::get('fail') }}
            </div>
          @endif
          @if (Session::has('success'))
            <div class="bg-green-500 text-white p-4 rounded-lg shadow-md mb-4 dark:bg-green-800 mx-auto">
              {{Session::get('success') }}
            </div>
          @endif
      </div>
      {{ $slot }}
    </main>
  </div>
</body>

</html>
