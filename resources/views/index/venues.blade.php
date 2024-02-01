@extends('layouts.layout')

@section('content')
<!-- COVID <x-covid /> -->
<x-header menu="true" />
<x-venues-menu venue="{{ $venue }}" />
<x-searcher class="aside" />

<div class="venues-list">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-1"></div>
      <div class="col-12 col-md-8" style="padding-right:40px">
        <h3 class="venues-availability">Resultados de búsqueda</h3>
        <div class="row">
          <div class="col-12 col-md-7">
            <div class="lined-box">
              <strong>Tipo de actividad: </strong><?php echo $type ?? '' ?>
            </div>
          </div>
          <div class="col-12 col-md-5">
            <div class="lined-box">
              <strong>Cantidad de personas:</strong> <?php echo $quantity ?? '' ?>
            </div>
          </div>
        </div>
        <br>
        <small>
          <span style="color:#0088ff">/*</span>
          Los precios no incluyen catering ni impuestos locales
        </small>
        <?php if ($venues) : ?>
        <?php foreach ($venues as $venue) : ?>
          <?php
          $venue_img = $venue->files()->count() > 0 ? substr($venue->files()->first()->path, 0, strpos($venue->files()->first()->path, '.')) . '_480.' . substr($venue->files()->first()->path, strpos($venue->files()->first()->path, '.') + 1) : null;
          $venue_image = $venue_img ? image_url('storage/venues/' . $venue_img) : '/assets/images/placeholder-image_480.jpg';
          ?>
          <x-venue-list
            image="{{ $venue_image }}"
            id="{{ $venue->id }}"
            name="{{ $venue->name }}"
            parentid="{{ $venue->parent_id }}"
            parent="{{ $venue->parent()->first()->name }}"
            designs="{{ $venue->designs }}"
            type="{{ $venue->type }}"
            hourfee="{{ $venue->hour_fee }}"
            middayfee="{{ $venue->mid_day_fee }}"
            alldayfee="{{ $venue->all_day_fee }}"
            seasonalhourfee="{{ $venue->seasonal_hour_fee }}"
            seasonalmiddayfee="{{ $venue->seasonal_mid_day_fee }}"
            seasonalalldayfee="{{ $venue->seasonal_all_day_fee }}"
             />
        <?php endforeach ?>
        <?php else : ?>
          <br><br><br>
          <h3>Tu búsqueda no arrojó<br>ningún resultado</h3>
          <br>
          <p>Por favor inténtalo nuévamente.</p>
          <div style="min-height:400px"></div>
        <?php endif ?>
      </div>
    </div>
  </div>
</div>

<!-- <x-contact /> -->
<x-footer />
<x-security-policies />
@endsection
