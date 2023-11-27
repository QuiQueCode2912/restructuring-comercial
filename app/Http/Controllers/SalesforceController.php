<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SalesforceController extends Controller
{   
    public function  createConsultaWeb(Request $request){

        $salesforce = $this->salesforce();
        $consultData =[
            'FirstName'=>$request->input('Name'),
            'LastName'=>$request->input('Apellido__c'),
            'Email'=>$request->input('Correo__c'),
            'Phone'=>$request->input('Telefono__c'),
            //'Venue_para_el_evento__c'=>'02i3m00000D9DaPAAV',
            'Motivo_Consulta__c'=>$request->input('Motivo__c'),
            'RecordTypeId'=>'012Rb000000cxFCIAY',
            'Company'=>'Parque CDS'
        ];
        
        $consultId = $salesforce->create('Lead', $consultData);
        if($consultId){
            return redirect()->back()->with('success', 'Se genero su consulta ,  estaremos en contacto!');
        }else{
            return redirect()->back()->with('fail', 'Error al generar');

        }
    }

    public function  isClientEmail($email){
        $salesforce = $this->salesforce();
        $domain = substr(strrchr($email, "@"), 1);

        $query = "SELECT 
                    Id, Name
                    FROM Account 
                    WHERE Dominio__c = '{$domain}' LIMIT 1";

        $accounts = $salesforce->query($query);

        if($accounts['totalSize'] > 0){
            return true;
        }
        return false;
    }

    private function salesforce()
    {
        $salesforce = new \EHAERER\Salesforce\Authentication\PasswordAuthentication(['grant_type' => 'password', 'client_id' => env('SF_CONSUMER_KEY'), 'client_secret' => env('SF_CONSUMER_SECRET'), 'username' => 'dnavas00@hotmail.com', 'password' => '19801980MAFdwvjyJArqvVOiKp9PdmPFFN']);
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
}
