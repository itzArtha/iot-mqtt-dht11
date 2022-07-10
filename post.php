<?php

require_once "./vendor/bluerhinos/phpmqtt/phpMQTT.php";

$server = 'm23.cloudmqtt.com';
$port = 12303;
$username = 'joztztku';
$password = 'BW9uGcEMxOro';

$client_id = 'phpMQTT-publisher';

$mqtt = new Bluerhinos\phpMQTT($server, $port, $client_id);

if ($mqtt->connect(true, NULL, $username, $password)) {
    $mqtt->publish('bluerhinos/phpMQTT/examples/publishtest', 'Hello World! at ' . date('r'), 0, false);
    $mqtt->close();
} else {
    echo "Time out!\n";
}