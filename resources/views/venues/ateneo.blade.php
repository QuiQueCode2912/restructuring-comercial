@extends('layouts.layout')

@section('content')
<x-covid />
<x-header menu="true" />
<x-venues-menu venue="{{ $venue }}" />

<div class="venue-characteristics">
  <span style="color:#0088ff">Características del venue</span>
  <ul>
    <li class="title">Centro de conferencias y oficinas</li>
    <li>Capacidad 32 personas máximo</li>
    <li>7 aulas / salones para eventos</li>
    <li style="padding-bottom:20px; border-bottom:none">96 habitaciones</li>
    <li class="title">Facilidades</li>
    <li>Aire acondicionado</li>
    <li>Estacionamiento gratis</li>
    <li>Acceso a internet - Wifi</li>
    <li>Equipo audiovisual</li>
    <li>Transporte interno gratuito</li>
    <li>Servicio de catering</li>
  </ul>
  <br />
  <i class="fe fe-arrow-right" style="color:#0088ff"></i>
  <a href="https://ciudaddelsaber.hauzd.com" style="font-weight:700">Explora nuestros venues en 3D</a>
  <br /><br />
  <a href="#" style="color:#000000">Revisa la política COVID-19<br />para este venue</a>
  <br /><br />
  <p class="small" style="max-width:270px">
    <img src="/assets/images/halt-hand.png" width="30" style="margin-bottom:5px" />
    <br />
    Si tu evento requiere de múltiples espacios o excede las 24hs, puedes
    conectarte con nosotros desde el formulario al pie de la página.
  </p>
</div>

<div class="container" style="margin:0 auto; padding:0; position:relative">
  <a href="/assets/images/ateneo.png" data-lightbox="venue" title="<h1>Ateneo</h1>Los salones tienen capacidad para hasta 24 personas, en formato aula de clases; ideales para reuniones corporativas o académicas.<br><br><a href='#'>Revisa la política COVID para este venue</a>" class="gallery">FOTOGALERÍA <span>+</span></a>
  <a href="/assets/images/oficinas-administrativas-de-la-fundacion-ciudad-del-saber-8470-7-1.jpg" data-lightbox="venue" title="<h3>Aula / Salón 101</h3><br>Mínimo 1 persona, máximo 32 personas. Desde $300* por hora.<br><strong>$300*</strong> por medio día / <strong>$400*</strong> por día entero<br><br><a href='#' class='btn btn-primary'>Cotizar</a><br><br><a href='#'>Revisa la política COVID para este venue</a>"></a>
  <a href="/assets/images/oficinas-administrativas-de-la-fundacion-ciudad-del-saber-8470-8-1.jpg" data-lightbox="venue" title="Los salones tienen capacidad para hasta 24 personas, en formato aula de clases; ideales para reuniones corporativas o académicas.<br><br><a href='#'>Revisa la política COVID para este venue</a>"></a>
</div>
<div id="home-carousel" class="carousel slide venue-main-image" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="/assets/images/ateneo.png" class="d-block" alt="...">
    </div>
  </div>
</div>

<div class="container venue-detail">
  <div class="row">
    <div class="col-12">
      <h6>Ateneo</h6>
      <h1>Conecta con las audiencias</h1>
      <p class="description">
      El Ateneo está estratégicamente pensado como un auditorio para cine, 
      artes escénicas, conferencias y otras presentaciones. Está equipado 
      con tecnología audiovisual de vanguardia y cuenta con un amplio 
      espacio de 700 butacas.
      </p>
      <p><span style="color:#0088ff">/ Espacio cultural /</span> 
        Funciona en el antiguo edificio del cine de Clayton (construido en 1935 
        por la armada de los Estados Unidos). Es considerado un ejemplo de 
        arquitectura bellavistina y fue rehabilitado recientemente por la 
        Fundación Ciudad del Saber.<br><br>
        Se ha puesto en marcha una estrategia de actuación en materia cultural 
        que incluye una  variada oferta de actividades artísticas en el Campus, 
        como por ejemplo algunos proyectos dirigidos a resaltar los valores 
        históricos y patrimoniales del sitio.
      </p>
    </div>
  </div>

  <div class="row">
    <div class="col-12">
      <div class="venues-list" style="box-shadow:none">
        <div class="container">
          <div class="row">
            <div class="col-12 col-md-9" style="padding-right:40px; padding-left:0">
              <div class="row shortcuts">
                <div class="col-12 col-md-4">
                  <a href="#description">Ateneo</a>
                </div>
                <div class="col-12 col-md-4">
                  <a href="#menu">Paquetes</a>
                </div>
                <div class="col-12 col-md-4">
                  <a href="#venue-location">Ubicación</a>
                </div>
              </div>
              <a name="description"></a>
              
              <h3 style="color:#0088ff; margin:30px 0 5px">Venue: Aulas 105</h3>
              <small>
                <span style="color:#0088ff">/*</span>
                Los precios no incluyen catering ni impuestos locales
              </small>
              <x-venue-list image="/assets/images/ateneo.png" name="Ateneo" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <a name="menu"></a><br />
  <div class="row">
    <div class="col-12 col-md-9">
      <h3 style="color:#0088ff; margin-bottom:20px">Catering: Menús opcionales</h3>
      <div id="accordion">
        <x-accordion-card index="1" name="Desayunos" />
        <x-accordion-card index="2" name="Coffee break AM" />
        <x-accordion-card index="3" name="Almuerzo" />
        <x-accordion-card index="4" name="Cena" />
      </div>
    </div>
  </div>

  <br /><br /><br />

  <div class="row">
    <div class="col-12 col-md-9">
      <h3 style="color:#0088ff; margin-bottom:30px">Experiencias compartidas</h3>
      <div class="row">
        <div class="col-12 col-md-6">
          <x-testimonial />
        </div>
        <div class="col-12 col-md-6">
          <x-testimonial />
        </div>
      </div>
    </div>
  </div>

  <br /><br /><a name="venue-location"></a><br />
  <div class="row">
    <div class="col-12 col-md-9">
      <a href="https://ciudaddelsaber.hauzd.com" style="float:right; font-weight:700; text-decoration:underline">Explora nuestros venues en 3D</a>
      <h3 style="color:#0088ff; margin-bottom:10px">Ubicación</h3>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9234.855855146361!2d-79.58760814660978!3d9.001102129208933!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8faca7b0a46a3bd1%3A0x93b801d16c74cc5c!2sCd%20del%20Saber%2C%20Panam%C3%A1!5e0!3m2!1ses!2sco!4v1590440019299!5m2!1ses!2sco" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
  </div>

  <br /><br />  

  <div class="row">
    <div class="col-12 col-md-9">
      <h4 style="margin-bottom:20px; font-weight:600">Sitios de interés próximos a Ciudad del Saber</h4>
      <ul class="near-by">
        <li><strong>1 km</strong>Centro de Visitantes del Canal de Panamá (Miraflores)	 Aeropuerto Marcos Gelabert (vuelos internos)</li>
        <li><strong>3 km</strong>Albrook Mall y Terminal de Transporte de Albrook</li> 
        <li><strong>7 km</strong>Casco Antiguo</li>
        <li><strong>10 km</strong>Área Bancaria</li>
        <li><strong>13 km</strong>Museo de la Biodiversidad (en Amador)</li>
      </ul>
    </div>
  </div>  

</div>

<x-contact />
<x-footer />
@endsection