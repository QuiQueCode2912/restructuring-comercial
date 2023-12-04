<?php
namespace App\Http\Controllers;
use App\Libraries\BgFirma;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request, App\Models\Venue, App\Models\VenueFile, App\Models\VenueDesign, App\Models\Holidays, App\Models\Rates, Str, Image, Illuminate\Support\Facades\Storage, Illuminate\Support\Facades\DB;
use Monolog\Handler\NullHandler;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class Yappy extends Controller
{
    public function pagarYappy(Request $request) {
// verificar credenciales
// Obtener el dominio del servidor 
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

$domain = $protocol . $_SERVER['HTTP_HOST'];

$domain = "https://comercial.ciudaddelsaber.org";
// verificar credenciales
$response = BgFirma::checkCredentials(env('ID_DEL_COMERCIO'), env('CLAVE_SECRETA'), $domain);

if ($response && $response['success']) {
    // Inicializar objeto para poder generar el hash

    $bg = new BgFirma(
        $_POST["total"],
        env('ID_DEL_COMERCIO'),
        'USD',
        $_POST["subtotal"],
        $_POST["taxes"],
        $response['unixTimestamp'],
        'YAP',
        'VEN',
        $_POST["orderId"],
        $_POST["successUrl"],
        $_POST["failUrl"],
        $domain,
        env('CLAVE_SECRETA'),
        env('MODO_DE_PRUEBAS'),
        $response['accessToken'],
        $_POST["tel"]
    );
    $response = $bg->createHash();
    if ($response['success']) {
        /**
         * Al verificar si se creó con éxito el hash, podremos obtener el url de la siguiente manera
         * @var response contiente los valores
         * @var response['url'] = contiene el url a redireccionar para continuar con el pago.
         */
        $url = $response['url'];
        echo "
                <script type=\"text/javascript\">
                window.location.replace(\"$url\");
                </script>
            ";
    } else {
        /**
         * Aquí es donde se mostrarán los errores generados por
         * cualquier tipo de validación de campos necesarios para realizar la transacción.
         * @var response contiene los valores
         * @var response['msg'] = contiene el mensaje de error a mostrar
         * @var response['class'] = contiene la clase de error que es, pueden ser: alert (amarillo), invalid (rojo)
         */
        $bg->showAlertError($response);
    }
} else {
    $css = file_get_contents(public_path('css/main.css'));
    echo '<style>';
    echo $css;
    echo '</style>';
    echo "<div class='alert'>Algo salió mal. Contacta con el administrador</div>";
    echo "<br>" . json_encode($response);
}

    }

    public function procesarYappy(Request $request) {
        echo "procesarYappy";
        Log::info('Datos recibidos: ', $request->all());
        
     

    }
    public function doneYappy(Request $request) {
        $salesforce = $this->salesforce();
      //  $salesforce->update('Lead', $request->token, ['Pago_confirmado__c' => 'true']);
        return redirect()->to('/confirmacion-pago/' . $request->token);
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
    
    public function failYappy(Request $request) {
    return view('index.yappy-fail', ['request' => $request]);
    }
    protected function validateHash()
    {
    try {
       // include 'env.php'; // IMPORTAR ARCHIVO DE ENV PARA UTILIZAR LA VARIABLE 'CLAVE_SECRETA'
        $orderId = $_GET['orderId'];
        $status = $_GET['status'];
        $hash = $_GET['hash'];
        $domain = $_GET['domain'];
        $values = base64_decode(env('CLAVE_SECRETA'));
        $secrete = explode('.', $values);
        $signature =  hash_hmac('sha256', $orderId . $status . $domain, $secrete[0]);
        $success = strcmp($hash, $signature) === 0;
    } catch (\Throwable $th) {
        $success = false;
    }
    return $success;
    }

}