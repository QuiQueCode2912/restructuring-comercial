@extends('layouts.layout')

@section('content')
<x-covid />
<x-header menu="true" />

<div class="venue-characteristics">
  <span style="color:#0088ff">Características del venue</span>
  <ul>
    <li>Centro de conferencias y oficinas</li>
    <li>Capacidad 32 personas máximo</li>
    <li>7 aulas / salones para eventos</li>
    <li>96 habitaciones</li>
    <li>Facilidades</li>
    <li>Aire acondicionado</li>
    <li>Estacionamiento gratis</li>
    <li>Acceso a internet - Wifi</li>
    <li>Equipo audiovisual</li>
    <li>Transporte interno gratuito</li>
    <li>Servicio de catering</li>
  </ul>
  <br />
  <a href="#">Revisa la política COVID-19 para este venue</a>
</div>

<div id="home-carousel" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="/assets/images/oficinas-administrativas-de-la-fundacion-ciudad-del-saber-8470-6-1.jpg" class="d-block" alt="...">
    </div>
  </div>
</div>

<div class="container venue-detail">
  <div class="row">
    <div class="col-12">
      <h6>Aulas 220 - Coworking</h6>
      <h1>Innova y crea valor</h1>
      <p class="description">
        Las Aulas 220 (antiguamente sede del TEC de Monterrey) están 
        estratégicamente ubicadas en el área que recorre el Parque de los 
        Pagos. Su infraestructura resalta el patrimonio histórico del campus. 
        Diseñadas para realizar actividades de formación académica, cuentan con 
        salones remodelados para eventos y talleres.
      </p>
      <p><span style="color:#0088ff">/ Fácil y rápido acceso /</span> 
        Ciudad del Saber tiene en su periferia la  terminal de transbordo que 
        te conecta con el campus por la red de Metro Bus. Gracias a su localización 
        frente al Canal es posible, en pocos minutos, estar en el centro de Panamá 
        y disfrutar su casco antiguo.
      </p>
    </div>
  </div>

  <div class="row">
    <div class="col-12">
      <div class="venues-list" style="box-shadow:none">
        <div class="container">
          <div class="row">
            <div class="col-12 col-md-9" style="padding-right:40px; padding-left:0">
              <h3 style="color:#0088ff; margin:30px 0 5px">Venue: Aulas 105</h3>
              <small>
                <span style="color:#0088ff">/*</span>
                Los precios no incluyen catering ni impuestos locales
              </small>
              <x-venue-list image="/assets/images/220-101.jpg" name="Ateneo" />
              <x-venue-list image="/assets/images/220-102.jpg" name="Centro de convenciones" />
              <x-venue-list image="/assets/images/220-103.jpg" name="Aulas 105" />
              <x-venue-list image="/assets/images/220-101.jpg" name="Ateneo" />
              <x-venue-list image="/assets/images/220-102.jpg" name="Centro de convenciones" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

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

  <br /><br /><br />

  <div class="row">
    <div class="col-12 col-md-9">
      <h3 style="color:#0088ff; margin-bottom:30px">Ubicación</h3>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9234.855855146361!2d-79.58760814660978!3d9.001102129208933!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8faca7b0a46a3bd1%3A0x93b801d16c74cc5c!2sCd%20del%20Saber%2C%20Panam%C3%A1!5e0!3m2!1ses!2sco!4v1590440019299!5m2!1ses!2sco" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
  </div>

  <br /><br />  

  <div class="row">
    <div class="col-12 col-md-9">
      <h4 style="margin-bottom:20px">Sitios de interés próximos a Ciudad del Saber</h4>
      <ul class="near-by">
        <li>Centro de Visitantes del Canal de Panamá (Miraflores)	 Aeropuerto Marcos Gelabert (vuelos internos)</li>
        <li>Albrook Mall y Terminal de Transporte de Albrook</li> 
        <li>Casco Antiguo</li>
        <li>Área Bancaria</li>
        <li>Museo de la Biodiversidad (en Amador)</li>
      </ul>
    </div>
  </div>  

</div>

<x-contact />
<x-footer />
@endsection