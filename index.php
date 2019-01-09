<!DOCTYPE html>
<html>
<body>
<h1>Using ws Security WCF</h1>
<?php

try
{
    
    function createHeader ($namespace, $name, $content) {
        $headerVar = new SoapVar($content, XSD_ANYXML, null, null, null);
        return new SoapHeader($namespace, $name, $headerVar);
    }
    
    $protocol = 'https';
    $host = 'localhost';
    $path = '/Middleware/Services/SecurityService.svc';
    $service = 'SecurityService';
    $method = 'GetDocuments';
    $url = "{$protocol}://{$host}{$path}";
    $wsdl = "{$url}?wsdl";
    $username = 'user';
    $password = 'password';
    
    $options = array(
        'soap_version' => SOAP_1_2,
        'cache_wsdl' => WSDL_CACHE_NONE,
        'ssl_method' => SOAP_SSL_METHOD_TLS,
        'encoding' => 'UTF-8',
    );
    
    $soap = new \SoapClient($wsdl, $options);
    
    $headers = array();
    
    $securityHeaderContent = '<ns2:Security env:mustUnderstand="true">
        <ns2:UsernameToken>
        <ns2:Username>'.$username.'</ns2:Username>
        <ns2:Password>'.$password.'</ns2:Password>
        </ns2:UsernameToken>
    </ns2:Security>';
    $headers[] = createHeader(
        'http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd',
        'Security',
        $securityHeaderContent
    );
    
    $adressingHeaderContent = '<ns3:Action>http://tempuri.org/I'.$service.'/'.$method.'</ns3:Action>
    <ns3:To>'.$url.'</ns3:To>';
    $headers[] = createHeader(
        'http://www.w3.org/2005/08/addressing',
        'Addressing',
        $adressingHeaderContent
    );
    
    $soap->__setSoapHeaders($headers);

    $retval = $soap->GetDocuments();

    print_r($retval);
}
catch(Exception $e) 
{ 
    echo "<h2>Exception Error!</h2></b>";    
    echo $e->getMessage(); 
    echo "<br />";
    echo "<br />";
    echo $e.'xdebug_message';
    echo "<br />";
    echo "<br />";
    print_r($client->__getLastRequestHeaders());
}

?>

</body>
</html>

