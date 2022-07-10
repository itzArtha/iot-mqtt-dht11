<?php
require_once "./vendor/bluerhinos/phpmqtt/phpMQTT.php";

$server = 'm23.cloudmqtt.com';
$port = 12303;
$username = 'joztztku';
$password = 'BW9uGcEMxOro';

$client_id = 'phpMQTT-subscriber';

$mqtt = new Bluerhinos\phpMQTT($server, $port, $client_id);
if(!$mqtt->connect(true, NULL, $username, $password)) {
	exit(1);
}

$mqtt->debug = true;

$topics['190030751/temp'] = array('qos' => 0, 'function' => 'procMsg');
$mqtt->subscribe($topics, 0);

while($mqtt->proc()) { }

$mqtt->close();

function procMsg($topic, $msg) {
    echo "\t$msg\n\n";
}
?>