<?php



//Data, connection, auth
//        $dataFromTheForm = $_POST['fieldName']; // request data from the form
$soapUrl = "https://uat.eidfs.equifax.ca/uru/soap/ut/canadav3?wsdl"; // asmx URL of WSDL
$soapUser = "/glavcov";  //  username
$soapPassword = "pjT0hqjdb/TVTpysJoURGjuW8mtOa0gU"; // password
// xml post structure

$xml_post_string = '<?xml version ="1.0" encoding="utf-8"?>
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:v2="http://eid.equifax.com/soap/schema/canada/v2">
	<soapenv:Header>
		<wsse:Security soapenv:mustUnderstand="1" xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd">
		<wsse:UsernameToken>
			<wsse:Username>/glavcov</wsse:Username>
			<wsse:Password>pjT0hqjdb/TVTpysJoURGjuW8mtOa0gU</wsse:Password>
			</wsse:UsernameToken>
		</wsse:Security>
   	</soapenv:Header>

   <soapenv:Body>
      <v2:InitialRequest>
         <v2:Identity>
            <v2:Name>
               <v2:FirstName>MILO</v2:FirstName>
               <v2:LastName>TESTADD</v2:LastName>
            </v2:Name>
            <!--1 to 3 repetitions:-->
            <v2:Address timeAtAddress="50" addressType="Current">
               <v2:HybridAddress>
                  <v2:AddressLine>731 BAY AVE</v2:AddressLine>
                  <v2:City>Kelowna</v2:City>
                  <v2:Province>BC</v2:Province>
                  <v2:PostalCode>V1Y7K2</v2:PostalCode>
               </v2:HybridAddress>
            </v2:Address>
            <v2:DateOfBirth>
               <v2:Day>03</v2:Day>
               <v2:Month>03</v2:Month>
               <v2:Year>1989</v2:Year>
            </v2:DateOfBirth>
            <v2:PhoneNumber phoneType="Home">
               <!--You have a CHOICE of the next 2 items at this level-->
               <v2:PhoneNumber>5145291282</v2:PhoneNumber>
            </v2:PhoneNumber>


            <v2:CustomerId>TEST</v2:CustomerId>
         </v2:Identity>
         <v2:ProcessingOptions>
            <v2:Language>English</v2:Language>
         </v2:ProcessingOptions>
      </v2:InitialRequest>
   </soapenv:Body>
</soapenv:Envelope>';   // data from the form, e.g. some ID number

$headers = array(
    "Content-type: text/xml;charset=\"utf-8\"",
    "Accept: text/xml",
    "Cache-Control: no-cache",
    "Pragma: no-cache",
    "SOAPAction: https://ifs-uat.ca.equifax.com/uru/soap/ut/canadav2",
    "Content-length: " . strlen($xml_post_string),
); //SOAPAction: your op URL

$url = $soapUrl;

// PHP cURL  for https connection with auth
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERPWD, $soapUser . ":" . $soapPassword); // username and password - declared at the top of the doc
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_post_string); // the SOAP request
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// converting
$response = curl_exec($ch);
//        var_dump($response); die();
dd(curl_error($ch));
curl_close($ch);
dd($response);
// converting
$response1 = str_replace("<soap:Body>", "", $response);
$response2 = str_replace("</soap:Body>", "", $response1);

// convertingc to XML
$parser = simplexml_load_string($response2);

//        var_dump($parser->InitialResponse->InteractiveQuery);


// user $parser to get your data out of XML response and to display it.
dd($parser->InitialResponse->InteractiveQuery);