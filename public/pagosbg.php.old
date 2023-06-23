<?php

function validateHash()
{
    try {
        include 'env.php'; // IMPORTAR ARCHIVO DE ENV PARA UTILIZAR LA VARIABLE 'CLAVE_SECRETA'
        $orderId = $_GET['orderId'];
        $status = $_GET['status'];
        $hash = $_GET['hash'];
        $domain = $_GET['domain'];
        $values = base64_decode(CLAVE_SECRETA);
        $secrete = explode('.', $values);
        $signature =  hash_hmac('sha256', $orderId . $status . $domain, $secrete[0]);
        $success = strcmp($hash, $signature) === 0;
    } catch (\Throwable $th) {
        $success = false;
    }
    return $success;
}


if (isset($_GET['orderId']) && isset($_GET['status']) && isset($_GET['domain']) && isset($_GET['hash'])) {
    header('Content-Type: application/json');
    $success = validateHash();
    if ($success) {
         // ***** */
/*
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
 
             $id = $opportunity_id;
 
             $query = "SELECT 
                         Id, Name
                         FROM Opportunity 
                         WHERE Id = '{$id}'";
 
             $opportunity = $salesforce->query($query);
 
             if ($opportunity['totalSize'] > 0)
             {
                 if (isset($_GET['status']) && $_GET['status'] == 'E')
                 {
                     $date = new \DateTime(isset($data['date']) ? $data['date'] . ' ' . date('H:i:s') : date('Y-m-d H:i:s'));
 
                     $receiptData = ['Confirmado__c' => false, 'Contrato_de_servicio__c' => $request->token, 'Monto__c' => $data['TotalPagado'], 'Soporte__c' => null, 'Numero_de_transaccion__c' => $data['Oper'], 'Fecha_de_pago__c' => $date->format('Y-m-d\TH:i:s.000\Z') , 'Tipo__c' => (isset($data['method']) ? $data['method'] : 'Páguelo Fácil') ];
 
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
  
                if (isset($_GET['status']) && $_GET['status'] == 'E')
                 {
                 $lead_id = $lead['records'][0]['Id'];
                 $concepto = nl2br($lead['records'][0]['Espacios_que_desea_reservar__c']);
 
             //      $receiptData = ['Confirmado__c' => false, 'Lead__c' => $request->token, 'Monto__c' => $data['TotalPagado'], 'Soporte__c' => $uploaded_file, 'Numero_de_transaccion__c' => $data['Oper'], 'Fecha_de_pago__c' => $date->format('Y-m-d\TH:i:s.000\Z') , 'Tipo__c' => (isset($data['method']) ? $data['method'] : 'Páguelo Fácil') ];
 
                     $date = new \DateTime(isset($data['date']) ? $data['date'] . ' ' . date('H:i:s') : date('Y-m-d H:i:s'));
 
                     $uploaded_file = null;
                     
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
             } 
         }
 
 
     }

         // *****
          */
    }
    echo json_encode(['succes' => $success]);
}