@extends('layouts.layout')

@section('content')
<x-covid />
<x-header menu="false" />

<div class="request">
  <div class="container">
    <form method="post">
      <div class="row justify-content-md-center">
        <div class="col-12 col-md-7">
          <x-stepper total="3" />
          <?php 
          switch (app('request')->step) {
            case 2 : ?><x-request-step-2 /><?php break;
            case 3 : ?><x-request-step-3 /><?php break;
            case 4 : ?><x-request-step-4 /><?php break;
            default : ?><x-request-step-1 /><?php break;
          }
          ?>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection