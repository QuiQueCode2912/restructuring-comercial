<?php 

if (! function_exists('image_url')) {
  function image_url($path) {
    $env = config('app.env');

    if ($env == 'staging') {
      $url = 'https://comercial.ciudaddelsaber.org/';
    } else {
      $url = url('/');
    }

    if (substr($url, -1) != '/') $url .= '/';

    $url .= $path;
    return $url;
  }
}