<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SoapController extends Controller
{
    public function getSoapData(Request $request)
    {
        $articles = DB::table('articulos as a')
            ->select('a.codigo', DB::raw('CASE WHEN a.baja = 0 THEN "ACTIVO" ELSE "NO UTILIZABLE" END as estado'), 'a.descripcion', 'a.idfamilia', DB::raw('CONCAT(o.codigo, "-", o.descripcion) as familia'), 'a.idfam', DB::raw('CONCAT(f.codigo, "-", f.familia) as subfamilia'), 'totexist as stock')
            ->leftJoin('operaciones as o', 'o.id', '=', 'a.idfamilia')
            ->leftJoin('familia as f', 'f.id', '=', 'a.idfam')
            ->where('a.idempresa', '=', 8)
            ->count();

        return response()->json(['data' => $articles]);

        // URL del servicio SOAP
        $url = 'http://192.168.0.52:8124/soap-generic/syracuse/collaboration/syracuse/CAdxWebServiceXmlCC';

        // Datos de la solicitud SOAP
        $soapData = [
            'soapenv:Envelope' => [
                '_attributes' => [
                    'xmlns:xsi' => 'http://www.w3.org/2001/XMLSchema-instance',
                    'xmlns:xsd' => 'http://www.w3.org/2001/XMLSchema',
                    'xmlns:soapenv' => 'http://schemas.xmlsoap.org/soap/envelope/',
                    'xmlns:wss' => 'http://www.adonix.com/WSS',
                ],
                'soapenv:Header' => [],
                'soapenv:Body' => [
                    'wss:run' => [
                        '_attributes' => [
                            'soapenv:encodingStyle' => 'http://schemas.xmlsoap.org/soap/encoding/',
                        ],
                        'callContext' => [
                            '_attributes' => [
                                'xsi:type' => 'wss:CAdxCallContext',
                            ],
                            'codeLang' => 'SPA',
                            'poolAlias' => 'GRUPORUIZ',
                            'requestConfig' => 'adxwss.optreturn=JSON&adxwss.beautify=true&adxwss.trace.on=off',
                        ],
                        'publicName' => 'ZFLOTAX3IT',
                        'inputXml' => [
                            '_attributes' => [
                                'xsi:type' => 'xsd:string',
                            ],
                            '_cdata' => '{
                                "GRP1": {
                                    "I_CAT": "CON",
                                    "I_CODIGO": "ZZZ3",
                                    "I_ESTADO": 1
                                },
                                "GRP2": {
                                    "I_DES": "DESC. ZZZ3",
                                    "I_FAM": "",
                                    "I_SUBFAM": ""
                                },
                                "GRP3": [
                                    {
                                        "I_PROV": "P00001"
                                    },
                                    {
                                        "I_PROV": "P00002"
                                    }
                                ]
                            }',
                        ],
                    ],
                ],
            ],
        ];

        // Crear una instancia de GuzzleHttp\Client
        $client = new Client();

        // Realizar la solicitud SOAP
        $response = $client->post($url, [
            'headers' => [
                'Content-Type' => 'text/xml; charset=utf-8',
                'SOAPAction' => 'http://www.adonix.com/WSS#run',
            ],
            'body' => $this->arrayToXml($soapData),
        ]);

        // Obtener el contenido de la respuesta
        $xmlResponse = $response->getBody()->getContents();

        // Aquí puedes procesar los datos XML como desees, por ejemplo, convertirlos a un array
        $xmlArray = $this->xmlToArray($xmlResponse);

        return response()->json($xmlArray);
    }

    // Función para convertir un array en XML
    private function arrayToXml($array, $rootElement = null, $xml = null)
    {
        $_xml = $xml ?: new \SimpleXMLElement('<' . ($rootElement ?: 'root') . '/>');
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                $this->arrayToXml($v, $k, $_xml->addChild($k));
            } else {
                $_xml->addChild($k, $v);
            }
        }
        return $_xml->asXML();
    }

    // Función para convertir XML en un array
    private function xmlToArray($xml)
    {
        $xmlObject = simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA);
        $json = json_encode($xmlObject);
        return json_decode($json, true);
    }
}
