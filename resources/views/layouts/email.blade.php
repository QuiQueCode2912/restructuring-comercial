<?php $token = time() ?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $page_title ?? 'Servicios' }}</title>
    <link rel="stylesheet" href="/css/email.css?t=<?php echo $token ?>" />
  </head>
  <body class="antialiased">
    <div class="email-content">
      @yield('content')
    </div>
  </body>
</html>