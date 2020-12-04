@extends('layouts.layout')

@section('content')
<x-covid />
<x-header menu="true" />
<x-venues-menu />
<x-searcher class="aside" />

<div class="venues-list">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-1"></div>
      <div class="col-12 col-md-8" style="padding-right:40px">
        <h3 class="btn btn-primary" style="display:block">Disponibilidad para: Formación académica</h3>
        <div class="row">
          <div class="col-12 col-md-7">
            <div class="lined-box">
              <strong>Check-in: </strong>10/12/2020
              <strong>Check-out: </strong>10/12/2020
            </div>
          </div>
          <div class="col-12 col-md-5">
            <div class="lined-box">
              <strong>Personas agregadas:</strong> 25
            </div>
          </div>
        </div>
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

<x-contact />
<x-footer />
@endsection