<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request, App\Models\Venue, App\Models\VenueFile, App\Models\VenueDesign, App\Models\Holidays, App\Models\Rates, Str, Image, Illuminate\Support\Facades\Storage, Illuminate\Support\Facades\DB;
use Monolog\Handler\NullHandler;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $parents = ['02i3m0000092sG9AAI', // Ateneo 0
        '02i3m0000092sG3AAI', // Centro de convenciones 1
        '02i3m0000092sJSAAY', // Aulas 105 2
        '02i3m0000092rzDAAQ', // Complejo de hospedaje 3
        '02i3m00000D9DaPAAV', // Parque Ciudad del Saber 4
        '02i3m0000092sIyAAI', // E-109 5
        ];

        $randId = rand(0, 4);
     //   $randId = 2;
        $venue_images = VenueFile::where('venue_id', $parents[$randId])->get();
        $venue_title = 'Fundación Ciudad del Saber';

        switch ($randId)
        {
            case 0:
                $venue_title = 'Ateneo';
                $venue_subtitle = 'Conecta con tus audiencias';
            break;
            case 1:
                $venue_title = 'Centro de convenciones';
                $venue_subtitle = 'Amplía tus posibilidades';
            break;
            case 2:
                $venue_title = 'Aulas 105';
                $venue_subtitle = 'Estudia y mejora el futuro';
            break;
             case 3:
                $venue_title = 'Complejo de hospedaje';
                $venue_subtitle = 'Acogedoras habitaciones en un lugar cerca de todo';
            break;
            case 4:
                $venue_title = 'Parque Ciudad del Saber';
                $venue_subtitle = 'Actividades deportivas, natación, esparcimiento';
            break;
        }

        $isUser = session()->get('is-cds-user', false);
        $userEmail = session()->get('cds-user-email', null);

        if ($isUser && strpos($userEmail, '@cdspanama.org') > 0)
        {
            $parents[] = '02i3m0000092sJmAAI'; // E-104
            //    $parents[] = '02i3m0000092sIyAAI'; // E-109
            $parents[] = '02i3m0000092s8rAAA'; // E-300
            $parents[] = '02i3m0000092s2PAAQ'; // L-173
            $parents[] = '02i3m0000092s88AAA'; // G-214ABC
            $parents[] = '02i3m0000092sP3AAI'; // Parque de los Lagos
            $parents[] = '02i3m00000D9DaPAAV'; // Parque Ciudad del Saber
            
        }

        $venues = Venue::whereIn('id', $parents)->where('show_on_website', 'Si')
            ->orderBy('venuesorder', 'asc')
            ->get();
     //   echo "VENUESDEBUG:" . json_encode($venues);
        $fixedVenues = [];
        if ($venues)
        {
            foreach ($venues as $venue)
            {
                switch ($venue->id)
                {
                    case '02i3m0000092s2PAAQ':
                        $name = 'L-173';
                        $url = '/l-173';
                    break;
                    case '02i3m0000092s88AAA':
                        $name = 'G-214ABC';
                        $url = '/g-214abc';
                    break;
                    case '02i3m0000092sP3AAI':
                        $name = 'Parque de los Lagos';
                        $url = '/parque-de-los-lagos';
                    break;
                    case '02i3m00000D9DaPAAV':
                        $name = 'Parque Ciudad del Saber';
                        $url = '/parque-cds';
                    break;
                    case '02i3m0000092sJmAAI':
                        $name = 'E-104';
                        $url = '/e-104';
                    break;
                    case '02i3m0000092sIyAAI':
                        $name = 'E-109';
                        $url = '/e-109';
                    break;
                    case '02i3m0000092s8rAAA':
                        $name = 'E-300';
                        $url = '/e-300';
                    break;
                    case '02i3m0000092sG9AAI':
                        $name = 'Ateneo';
                        $url = '/ateneo';
                    break;
                    case '02i3m0000092sG3AAI':
                        $name = 'Centro de convenciones';
                        $url = '/centro-convenciones';
                    break;
                    case '02i3m0000092sJSAAY':
                        $name = 'Aulas 105';
                        $url = '/aulas-105';
                    break;
                    case '02i3m0000092sEkAAI':
                        $name = 'Aulas 220';
                        $url = '/aulas-220';
                    break;
                    case '02i3m0000092rzDAAQ':
                        $name = 'Complejo de hospedaje';
                        $url = 'https://live.ipms247.com/booking/book-rooms-complejodehospedaje-es-Spanish';
                    break;
                }

                $venue_image = VenueFile::where('venue_id', $venue->id)
                    ->first();
                $image = $venue_image ? image_url('storage/venues/' . $venue_image->path) : '/assets/images/placeholder-image.jpg';

                if ($venue->id == '02i3m0000092sG9AAI' || $venue->id == '02i3m0000092sP3AAI')
                {
                    $subvenues = [$venue];
                }
                else
                {
                    $subvenues = Venue::where('parent_id', '=', $venue->id)
                        ->where('show_on_website', 'Si')
                        ->get();
                }

                $designs = [];
                if ($subvenues)
                {
                    foreach ($subvenues as $subvenue)
                    {
                        $ds = $subvenue->designs()
                            ->get();
                        if ($ds)
                        {
                            foreach ($ds as $d)
                            {
                                $designs[] = $d;
                            }
                        }
                    }
                }

                $fixedVenues[] = ['name' => $name, 'url' => $url, 'image' => $image, 'venues' => $subvenues, 'designs' => $designs, 'type' => $venue->type ];
            }
        }

        $ids = ['ids[]=910', 'ids[]=913', 'ids[]=926', 'ids[]=964', 'ids[]=1014', ];

        $clients = [];
        $clients_response = [];

        try
        {
            $clients_response = file_get_contents('https://ciudaddelsaber.org/wp-json/fcds/v1/clients?' . urldecode(implode('&', $ids)));
        }
        catch(\Exception $e)
        {
        }

        if ($clients_response)
        {
            $clients_response = json_decode($clients_response);
            foreach ($clients_response as $cr)
            {
                $clients[] = ['name' => $cr->commercial_name, 'logo' => $cr->logo, 'url' => 'https://ciudaddelsaber.org/directorio/' . $cr->nice_name . '/', ];
            }
        }
        shuffle($clients);

        return view('index.index', ['page_title' => 'Servicios', 'venues' => $fixedVenues, 'clients' => json_encode($clients) , 'show_featured_text' => true, 'show_contact_form' => true, 'show_carousel' => true, 'show_venues_menu' => false, 'venue' => null, 'venue_image' => ($venue_images->count() > 0 ? image_url('storage/venues/' . $venue_images[0]->path) : null) , 'venue_title' => $venue_title, 'venue_subtitle' => $venue_subtitle]);
    }

    public function cds(Request $request)
    {
        $isUser = session()->get('is-cds-user', false);
        $userEmail = session()->get('cds-user-email', null);

        if ($isUser == false || strpos($userEmail, '@cdspanama.org') == false)
        {
            session()->put('is-cds-user', false);
            session()
                ->put('cds-user-email', null);

            return redirect()
                ->to('/');
        }

        $parents = ['02i3m0000092sJmAAI', // E-104
        '02i3m0000092sIyAAI', // E-109
        '02i3m0000092s8rAAA', // E-300
        '02i3m0000092s2PAAQ', // L-173
        '02i3m0000092s88AAA', // G-214ABC
        '02i3m0000092sP3AAI', // Parque de los Lagos
        ];

        $venues = Venue::whereIn('id', $parents)->where('show_on_website', 'Si')
            ->get();

        $fixedVenues = [];
        if ($venues)
        {
            foreach ($venues as $venue)
            {
                switch ($venue->id)
                {
                    case '02i3m0000092sJmAAI':
                        $name = 'E-104';
                        $url = '/e-104';
                    break;
                    case '02i3m0000092sIyAAI':
                        $name = 'E-109';
                        $url = '/e-109';
                    break;
                    case '02i3m0000092s8rAAA':
                        $name = 'E-300';
                        $url = '/e-300';
                    break;
                    case '02i3m0000092s2PAAQ':
                        $name = 'L-173';
                        $url = '/l-173';
                    break;
                    case '02i3m0000092s88AAA':
                        $name = 'G-214ABC';
                        $url = '/g-214abc';
                    break;
                    case '02i3m0000092sP3AAI':
                        $name = 'Parque de los Lagos';
                        $url = '/parque-de-los-lagos';
                    break;
                }

                $venue_image = VenueFile::where('venue_id', $venue->id)
                    ->first();
                $image = $venue_image ? image_url('storage/venues/' . $venue_image->path) : '/assets/images/placeholder-image.jpg';

                if ($venue->id == '02i3m0000092sP3AAI')
                {
                    $subvenues = [$venue];
                }
                else
                {
                    $subvenues = Venue::where('parent_id', '=', $venue->id)
                        ->where('show_on_website', 'Si')
                        ->get();
                }

                $designs = [];
                if ($subvenues)
                {
                    foreach ($subvenues as $subvenue)
                    {
                        $ds = $subvenue->designs()
                            ->get();
                        if ($ds)
                        {
                            foreach ($ds as $d)
                            {
                                $designs[] = $d;
                            }
                        }
                    }
                }

                $fixedVenues[] = ['name' => $name, 'url' => $url, 'image' => $image, 'venues' => $subvenues, 'designs' => $designs, ];
            }
        }

        return view('index.index', ['page_title' => 'Servicios', 'venues' => $fixedVenues, 'clients' => json_encode([]) , 'show_featured_text' => false, 'show_contact_form' => false, 'show_carousel' => false, 'show_venues_menu' => true, 'venue' => 'espacios-fcds', ]);
    }

    public function e104(Request $request)
    {
        $isUser = session()->get('is-cds-user', false);
        $userEmail = session()->get('cds-user-email', null);

        if ($isUser == false || strpos($userEmail, '@cdspanama.org') == false)
        {
            session()->put('is-cds-user', false);
            session()
                ->put('cds-user-email', null);

            return redirect()
                ->to('/');
        }

        $parent = Venue::find('02i3m0000092sJmAAI');
        $venues = Venue::where('parent_id', '=', $parent->id)
            ->where('show_on_website', 'Si')
            ->get();

        $max_pax = 0;
        if ($venues)
        {
            foreach ($venues as $venue)
            {
                $venue_max_pax = $venue->designs()
                    ->max('max_pax');
                $max_pax = $venue_max_pax > $max_pax ? $venue_max_pax : $max_pax;
            }
            $facilities = $venues ? $venues[0]->facilities : null;
        }

        $venue_images = VenueFile::where('venue_id', $parent->id)
            ->get();
        $images = [];
        if ($venue_images->count() > 0)
        {
            foreach ($venue_images as $image)
            {
                $images[] = image_url('storage/venues/' . $image->path);
            }
        }
        else
        {
            $images[] = '/assets/images/placeholder-image.jpg';
        }

        return view('venues.venue', ['page_title' => 'Servicios - E-104', 'venue' => 'espacios-fcds', 'venueName' => 'E-104', 'subtitle' => '', 'parent' => $parent, 'venues' => $venues, 'images' => $images, 'facilities' => $facilities, 'max_pax' => $max_pax]);
    }

    public function l173(Request $request)
    {
        $isUser = session()->get('is-cds-user', false);
        $userEmail = session()->get('cds-user-email', null);

        if ($isUser == false || strpos($userEmail, '@cdspanama.org') == false)
        {
            session()->put('is-cds-user', false);
            session()
                ->put('cds-user-email', null);

            return redirect()
                ->to('/');
        }

        $parent = Venue::find('02i3m0000092s2PAAQ');
        $venues = Venue::where('parent_id', '=', $parent->id)
            ->where('show_on_website', 'Si')
            ->get();

        $max_pax = 0;
        if ($venues)
        {
            foreach ($venues as $venue)
            {
                $venue_max_pax = $venue->designs()
                    ->max('max_pax');
                $max_pax = $venue_max_pax > $max_pax ? $venue_max_pax : $max_pax;
            }
            $facilities = $venues ? $venues[0]->facilities : null;
        }

        $venue_images = VenueFile::where('venue_id', $parent->id)
            ->get();
        $images = [];
        if ($venue_images->count() > 0)
        {
            foreach ($venue_images as $image)
            {
                $images[] = image_url('storage/venues/' . $image->path);
            }
        }
        else
        {
            $images[] = '/assets/images/placeholder-image.jpg';
        }

        return view('venues.venue', ['page_title' => 'Servicios - L-173', 'venue' => 'espacios-fcds', 'venueName' => 'L-173', 'subtitle' => '', 'parent' => $parent, 'venues' => $venues, 'images' => $images, 'facilities' => $facilities, 'max_pax' => $max_pax]);
    }

    public function g214abc(Request $request)
    {
        $isUser = session()->get('is-cds-user', false);
        $userEmail = session()->get('cds-user-email', null);

        if ($isUser == false || strpos($userEmail, '@cdspanama.org') == false)
        {
            session()->put('is-cds-user', false);
            session()
                ->put('cds-user-email', null);

            return redirect()
                ->to('/');
        }

        $parent = Venue::find('02i3m0000092s88AAA');
        $venues = Venue::where('parent_id', '=', $parent->id)
            ->where('show_on_website', 'Si')
            ->get();

        $max_pax = 0;
        if ($venues)
        {
            foreach ($venues as $venue)
            {
                $venue_max_pax = $venue->designs()
                    ->max('max_pax');
                $max_pax = $venue_max_pax > $max_pax ? $venue_max_pax : $max_pax;
            }
            $facilities = $venues ? $venues[0]->facilities : null;
        }

        $venue_images = VenueFile::where('venue_id', $parent->id)
            ->get();
        $images = [];
        if ($venue_images->count() > 0)
        {
            foreach ($venue_images as $image)
            {
                $images[] = image_url('storage/venues/' . $image->path);
            }
        }
        else
        {
            $images[] = '/assets/images/placeholder-image.jpg';
        }

        return view('venues.venue', ['page_title' => 'Servicios - G-214ABC', 'venue' => 'espacios-fcds', 'venueName' => 'G-214ABC', 'subtitle' => '', 'parent' => $parent, 'venues' => $venues, 'images' => $images, 'facilities' => $facilities, 'max_pax' => $max_pax]);
    }

    public function e109(Request $request)
    {
        $isUser = session()->get('is-cds-user', false);
        $userEmail = session()->get('cds-user-email', null);

        // if ($isUser == false || strpos($userEmail, '@cdspanama.org') == false) {
        //   session()->put('is-cds-user', false);
        //   session()->put('cds-user-email', null);
        //    return redirect()->to('/');
        //  }
        $parent = Venue::find('02i3m0000092sIyAAI');
        $venues = Venue::where('parent_id', '=', $parent->id)
            ->where('show_on_website', 'Si')
            ->get();

        $max_pax = 0;
        if ($venues)
        {
            foreach ($venues as $venue)
            {
                $venue_max_pax = $venue->designs()
                    ->max('max_pax');
                $max_pax = $venue_max_pax > $max_pax ? $venue_max_pax : $max_pax;
            }
            $facilities = $venues ? $venues[0]->facilities : null;
        }

        $venue_images = VenueFile::where('venue_id', $parent->id)
            ->get();
        $images = [];
        if ($venue_images->count() > 0)
        {
            foreach ($venue_images as $image)
            {
                $images[] = image_url('storage/venues/' . $image->path);
            }
        }
        else
        {
            $images[] = '/assets/images/placeholder-image.jpg';
        }

        return view('venues.venue', ['page_title' => 'Servicios - E-109', 'venue' => 'e-109', 'venueName' => 'Centro de Innovación', 'subtitle' => '', 'parent' => $parent, 'venues' => $venues, 'images' => $images, 'facilities' => $facilities, 'max_pax' => $max_pax]);
    }

    public function e300(Request $request)
    {
        $isUser = session()->get('is-cds-user', false);
        $userEmail = session()->get('cds-user-email', null);

        if ($isUser == false || strpos($userEmail, '@cdspanama.org') == false)
        {
            session()->put('is-cds-user', false);
            session()
                ->put('cds-user-email', null);

            return redirect()
                ->to('/');
        }

        $parent = Venue::find('02i3m0000092s8rAAA');
        $venues = Venue::where('parent_id', '=', $parent->id)
            ->where('show_on_website', 'Si')
            ->get();

        $max_pax = 0;
        if ($venues)
        {
            foreach ($venues as $venue)
            {
                $venue_max_pax = $venue->designs()
                    ->max('max_pax');
                $max_pax = $venue_max_pax > $max_pax ? $venue_max_pax : $max_pax;
            }
            $facilities = $venues ? $venues[0]->facilities : null;
        }

        $venue_images = VenueFile::where('venue_id', $parent->id)
            ->get();
        $images = [];
        if ($venue_images->count() > 0)
        {
            foreach ($venue_images as $image)
            {
                $images[] = image_url('storage/venues/' . $image->path);
            }
        }
        else
        {
            $images[] = '/assets/images/placeholder-image.jpg';
        }

        return view('venues.venue', ['page_title' => 'Servicios - E-300', 'venue' => 'espacios-fcds', 'venueName' => 'E-300', 'subtitle' => '', 'parent' => $parent, 'venues' => $venues, 'images' => $images, 'facilities' => $facilities, 'max_pax' => $max_pax]);
    }

    public function ateneo(Request $request)
    {
        $parent = Venue::find('02i3m0000092sG9AAI');
        $venues = [$parent];

        $max_pax = 0;
        if ($venues)
        {
            foreach ($venues as $venue)
            {
                $venue_max_pax = $venue->designs()
                    ->max('max_pax');
                $max_pax = $venue_max_pax > $max_pax ? $venue_max_pax : $max_pax;
            }
            $facilities = $venues ? $venues[0]->facilities : null;
        }

        $venue_images = VenueFile::where('venue_id', $parent->id)
            ->get();
        $images = [];
        if ($venue_images->count() > 0)
        {
            foreach ($venue_images as $image)
            {
                $images[] = image_url('storage/venues/' . $image->path);
            }
        }
        else
        {
            $images[] = '/assets/images/placeholder-image.jpg';
        }

        return view('venues.venue', ['page_title' => 'Servicios - Ateneo', 'venue' => 'ateneo', 'venueName' => 'Ateneo', 'subtitle' => 'Conecta con tus audiencias', 'parent' => $parent, 'venues' => $venues, 'images' => $images, 'facilities' => $facilities, 'max_pax' => $max_pax]);
    }

    public function parqueDeLosLagos(Request $request)
    {
        $parent = Venue::find('02i3m0000092sP3AAI');
        $venues = [$parent];

        $max_pax = 0;
        if ($venues)
        {
            foreach ($venues as $venue)
            {
                $venue_max_pax = $venue->designs()
                    ->max('max_pax');
                $max_pax = $venue_max_pax > $max_pax ? $venue_max_pax : $max_pax;
            }
            $facilities = $venues ? $venues[0]->facilities : null;
        }

        $venue_images = VenueFile::where('venue_id', $parent->id)
            ->get();
        $images = [];
        if ($venue_images->count() > 0)
        {
            foreach ($venue_images as $image)
            {
                $images[] = image_url('storage/venues/' . $image->path);
            }
        }
        else
        {
            $images[] = '/assets/images/placeholder-image.jpg';
        }

        return view('venues.venue', ['page_title' => 'Servicios - Parque de los Lagos', 'venue' => 'espacios-fcds', 'venueName' => 'Parque de los Lagos', 'subtitle' => '', 'parent' => $parent, 'venues' => $venues, 'images' => $images, 'facilities' => $facilities, 'max_pax' => $max_pax]);
    }

    public function parqueCds(Request $request)
    {

    $routeName = Route::getCurrentRoute();
    if($routeName->uri == 'parque-cds')
        $routeName->uri = '02i3m00000D9DaPAAV';
   // echo 'PATHACTUAL:' . json_encode($routeName) . ' -xx- ' . "VENUESDEBUG:" . json_encode($request);; 

    switch ($routeName->uri)
                {
                    case 'parque-cds/futbol':
                       $routeName->uri = '02i3m00000DidtdAAB';
                    break;
                    case 'parque-cds/baloncesto':
                        $routeName->uri = '02i3m00000DidtxAAB';
                    break;
                    case 'parque-cds/beisbol':
                        $routeName->uri = '02i3m00000Didu2AAB';
                    break;
                    case 'parque-cds/tenis':
                        $routeName->uri = '02i3m00000Didu7AAB';
                    break;
                    case 'parque-cds/raquetbol':
                        $routeName->uri = '02i3m00000Fx0PEAAZ';
                    break;
                    case 'parque-cds/voleibol':
                        $routeName->uri = '02i3m00000Didu3AAB';
                    break;
                    case 'parque-cds/golf':
                        $routeName->uri = '02i3m00000DiduCAAR';
                    break;
                    case 'parque-cds/gimnasio':
                        $routeName->uri = '02i3m00000DiduUAAR';
                    break;
                    case 'parque-cds/pesas':
                        $routeName->uri = '02i3m00000Fx0PJAAZ';
                        break;
                    case 'parque-cds/piscina':
                        $routeName->uri = '02i3m00000DiduZAAR';
                    break;
                    case 'parque-cds/bohios':
                        $routeName->uri = '02i3m00000DiduVAAR';
                    break;
                    case 'parque-cds/boxeo':
                        $routeName->uri = '02i3m00000FbwwjAAB';
                    break;
                }

        $parent = Venue::find($routeName->uri);
        //  CODIGO PARA MOSTRAR SÓLO TENIS - PARA QUE SEA NORMAL COMENTAR DE 640 - 645 Y DESCOMENTAR 647 - 650 - RECUERDA! Cambiar index.blade.php las DISCIPLINAS
        $includeIds = ['02i3m00000Didu7AAB', '02i3m00000Fx0PEAAZ', '02i3m00000Fx0PJAAZ','02i3m00000DidtxAAB','02i3m00000Didu3AAB','02i3m00000FbwwjAAB'];
        if (!in_array($parent->id, $includeIds))
        {
            $venues = Venue::where('parent_id', '=', $parent->id)
            ->where('id', '!=', $parent->id)
            ->where(function($query) {
                $query->where('id', '=', '02i3m00000Didu7AAB')
                      ->orWhere('id', '=', '02i3m00000Fx0PEAAZ')
                      ->orWhere('id', '=', '02i3m00000Fx0PJAAZ')
                      ->orWhere('id', '=', '02i3m00000DidtxAAB')
                      ->orWhere('id', '=', '02i3m00000Didu3AAB')
                      ->orWhere('id', '=', '02i3m00000FbwwjAAB');
            })
            ->where('show_on_website', 'Si')
            ->orderBy('venuesorder', 'asc')
            ->get();
        } else 
        {
            $venues = Venue::where('parent_id', '=', $parent->id)
            ->where('id', '!=', $parent->id)
            ->where('show_on_website', 'Si')
            ->get();
        }

        $fixedVenues = [];
        if ($venues)
        {
            foreach ($venues as $venue)
            {
                $name = 'Err: Set Name';
                $url = 'Err: Set URL';
                switch ($venue->id)
                {
                    case '02i3m00000DidtdAAB':
                        $name = 'Canchas de fútbol';
                        $url = 'parque-cds/futbol';
                    break;
                    case '02i3m00000DidtxAAB':
                        $name = 'Canchas de baloncesto';
                        $url = 'parque-cds/baloncesto';
                    break;
                    case '02i3m00000Didu2AAB':
                        $name = 'Canchas de béisbol';
                        $url = 'parque-cds/beisbol';
                    break;
                    case '02i3m00000Didu7AAB':
                        $name = 'Canchas de tenis';
                        $url = 'parque-cds/tenis';
                    break;
                    case '02i3m00000Fx0PEAAZ':
                        $name = 'Canchas de ráquetbol';
                        $url = 'parque-cds/raquetbol';
                    break;
                    case '02i3m00000Didu3AAB':
                        $name = 'Canchas de voleibol';
                        $url = 'parque-cds/voleibol';
                    break;
                    case '02i3m00000DiduCAAR':
                        $name = 'Canchas de golf';
                        $url = 'parque-cds/golf';
                    break;
                    case '02i3m00000DiduUAAR':
                        $name = 'Gimnasio';
                        $url = 'parque-cds/gimnasio';
                    break;
                    case '02i3m00000Fx0PJAAZ':
                        $name = 'Área de pesas';
                        $url = 'parque-cds/pesas';
                    break;
                    case '02i3m00000DiduZAAR':
                        $name = 'Piscina';
                        $url = 'parque-cds/piscina';
                    break;
                    case '02i3m00000DiduVAAR':
                        $name = 'Bohios';
                        $url = 'parque-cds/bohios';
                    break;
                    case '02i3m00000FbwwjAAB':
                        $name = 'Boxeo';
                        $url = 'parque-cds/boxeo';
                    break;
                }

                $venue_image = VenueFile::where('venue_id', $venue->id)
                    ->first();
                $image = $venue_image ? image_url('storage/venues/' . $venue_image->path) : '/assets/images/placeholder-image.jpg';

                if ($venue->id == '02i3m0000092sG9AAI' || $venue->id == '02i3m0000092sP3AAI')
                {
                    $subvenues = [$venue];
                }
                else
                {
                    $subvenues = Venue::where('parent_id', '=', $venue->id)
                        ->where('show_on_website', 'Si')
                        ->get();
                }

                $designs = [];
                if ($subvenues)
                {
                    foreach ($subvenues as $subvenue)
                    {
                        $ds = $subvenue->designs()
                            ->get();
                        if ($ds)
                        {
                            foreach ($ds as $d)
                            {
                                $designs[] = $d;
                            }
                        }
                    }
                }
                // LO SIGUIENTE SON LAS EN SÍ (Canchas de baloncesto, de fútbol, piscina)
                $fixedVenues[] = ['name' => $name, 'url' => $url, 'image' => $image, 'venues' => $subvenues, 'designs' => $designs, 'type' => $venue->type];
            }
        }

        $max_pax = 0;
        if ($venues)
        {
            foreach ($venues as $venue)
            {
                $venue->name = str_ireplace("Parque CDS - " , "", $venue->name);
                $venue_max_pax = $venue->designs()
                    ->max('max_pax');
                $max_pax = $venue_max_pax > $max_pax ? $venue_max_pax : $max_pax;
            }
            $facilities = $venues ? (isset($venues[0]->facilities) ? $venues[0]->facilities : null) : null;
        }

        $venue_images = VenueFile::where('venue_id', $parent->id)
            ->get();
        $images = [];
        if ($venue_images->count() > 0)
        {
            foreach ($venue_images as $image)
            {
                $images[] = image_url('storage/venues/' . $image->path);
            }
        }
        else
        {
            $images[] = '/assets/images/placeholder-image.jpg';
        }
        $venue_title = 'XXX';
        $venue_subtitle = 'XXX Conecta con tus audiencias';
        if($routeName->uri == '02i3m00000D9DaPAAV')
        {
              return view('index.index', ['page_title' => 'Canchas, Gimnasio y Piscina', 'venues' => $fixedVenues, 'clients' => json_encode(null) , 'show_featured_text' => false, 'show_contact_form' => false, 'show_carousel' => false, 'show_venues_menu' => true, 'venue' => 'parque-cds', 'parentVenue' => 'parque-cds', 'venue_image' => ($venue_images->count() > 0 ? image_url('storage/venues/' . $venue_images[0]->path) : null) , 'venue_title' => $venue_title, 'venue_subtitle' => $venue_subtitle]);
        }
        else {
	
            return view('venues.venue', [
              'page_title' => 'Servicios - Parque Ciudad del Saber',
              'venue' => 'parque-cds',
              'venueName' => 'Parque Ciudad del Saber',
              'subtitle' => '',
              'parent' => $parent,
             'venues' => $venues,
             'images' => $images,
             'facilities' => $facilities,
             'max_pax' => $max_pax,
             'show_menu' => false,
             'venueid' => $venue->id,
             'parentid' => $venue->parent_id
           ]);
        
        }
      
    }

    public function centroConvenciones(Request $request)
    {
        $parent = Venue::find('02i3m0000092sG3AAI');
        $venues = Venue::where('parent_id', '=', $parent->id)
            ->where('show_on_website', 'Si')
            ->get();

        $max_pax = 0;
        if ($venues)
        {
            foreach ($venues as $venue)
            {
                $venue_max_pax = $venue->designs()
                    ->max('max_pax');
                $max_pax = $venue_max_pax > $max_pax ? $venue_max_pax : $max_pax;
            }
            $facilities = $venues ? $venues[0]->facilities : null;
        }

        $venue_images = VenueFile::where('venue_id', $parent->id)
            ->get();
        $images = [];
        if ($venue_images->count() > 0)
        {
            foreach ($venue_images as $image)
            {
                $images[] = image_url('storage/venues/' . $image->path);
            }
        }
        else
        {
            $images[] = '/assets/images/placeholder-image.jpg';
        }

        return view('venues.venue', ['page_title' => 'Servicios - Centro de Convenciones', 'venue' => 'centro-convenciones', 'venueName' => 'Centro de convenciones', 'subtitle' => 'Amplía tus posibilidades', 'parent' => $parent, 'venues' => $venues, 'images' => $images, 'facilities' => $facilities, 'max_pax' => $max_pax]);
    }

    public function aulas105(Request $request)
    {
        $parent = Venue::find('02i3m0000092sJSAAY');
        $venues = Venue::where('parent_id', '=', $parent->id)
            ->where('show_on_website', 'Si')
            ->get();

        $max_pax = 0;
        if ($venues)
        {
            foreach ($venues as $venue)
            {
                $venue_max_pax = $venue->designs()
                    ->max('max_pax');
                $max_pax = $venue_max_pax > $max_pax ? $venue_max_pax : $max_pax;
            }
            $facilities = $venues ? $venues[0]->facilities : null;
        }

        $venue_images = VenueFile::where('venue_id', $parent->id)
            ->get();
        $images = [];
        if ($venue_images->count() > 0)
        {
            foreach ($venue_images as $image)
            {
                $images[] = image_url('storage/venues/' . $image->path);
            }
        }
        else
        {
            $images[] = '/assets/images/placeholder-image.jpg';
        }

        return view('venues.venue', ['page_title' => 'Servicios - Aulas 105', 'venue' => 'aulas-105', 'venueName' => 'Aulas 105', 'subtitle' => 'Estudia y mejora el futuro', 'parent' => $parent, 'venues' => $venues, 'images' => $images, 'facilities' => $facilities, 'max_pax' => $max_pax]);
    }

    public function aulas220(Request $request)
    {
        $parent = Venue::find('02i3m0000092sEkAAI');
        $venues = Venue::where('parent_id', '=', $parent->id)
            ->where('show_on_website', 'Si')
            ->get();

        $max_pax = 0;
        if ($venues)
        {
            foreach ($venues as $venue)
            {
                $venue_max_pax = $venue->designs()
                    ->max('max_pax');
                $max_pax = $venue_max_pax > $max_pax ? $venue_max_pax : $max_pax;
            }
            $facilities = $venues ? $venues[0]->facilities : null;
        }

        $venue_images = VenueFile::where('venue_id', $parent->id)
            ->get();
        $images = [];
        if ($venue_images->count() > 0)
        {
            foreach ($venue_images as $image)
            {
                $images[] = image_url('storage/venues/' . $image->path);
            }
        }
        else
        {
            $images[] = '/assets/images/placeholder-image.jpg';
        }

        return view('venues.venue', ['page_title' => 'Servicios - Aulas 220', 'venue' => 'aulas-220', 'venueName' => 'Aulas 220', 'subtitle' => 'Innova y crea valor', 'parent' => $parent, 'venues' => $venues, 'images' => $images, 'facilities' => $facilities, 'max_pax' => $max_pax]);
    }

    public function complejoHospedaje(Request $request)
    {
        $parent = Venue::find('02i3m0000092sHZAAY');
        $venues = Venue::whereIn('parent_id', ['02i3m0000092sHZAAY', // E-157
        '02i3m0000092sH7AAI', // E-158A
        '02i3m0000092sGcAAI', // E-158B
        ])->where('show_on_website', 'Si')
            ->get();

        $max_pax = 0;
        if ($venues)
        {
            foreach ($venues as $venue)
            {
                $venue_max_pax = $venue->designs()
                    ->max('max_pax');
                $max_pax = $venue_max_pax > $max_pax ? $venue_max_pax : $max_pax;
            }
            $facilities = $venues->count() > 0 ? $venues[0]->facilities : null;
        }

        $venue_images = VenueFile::where('venue_id', '02i3m0000092sHZAAY')->get();
        $images = [];
        if ($venue_images->count() > 0)
        {
            foreach ($venue_images as $image)
            {
                $images[] = image_url('storage/venues/' . $image->path);
            }
        }
        else
        {
            $images[] = '/assets/images/placeholder-image.jpg';
        }

        return view('venues.venue', ['page_title' => 'Servicios - Complejo de Hospedaje', 'venue' => 'complejo-hospedaje', 'venueName' => 'Complejo de hospedaje', 'subtitle' => 'Descansa, sueña y crea', 'parent' => $parent, 'venues' => $venues, 'images' => $images, 'facilities' => $facilities, 'max_pax' => $max_pax]);
    }

    public function residencias(Request $request)
    {
        $parent = new \StdClass();
        $parent->name = 'Zona Residencial';
        $parent->main_text = 'Tranquilidad, seguridad y plenitud rodeado de la naturaleza.
      Viviendas unifamiliares dúplex, remodeladas y listas para ocupar.';
        $parent->secondary_text = '';
        $parent->latitude = 8.9989308934125;
        $parent->longitude = - 79.583345960991;

        $venue_1 = new \StdClass();
        $venue_1->id = urlencode('Modelo 300 abajo dúplex');
        $venue_1->name = 'Modelo 300 abajo dúplex';
        $venue_1->fixed_image = '300-abajo.jpg';
        $venue_1->designs = '';
        $venue_1->type = 'Vivienda';
        $venue_1->hour_fee = 0;
        $venue_1->mid_day_fee = 0;
        $venue_1->all_day_fee = 0;
        $venue_1->rooms = 2;
        $venue_1->open_area = 0;
        $venue_1->closed_area = 151.93;
        $venue_1->seasonal_hour_fee = 0;
        $venue_1->seasonal_mid_day_fee = 0;
        $venue_1->seasonal_all_day_fee = 0;
        $venue_1->monthly_fee = 1000;
        $venue_1->seasonal_monthly_fee = 0;

        $venue_2 = new \StdClass();
        $venue_2->id = urlencode('Modelo 300 arriba');
        $venue_2->name = 'Modelo 300 arriba';
        $venue_2->fixed_image = '300-arriba.jpg';
        $venue_2->designs = '';
        $venue_2->type = 'Vivienda';
        $venue_2->hour_fee = 0;
        $venue_2->mid_day_fee = 0;
        $venue_2->all_day_fee = 0;
        $venue_2->rooms = 3;
        $venue_2->open_area = 0;
        $venue_2->closed_area = 154.06;
        $venue_2->seasonal_hour_fee = 0;
        $venue_2->seasonal_mid_day_fee = 0;
        $venue_2->seasonal_all_day_fee = 0;
        $venue_2->monthly_fee = 1200;
        $venue_2->seasonal_monthly_fee = 0;

        $venue_3 = new \StdClass();
        $venue_3->id = urlencode('Coroneles');
        $venue_3->name = 'Coroneles';
        $venue_3->fixed_image = 'coroneles.jpg';
        $venue_3->designs = '';
        $venue_3->type = 'Vivienda';
        $venue_3->hour_fee = 0;
        $venue_3->mid_day_fee = 0;
        $venue_3->all_day_fee = 0;
        $venue_3->rooms = 3;
        $venue_3->open_area = 0;
        $venue_3->closed_area = 446.58;
        $venue_3->seasonal_hour_fee = 0;
        $venue_3->seasonal_mid_day_fee = 0;
        $venue_3->seasonal_all_day_fee = 0;
        $venue_3->monthly_fee = 1600;
        $venue_3->seasonal_monthly_fee = 0;

        $venues = [$venue_1, $venue_2, $venue_3];

        $max_pax = 0;
        $facilities = null;

        $images = ['/assets/images/residencies/hero-1.jpg', '/assets/images/residencies/hero-2.jpg', '/assets/images/residencies/hero-3.jpg', '/assets/images/residencies/hero-4.jpg', '/assets/images/residencies/hero-5.jpg'];
        /*if ($venue_images->count() > 0) {
        foreach ($venue_images as $image) {
        $images[] = image_url('storage/venues/' . $image->path);
        }
        } else {
        $images = ['/assets/images/placeholder-image.jpg'];
        }*/

        return view('venues.venue', ['page_title' => 'Servicios - Residencias', 'venue' => 'residencias', 'venueName' => 'Residencias', 'subtitle' => 'Vive con la naturaleza', 'parent' => $parent, 'venues' => $venues, 'images' => $images, 'facilities' => $facilities, 'max_pax' => $max_pax, 'show_shortcuts' => false, 'show_menu' => false, 'show_policies' => false, 'show_not_included' => false, 'type' => 'residencias', ]);
    }

    public function oferta(Request $request)
    {
        $type = $request->type;
        $quantity = $request->quantity;
        $daterange = $request->daterange;
        $how = $request->how;

        if ($quantity)
        {
            session()->put('00N3m00000QMsCA', $quantity);
        }

        $quantities = [];
        switch ($quantity)
        {
            case 'Entre 1 y 25 personas':
                $quantities = [1, 25];
            break;
            case 'Entre 26 y 50 personas':
                $quantities = [26, 50];
            break;
            case 'Entre 51 y 100 personas':
                $quantities = [51, 100];
            break;
            case 'Entre 101 y 200 personas':
                $quantities = [101, 200];
            break;
            case 'Entre 201 y 500 personas':
                $quantities = [201, 500];
            break;
            case 'Más de 500 personas':
                $quantities = [500, 'Más'];
            break;
        }

        $from = new \DateTime(substr($daterange, 0, 10));
        $to = new \DateTime(substr($daterange, -10));

        $ids = [];
        $designs = DB::table('venues_designs')->select('venues.id')
            ->join('venues', 'venues.id', '=', 'venues_designs.venue_id');

        $event_type = [];
        switch ($type)
        {
            case 'Convención':
            case 'Seminario':
            case 'Conferencia':
            case 'Coctel/Evento Social':
                $event_type = ['Salas de eventos', 'Salas de eventos'];
            break;
            case 'Otros':
                $event_type = ['Salas de reuniones', 'Salas de eventos'];
            break;
        }

        if ($event_type)
        {
            $designs->whereIn('venues.type', $event_type);
        }

        if ($quantities)
        {
            $designs->where('venues_designs.max_pax', '>=', $quantities[0]);
            if ($quantities[0] != 500)
            {
                $designs->where('venues_designs.max_pax', '<=', $quantities[1]);
            }
        }
        $designs = $designs->get();

        if ($designs->count() > 0)
        {
            foreach ($designs as $design)
            {
                if (!in_array($design->id, $ids))
                {
                    $ids[] = $design->id;
                }
            }
        }

        $venues = [];
        if (count($ids) > 0)
        {
            $venues = Venue::whereIn('id', $ids)->where('show_on_website', 'Si');

            $isUser = session()->get('is-cds-user', false);
            $userEmail = session()->get('cds-user-email', null);

            if ($isUser == false || strpos($userEmail, '@cdspanama.org') == false)
            {
                $venues->whereNotIn('parent_id', ['02i3m0000092sJmAAI', // E-104
                '02i3m0000092sIyAAI', // E-109
                '02i3m0000092s8rAAA', // E-300
                ]);
            }

            $venues = $venues->get();
        }

        return view('index.venues', ['page_title' => 'Servicios - Oferta', 'venue' => 'inicio', 'venueName' => 'Oferta', 'venues' => $venues, 'type' => $type, 'quantity' => implode(' - ', $quantities) , 'daterange' => $daterange, 'from' => $from->format('d-m-Y') , 'to' => $to->format('d-m-Y') , 'how' => $how]);
    }

    public function venue(Request $request)
    {
        return view('index.venue', ['page_title' => 'Servicios - Venue', 'venue' => 'inicio', ]);
    }

    public function request(Request $request)
    {
        if($request->has('reagendar'))
        {
        $id = $request->input('id');
        session(['00N3m00000Pb23w'=> $id ]);
        $request->id = $id;
        $franja = $request->input('franja');
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $company = $request->input('company');
        $value = $request->input('00N3m00000QQOde');
        session(['00N3m00000Qpiz4'=> $request->input('flexipage')]);
        session(['ReservasSeleccionadas'=> null]);
        setcookie('first_name',  $first_name, time() + (86400 * 365 * 5), "/");
                    setcookie('last_name', $last_name, time() + (86400 * 365 * 5), "/");
                    setcookie('email', $email, time() + (86400 * 365 * 5), "/");
                    setcookie('phone', $phone, time() + (86400 * 365 * 5), "/");
                    setcookie('company', $company, time() + (86400 * 365 * 5), "/");
                    setcookie('00N3m00000QQOde', $value, time() + (86400 * 365 * 5), "/");
                    $inputs['country_code'] = 'PA';
                    $inputs['want_to_do'] = 'event';
        }

        $step = $request->step;
        $stepName = 'Solicitud de cotización';
        $form_url = '';
        $file_upload = false;
        $venueId = session()->get('00N3m00000Pb23w');
        if (!$venueId)
        {
        if($venueId != $request->id)
        {
           $venueId = $request->id;
        }
        }
        $venue = null;
        $designs = [];
        if ($venueId)
        {
            session(['00N3m00000Pb23w'=> $venueId]);
            $venue = Venue::find($venueId);
            if ($venue)
            {
                $designs = VenueDesign::where('venue_id', $venue->id)
                    ->orderBy('layout', 'asc')
                    ->get();
                    $rootid = $venue;
            }
        }

        $venuesgrupo = [];
        
        switch ($step)
        {
            case 'datos-contacto':
                $step = 1;
                $stepName = 'Datos de contacto';
                // TODO: ESTO NO SE SI ES NECESARIO - LAS 3 LINEAS QUE SIGUEN
            //    $venuep = Venue::find($venue->parent_id);
            //    $venuesgrupo = Venue::where('parent_id', '=', $venuep->id)->get();
            //    $rootid = Venue::where('parent_id', '=', $venuep->parent_id)->first();
            $rootid->id = null;

            if(isset($_COOKIE['first_name'])) { session(['first_name'=> $_COOKIE['first_name']]); }
            if(isset($_COOKIE['last_name'])) { session(['last_name'=> $_COOKIE['last_name']]); }
            if(isset($_COOKIE['email'])) { session(['email'=> $_COOKIE['email']]); }
            if(isset($_COOKIE['phone'])) { session(['phone'=> $_COOKIE['phone']]); }
            if(isset($_COOKIE['company'])) { session(['company'=> $_COOKIE['company']]); }
            if(isset($_COOKIE['00N3m00000QQOde'])) { session(['00N3m00000QQOde'=> $_COOKIE['00N3m00000QQOde']]); }
            
            session(['00N3m00000QeGyG'=> 'Adulto']);
            if($request->id)
            {
            if($venueId != $request->id)
        {
            session(['ReservasSeleccionadas'=> null]);
             
        }
        }
        //    session(['ReservasSeleccionadas'=> null]);
                // TODO: VERIFICAR QUE NO DE PROBLEMA 
                if ($request->isMethod('post'))
                {
                    $inputs = $request->validate(['first_name' => 'required|string', 'last_name' => 'nullable|string', 'email' => 'required|string|email', 'phone' => 'required|string', 'company' => 'nullable|string',
                    //'country_code' => 'nullable|string',
                    //'want_to_do' => 'nullable|string',
                    '00N3m00000QQOde' => 'nullable|string', ]);

                    switch ($request->id)
                    {
                        case 'Modelo 300 abajo dúplex':
                        case 'Modelo 300 arriba':
                        case 'Coroneles':
                            $inputs['want_to_do'] = 'residency';
                        break;
                        default:
                            $inputs['want_to_do'] = 'event';
                        break;
                    }

                    $inputs['country_code'] = 'PA';
                    $inputs['franja'] = request()->query('franja', session()->get('franja','sin-franja'));
                    
                    if(session()->get('franja') != $inputs['franja'] && $inputs['franja'] != 'sin-franja')
                    {
                        session(['ReservasSeleccionadas'=> null]);
                    }
                    setcookie('first_name',  $request->first_name, time() + (86400 * 365 * 5), "/");
                    setcookie('last_name', $request->last_name, time() + (86400 * 365 * 5), "/");
                    setcookie('email', $request->email, time() + (86400 * 365 * 5), "/");
                    setcookie('phone', $request->phone, time() + (86400 * 365 * 5), "/");
                    setcookie('company', $request->company, time() + (86400 * 365 * 5), "/");
                    setcookie('00N3m00000QQOde', $request['00N3m00000QQOde'], time() + (86400 * 365 * 5), "/");
                    
                    session($inputs);

                    return redirect()->to($inputs['want_to_do'] == 'event' ? '/cotizacion/datos-evento' : '/cotizacion/datos-residencia');
                }

            break;
            case 'datos-evento':
                $venuep = Venue::find($venue->parent_id);

             //   $rootid = Venue::where('parent_id', '=', $venuep->parent_id)->first();
                $rootid = Venue::find($venuep->parent_id);
            //    echo 'Venues: ' . $venuesgrupo;
                switch ($venuep->parent_id) {
	                case '02i3m00000D9DaPAAV':
                    //TODO: VERIFICAR SI ES CONSULTIVA
		                $step = '2-p';
                        switch(session()->get('franja'))
                        {
                        case 'mes':
                            if($venuep->id == '02i3m00000Didu7AAB')
                            {
                            $venuesgrupo = Venue::where('parent_id', '=', $venuep->id)->where('show_on_website', '=', 'Si')->where('monthly_fee', '>', 0)->orderBy('name','asc')->get();
                            }
                            else
                            {
                            $venuesgrupo = Venue::where('id', '=', $venue->id)->where('show_on_website', '=', 'Si')->where('monthly_fee', '>', 0)->orderBy('name','asc')->get();
                            }
                            break;
                        case 'medio':
                            $venuesgrupo = Venue::where('parent_id', '=', $venuep->id)->where('show_on_website', '=', 'Si')->where('mid_day_fee', '>', 0)->orderBy('name','asc')->get();
                            break;
                        case 'dia':
                        $venuesgrupo = Venue::where('parent_id', '=', $venuep->id)->where('show_on_website', '=', 'Si')->where('all_day_fee', '>', 0)->orderBy('name','asc')->get();
                            //$venuesgrupo = Venue::where('parent_id', '=', $venuep->id)->where('show_on_website', '=', 'Si')->where(function($query) { $query->where('all_day_fee', '>', 0)->orWhere('hour_fee', '>', 0);})->orderBy('name','asc')->get();
                            break;
                        default:
                           $venuesgrupo = Venue::where('parent_id', '=', $venuep->id)->where('show_on_website', '=', 'Si')->where('hour_fee', '>', 0)->orderBy('name','asc')->get();
                        }
                        
		                break;
	                default:
		                $step = '2';
                        $venuesgrupo = Venue::where('parent_id', '=', $venuep->id)->where('show_on_website', '=', 'Si')->orderBy('name','asc')->get();
		                break;
                }

             $venue_ids = $venuesgrupo->pluck('id')->toArray();   
             $venue_images = VenueFile::whereIn('venue_id', $venue_ids)->first();

        foreach ($venuesgrupo as $venueAX) {
            $images = $venue_images->where('venue_id', $venueAX->id);
            if ($images->count() > 0)
            {

                $this_image = $images->pluck('path')->first();
                $this_image = substr($this_image, 0, strpos($this_image, '.')) . '_480.' . substr($this_image, strpos($this_image, '.') + 1);
                $venueAX->image = image_url('storage/venues/' . $this_image);
            }
            else
            {
                $venueAX->image = image_url('/assets/images/placeholder-image.jpg');
            }
        }

     //   $images = [];
    //   if ($venue_images->count() > 0)
     //   {
    //        foreach ($venue_images as $image)
    //        {
    //            $images[] = image_url('storage/venues/' . $image->path);
    //        }
   //     }
    //    else
     //   {
     //       $images[] = '/assets/images/placeholder-image.jpg';
    //   }

                $stepName = 'Datos de tu evento';
                $file_upload = true;

                if ($request->isMethod('post'))
                {
                   if($step == '2')
                   {
                        $inputs = $request->validate(['00N3m00000QQOdA' => 'required|string', '00N3m00000QMsCF' => 'required|string', '00N3m00000QMsCA' => 'required|string', '00N3m00000QMsC5' => 'required|string', '00N3m00000QMwta' => 'required|string', '00N3m00000QMwtf' => 'required|string', '00N3m00000QMwta-hour' => 'required|string', '00N3m00000QMwtf-hour' => 'required|string', '00N3m00000QQOdy' => 'nullable|string', '00N3m00000QMsCK' => 'required|string', '00N3m00000QMsCP' => 'required|string', '00N3m00000QMzL7' => 'nullable|string', '00N3m00000QQOe8' => 'nullable|string', 'description' => 'required|string', ]);
                   }
                     else
                   {
                        if($request['ReservasSeleccionadas'] == '[]')
                        {
                            $request['ReservasSeleccionadas'] = null;
                        }
                        if($venuep->id == '02i3m00000DiduVAAR')
                            $inputs = $request->validate([ 'description' => 'required|string', 'ReservasSeleccionadas' => 'required|string' ]);
                        else
                            $inputs = $request->validate(['ReservasSeleccionadas' => 'required|string' ]);
                        //return redirect()->back()->withInput();
                     //   $inputs['ReservasSeleccionadas'] = ($inputs['ReservasSeleccionadas']); 
                        //$inputs['ReservasSeleccionadas'] = json_encode(str_replace('"', "'", $inputs['ReservasSeleccionadas'])); 
                   }
                   if(isset($request['description'])) 
                        $inputs['description'] = $request['description'] ;
                    switch ($venuep->parent_id) {
	                case '02i3m00000D9DaPAAV':
                    //<input type="hidden" name="00N3m00000QeH7c" id="00N3m00000QeH7c" value='Reserva desatendida'/> TODO: VERIFICAR SI ES CONSULTIVA
                        $inputs['00N3m00000QeGyG'] = $request['00N3m00000QeGyG'] ;
		                $inputs['recordType'] = '0123m000001AzQ4';
		                break;
	                default:
		                $inputs['recordType'] = '0123m0000012tH4';
		                break;
                    }
                    // RECUERDA EL DUPLICATE RULE DONDE TIENES QUE EXCLUIR EL RECORD TYPE QUE ESTÉS AGREGANDO
                    

                    $uploaded_files = [];
                    if ($request->hasFile('file'))
                    {
                        foreach ($request->allFiles('file') as $files)
                        {
                            foreach ($files as $index => $file)
                            {
                                if ($index <= 2)
                                {
                                    $filename = $file->getClientOriginalName();
                                    $filepath = time() . '-' . rand(100000, 999999) . '-' . $filename;
                                    $uploaded_files[] = ['name' => $filename, 'path' => url('/storage/requests/' . $filepath) ];

                                    $file->storeAs('public/requests', $filepath);
                                }
                            }
                        }
                        $inputs['files'] = $uploaded_files;
                    }
                   // session(['ReservasSeleccionadas' => json_encode($inputs['ReservasSeleccionadas'])]);
                    session($inputs);
                    return redirect()->to('/cotizacion/vista-previa');
                }
            break;
            case 'vista-previa':
                $venuep = Venue::find($venue->parent_id);
                $rootid = Venue::find($venuep->parent_id);
               // $venuesgrupo = Venue::where('parent_id', '=', $venuesgrupo)->get();
                $step = 3;
                $stepName = 'Vista previa';
                $esEmpleado = session()->has('is-cds-user') ? session()->get('is-cds-user') : false;
                $esCliente = session()->has('is-cds-customer') ? session()->get('is-cds-customer') : false;
                switch ($venuep->parent_id) {
	                case '02i3m00000D9DaPAAV':
                    $selVenues = session('ReservasSeleccionadas');
                    $reservas = json_decode(session('ReservasSeleccionadas'));

                    $recargoNoche = Rates::where('name', '=', 'Recargo - Noche')->first();
                    $recargoFin = Rates::where('name', '=', 'Recargo - Fin de semana')->first();
                    $recargoFeriado = Rates::where('name', '=', 'Recargo - Feriado')->first();


                    if($esEmpleado)
                    {
                        $descuentoColaboradores = Rates::where('name', '=', 'Descuento - Colaboradores')->first()->percentage;
                        $descuentoResidente = 0.00;
                    } else
                    {
                        $descuentoColaboradores = 0.00;
                        if($esCliente)
                        {
                            $descuentoResidente = Rates::where('name', '=', 'Descuento - Residente')->first()->percentage;
                        } else
                        {
                            $descuentoResidente = 0.00;
                        }
                    }
                    if(session()->get('00N3m00000QeGyG') == 'Jubilado')
                    {
                        $descuentoJubilados = Rates::where('name', '=', 'Descuento - Jubilados')->first()->percentage;
                        $descuentoNinos = 0.00;
                    } else
                    {
                        $descuentoJubilados = 0.00;
                        if(session()->get('00N3m00000QeGyG') == 'Niño')
                        {
                            $descuentoNinos = Rates::where('name', '=', 'Descuento - Niños')->first()->percentage;
                        } else
                        {
                            $descuentoNinos = 0.00;
                        }
                    }

                    
                    $costoTotal = 0;
                    
                    $debugCalculo = "";
                    $venuesdia = "";
                    $venuesmes = "";
                    // si ambos son false, entonces es visitante
                    foreach ($reservas as $reserva) {
                    $debugCalculo = $debugCalculo . "\r\nFranja:" . session()->get('franja') . "\r\n";
                    $idActual = $reserva->id;
                    $fechaActual = $reserva->fecha;
                    $fechaActualCarbon = Carbon::parse($fechaActual);
                    $fechaActualCarbon->addHours(5);

                    // Si deseas actualizar el campo fecha en el objeto reserva
                    $fechaActual = $fechaActualCarbon;
                    $horaInicio = substr($idActual, 7, 2);
                    $sfAssetId = substr($idActual, 9);

                    $debugCalculo = $debugCalculo . " " . $sfAssetId;

                    $thisVenue = Venue::where('id', '=', $sfAssetId)->first();

                    $costoHora = $thisVenue->hour_fee;
                    $costoMedio = $thisVenue->mid_day_fee; // MUY PROBABLE NO SE UTILICE
                    $costoDia = $thisVenue->all_day_fee;
                    $costoMes = $thisVenue->monthly_fee;


                    //TODO: DEFINIR OTROS CALCULOS - MODIFICAR FORMULARIO STEP 1
                    $calcular = true;

                    switch(session()->get('franja'))
                    {
                        case 'mes':
                            if(strpos($venuesmes, $sfAssetId) === false){
                                $venuesmes .= $sfAssetId;
                            } else { $calcular = false; }
                            $tarifaUsar = $costoMes;
                            break;
                        case 'medio':
                            //if(strpos($venuesmedio, $fechaActual.$sfAssetId) === false){
                            //    $venuesmedio .= $fechaActual.$sfAssetId;
                            //} else { $calcular = false; }
                            $tarifaUsar = $costoDia;
                            break;
                        case 'dia':
                            $tarifaUsar = $costoDia;
                            if($tarifaUsar == 0)
                            {
                                $tarifaUsar = $costoHora;
                            } else
                            {
                              if(strpos($venuesdia, $fechaActual.$sfAssetId) === false){
                                $venuesdia .= $fechaActual.$sfAssetId;
                            } else { $calcular = false; }
                            }
                            break;
                        default:
                            $tarifaUsar = $costoHora;
                            if($tarifaUsar == 0)
                            {
                                $tarifaUsar = $costoDia;
                                if(strpos($venuesdia, $fechaActual.$sfAssetId) === false){
                                $venuesdia .= $fechaActual.$sfAssetId;
                            } else { $calcular = false; }
                            }
                    }
                    if($calcular)
                    {
                    if($thisVenue->employeediscount)
                    {
                        $tarifaUsar = $tarifaUsar * (1.0 + ($descuentoColaboradores/100));
                    }
                    if($thisVenue->residentdiscount)
                    {
                        $tarifaUsar = $tarifaUsar * (1.0 + ($descuentoResidente/100));
                    }
                    if($thisVenue->retireddiscount)
                    {
                        $tarifaUsar = $tarifaUsar * (1.0 + ($descuentoJubilados/100));
                    }
                    if($thisVenue->kidsdiscount)
                    {
                        $tarifaUsar = $tarifaUsar * (1.0 + ($descuentoNinos/100));
                    }

                    $debugCalculo = $debugCalculo . " Esta tarifa:" . $tarifaUsar;
                    
                    $recargo = false;
                    if($thisVenue->nightcharge)
                    {
                        if($horaInicio > 16)
                        {
                            $recargo = true;
                            $reserva->recargo = "Noche";
                            $debugCalculo = $debugCalculo . " noche";
                            $tarifaUsar = $tarifaUsar + $tarifaUsar * $recargoNoche->percentage / 100;
                        }
                    }       

                    if($thisVenue->weekendcharge && !$recargo)
                    {
                    $diaSemana = date("w", strtotime($fechaActual));

                    if ($diaSemana == 6) {
                        $recargo = true;
                        $reserva->recargo = "Sábado";
                        $debugCalculo = $debugCalculo . " sabado";
                        $tarifaUsar = $tarifaUsar + $tarifaUsar * $recargoFin->percentage / 100;
                    } else if ($diaSemana == 0) {
                        $recargo = true;
                        $reserva->recargo = "Domingo";
                        $debugCalculo = $debugCalculo . " domingo";
                        $tarifaUsar = $tarifaUsar + $tarifaUsar * $recargoFin->percentage / 100;
                    }
                    } 

                    if($thisVenue->holidaycharge  && !$recargo)
                    {
                        $libre = Holidays::where('fecha', '=', $fechaActualCarbon->format('Y-m-d'))->first();
                        if($libre != null)
                        {
                            $recargo = true;
                            $reserva->recargo = "Feriado";
                            $debugCalculo = $debugCalculo . " feriado";
                            $tarifaUsar = $tarifaUsar + $tarifaUsar * $recargoFeriado->percentage / 100;
                        }
                    }

                    } else { $tarifaUsar = 0; }
                    //$debugCalculo .= "Ajustada: " . $tarifaUsar . " calcular: " . $calcular;

                    $reserva->subtotal = $tarifaUsar;
                    $costoTotal = $costoTotal + $tarifaUsar;

                    } // este es el end del foreach

                    $formatted_costoTotal = number_format($costoTotal, 2, '.', ',') ;

                        
                        $estimacion = $formatted_costoTotal;
                     //   $estimacion = $estimacion . "\r\n" . $debugCalculo . $horaInicio . "\r\n" . $fechaActualCarbon->format('Y-m-d');
                     session(['ReservasSeleccionadas' => json_encode($reservas)]);
		            break;
                }
                
                if($esEmpleado)
                    session()->put('00N3m00000QeHcG', 'Colaborador');
                elseif($esCliente)
                        session()->put('00N3m00000QeHcG', 'Cliente');
                    else
                        session()->put('00N3m00000QeHcG', 'Visitante');
                $form_url = 'https://webto.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8';
                session()->put('00N3m00000QeGlb', session()->getId() . '-' . time());
            break;
            case 'solicitud-enviada':
             // return view('index.request', ['page_title' => 'Servicios - Cotización - ' . $stepName, 'step' => '4-p', 'venue' => $venue, 'designs' => null, 'file_upload' => null, 'form_url' => null, 'grupos' => null, 'rootid' => null, 'estimacion' => null]);
                $venuep = Venue::find($venue->parent_id);
                $rootid = Venue::where('parent_id', '=', $venuep->parent_id)->first();
               // $venuesgrupo = Venue::where('parent_id', '=', $venuesgrupo)->get();
                        $isUser = session()->get('is-cds-user', false);
                        $userEmail = session()->get('cds-user-email', null);
                        $isCustomer = session()->get('is-cds-customer', false);
                        $first_name = session()->get('first_name', null);
                        $last_name = session()->get('last_name', null);
                        $email = session()->get('email', null);
                        $phone = session()->get('phone', null);
                        $company = session()->get('company', null);
                        $idenruc = session()->get('00N3m00000QQOde', null);
                        $thisSession = session()->get('00N3m00000QeGlb', null);
                        session()->flush();
                        session()->put('is-cds-user', $isUser);
                        session()->put('cds-user-email', $userEmail);
                        session()->put('is-cds-customer', $isCustomer);
                        session()->put('first_name', $first_name);
                        session()->put('last_name', $last_name);
                        session()->put('email', $email);
                        session()->put('phone', $phone);
                        session()->put('company', $company);
                        session()->put('00N3m00000QQOde', $idenruc);
                        session()->put('00N3m00000QeGlb', $thisSession);
                switch ($venuep->parent_id) {
	                case '02i3m00000D9DaPAAV':
                    $step = '4-p';
                    $form_url = '/solicitud-pago';
                        break;
                    default:
                        $step = '4';
                        break;
                }
                $stepName = 'Solicitud enviada';
            break;
            case 'datos-hospedaje':
                $step = 5;
                $stepName = 'Datos de tu hospedaje';
            break;
            case 'datos-residencia':
                $step = 6;
                $stepName = 'Datos de tu residencia';

                if ($request->isMethod('post'))
                {
                    $inputs = $request->validate(['00N3m00000QMzL7' => 'required|string', '00N3m00000QMzLH' => 'required|string', '00N3m00000QMwta' => 'required|string', '00N3m00000QMzLC' => 'required|string', 'work-in-campus' => 'required|string', '00N3m00000QMzLM' => 'nullable|string', '00N3m00000QMzLR' => 'nullable|string', '00N3m00000QMzLW' => 'nullable|string', ]);

                    $inputs['00N3m00000Pb6zh'] = session()->get('00N3m00000Pb23w');
                    $inputs['recordType'] = '0121N000001AmUK';

                    session($inputs);
                    return redirect()->to('/cotizacion/vista-previa');
                }
            break;
        }

        if ($request->id)
        {
            session(['00N3m00000Pb23w' => $request->id]);
        }

        if ($venuesgrupo)
        {
            foreach ($venuesgrupo as $venueAX)
            {
                $venueAX->name = str_ireplace("Parque CDS - " , "", $venueAX->name);
                $venueAX->name = str_ireplace("GYM-" , "", $venueAX->name);
                $venueAX->name = str_ireplace("CANCHA TENIS" , "TENIS", $venueAX->name);
            }
        }
        if(!isset($estimacion))
            $estimacion = "";
       // $venue->name = $venueId;
        return view('index.request', ['page_title' => 'Servicios - Cotización - ' . $stepName, 'parentid' => $venue->parent_id,'step' => $step, 'venue' => $venue, 'designs' => $designs, 'file_upload' => $file_upload, 'form_url' => $form_url, 'grupos' => $venuesgrupo, 'rootid' => $rootid->id, 'estimacion' => $estimacion]);
    }

    public function acceptQuote(Request $request)
    {
        $quote = [];
        $opportunity = [];
        $success = false;
        $debugstage = "";

        try
        {
            if ($request->token)
            {
                $salesforce = $this->salesforce();
                $quote = $salesforce->query("SELECT 
          Id, OpportunityId, Status
        FROM Quote 
        WHERE Id = '{$request->token}'");
                $debugstage = "SELECT de Quote:{$request->token}";

                if ($quote['totalSize'] > 0)
                {
                    $opportunity = $salesforce->query("SELECT 
            Id, StageName, Name, ContactId
          FROM Opportunity 
          WHERE Id = '{$quote['records'][0]['OpportunityId']}'");
                    $debugstage = "SELECT de Opportunity";
                    if ($opportunity['totalSize'] > 0)
                    {
                        if (($quote['records'][0]['Status'] == 'Presented' || $quote['records'][0]['Status'] == 'Accepted') && $opportunity['records'][0]['StageName'] == 'Negociación')
                        {
                            $salesforce->update('Quote', $request->token, ['Status' => 'Accepted']);
                            $debugstage = "UPDATE de Quote";
                            $contact = $salesforce->query("SELECT 
                    Id, Email
                  FROM Contact 
                  WHERE Id = '{$opportunity['records'][0]['ContactId']}'");
                            $debugstage = "SELECT de Contact";
                            $email = null;
                            if ($contact['totalSize'] > 0)
                            {
                                $email = $contact['records'][0]['Email'];
                            }

                            if ($email && strpos($email, '@cdspanama.org') > 0)
                            {
                                $salesforce->update('Opportunity', $quote['records'][0]['OpportunityId'], ['StageName' => 'Closed Won', 'Closing_comments__c' => 'Marcada como ganada automáticamente por sistema al ser un evento solicitado por un colaborador de la FCDS.']);
                            }
                            else
                            {
                                $salesforce->update('Opportunity', $quote['records'][0]['OpportunityId'], ['StageName' => 'Aceptación de propuesta']);
                                $debugstage = "UPDATE de Opportunity";
                            }
                            $success = true;
                        }
                    }
                }
            }
        }
        catch(\Exception $e)
        {
            $debugstage = $debugstage . " Error: " . $e->getMessage();
            $success = false;
        }

        return view('index.quote', ['type' => 'acceptance', 'quote' => $quote && $quote['records'] ? $quote['records'][0] : null, 'opportunity' => $opportunity && $opportunity['records'] ? $opportunity['records'][0] : null, 'success' => $success, 'debugstage' => $debugstage, ]);
    }

    public function rejectQuote(Request $request)
    {
        $quote = [];
        $opportunity = [];
        $success = false;

        try
        {
            if ($request->token)
            {
                $salesforce = $this->salesforce();
                $quote = $salesforce->query("SELECT 
            Id, OpportunityId, Status
          FROM Quote 
          WHERE Id = '{$request->token}'");

                if ($quote['totalSize'] > 0)
                {
                    $opportunity = $salesforce->query("SELECT 
              Id, StageName, Name 
            FROM Opportunity 
            WHERE Id = '{$quote['records'][0]['OpportunityId']}'");

                    if ($opportunity['totalSize'] > 0)
                    {
                        if ($quote['records'][0]['Status'] == 'Presented' && $opportunity['records'][0]['StageName'] == 'Negociación')
                        {
                            $salesforce->update('Quote', $request->token, ['Status' => 'Denied']);
                            $salesforce->update('Opportunity', $quote['records'][0]['OpportunityId'], ['StageName' => 'Closed Lost']);
                            $success = true;
                        }
                    }
                }
            }
        }
        catch(\Exception $e)
        {
            $success = false;
        }

        return view('index.quote', ['type' => 'rejection', 'quote' => $quote && $quote['records'] ? $quote['records'][0] : null, 'opportunity' => $opportunity && $opportunity['records'] ? $opportunity['records'][0] : null, 'success' => $success, ]);
    }

    public function docuSignPayment(Request $request)
    {
        $success = false;
        $total = 0;
        $event_name = '';
        $opportunity = '';
        $payments = [];

        if ($request->token)
        {
            if ($request->isMethod('post'))
            {
                $endpoint = env('APP_ENV') == 'production' ? 'https://secure.paguelofacil.com/LinkDeamon.cfm' : 'https://sandbox.paguelofacil.com/LinkDeamon.cfm';
                if(substr($request->token, 0, 3) != '00Q')
                {
                    // COMERCIAL
                    $p1 = $request->opportunity;
                    $ev_nm = $request->event_name;
                    $tokenPF = '588BA57F825D6D9F6E230C2F39C94ACE84369A887E899DE043924E0122C38FF6';
                } else
                {
                    // PARQUE
                    $p1 = $request->opportunity;
                    $ev_nm = 'Pago de reserva';
                    $tokenPF = '64A597C71811ACE965C8FDA4F27D28ED69A0541DA15F41C62DEB5B459A253212477A9E16864EF2EA1C76BB7414E9685A4F00934CA22BA0F6D28166C1DCA91597';
                }
                $params = ['CCLW' => $tokenPF, 'CMTN' => $request->total, 'CDSC' => $ev_nm, 'RETURN_URL' => bin2hex(url('/confirmacion-pago/' . $request->token)) , 'PARM_1' => $request->opportunity, ];

                $pay_url = $endpoint . '?' . http_build_query($params);
                return redirect()->to($pay_url);
            }

            $salesforce = $this->salesforce();

            if(substr($request->token, 0, 3) != '00Q')
            {

            $query = "SELECT 
        Id, Gran_Total__c, TotalPrice, Subtotal, Name, Oportunidad__c
        FROM ServiceContract 
        WHERE Id = '{$request->token}'";

            $result = $salesforce->query($query);
            if ($result['totalSize'] > 0)
            {
                $success = true;
                $total = $result['records'][0]['Gran_Total__c'];
                $event_name = $result['records'][0]['Name'];
                $opportunity = $result['records'][0]['Oportunidad__c'];
            }

            $payments = [['concept' => 'Pagar el 50%', 'total' => $total / 2], ['concept' => 'Pagar el 100%', 'total' => $total]];

            $query = "SELECT 
        Id, Monto__c
        FROM Recibo__c 
        WHERE Contrato_de_servicio__c	 = '{$request->token}'";

            $recibos = $salesforce->query($query);
            $pagado = 0;
            if ($recibos['totalSize'] > 0)
            {
                foreach ($recibos['records'] as $recibo)
                {
                    $pagado += $recibo['Monto__c'];
                }
            }

            if ($pagado > 0)
            {
                $payments = [['concept' => 'Pagar el saldo pendiente', 'total' => $total - $pagado, ]];
            }

            }
            else
            {

                        $isUser = session()->get('is-cds-user', false);

                        if($isUser)
                        {
                            $salesforce->update('Lead', $request->token, ['Pago_confirmado__c' => 'true']);
                            return redirect()->to('/confirmacion-pago/' . $request->token);
                        }

                        $userEmail = session()->get('cds-user-email', null);
                        $isCustomer = session()->get('is-cds-customer', false);
                        $first_name = session()->get('first_name', null);
                        $last_name = session()->get('last_name', null);
                        $email = session()->get('email', null);
                        $phone = session()->get('phone', null);
                        $company = session()->get('company', null);
                        $idenruc = session()->get('00N3m00000QQOde', null);
                        session()->flush();
                        session()->put('is-cds-user', $isUser);
                        session()->put('cds-user-email', $userEmail);
                        session()->put('is-cds-customer', $isCustomer);
                        session()->put('first_name', $first_name);
                        session()->put('last_name', $last_name);
                        session()->put('email', $email);
                        session()->put('phone', $phone);
                        session()->put('company', $company);
                        session()->put('00N3m00000QQOde', $idenruc);

            $query = "SELECT Id, Precio_Estimado__c, Pago_confirmado__c, Name, Reserva__c FROM Lead WHERE Id = '{$request->token}'";


        $result = $salesforce->query($query);

            $lead_id = null;
            if ($result['totalSize'] > 0)
            {
                $lead_id = $result['records'][0]['Id'];
                $total = $result['records'][0]['Precio_Estimado__c'];
                $event_name = $result['records'][0]['Name'];
                $opportunity = $result['records'][0]['Reserva__c'];

            }

                 $payments = [ ['concept' => 'Pagar el 100%', 'total' => $total]];

            }
        }

        return view('index.paguelo-facil', ['success' => $success, 'total' => $total, 'event_name' => $event_name, 'opportunity' => $opportunity, 'token' => $request->token, 'otherMethods' => request('other-methods', false) , 'payments' => json_decode(json_encode($payments)) ]);
    }

    public function paymentConfirmation(Request $request)
    {
        $data = [];
        $opportunity = [];

        if ($request)
        {
            $data = $request->all();
            $salesforce = $this->salesforce();

            if(substr($request->token, 0, 3) != '00Q' && substr($request->token, 0, 3) != '001')
            {
            $query = "SELECT 
                        Id, Gran_Total__c, TotalPrice, Subtotal, Name, Oportunidad__c
                        FROM ServiceContract 
                        WHERE Id = '{$request->token}'";

                    $contract = $salesforce->query($query);

            $opportunity_id = null;
            if ($contract['totalSize'] > 0)
            {
                $opportunity_id = $contract['records'][0]['Oportunidad__c'];
            }

            $id = $opportunity_id == $data['PARM_1'] ? $opportunity_id : null;

            $query = "SELECT 
                        Id, Name
                        FROM Opportunity 
                        WHERE Id = '{$id}'";

            $opportunity = $salesforce->query($query);

            if ($opportunity['totalSize'] > 0)
            {
                if (isset($data['Estado']) && substr($data['Estado'], 0, 6) == 'Aproba')
                {
                    $date = new \DateTime(isset($data['date']) ? $data['date'] . ' ' . date('H:i:s') : date('Y-m-d H:i:s'));

                    $uploaded_file = null;
                    if ($request->hasFile('file'))
                    {
                        $file = $request->file('file');
                        $filename = $file->getClientOriginalName();
                        $filepath = time() . '-' . rand(100000, 999999) . '-' . $filename;
                        $uploaded_file = url('/storage/requests/' . $filepath);
                        $file->storeAs('public/requests', $filepath);
                    }

                    $receiptData = ['Confirmado__c' => false, 'Contrato_de_servicio__c' => $request->token, 'Monto__c' => $data['TotalPagado'], 'Soporte__c' => $uploaded_file, 'Numero_de_transaccion__c' => $data['Oper'], 'Fecha_de_pago__c' => $date->format('Y-m-d\TH:i:s.000\Z') , 'Tipo__c' => (isset($data['method']) ? $data['method'] : 'Páguelo Fácil') ];

                    $query = "SELECT 
                                Id
                                FROM Order 
                                WHERE Service_Contract__c = '{$request->token}'";

                    $invoice = $salesforce->query($query);
                    if ($invoice['totalSize'] > 0)
                    {
                        $receiptData['Factura__c'] = $invoice['records'][0]['Id'];
                    }

                    $receiptId = $salesforce->create('Recibo__c', $receiptData);
                    $data['Fecha'] = $date->format('Y-m-d');
                    $data['Hora'] = $date->format('H:i:s');
                    $data['method'] = $receiptData['Tipo__c'];

                    if ($receiptId)
                    {
                        $salesforce->update('Opportunity', $id, ['StageName' => 'Closed Won']);
                    }
                }
            }
            return view('index.payment-confirmation', ['data' => $data, 'opportunity' => $opportunity['totalSize'] > 0 ? $opportunity['records'][0] : null]);


     
        }
        else
        {
            if(substr($request->token, 0, 3) != '001')
            {
            $query = "SELECT 
                        Id, Precio_Estimado__c, Pago_confirmado__c, Espacios_que_desea_reservar__c,WebSessionId__c
                        FROM Lead	
                        WHERE Id = '{$request->token}'";

            $lead = $salesforce->query($query);

            $lead_id = null;
            if ($lead['totalSize'] > 0)
            {
             if (isset($data['Estado']) && substr($data['Estado'], 0, 6) == 'Aproba')
                {
                $lead_id = $lead['records'][0]['Id'];
                $concepto = nl2br($lead['records'][0]['Espacios_que_desea_reservar__c']);

            //      $receiptData = ['Confirmado__c' => false, 'Lead__c' => $request->token, 'Monto__c' => $data['TotalPagado'], 'Soporte__c' => $uploaded_file, 'Numero_de_transaccion__c' => $data['Oper'], 'Fecha_de_pago__c' => $date->format('Y-m-d\TH:i:s.000\Z') , 'Tipo__c' => (isset($data['method']) ? $data['method'] : 'Páguelo Fácil') ];

                    $date = new \DateTime(isset($data['date']) ? $data['date'] . ' ' . date('H:i:s') : date('Y-m-d H:i:s'));

                    $uploaded_file = null;
                    if ($request->hasFile('file'))
                    {
                        $file = $request->file('file');
                        $filename = $file->getClientOriginalName();
                        $filepath = time() . '-' . rand(100000, 999999) . '-' . $filename;
                        $uploaded_file = url('/storage/requests/' . $filepath);
                        $file->storeAs('public/requests', $filepath);
                    }
                    if(isset($data['TotalPagado']))
                    {
                        $receiptData = ['Confirmado__c' => false, 'Lead__c' => $lead_id, 'Monto__c' => $data['TotalPagado'], 'Soporte__c' => $uploaded_file, 'Numero_de_transaccion__c' => $data['Oper'], 'Fecha_de_pago__c' => $date->format('Y-m-d\TH:i:s.000\Z') , 'Tipo__c' => (isset($data['method']) ? $data['method'] : 'Páguelo Fácil') ];
                        $receiptId = $salesforce->create('Recibo__c', $receiptData);
                        $data['Fecha'] = $date->format('Y-m-d');
                        $data['Hora'] = $date->format('H:i:s');
                        $data['method'] = $receiptData['Tipo__c'];
                        $data['LeadId'] = $lead_id;
                        $data['Concepto'] = $concepto;
                        if ($receiptId)
                        {
                            $salesforce->update('Lead', $lead_id, ['Pago_confirmado__c' => 'true']);
                        }
                     }
                }  else 
                {
                   $date = new \DateTime(isset($data['date']) ? $data['date'] . ' ' . date('H:i:s') : date('Y-m-d H:i:s'));
                   $data['LeadId'] = "Reservas Parque Ciudad del Saber";
                   $data['Fecha'] = $date->format('Y-m-d');
                   $data['Hora'] = $date->format('H:i:s');
                   $data['Concepto'] = nl2br($lead['records'][0]['Espacios_que_desea_reservar__c']);
                }
            }

                    return view('index.payment-confirmation', ['data' => $data, 'opportunity' => $lead['totalSize'] > 0 ? $lead['records'][0] : null]);
            } else
            {
                // PAGOS DIRECTO A UN ACCOUNT
                $accountId = $request->token;
                $date = new \DateTime(isset($data['date']) ? $data['date'] . ' ' . date('H:i:s') : date('Y-m-d H:i:s'));
                if (isset($data['Estado']) && substr($data['Estado'], 0, 6) == 'Aproba')
                {
                if(isset($data['TotalPagado']))
                {
                    $receiptData = ['Confirmado__c' => false, 'Cliente__c' => $accountId, 'Nombre__c' => $data['Usuario'], 'Email__c' => $data['Email'], 'Monto__c' => $data['TotalPagado'], 'Numero_de_transaccion__c' => $data['Oper'], 'CDSC__c' => $data['CDSC'], 'PARM_1__c' => $data['PARM_1'], 'Fecha_de_pago__c' => $date->format('Y-m-d\TH:i:s.000\Z') , 'Tipo__c' => (isset($data['Tipo']) ? $data['Tipo'] : 'Páguelo Fácil') ];
                    $receiptId = $salesforce->create('Recibo__c', $receiptData);
                    $data['Fecha'] = $date->format('Y-m-d');
                    $data['Hora'] = $date->format('H:i:s');
                    $data['method'] = $receiptData['Tipo__c'];
                    $data['LeadId'] = $accountId;
                    $data['Concepto'] = $data['CDSC'];
                    $opp['Name'] = $data['Usuario'];
                }
            } else 
            {
                $date = new \DateTime(isset($data['date']) ? $data['date'] . ' ' . date('H:i:s') : date('Y-m-d H:i:s'));
                   $data['LeadId'] = "Intento de pago";
                   $data['Fecha'] = $date->format('Y-m-d');
                   $data['Hora'] = $date->format('H:i:s');
                   $data['Concepto'] = $data['PARM_1'];
            }
            return view('index.payment-confirmation', ['data' => $data, 'opportunity' => $opp]);
            }
        }


    }

        
    }
    public function cancelarReserva(Request $request)
    {
        if ($request->isMethod('post'))
        {
            $salesforce = $this->salesforce();
            $salesforce->update('Opportunity', $request->token, ['Closing_comments__c' => 'Cancelado por el cliente desde el link en el Email','StageName' => 'Closed Lost']);
            $request['Cancelado'] = 'Si';
        }
        return view('index.cancelar-reserva', ['data' => $request]);
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

        if ($venue != $venue_id)
        {
            return abort(404);
        }

        $venue = Venue::where('id', $venue)->first();

        if (is_null($venue))
        {
            return abort(404);
        }

        if ($request->isMethod('post'))
        {
            $file = $request->file('file');
            if ($file)
            {
                $filepath = hash('sha256', (Str::random(60) . microtime()));
                $file_extension = $file->getClientOriginalExtension();
                $filename = $filepath . '.' . $file_extension;
                $original_name = $file->getClientOriginalName();

                $venue_file = new VenueFile(['venue_id' => $venue->id, 'token' => $filepath, 'name' => $original_name, 'path' => $filename, 'size' => $file->getSize() , 'type' => 'image', 'mime_type' => $file->getMimeType() , 'sort' => VenueFile::where('venue_id', $venue->id)
                    ->count() ]);
                $venue_file->save();

                $this->resizeImage($file, $filepath . '_2048.' . $file_extension, 2048);
                $this->resizeImage($file, $filepath . '_1440.' . $file_extension, 1440);
                $this->resizeImage($file, $filepath . '_1024.' . $file_extension, 1024);
                $this->resizeImage($file, $filepath . '_720.' . $file_extension, 720);
                $this->resizeImage($file, $filepath . '_480.' . $file_extension, 480);
                $this->resizeImage($file, $filepath . '_240.' . $file_extension, 480);
            }

            return redirect()->to('/galeria/' . $venue->id . '?sessionid=' . urlencode($sessionId));
        }

        $images = VenueFile::where('venue_id', $venue->id)
            ->get();

        return view('venues.gallery', ['images' => $images, 'venue' => $venue, 'sessionid' => urlencode($sessionId) ]);
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

        if ($venue != $venue_id)
        {
            return abort(404);
        }

        $venue = $request->venue;
        $token = $request->token;
        $venue = Venue::where('id', $venue)->first();

        if (is_null($venue))
        {
            return abort(404);
        }

        $image = VenueFile::where('token', $token)->first();
        if ($image)
        {
            Storage::delete('public/venues/' . $image->path);
            Storage::delete('public/venues/' . substr($image->path, 0, strpos($image->path, '.')) . '_2048.' . substr($image->path, strpos($image->path, '.') + 1));
            Storage::delete('public/venues/' . substr($image->path, 0, strpos($image->path, '.')) . '_1440.' . substr($image->path, strpos($image->path, '.') + 1));
            Storage::delete('public/venues/' . substr($image->path, 0, strpos($image->path, '.')) . '_1024.' . substr($image->path, strpos($image->path, '.') + 1));
            Storage::delete('public/venues/' . substr($image->path, 0, strpos($image->path, '.')) . '_720.' . substr($image->path, strpos($image->path, '.') + 1));
            Storage::delete('public/venues/' . substr($image->path, 0, strpos($image->path, '.')) . '_480.' . substr($image->path, strpos($image->path, '.') + 1));
            Storage::delete('public/venues/' . substr($image->path, 0, strpos($image->path, '.')) . '_240.' . substr($image->path, strpos($image->path, '.') + 1));
            $image->delete();
        }

        return redirect()
            ->to('/galeria/' . $venue->id . '?sessionid=' . urlencode($sessionId));
    }

    private function resizeImage($file, $fileNameToStore, $size)
    {
        $resize = Image::make($file)->resize($size, null, function ($constraint)
        {
            $constraint->aspectRatio();
        })
            ->encode('jpg');

        $save = Storage::put("public/venues/{$fileNameToStore}", $resize->__toString());

        if ($save)
        {
            return true;
        }
        return false;
    }

    private function salesforce()
    {
        $salesforce = new \EHAERER\Salesforce\Authentication\PasswordAuthentication(['grant_type' => 'password', 'client_id' => env('SF_CONSUMER_KEY') , 'client_secret' => env('SF_CONSUMER_SECRET') , 'username' => 'dnavas00@hotmail.com', 'password' => '19801980MAFdwvjyJArqvVOiKp9PdmPFFN']);
        $options = [
        'grant_type' => 'password',
        'client_id' => '3MVG9mclR62wycM2Mqd4UzUSZenQRQBsvUMM_N71sEPWjlCO.P.f._icAYjwflXcrUn99V22Y8ws20UMRXCPr', /* insert consumer key here */
        'client_secret' => '21A7AAE37073A238564E7EE3860B9BC04A9ABCB96FB39AF7B200D0655A343C21', /* insert consumer secret here */
        'username' => 'dnavas00@hotmail.com', /* insert Salesforce username here */
        'password' => '19801980MAFdwvjyJArqvVOiKp9PdmPFFN' /* insert Salesforce user password and security token here */
    ];

      //  $salesforce = new \EHAERER\Salesforce\Authentication\PasswordAuthentication($options);
        $salesforce->setEndpoint(getenv('SF_LOGIN_URL'));
    //    $salesforce->setEndpoint('https://login.salesforce.com/');
        $salesforce->authenticate();

        $accessToken = $salesforce->getAccessToken();
        $instanceUrl = $salesforce->getInstanceUrl();

        return new \EHAERER\Salesforce\SalesforceFunctions($instanceUrl, $accessToken);
    }

    public function oneLogin(Request $request)
    {
    if($request->logout == 1)
    {
                        $first_name = session()->get('first_name', null);
                        $last_name = session()->get('last_name', null);
                        $email = session()->get('email', null);
                        $phone = session()->get('phone', null);
                        $company = session()->get('company', null);
                        $idenruc = session()->get('00N3m00000QQOde', null);
                        session()->flush();
                        session()->put('first_name', $first_name);
                        session()->put('last_name', $last_name);
                        session()->put('email', $email);
                        session()->put('phone', $phone);
                        session()->put('company', $company);
                        session()->put('00N3m00000QQOde', $idenruc);
    return redirect()->to('/');
    }
        if ($request->isMethod('post') || env('APP_ENV') == 'staging')
        {
            $inputs = $request->email;
            if($inputs)
            if (strpos($inputs, '@cdspanama.org'))
            {
                        $first_name = session()->get('first_name', null);
                        $last_name = session()->get('last_name', null);
                        $email = session()->get('email', null);
                        $phone = session()->get('phone', null);
                        $company = session()->get('company', null);
                        $idenruc = session()->get('00N3m00000QQOde', null);
                        session()->flush();
                        session()->put('first_name', $first_name);
                        session()->put('last_name', $last_name);
                        session()->put('email', $email);
                        session()->put('phone', $phone);
                        session()->put('company', $company);
                        session()->put('00N3m00000QQOde', $idenruc);
                session()->put('is-cds-user', true);
                session()
                    ->put('cds-user-email', $inputs);

                return redirect()->to('/');
            }

        }
        return view('index.one-login', ['error' => '1']);
    }

    public function portalClientes(Request $request)
    {
        if ($request->isMethod('post') || env('APP_ENV') == 'staging')
        {
            $inputs = $request->email;
            if($inputs)
            if (strpos($inputs, '@'))
            {
                        $first_name = session()->get('first_name', null);
                        $last_name = session()->get('last_name', null);
                        $email = session()->get('email', null);
                        $phone = session()->get('phone', null);
                        $company = session()->get('company', null);
                        $idenruc = session()->get('00N3m00000QQOde', null);
                        session()->flush();
                        session()->put('first_name', $first_name);
                        session()->put('last_name', $last_name);
                        session()->put('email', $email);
                        session()->put('phone', $phone);
                        session()->put('company', $company);
                        session()->put('00N3m00000QQOde', $idenruc);
                session()->put('is-cds-customer', true);
                return redirect()->to('/');
            }          
        }
          return view('index.one-login', ['error' => '1']);
    }

    public function getAvailableSlots(Request $request)
    {
        $venueId = $request->venueId;
        $salesforce = $this->salesforce();
        $thisVenue = Venue::where('id', '=', $venueId)->first();
        $parentId = $thisVenue->parent_id;

        //02i3m00000Didu3AAB VOLEIBOL
        //02i3m00000DidtxAAB BASQUETBOL

     //    echo json_encode($thisVenue);
        $Fi =$request->date . "T00:00:00Z";
        //$Ff =$request->date . "T04:59:59Z";
        $FfCarbon = Carbon::parse($request->date . "T23:59:59Z")->addHours(5);
        $Ff = $FfCarbon->format('Y-m-d\TH:i:s\Z');
        // ORIGINAL
  //      $query = "SELECT StartDateTime,EndDateTime,Fecha_fin_del_evento__c FROM Event
  //      where ((
  //      ((StartDateTime >= {$Fi} AND StartDateTime <= {$Ff}) OR (EndDateTime >= {$Fi} AND EndDateTime <= {$Ff}) OR (StartDateTime <= {$Fi} AND EndDateTime >= {$Ff})))
  //      AND (Venue__c ='{$venueId}')) or ((RecordType.Name='Excluir de reservas' and venue__c ='') AND ((StartDateTime >= {$Fi} AND StartDateTime <= {$Ff}) OR (EndDateTime >= {$Fi} AND EndDateTime <= {$Ff})
  //      OR (StartDateTime <= {$Fi} AND EndDateTime >= {$Ff})))";
        if($parentId =='02i3m00000Didu3AAB')
            $PARENTCONDITION = "Venue__r.ParentId ='02i3m00000Didu3AAB' OR Venue__r.ParentId ='02i3m00000DidtxAAB'";
        elseif($parentId =='02i3m00000DidtxAAB')
            $PARENTCONDITION = "Venue__r.ParentId ='02i3m00000DidtxAAB' OR Venue__r.ParentId ='02i3m00000Didu3AAB'";
        else
            $PARENTCONDITION = "Venue__r.ParentId ='{$parentId}'";
        $query = "SELECT StartDateTime,EndDateTime,Fecha_fin_del_evento__c,Venue__c,Venue__r.Name,Estado__c,Subject,Venue__r.Bloqueo_adicional_1__c,Venue__r.Bloqueo_adicional_2__c,Venue__r.Bloqueo_adicional_3__c FROM Event
        where ((
        ((StartDateTime >= {$Fi} AND StartDateTime <= {$Ff}) OR (EndDateTime >= {$Fi} AND EndDateTime <= {$Ff}) OR (StartDateTime <= {$Fi} AND EndDateTime >= {$Ff})))
        AND ({$PARENTCONDITION})) or ((RecordType.Name='Excluir de reservas' and venue__c ='') AND ((StartDateTime >= {$Fi} AND StartDateTime <= {$Ff}) OR (EndDateTime >= {$Fi} AND EndDateTime <= {$Ff})
        OR (StartDateTime <= {$Fi} AND EndDateTime >= {$Ff})))";

        $events = $salesforce->query($query);

        $newEvents = [];
foreach ($events['records'] as $event) {
    // Añadir el evento original al array
    $newEvents[] = $event;
    // Verificar si existen bloqueos adicionales
    if(isset($event['Venue__r']['Bloqueo_adicional_1__c']) ||
       isset($event['Venue__r']['Bloqueo_adicional_2__c']) ||
       isset($event['Venue__r']['Bloqueo_adicional_3__c'])) {
        // Crear duplicados para cada bloque adicional
        for ($i = 1; $i <= 3; $i++) {
            $bloqueo = 'Bloqueo_adicional_' . $i . '__c';
            if (isset($event['Venue__r'][$bloqueo])) {
                // Crear un duplicado del evento
                $duplicateEvent = $event;
                // Reemplazar el Venue__c con el bloque adicional
                $duplicateEvent['Venue__c'] = $event['Venue__r'][$bloqueo];
                // Añadir el duplicado al array
                $newEvents[] = $duplicateEvent;
            }
        }
    }
}
$events['records'] = $newEvents;
          if ($events['totalSize'] > 0)
            {
          echo json_encode($events['records']);
            //    $opportunity_id = $contract['records'][0]['Oportunidad__c'];
            }

        //   $id = $opportunity_id == $data['PARM_1'] ? $opportunity_id : null;
    }

    public function getInsertedLeadId(Request $request)
    {

         $webSessionId = $request->websessionId;   
         $query = "SELECT Id FROM Lead WHERE WebSessionId__c = '{$webSessionId}'";
         $salesforce = $this->salesforce();
         $result = $salesforce->query($query);

              if ($result['totalSize'] > 0)
            {
          echo json_encode($result['records'][0]['Id']);
            //    $opportunity_id = $contract['records'][0]['Oportunidad__c'];
            }
        //  echo $query;
    }

    public function cancelarEvento(Request $request)
    {
        $salesforce = $this->salesforce();
        $token = $request->token;
        if ($request->isMethod('post'))
        {
            $tipoSolicitud = $request->input('solicitud');
            switch ($tipoSolicitud) {
                case 'reagendar':
                    $salesforce->update('Event', $token,['Aplicar_devolucion__c'=>'true']);
                    $query = "SELECT ID, Estado__c,WhatId FROM Event where id='{$token}'";
                    $result = $salesforce->query($query);
                    if ($result['totalSize'] > 0) {
                        if($result['records'][0]['Estado__c'] == 'Cancelado')
                        {
                     //       $request['Cancelado'] = 'Si';
                    //        return view('index.cancelar-evento', ['data' => $request]);
                        }
                    }
                    $whatid = $result['records'][0]['WhatId'];


                    $query = "SELECT Id FROM Cupon__c WHERE fromid__c = '{$token}'";
                    $cupon = "";
                    for ($i = 0; $i < 20; $i++) {
                        $result = $salesforce->query($query);
                        if ($result['totalSize'] > 0) {
                            $cupon = $result['records'][0]['Id'];
                            break;
                        }
                        sleep(1);
                    }

                    $id = "02i3m00000D9GtVAAV";
                    $first_name = "John";
                    $last_name = "Doe";
                    $email = "john.doe@example.com";
                    $phone = "1234567890";
                    $company = "Company";
                    $value = "Value";
                    $url = "/cotizacion/datos-evento?reagendar=1&id=$id&franja=hora&first_name=$first_name&last_name=$last_name&email=$email&phone=$phone&company=$company&00N3m00000QQOde=$value&flexipage=$cupon";
                    return redirect($url);
                    break;
                case 'voucher':
                    // Tu código para voucher aquí.
                    $request['Cancelado'] = 'Si2';
                    // INCLUIR LO DEL CUPON
                    // LEER DE SALESFORCE LOS DATOS
                    $salesforce->update('Event', $token,['Aplicar_devolucion__c'=>'true']);
                    return view('index.cancelar-evento-confirmation', ['data' => $request]);
                    break;
                default:
                    return view('index.cancelar-evento', ['data' => $request]);
                    break;
            }
        } else {
            $query = "SELECT ID, Estado__c,whatid FROM Event where id='{$token}'";
                    $result = $salesforce->query($query);
                    if ($result['totalSize'] > 0) {
                        if($result['records'][0]['Estado__c'] == 'Cancelado')
                        {
                            // DESCOMENTAR PARA PRODUCCION
                       //     $request['Cancelado'] = 'Si';
                        }
                    }
        return view('index.cancelar-evento', ['data' => $request]);
        }
        
    }

}
