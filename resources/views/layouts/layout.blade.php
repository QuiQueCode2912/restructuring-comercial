<?php $token = 202302161034 ?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $page_title ?? 'Servicios' }}</title>

    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="icon" href="https://ciudaddelsaber.org/wp-content/uploads/2020/01/cropped-faviconpng-32x32.png" sizes="32x32">
    <link rel="icon" href="https://ciudaddelsaber.org/wp-content/uploads/2020/01/cropped-faviconpng-192x192.png" sizes="192x192">
    <link rel="apple-touch-icon" href="https://ciudaddelsaber.org/wp-content/uploads/2020/01/cropped-faviconpng-180x180.png">
    <meta name="msapplication-TileImage" content="https://ciudaddelsaber.org/wp-content/uploads/2020/01/cropped-faviconpng-270x270.png">
    
    <link rel="stylesheet" href="/assets/feather/feather.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.css" integrity="sha512-Woz+DqWYJ51bpVk5Fv0yES/edIMXjj3Ynda+KWTIkGoynAMHrqTcDUQltbipuiaD5ymEo9520lyoVOo9jCQOCA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="/css/app.css?t=<?php echo $token ?>" />
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="/css/responsive.css?t=<?php echo $token ?>" />
    <!-- Hotjar Tracking Code for https://comercial.ciudaddelsaber.org -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:3451475,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>
  </head>
  <body class="antialiased">
    <div class="main-container">
      @yield('content')
    
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
      <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js" integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ==" crossorigin="anonymous"></script>
      <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
      <script type="text/javascript" src="/js/core.js?t=<?php echo $token ?>"></script>
    </div>
  </body>
</html>
