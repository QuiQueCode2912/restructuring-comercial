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

    public function  testConection(){
        $salesforce = $this->salesforce();
        $query = "SELECT 
                    Id, Name
                    FROM Asset LIMIT 100 ";

        return   $salesforce->query($query);
    }


    private function salesforce()
    {
 
        //Credenciales de QA en Salesforce
        $options = [
            'grant_type' => 'password',
            'client_id' => '3MVG9x3BHiue58jW05YVW2cVFK9SW7Kdx_NW4jAavy1fOKf9WyYVjXaK0C38W9xHzOwpyF3Jk7juXx8GFBhjZ', /* insert consumer key here */
            'client_secret' => 'DD5465E3365D29014881BF920B23995351363D625A7E230A61B301ED321B3B58', /* insert consumer secret here */
            'username' => 'dnavas00@hotmail.com.qa', /* insert Salesforce username here */
            'password' => 'fcds@2024NZJ5AKxFUiLywkGzUjLoZFkxI' /* insert Salesforce user password and security token here */
        ];
       $endPoint = 'https://test.salesforce.com/';
  
        /**/
        $salesforce = new \EHAERER\Salesforce\Authentication\PasswordAuthentication($options);
        $salesforce->setEndpoint($endPoint);
        $salesforce->authenticate();

        $accessToken = $salesforce->getAccessToken();
        $instanceUrl = $salesforce->getInstanceUrl();

        return new \EHAERER\Salesforce\SalesforceFunctions($instanceUrl, $accessToken);
    }
}
