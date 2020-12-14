@if ($menu == "true")
<div class="header">
  <div class="container">
    <a href="#" class="menu-toggle"><i class="fe fe-menu"></i></a>
    <ul class="menu">
      <li><a href="#">Nosotros</a></li>
      <li><a href="#">Visítanos</a></li>
      <li class="has-childs">
        <a href="/">Servicios</a>
        <ul>
          <li><a href="/ateneo">Ateneo</a></li>
          <li><a href="/centro-convenciones">Centro de convenciones</a></li>
          <li><a href="/aulas-105">Aulas 105</a></li>
          <li><a href="/aulas-220">Aulas 220</a></li>
          <li><a href="/complejo-hospedaje">Complejo de hospedaje</a></li>
          <li><a href="/residencias">Residencias</a></li>
        </ul>
      </li>
      <li><a href="#">Eventos</a></li>
      <li><a href="#">Prensa</a></li>
      <li><a href="#">Oportunidades</a></li>
      <li><a href="#">Temas</a></li>
      <li><a href="#"><i class="fe fe-search"></i></a></li>
      <li><a href="#">Inglés</a></li>
      <li><a href="#">Español</a></li>
      <li><a href="#"><i class="fe fe-lock"></i> Login</a></li>
      <li><a href="#">Ser miembro</a></li>
    </ul>
    <a href="https://ciudaddelsaber.org" class="logo">
      <img src="/assets/images/logo-white.png" />
    </a>
  </div>
</div>
@else
<div class="header small">
  <div class="container">
    <a href="/" class="menu-toggle"><i class="fe fe-arrow-left"></i></a>
    <ul class="menu">
      <li><a href="/"><i class="fe fe-arrow reflect"></i> Volver al inicio</a></li>
    </ul>
    <a href="https://ciudaddelsaber.org" class="logo">
      <img src="/assets/images/logo-white.png" />
    </a>
  </div>
</div>
@endif