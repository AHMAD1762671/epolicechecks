<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Temp extends CI_Controller
{

//    public function __construct()
//    {
//        parent::__construct();

//    }

    public function index()
    {

        $HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
        $f = fopen("./soap-request.xml", "w");
        fwrite($f, $HTTP_RAW_POST_DATA);
        fclose($f);

        $soap_request = "<?xml version =\"1.0\" encoding=\"utf-8\"?>\n";
        $soap_request .= "<soapenv:Envelope xmlns:soapenv=\"http://schemas.xmlsoap.org/soap/envelope/\" xmlns:v2=\"http://eid.equifax.com/soap/schema/canada/v2\">\n";
        $soap_request .= "<soapenv:Header>\n";
        $soap_request .= "<wsse:Security soapenv:mustUnderstand=\"1\" xmlns:wsse=\"http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd\">\n";
        $soap_request .= "<wsse:UsernameToken>\n";
        $soap_request .= "<wsse:Username>/glavcov</wsse:Username>\n";
        $soap_request .= "<wsse:Password>pjT0hqjdb/TVTpysJoURGjuW8mtOa0gU</wsse:Password>\n";
        $soap_request .= "</wsse:UsernameToken>\n";
        $soap_request .= "</wsse:Security>\n";
        $soap_request .= "</soapenv:Header>\n";
        $soap_request .= "<soapenv:Body>\n";
        $soap_request .= "<v2:InitialRequest>\n";
        $soap_request .= "<v2:Identity>\n";
        $soap_request .= "<v2:Name>\n";
        $soap_request .= "<v2:FirstName>MILO</v2:FirstName>\n";
        $soap_request .= "<v2:LastName>TESTADD</v2:LastName>\n";
        $soap_request .= "</v2:Name>\n";
        $soap_request .= "<v2:Address timeAtAddress=\"50\" addressType=\"Current\">\n";
        $soap_request .= "<v2:HybridAddress>\n";
        $soap_request .= "<v2:AddressLine>731 BAY AVE</v2:AddressLine>\n";
        $soap_request .= "<v2:City>Kelowna</v2:City>\n";
        $soap_request .= "<v2:Province>BC</v2:Province>\n";
        $soap_request .= "<v2:PostalCode>V1Y7K2</v2:PostalCode>\n";
        $soap_request .= "</v2:HybridAddress>\n";
        $soap_request .= "</v2:Address>\n";
        $soap_request .= "<v2:DateOfBirth>\n";
        $soap_request .= "<v2:Day>03</v2:Day>\n";
        $soap_request .= "<v2:Month>03</v2:Month>\n";
        $soap_request .= "<v2:Year>1989</v2:Year>\n";
        $soap_request .= "</v2:DateOfBirth>\n";
        $soap_request .= "<v2:PhoneNumber phoneType=\"Home\">\n";
        $soap_request .= "<v2:PhoneNumber>5145291282</v2:PhoneNumber>\n";
        $soap_request .= "</v2:PhoneNumber>\n";
        $soap_request .= "<v2:CustomerId>TEST</v2:CustomerId>\n";
        $soap_request .= "</v2:Identity>\n";
        $soap_request .= "<v2:ProcessingOptions>\n";
        $soap_request .= "<v2:Language>English</v2:Language>\n";
        $soap_request .= "</v2:ProcessingOptions>\n";
        $soap_request .= "</v2:InitialRequest>\n";
        $soap_request .= "</soapenv:Body>\n";
        $soap_request .= "</soapenv:Envelope>\n";


        $header = array(
            "Content-type: text/xml;charset=\"utf-8\"",
            "Accept: text/xml",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            "SOAPAction: \"run\"",
            "Content-length: " . strlen($soap_request),
        );

        $soap_do = curl_init();
        curl_setopt($soap_do, CURLOPT_URL, "https://ifs-uat.ca.equifax.com/uru/soap/ut/canadav2");
        curl_setopt($soap_do, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($soap_do, CURLOPT_TIMEOUT, 10);
        curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($soap_do, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($soap_do, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($soap_do, CURLOPT_POST, true);
        curl_setopt($soap_do, CURLOPT_POSTFIELDS, $soap_request);
        curl_setopt($soap_do, CURLOPT_HTTPHEADER, $header);



        //extra code
        $response = curl_exec($soap_do);
        curl_close($soap_do);
        $response1 = str_replace("<soap:Body>","",$response);
        $response2 = str_replace("</soap:Body>","",$response1);

//        xml to json and json to array conversion
        $parser = simplexml_load_string($response2);
        $json = json_encode($parser);
        $arr = json_decode($json, true);

        $errorList = array(
            "01"=>"Failed Standard Field Checks",
            "03"=>"SIN does not meet verification criteria",
            "04"=>"Age does not meet verification criteria",
            "06"=>"Address Standardization Error Present for Current Address",
            "07"=>"Pattern Recognition Match Found",
            "15"=>"Real Questions were asked and POOR correct responses",
            "18"=>"Real Questions were asked and INCONCLUSIVE correct responses",
            "27"=>"Simulated Questions were asked and POOR correct responses",
            "30"=>"Simulated Questions were asked and INCONCLUSIVE correct responses",
            "33"=>"Fraud victim indicator warning present",
            "42"=>"Credit database unavailable",
            "45"=>"No credit file located",
            "54"=>"Credit file located – Possible match",
            "57"=>"Phone database unavailable",
            "D9"=>"The inquiry subject credit file contains a Death Notice",
            "M3"=>"Mixed Questions were asked and POOR correct responses.",
            "M4"=>"Mixed Questions were asked and INCONCLUSIVE correct responses.",
            "PE"=>"Processing errors encountered on data source",
            "53"=>"Authentication could not be completed due to consumer alert on credit file",
            "LO"=>"Wallet or identification is Lost or Stolen",

            "10"=>"Elevated use of Address by different individuals detected.",
            "11"=>"Moderate use of Address by different individuals detected.",
            "13"=>"High use of Address by different individuals detected.",
            "14"=>"Elevated use of Address by different individuals detected.",
            "16"=>"Moderate use of Address by different individuals detected.",
            "17"=>"High use of Address by different individuals detected.",
            "35"=>"Address Standardization Error Present for Former Address",
            "56"=>"Credit Card Number – Not Verified",
            "85"=>"WARNING: Inquiry Social Insurance Number has not yet been issued",
            "86"=>"WARNING: Social Insurance Number has been reported misused. Thorough verification suggested",
            "87"=>"WARNING: Inquiry address has been associated with more than one name or Social Insurance Number. Thorough verification suggested",
            "88"=>"WARNING: Inquiry address is a storage facility, mail receiving service, post office or check cashing facility. Thorough verification suggested",
            "89"=>"WARNING: Inquiry address is a campground or hotel/motel. Thorough verification suggested",
            "90"=>"WARNING: Social Insurance Number is issued to a person who has been reported deceased. Thorough verification suggested.",
            "93"=>"WARNING: Inquiry address is a provincial/federal prison or detention facility. Thorough verification suggested.",
            "95"=>"WARNING: Telephone number has been reported misused. Thorough verification suggested",
            "96"=>"WARNING: Telephone number is a telephone drop number",
            "98"=>"WARNING: Inquiry address has been reported misused. Thorough verification suggested.",
            "99"=>"WARNING: Possible true name fraud. Thorough verification suggested",
            "C3"=>"Consumer supplied address same as the former address 2 present in the credit file available with Equifax.",
            "O1"=>"Foreign Terrorist Organization",
            "O2"=>"Specially Designated Narcotics Trafficker",
            "O3"=>"Specially Designated Foreign Narcotics Trafficker",
            "O4"=>"Specially Designated Global Terrorist",
            "O5"=>"Specially Designated Terrorist",
            "O6"=>"Weapons of Mass Destruction",
            "O7"=>"Palestinian Legislative Council",
            "O8"=>"Property Currently Blocked",
            "O9"=>"Patriot Act Blocked Pending Investigation",
            "TM"=>"Warning: Inquiry Social Insurance number has been associated with more than one name or address",
            "TN"=>"Warning: Inquiry telephone number has been associated with more than one name or address",
            "TP"=>"Warning: Inquiry Phone Number is a Hotel/Motel",
            "OU"=>"Unknown OFAC Category",
            "W1"=>"Social Insurance Number – Not Valid",
            "W3"=>"Social Insurance Number – Mismatch",

            "00"=>"Invalid message",
            "01"=>"Failed standard field checks",
            "02"=>"Driver‟s Licence format does not correspond to province of issue",
            "03"=>"SIN does not meet verification criteria",
            "04"=>"Age does not meet verification criteria",
            "05"=>"Address standardization warning present for current address",
            "06"=>"Address standardization error present for current address",
            "08"=>"Telephone exchange does not match the FSA (first three characters) of the postal code for current address",
            "34"=>"Address standardization warning present for former address",
            "35"=>"Address standardization error present for former address",
            "TY"=>"The telephone area code does not correspond to the province code of the current address"
        );


        $numberOfErrors = count($arr['InitialResponse']['AssesmentComplete']['ReasonCode']);
        if($numberOfErrors == 4){
            for($i=0; $i<$numberOfErrors; $i++){
                $arrayValue = $arr['InitialResponse']['AssesmentComplete']['ReasonCode'][$i];
//                echo $arrayValue."<br>";
                echo $errorList[$arrayValue]."<br>";
            }
        }
    }
}