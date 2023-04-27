@extends('layouts.layout')

@section('content')
<!-- COVID <x-covid /> -->
<x-header menu="false" />

<div class="request">
  <div class="container">
    <form method="post" action="<?php echo $form_url ?>" <?php if ($file_upload ?? false) : ?>enctype="multipart/form-data"<?php endif ?>>
      @csrf
      <div class="row justify-content-md-center">
        <div class="col-12 col-md-7">
          <x-stepper total="3" />
          <?php 
          switch ($step) {
            case '2' : 
              $designs = json_encode($designs);
              ?><x-request-step-2 venue="{{ $venue ? $venue->name : '' }}" designs="{{ $designs }}" /><?php 
              break;
              case '2-p' : 
              $designs = json_encode($designs);
              ?><x-request-step-2-p venue="{{ $venue ? $venue->name : '' }}" designs="{{ $designs }}" grupos="{{ $grupos }}" parentid="{{ $venue->parent_id }}"/><?php 
              break;
            case '3' : 
              $designs = json_encode($designs);
              ?><x-request-step-3 rootid="{{ $rootid ? $rootid : '' }}"  estimacion="{{ $estimacion ? $estimacion : '' }}" venue="{{ $venue ? $venue->name : '' }}" designs="{{ $designs }}" parentid="{{ $parentid }}"/><?php 
              break;
            case '4' : ?><x-request-step-4 /><?php break;
            case '4-p' : ?><x-request-step-4-p /><?php break;
            case '5' : ?><x-request-step-2-lodging /><?php break;
            case '6' : ?><x-request-step-2-residency /><?php break;
            default : ?><x-request-step-1 /><?php break;
          }
          ?>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
