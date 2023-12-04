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
            'client_id' => '3MVG9snQZy6aQDh1bhQninXsB8K1bDq_.WHDblgC5FDfztTLSpMs7oGMfTP1BZfXZDEbhh0iWzECRg3VCJpab', /* insert consumer key here */
            'client_secret' => '35FE5C2EA82CA584AE3B517C9EB518B5BEBDBCF7EA42CA5E66EECF44943D9EAA', /* insert consumer secret here */
            'username' => 'dnavas00@hotmail.com.qa', /* insert Salesforce username here */
            'password' => 'fcds@2023NYDAFDWTqbUqdmk7QE5rDp4w' /* insert Salesforce user password and security token here */
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
