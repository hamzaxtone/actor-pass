<?php
require "vendor/autoload.php";
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;

$baseurl = 'https://api.bookeo.com/v2';
$client = new Client;


$customer = '';
if (!empty($_GET['customer'])) {
    $customer = $_GET['customer'];
}
    
try {
    $response = $client->request('GET', $baseurl.'/customers/'.$customer,[
        'headers' => [
            'content-Type' => 'application/json',
            'X-Bookeo-apiKey' => 'ACCF4CCYP7TTUMLENWJU341566AYRA44161767B74B2',
            'X-Bookeo-secretKey' => 'FtLAlE4AILfaxSc32CecrP4tyx3s6gbW',
        ]
    ]);
    echo "<pre>";
    echo $response->getBody();
    echo "</pre>";
    
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

