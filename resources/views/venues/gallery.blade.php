<?php $token = 202102171045 ?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $page_title ?? 'Servicios' }}</title>

    <link rel="stylesheet" href="/assets/feather/feather.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <style>
    body {
      padding:10px
    }
    ul {
      margin: 15px 0 0;
      padding: 0;
      list-style: none;
    }
    ul li {
      margin: 0;
      padding: 5px;
      list-style: none;
      border-bottom: 1px solid #eeeeee;
    }
    ul li a {
      text-decoration: none;
    }
    ul li a i {
      display: inline-block;
      margin-left: 10px;
    }
    ul li.thumb {
      float: left;
      width: 50%;
      padding: 2px;
      position: relative   
    }
    ul li.thumb span {
      display: none;
    }
    ul li.thumb .fe-external-link {
      display: none;
    }
    ul li.thumb img {
      width: 100%;
    }
    ul li.thumb {
      border: none;
    }
    ul li .delete-image {
      float: right;
    }
    ul li.thumb .delete-image {
      position: absolute;
      top: 10px;
      right: 10px;
      color: #ffffff;
      background: #a00;
      border-radius: 50%;
      width: 24px;
      height: 24px;
    }
    ul li.thumb .delete-image i {
      margin: 4px;
    }
    </style>
  </head>
  <body class="antialiased">
    <form method="post" enctype="multipart/form-data" id="form-file">
      @csrf
      <div class="input-group">
        <input type="file" class="form-control" id="file" name="file">
      </div>
    </form>
    <?php if ($images->count() > 0) : ?>
    <ul>
    <?php foreach ($images as $image) : ?>
      <li class="thumb">
        <a href="<?php echo url('storage/venues/' . $image->path) ?>" target="_blank">
          <span><?php echo $image->name ?></span>
          <i class="fe fe-external-link"></i>
          <img src="<?php echo url('storage/venues/' . $image->path) ?>">
        </a>
        <a href="/galeria/<?php echo $venue->id ?>/eliminar/<?php echo $image->token ?>" class="delete-image">
          <i class="fe fe-x"></i>
        </a>
      </li>
    <?php endforeach ?>
    </ul>
    <?php else : ?>
    <div class="alert alert-warning mt-2 text-center" role="alert">
      No hay imágenes asociadas a este venue
    </div>
    <?php endif ?>
    <script>
      document.getElementById('file').addEventListener('change', function(e) {
        document.getElementById('form-file').submit();
      });

      document.querySelector('.delete-image').addEventListener('click', function(e) {
        if (!confirm('Estás a punto de eliminar esta imagen. Deseas continuar?')) {
          e.preventDefault();
        }
      });
    </script>
  </body>
</html>