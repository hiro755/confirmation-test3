<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>@yield('title', 'PiGLy')</title>

  {{-- CSS --}}
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/pigly.css') }}">

  {{-- JS --}}
  <script src="{{ asset('js/app.js') }}" defer></script>

  @stack('head') {{-- 必要なら追加の head スタック --}}
</head>
<body>
  @yield('content')

  @stack('scripts') {{-- 追加JSがある場合 --}}
</body>
</html>