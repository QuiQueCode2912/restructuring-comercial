<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Cupon;
use App\Models\Venue;
use Illuminate\Http\Response;

class cuponesController extends Controller
{
    public function handleInboundMessage(Request $request)
    {
        //   Log::info('Llamada a handleInboundMessage');

        // Reemplaza esto con la API token que compartes con Salesforce
        $sharedApiToken = '906F00000008zQWIAY';

        // Verifica si la API token está presente en la solicitud
        $apiToken = $request->query('tk');
        if ($apiToken !== $sharedApiToken) {
            //        Log::info('No autorizado - Token incorrecto');
            return response('Unauthorized', 401);
        }

        // Carga el contenido del mensaje SOAP/XML
        $xmlContent = $request->getContent();
       //     Log::info('Contenido del Request: ' . $xmlContent);
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
        //    Log::info('Data: ' . $json);
        //print_r($data);
        if (isset($data['soapenv:Body']['notifications']['Notification'])) {
            $notifications = $data['soapenv:Body']['notifications']['Notification'];

            // Verifica si las notificaciones es una matriz. Si no es una matriz, conviértelo en una matriz con un solo elemento.
            if (isset($notifications['sObject'])) {
                $notifications = [$notifications];
            }

            foreach ($notifications as $notification) {
                $sObject = $notification['sObject'];
                $id = (string)$sObject['sf:Id'];
$codigo = (string)$sObject['sf:Voucher__c'];
$tipo = (string)$sObject['sf:Tipo__c'];
$estado = (string)$sObject['sf:Estado__c'];
$cantidad = (int)$sObject['sf:Cantidad__c'];
$consumible = (string)$sObject['sf:Consumible__c'];
$decimal = (float)$sObject['sf:ValorDecimal__c'];
$fechainicial = (string)$sObject['sf:fi__c'];
$fechafinal = (string)$sObject['sf:ff__c'];
$validopara = (string)$sObject['sf:Valido_para__c'];

$cupon = Cupon::firstOrNew(['sfid' => $id]);
$cupon->codigo = $codigo;
$cupon->tipo = $tipo;
$cupon->estado = $estado;
$cupon->cantidad = $cantidad;
$cupon->consumible = $consumible;
$cupon->valordecimal = $decimal;
$cupon->fechainicial = $fechainicial;
$cupon->fechafinal = $fechafinal;
$cupon->validopara = $validopara;

                $cupon->save();
            }
        }
        // Registra un mensaje en el log para fines de depuración
        //     Log::info("Evento procesado: {$id}");

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
        //    Log::info('Contenido de la Respuesta: ' . $responseContent);
        return response($responseContent, Response::HTTP_OK)
            ->header('Content-Type', 'text/xml');
    }
}