<?php
require "vendor/autoload.php";
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;

$client = new Client(['base_uri' => 'https://api.bookeo.com/v2/']);
try{
    $response = $client->post('customers', [
        'headers' => [
            'Content-Type' => 'application/json',
            'X-Bookeo-apiKey' => 'ACCF4CCYP7TTUMLENWJU341566AYRA44161767B74B2',
            'X-Bookeo-secretKey' => 'FtLAlE4AILfaxSc32CecrP4tyx3s6gbW',
        ],
        'json' => [
            'id' => 'asdsd',
            'firstName' => 'Irfanasdasd',
            'lastName' => 'Mumtazasdsad',
            'emailAddress' => 'johndoe.john191@gmail.com',
            'phoneNumbers' => [
                                [
                                    'number' => '555555555', 
                                    'type' => 'mobile'
                                ]
                            ]
        ]
    ]);
    $customer = $response->getHeader('location');
    $customerID = explode('/', $customer[0]);

    $id = end($customerID);
    echo "<pre>";
    print_r($id);
    echo "<pre/>";


    
}
catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}