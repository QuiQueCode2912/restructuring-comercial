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
        ///AQUI VA UNA PINCHE VISTA DE QUE SALIO BIEN
     

    }
    public function failYappy(Request $request) {
    return view('index.yappy-fail', ['request' => $request]);
    }
    protected function validateHash()
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

}