<?php
    require 'vendor/autoload.php'; 
    use GuzzleHttp\Client; 

    echo "<b>!!!Якщо ввести 'auth' => ['user', 'pass'] має працювати!!!</b><br>";

    $client = new Client(); 
    $res = $client->request('GET', 'https://api.github.com/user', [
        'auth' => ['user', 'pass']
    ]);
    echo $res->getStatusCode();
    echo $res->getHeader('content-type')[0];
    echo $res->getBody();

    // Send an asynchronous request.
    $request = new \GuzzleHttp\Psr7\Request('GET', 'http://httpbin.org');
    $promise = $client->sendAsync($request)->then(function ($response) {
        echo 'I completed! ' . $response->getBody();
    });
    $promise->wait();
?>