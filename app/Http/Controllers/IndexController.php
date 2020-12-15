<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
  public function index(Request $request)
  {
    return view('index.index', [
      'page_title' => 'Servicios'
    ]);
  }

  public function ateneo(Request $request)
  {
    return view('venues.ateneo', [
      'page_title' => 'Servicios - Ateneo',
      'venue' => 'ateneo',
      'venueName' => 'Ateneo',
    ]);
  }

  public function centroConvenciones(Request $request)
  {
    return view('venues.centro-convenciones', [
      'page_title' => 'Servicios - Centro de Convenciones',
      'venue' => 'centro-convenciones',
      'venueName' => 'Centro de convenciones',
    ]);
  }

  public function aulas105(Request $request)
  {
    return view('venues.aulas-105', [
      'page_title' => 'Servicios - Aulas 105',
      'venue' => 'aulas-105',
      'venueName' => 'Aulas 105',
    ]);
  }

  public function aulas220(Request $request)
  {
    return view('venues.aulas-220', [
      'page_title' => 'Servicios - Aulas 220',
      'venue' => 'aulas-220',
      'venueName' => 'Aulas 220',
    ]);
  }

  public function complejoHospedaje(Request $request)
  {
    return view('venues.complejo-hospedaje', [
      'page_title' => 'Servicios - Complejo de Hospedaje',
      'venue' => 'complejo-hospedaje',
      'venueName' => 'Complejo de hospedaje',
    ]);
  }

  public function residencias(Request $request)
  {
    return view('venues.residencias', [
      'page_title' => 'Servicios - Residencias',
      'venue' => 'residencias',
      'venueName' => 'Residencias',
    ]);
  }

  public function oferta(Request $request)
  {
    return view('index.venues', [
      'page_title' => 'Servicios - Oferta',
      'venue' => 'inicio',
      'venueName' => 'Oferta',
    ]);
  }

  public function venue(Request $request)
  {
    return view('index.venue', [
      'page_title' => 'Servicios - Venue',
      'venue' => 'inicio',
    ]);
  }

  public function request(Request $request)
  {
    $step = $request->step;
    $stepName = 'Solicitud de cotización';

    switch ($step) {
      case 'datos-contacto': 
        $step = 1;
        $stepName = 'Datos de contacto'; 
        break;
      case 'datos-evento': 
        $step = 2;
        $stepName = 'Datos de tu evento'; 
        break;
      case 'vista-previa': 
        $step = 3;
        $stepName = 'Vista previa'; 
        break;
      case 'solicitud-enviada': 
        $step = 4;
        $stepName = 'Solicitud enviada'; 
        break;
      case 'datos-hospedaje': 
        $step = 5;
        $stepName = 'Datos de tu hospedaje'; 
        break;
      case 'datos-residencia': 
        $step = 6;
        $stepName = 'Datos de tu residencia'; 
        break;
    }

    return view('index.request', [
      'page_title' => 'Servicios - Cotización - ' . $stepName,
      'step' => $step,
    ]);
  }
}
