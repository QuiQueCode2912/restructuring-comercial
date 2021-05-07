<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request,
  App\Models\Venue,
  App\Models\VenueFile,
  App\Models\VenueDesign,
  Str,
  Image,
  Illuminate\Support\Facades\Storage,
  Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
  public function index(Request $request)
  {
    $parents = [
      '02i3m0000092sG9AAI',
      '02i3m0000092sG3AAI',
      '02i3m0000092sJSAAY',
      '02i3m0000092sHZAAY'
    ];

    $venues = Venue::whereIn('id', $parents)->get();

    $fixedVenues = [];
    if ($venues) {
      foreach ($venues as $venue) {
        switch ($venue->id) {
          case '02i3m0000092sG9AAI' :
            $name = 'Ateneo';
            $url = '/ateneo';
            break;
          case '02i3m0000092sG3AAI' :
            $name = 'Centro de convenciones';
            $url = '/centro-convenciones';
            break;
          case '02i3m0000092sJSAAY' :
            $name = 'Aulas 105';
            $url = '/aulas-105';
            break;
          case '02i3m0000092sEkAAI' :
            $name = 'Aulas 220';
            $url = '/aulas-220';
            break;
          case '02i3m0000092sHZAAY' :
            $name = 'Complejo de hospedaje';
            $url = '/complejo-hospedaje';
            break;
        }

        $venue_image = VenueFile::where('venue_id', $venue->id)->first();
        $image = $venue_image ? url('storage/venues/' . $venue_image->path) : '/assets/images/placeholder-image.jpg';

        if ($venue->id == '02i3m0000092sG9AAI') {
          $subvenues = [$venue];
        } else {
          $subvenues = Venue::where('parent_id', '=', $venue->id)
            ->get();
        }

        $designs = [];
        if ($subvenues) {
          foreach ($subvenues as $subvenue) {
            $ds = $subvenue->designs()->get();
            if ($ds) {
              foreach ($ds as $d) {
                $designs[] = $d;
              }
            }
          }
        }
        
        $fixedVenues[] = [
          'name' => $name,
          'url' => $url,
          'image' => $image,
          'venues' => $subvenues,
          'designs' => $designs,
        ];
      }
    }

    $ids = [
      'ids[]=910',
      'ids[]=913',
      'ids[]=926',
      'ids[]=964',
      'ids[]=1014',
    ];

    $clients = [];
    $clients_response = [];
    
    try {
      $clients_response = file_get_contents('https://ciudaddelsaber.org/wp-json/fcds/v1/clients?' . urldecode(implode('&', $ids)));
    } catch(\Exception $e) {}

    if ($clients_response) {
      $clients_response = json_decode($clients_response);
      foreach ($clients_response as $cr) {
        $clients[] = [
          'name' => $cr->commercial_name,
          'logo' => $cr->logo,
          'url' => 'https://ciudaddelsaber.org/directorio/' . $cr->nice_name . '/',
        ];
      }
    }
    shuffle($clients);

    return view('index.index', [
      'page_title' => 'Servicios',
      'venues' => $fixedVenues,
      'clients' => json_encode($clients),
    ]);
  }

  public function ateneo(Request $request)
  { 
    $parent = Venue::find('02i3m0000092sG9AAI');
    $venues = [$parent];
    
    $max_pax = 0;
    if ($venues) {
      foreach ($venues as $venue) {
        $venue_max_pax = $venue->designs()->max('max_pax');
        $max_pax = $venue_max_pax > $max_pax ? $venue_max_pax : $max_pax;
      }
      $facilities = $venues ? $venues[0]->facilities : null;
    }

    $venue_images = VenueFile::where('venue_id', $parent->id)->get();
    $images = [];
    if ($venue_images->count() > 0) {
      foreach ($venue_images as $image) {
        $images[] = url('storage/venues/' . $image->path);
      }
    } else {
      $images[] = '/assets/images/placeholder-image.jpg';
    }

    return view('venues.venue', [
      'page_title' => 'Servicios - Ateneo',
      'venue' => 'ateneo',
      'venueName' => 'Ateneo',
      'subtitle' => 'Conecta con tus audiencias',
      'parent' => $parent,
      'venues' => $venues,
      'images' => $images,
      'facilities' => $facilities,
      'max_pax' => $max_pax
    ]);
  }

  public function centroConvenciones(Request $request)
  {
    $parent = Venue::find('02i3m0000092sG3AAI');
    $venues = Venue::where('parent_id', '=', $parent->id)
      ->get();
    
    $max_pax = 0;
    if ($venues) {
      foreach ($venues as $venue) {
        $venue_max_pax = $venue->designs()->max('max_pax');
        $max_pax = $venue_max_pax > $max_pax ? $venue_max_pax : $max_pax;
      }
      $facilities = $venues ? $venues[0]->facilities : null;
    }

    $venue_images = VenueFile::where('venue_id', $parent->id)->get();
    $images = [];
    if ($venue_images->count() > 0) {
      foreach ($venue_images as $image) {
        $images[] = url('storage/venues/' . $image->path);
      }
    } else {
      $images[] = '/assets/images/placeholder-image.jpg';
    }

    return view('venues.venue', [
      'page_title' => 'Servicios - Centro de Convenciones',
      'venue' => 'centro-convenciones',
      'venueName' => 'Centro de convenciones',
      'subtitle' => 'Amplía tus posibilidades',
      'parent' => $parent,
      'venues' => $venues,
      'images' => $images,
      'facilities' => $facilities,
      'max_pax' => $max_pax
    ]);
  }

  public function aulas105(Request $request)
  {
    $parent = Venue::find('02i3m0000092sJSAAY');
    $venues = Venue::where('parent_id', '=', $parent->id)
      ->get();
    
    $max_pax = 0;
    if ($venues) {
      foreach ($venues as $venue) {
        $venue_max_pax = $venue->designs()->max('max_pax');
        $max_pax = $venue_max_pax > $max_pax ? $venue_max_pax : $max_pax;
      }
      $facilities = $venues ? $venues[0]->facilities : null;
    }
    
    $venue_images = VenueFile::where('venue_id', $parent->id)->get();
    $images = [];
    if ($venue_images->count() > 0) {
      foreach ($venue_images as $image) {
        $images[] = url('storage/venues/' . $image->path);
      }
    } else {
      $images[] = '/assets/images/placeholder-image.jpg';
    }
    
    return view('venues.venue', [
      'page_title' => 'Servicios - Aulas 105',
      'venue' => 'aulas-105',
      'venueName' => 'Aulas 105',
      'subtitle' => 'Estudia y mejora el futuro',
      'parent' => $parent,
      'venues' => $venues,
      'images' => $images,
      'facilities' => $facilities,
      'max_pax' => $max_pax
    ]);
  }

  public function aulas220(Request $request)
  {
    $parent = Venue::find('02i3m0000092sEkAAI');
    $venues = Venue::where('parent_id', '=', $parent->id)
      ->get();
    
    $max_pax = 0;
    if ($venues) {
      foreach ($venues as $venue) {
        $venue_max_pax = $venue->designs()->max('max_pax');
        $max_pax = $venue_max_pax > $max_pax ? $venue_max_pax : $max_pax;
      }
      $facilities = $venues ? $venues[0]->facilities : null;
    }

    $venue_images = VenueFile::where('venue_id', $parent->id)->get();
    $images = [];
    if ($venue_images->count() > 0) {
      foreach ($venue_images as $image) {
        $images[] = url('storage/venues/' . $image->path);
      }
    } else {
      $images[] = '/assets/images/placeholder-image.jpg';
    }

    return view('venues.venue', [
      'page_title' => 'Servicios - Aulas 220',
      'venue' => 'aulas-220',
      'venueName' => 'Aulas 220',
      'subtitle' => 'Innova y crea valor',
      'parent' => $parent,
      'venues' => $venues,
      'images' => $images,
      'facilities' => $facilities,
      'max_pax' => $max_pax
    ]);
  }

  public function complejoHospedaje(Request $request)
  {
    $parent = Venue::find('02i3m0000092sHZAAY');
    $venues = Venue::whereIn('parent_id', [
        '02i3m0000092sHZAAY', // E-157
        '02i3m0000092sH7AAI', // E-158A
        '02i3m0000092sGcAAI', // E-158B
      ])->get();
    
    $max_pax = 0;
    if ($venues) {
      foreach ($venues as $venue) {
        $venue_max_pax = $venue->designs()->max('max_pax');
        $max_pax = $venue_max_pax > $max_pax ? $venue_max_pax : $max_pax;
      }
      $facilities = $venues->count() > 0 ? $venues[0]->facilities : null;
    }

    $venue_images = VenueFile::where('venue_id', '02i3m0000092sHZAAY')->get();
    $images = [];
    if ($venue_images->count() > 0) {
      foreach ($venue_images as $image) {
        $images[] = url('storage/venues/' . $image->path);
      }
    } else {
      $images[] = '/assets/images/placeholder-image.jpg';
    }

    return view('venues.venue', [
      'page_title' => 'Servicios - Complejo de Hospedaje',
      'venue' => 'complejo-hospedaje',
      'venueName' => 'Complejo de hospedaje',
      'subtitle' => 'Descansa, sueña y crea',
      'parent' => $parent,
      'venues' => $venues,
      'images' => $images,
      'facilities' => $facilities,
      'max_pax' => $max_pax
    ]);
  }

  public function residencias(Request $request)
  {
    $venues = Venue::where('type', '=', 'Vivienda')
      ->get();
    
    $parent = null;
    $max_pax = 0;
    if ($venues) {
      $parent = $venues[0];
      foreach ($venues as $venue) {
        $venue_max_pax = $venue->designs()->max('max_pax');
        $max_pax = $venue_max_pax > $max_pax ? $venue_max_pax : $max_pax;
      }
      $facilities = $venues ? $venues[0]->facilities : null;
    }

    $venue_images = VenueFile::where('venue_id', $parent->id)->get();
    $images = [];
    if ($venue_images->count() > 0) {
      foreach ($venue_images as $image) {
        $images[] = url('storage/venues/' . $image->path);
      }
    } else {
      $images = ['/assets/images/placeholder-image.jpg'];
    }

    return view('venues.venue', [
      'page_title' => 'Servicios - Residencias',
      'venue' => 'residencias',
      'venueName' => 'Residencias',
      'subtitle' => 'Vive con la naturaleza',
      'parent' => $parent,
      'venues' => $venues,
      'images' => $images,
      'facilities' => $facilities,
      'max_pax' => $max_pax
    ]);
  }

  public function oferta(Request $request)
  {
    $type = $request->type;
    $quantity = $request->quantity;
    $daterange = $request->daterange;
    $how = $request->how;

    $quantities = [];
    switch ($quantity) {
      case 'Menos de 50 personas' : $quantities = [0, 50]; break;
      case 'Entre 51 y 100 personas' : $quantities = [51, 100]; break;
      case 'Entre 101 y 200 personas' : $quantities = [101, 200]; break;
      case 'Entre 201 y 500 personas' : $quantities = [201, 500]; break;
      case 'Más de 500 personas' : $quantities = [500, 'Más']; break;
    }

    $from = new \DateTime(substr($daterange, 0, 10));
    $to   = new \DateTime(substr($daterange, -10));

    $ids = [];
    $designs = DB::table('venues_designs')
      ->select('venues.id')
      ->join('venues', 'venues.id', '=', 'venues_designs.venue_id');

    $event_type = [];
    switch ($type) {
      case 'Convención' : 
      case 'Evento' : 
      case 'Seminario' : 
      case 'Conferencia' :
      case 'Cocktail' : $event_type = ['Salas de eventos']; break;
      case 'Coworking' : $event_type = ['Salas de reuniones']; break;
      case 'Formación académica' : $event_type = ['Salas de reuniones', 'Salas de eventos']; break;
    }
    
    if ($event_type) {
      $designs->whereIn('venues.type', $event_type);
    }

    if ($quantities) {
      $designs->where('venues_designs.max_pax', '>=', $quantities[0]);
      if ($quantities[0] != 500) {
        $designs->where('venues_designs.max_pax', '<=', $quantities[1]);
      }
    }
    $designs = $designs->get();

    if ($designs->count() > 0) {
      foreach ($designs as $design) {
        if (!in_array($design->id, $ids)) {
          $ids[] = $design->id;
        }
      }
    }

    $venues = [];
    if (count($ids) > 0) {
      $venues = Venue::whereIn('id', $ids)->get();
    }

    return view('index.venues', [
      'page_title' => 'Servicios - Oferta',
      'venue' => 'inicio',
      'venueName' => 'Oferta',
      'venues' => $venues,
      'type' => $type,
      'quantity' => implode(' - ', $quantities),
      'daterange' => $daterange,
      'from' => $from->format('d-m-Y'),
      'to' => $to->format('d-m-Y'),
      'how' => $how
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
    $form_url = '';
    
    switch ($step) {
      case 'datos-contacto': 
        $step = 1;
        $stepName = 'Datos de contacto'; 

        if ($request->isMethod('post')) {
          $inputs = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'nullable|string',
            'email' => 'required|string|email',
            'phone' => 'required|string',
            'company' => 'nullable|string',
            'country_code' => 'nullable|string',
            'want_to_do' => 'nullable|string',
            '00N3m00000QQOde' => 'nullable|string',
          ]);

          session($inputs);

          return redirect()->to($inputs['want_to_do'] == 'event' ? '/cotizacion/datos-evento' : '/cotizacion/datos-residencia');
        } 

        break;
      case 'datos-evento': 
        $step = 2;
        $stepName = 'Datos de tu evento'; 

        if ($request->isMethod('post')) {
          $inputs = $request->validate([
            '00N3m00000QQOdA' => 'required|string',
            '00N3m00000QMsCF' => 'required|string',
            '00N3m00000QMsCA' => 'required|string',
            '00N3m00000QMsC5' => 'required|string',
            '00N3m00000QMwta' => 'required|string',
            '00N3m00000QMwtf' => 'required|string',
            '00N3m00000QQOdy' => 'nullable|string',
            '00N3m00000QMsCK' => 'required|string',
            '00N3m00000QMsCP' => 'required|string',
            '00N3m00000QMzL7' => 'nullable|string',
            '00N3m00000QQOe8' => 'nullable|string',
            'description' => 'required|string',
          ]);

          $inputs['recordType'] = '0123m0000012tH4';
          
          session($inputs);
          return redirect()->to('/cotizacion/vista-previa');
        } 
        break;
      case 'vista-previa': 
        $step = 3;
        $stepName = 'Vista previa'; 
        $form_url = 'https://webto.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8';
        break;
      case 'solicitud-enviada': 
        session()->flush();
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

        if ($request->isMethod('post')) {
          $inputs = $request->validate([
            '00N3m00000QMzL7' => 'required|string',
            '00N3m00000QMzLH' => 'required|string',
            '00N3m00000QMwta' => 'required|string',
            '00N3m00000QMzLC' => 'required|string',
            'work-in-campus' => 'required|string',
            '00N3m00000QMzLM' => 'nullable|string',
            '00N3m00000QMzLR' => 'nullable|string',
            '00N3m00000QMzLW' => 'nullable|string',
          ]);

          $inputs['recordType'] = '0121N000001AmUK';
          
          session($inputs);
          return redirect()->to('/cotizacion/vista-previa');
        } 
        break;
    }

    if ($request->id) {
      session(['00N3m00000Pb23w' => $request->id]);
    }

    $venue = null;
    $designs = [];
    $venueId = session()->get('00N3m00000Pb23w');
    if ($venueId) {
      $venue = Venue::find($venueId);
      $designs = VenueDesign::where('venue_id', $venue->id)
        ->orderBy('layout', 'asc')
        ->get();
    }
    
    return view('index.request', [
      'page_title' => 'Servicios - Cotización - ' . $stepName,
      'step' => $step,
      'venue' => $venue,
      'designs' => $designs,
      'form_url' => $form_url
    ]);
  }

  public function docuSignPayment (Request $request) 
  {
    if ($request->isMethod('get')) {
      // Get document Info
      require_once ('Soapclient/SforceEnterpriseClient.php');

      $mySFC = new \SforceEnterpriseClient();
      $mySFC->createConnection(__DIR__ . '/Soapclient/enterprise.wsdl.xml');
      $mySFC->login(
          env('SALESFORCE_USERNAME'),
          env('SALESFORCE_PASSWORD') .
          env('SALESFORCE_SECURITY_TOKEN')
      );

      $query = 'SELECT Id, Name, Type, AccountNumber FROM ACCOUNT LIMIT 10';
      $result = $mySFC->query($query);

      // Paguelo fácil
      $endpoint = 'https://secure.paguelofacil.com/LinkDeamon.cfm';
      $params = [
          'CCLW' => '588BA57F825D6D9F6E230C2F39C94ACE84369A887E899DE043924E0122C38FF6',
          'CMTN' => 100.00,
          'CDSC' => 'Reserva de evento',
          'RETURN_URL' => bin2hex(url('/confirmacion-pago')),
          'PARM_1' => 'TokenEvento',
        ];
      
      $redirect = $endpoint . '?' . http_build_query($params);
      dd($redirect);
      //return redirect()->to($redirect);
    }

    return response('<h3>Solicitud inválida</h3>
      El pago no puede ser procesado.
      <br><br>
      Por favor comuníquese con el área comercial y notifique esta incidencia.
      <br>
      O visite <a href="https://ciudaddelsaber.org">www.ciudaddelsaber.org</a> para más información.', 421);
  }

  public function paymentConfirmation(Request $request) 
  {
    return view('index.payment-confirmation');
  }

  public function gallery(Request $request) 
  {
    $secret_key = "9537642792179615";
    $method = "aes128";
    $iv_length = openssl_cipher_iv_length($method);
    $iv = openssl_random_pseudo_bytes($iv_length);
    
    $sessionId = $request->sessionid;
    $decrypted_message = openssl_decrypt($sessionId, $method, $secret_key, 0, $iv);
    $venue_id = substr($decrypted_message, -32, 18);
    
    $venue = $request->venue;

    if ($venue != $venue_id) {
      return abort(404);
    }

    $venue = Venue::where('id', $venue)->first();

    if (is_null($venue)) {
      return abort(404);
    }

    if ($request->isMethod('post')) {
      $file = $request->file('file');
      if ($file) {
        $filepath = hash('sha256', (Str::random(60) . microtime()));
        $file_extension = $file->getClientOriginalExtension();
        $filename = $filepath . '.' . $file_extension;
        $original_name = $file->getClientOriginalName();
        
        $venue_file = new VenueFile([
          'venue_id' => $venue->id,
          'token' => $filepath,
          'name' => $original_name,
          'path' => $filename,
          'size' => $file->getSize(),
          'type' => 'image',
          'mime_type' => $file->getMimeType(),
          'sort' => VenueFile::where('venue_id', $venue->id)->count()
        ]);
        $venue_file->save();

        $this->resizeImage($file, $filepath . '_1440.' . $file_extension, 1440);
        $this->resizeImage($file, $filepath . '_1024.' . $file_extension, 1024);
        $this->resizeImage($file, $filepath . '_720.' . $file_extension, 720);
        $this->resizeImage($file, $filepath . '_480.' . $file_extension, 480);
        $this->resizeImage($file, $filepath . '_240.' . $file_extension, 480);
      }

      return redirect()->to('/galeria/' . $venue->id . '?sessionid=' . urlencode($sessionId));
    }

    $images = VenueFile::where('venue_id', $venue->id)->get();

    return view('venues.gallery', [
      'images' => $images,
      'venue' => $venue,
      'sessionid' => urlencode($sessionId)
    ]);
  }

  public function deleteImage(Request $request) 
  {
    $secret_key = "9537642792179615";
    $method = "aes128";
    $iv_length = openssl_cipher_iv_length($method);
    $iv = openssl_random_pseudo_bytes($iv_length);
    
    $sessionId = $request->sessionid;
    $decrypted_message = openssl_decrypt($sessionId, $method, $secret_key, 0, $iv);
    $venue_id = substr($decrypted_message, -32, 18);
    
    $venue = $request->venue;

    if ($venue != $venue_id) {
      return abort(404);
    }
    
    $venue = $request->venue;
    $token = $request->token;
    $venue = Venue::where('id', $venue)->first();

    if (is_null($venue)) {
      return abort(404);
    }

    $image = VenueFile::where('token', $token)->first();
    if ($image) {
      Storage::delete('public/venues/' . $image->path);
      Storage::delete('public/venues/' . substr($image->path, 0, strpos($image->path, '.')) . '_1440.' . substr($image->path, strpos($image->path, '.') + 1));
      Storage::delete('public/venues/' . substr($image->path, 0, strpos($image->path, '.')) . '_1024.' . substr($image->path, strpos($image->path, '.') + 1));
      Storage::delete('public/venues/' . substr($image->path, 0, strpos($image->path, '.')) . '_720.' . substr($image->path, strpos($image->path, '.') + 1));
      Storage::delete('public/venues/' . substr($image->path, 0, strpos($image->path, '.')) . '_480.' . substr($image->path, strpos($image->path, '.') + 1));
      Storage::delete('public/venues/' . substr($image->path, 0, strpos($image->path, '.')) . '_240.' . substr($image->path, strpos($image->path, '.') + 1));
      $image->delete();
    }

    return redirect()->to('/galeria/' . $venue->id . '?sessionid=' . urlencode($sessionId));
  }

  private function resizeImage($file, $fileNameToStore, $size) {
    $resize = Image::make($file)->resize($size, null, function ($constraint) {
      $constraint->aspectRatio();
    })->encode('jpg');

    $save = Storage::put("public/venues/{$fileNameToStore}", $resize->__toString());

    if ($save) {
      return true;
    }
    return false;
  }
}
