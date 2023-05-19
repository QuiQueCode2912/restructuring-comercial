<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Event;
use Illuminate\Http\Response;

class eventsController extends Controller
{
    public function handleInboundMessage(Request $request)
    {
        // Reemplaza esto con la API token que compartes con Salesforce
        $sharedApiToken = '906F00000008zQWIAY';
        
        // Verifica si la API token está presente en la solicitud
        $apiToken = $request->query('tk');
        if ($apiToken !== $sharedApiToken) {
            return response('Unauthorized', 401);
        }

        // Carga el contenido del mensaje SOAP/XML
        $xmlContent = $request->getContent();
        $xmlContent = str_replace('xmlns:soapenv', 'xmlnssoapenv', $xmlContent);
        $xmlContent = str_replace('xsi:type', 'xsitype', $xmlContent);
        $xmlContent = str_replace('xmlns:sf', 'xmlnssf', $xmlContent);
        //print_r($xmlContent);
        
//<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
        // Cargar el contenido XML en un objeto SimpleXMLElement
        libxml_use_internal_errors(true);
        $xml = simplexml_load_string($xmlContent);
        $json = json_encode($xml);
        $data = json_decode($json, true);
        //print_r($data);
        if (isset($data['soapenv:Body']['notifications']['Notification']['sObject'])) {
            $sObject = $data['soapenv:Body']['notifications']['Notification']['sObject'];

            // Extrae los campos deseados del objeto Event
            $id = (string)$sObject['sf:Id'];
            $asunto = (string)$sObject['sf:Asunto__c'];
            $estado = (string)$sObject['sf:Estado__c'];
            $venueId = (string)$sObject['sf:Venue__c'];
            $startDateTime = (string)$sObject['sf:StartDateTime'];
            $endDateTime = (string)$sObject['sf:EndDateTime'];
            $ownerId = (string)$sObject['sf:CreatedById'];
        }
        // Crea una nueva instancia del modelo Event y asigna los valores de los campos
        $event = Event::firstOrNew(['sfId' => $id]);
        $event->subject = $asunto;
        $event->owner = $ownerId;
        $event->startdate = $startDateTime;
        $event->enddate = $endDateTime;
        $event->status = $estado;
        $event->venueid = $venueId;
        $event->sfId = $id;

        // Guarda el evento en la base de datos
        $event->save();

        // Registra un mensaje en el log para fines de depuración
       // Log::info("Evento procesado: {$id}");

            // Crear la respuesta XML
    $responseContent = '<?xml version="1.0" encoding="UTF-8"?>';
    $responseContent .= '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">';
    $responseContent .= '<soapenv:Body>';
    $responseContent .= '<notificationsResponse xmlns="http://soap.sforce.com/2005/09/outbound">';
    $responseContent .= '<Ack>true</Ack>';
    $responseContent .= '</notificationsResponse>';
    $responseContent .= '</soapenv:Body>';
    $responseContent .= '</soapenv:Envelope>';

    ob_start();
    ob_end_clean();
    // Enviar la respuesta XML
    return response($responseContent, Response::HTTP_OK)
            ->header('Content-Type', 'text/xml');
    }

    public function getEvents(Request $request)
    {
        $today = today()->toDateString();

        $events = Event::where(function ($query) use ($today) {
            $query->whereDate('startdate', $today)
                  ->orWhereDate('enddate', $today);
        })->get();
    
        return response()->json($queryLog);
    }
}
