<?php

require('../phpMQTT.php');

$server = 'b49cff9443924efa965a9a35b91220eb.s1.eu.hivemq.cloud';     // change if necessary
$port = 8883;                     // change if necessary
$username = 'evan241';                   // set your username
$password = 'EdyXell2011';                   // set your password
$client_id = '868105040100495'; // make sure this is unique for connecting to sever - you could use uniqid()

$mqtt = new Bluerhinos\phpMQTT($server, $port, $client_id);
if(!$mqtt->connect(true, NULL, $username, $password)) {
	exit(1);
}

$mqtt->debug = true;

$topics['fgt3/b49cff9443924efa965a9a35b91220eb.s1.eu.hivemq.cloud/868105040100495/set'] = array('qos' => 1, 'function' => 'procMsg');
$mqtt->subscribe($topics, 0);

while($mqtt->proc()) {

}

$mqtt->close();

function procMsg($topic, $msg){
		echo 'Msg Recieved: ' . date('r') . "\n";
		echo "Topic: {$topic}\n\n";
		echo "\t$msg\n\n";
}
