<?php


namespace App\Http\Controllers\WsSoapClient;


use Exception;
use Illuminate\Http\Request;

use SoapClient;
use SoapHeader;

class WsEjemploAveria
{

    public $DeveloperKey;
    public $Password;

    public function __construct($key, $pass)
    {
        $this->DeveloperKey = $key;
        $this->Password = $pass;
    }
}
    /**
     * Store a new user.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \SoapFault
     */
    // self::setWsdl( 'http://10.252.192.101:10003/ServiceDomain/ServiceProblemManagement/CloseServiceTroubleReport/closeMassiveTroubleTicket/v1?wsdl');

$devKey        = "";
$password    = "";
$accountId    = "";

// Create the SoapClient instance
     $wsdl   = "http://DESKTOP-3T9MUVG:8088/mockNumberConversionSoapBinding?wsdl";
    $client = new SoapClient($wsdl, array('trace' => true));




$auth   = array(

        );
        $header = new SOAPHeader($wsdl, 'Header', $auth);
        $client->__setSoapHeaders($header);

        echo "Header paso comienza el cuerpo";

// web service input params
       $request_param = array(
           'NumberToDollars' => array(
                'dNum' => '2'
           )
       );


        try
        {

            $response_param = $client->__soapCall('NumberToDollars',array(
                'NumberToDollars' => array(
                    'dNum' => '2'
                )
            ),NULL,NULL);
            print 'ingreso';
            var_dump($response_param);
        }
        catch (Exception $e)
        {

            echo $e->getMessage();
            print 'se confundio';


        }

return  $response_param;


?>

