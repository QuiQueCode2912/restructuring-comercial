@extends('layouts.layout')

@section('content')
<x-covid />
<x-header menu="true" />

<div class="container" style="background:#ffffff; min-height:600px">
  <br /><br />
  <div class="row">
    <div class="col-12 text-center">
      <a href="/landing" class="btn btn-primary">Home</a><br /><br />
      <a href="/venues" class="btn btn-primary">Listado de venues</a><br /><br />
      <a href="/venue" class="btn btn-primary">Detalle de venue</a><br /><br />
      <a href="/solicitud/1" class="btn btn-primary">Formulario de solicitud</a>
    </div>
  </div>
</div>

<x-footer />
@endsection