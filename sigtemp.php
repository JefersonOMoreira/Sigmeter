<?php

$post = json_decode(file_get_contents('php://input'),true);


$ids = ['MTR457F6E'=>array('Temp'=>'P0tL5TGyV2r0e9YEgriOLroQuQUAAAUElTRVJWRVJcU0lHTUFJUy5TSUdURU1QL####################','Hum'=>'P0tL5TGyV2r0e9YEgriOLroQuwUAAAUElTRVJWRVJcU0lHTUFJUy5TSUdURU1QL####################', 'Battery'=>'P0tL5TGyV2r0e9YEgriOLroQvAUAAAUElTRVJWRVJcU0lHTUFJUy5TSUdURU1QL####################', 'Count'=>'P0tL5TGyV2r0e9YEgriOLroQyQUAAAUElTRVJWRVJcU0lHTUFJUy5TSUdURU1QL####################'),
	'MTR457FC2'=>array('Temp'=>'P0tL5TGyV2r0e9YEgriOLroQvgUAAAUElTRVJWRVJcU0lHTUFJUy5TSUdURU1QL####################','Hum'=>'P0tL5TGyV2r0e9YEgriOLroQvwUAAAUElTRVJWRVJcU0lHTUFJUy5TSUdURU1QL####################', 'Battery'=>'P0tL5TGyV2r0e9YEgriOLroQvQUAAAUElTRVJWRVJcU0lHTUFJUy5TSUdURU1QL####################', 'Count'=>'P0tL5TGyV2r0e9YEgriOLroQyAUAAAUElTRVJWRVJcU0lHTUFJUy5TSUdURU1QL####################'),
	'MTR457F12'=>array('Temp'=>'P0tL5TGyV2r0e9YEgriOLroQwQUAAAUElTRVJWRVJcU0lHTUFJUy5TSUdURU1QL####################', 'Hum'=>'P0tL5TGyV2r0e9YEgriOLroQwAUAAAUElTRVJWRVJcU0lHTUFJUy5TSUdURU1QL####################', 'Battery'=>'P0tL5TGyV2r0e9YEgriOLroQwgUAAAUElTRVJWRVJcU0lHTUFJUy5TSUdURU1QL####################', 'Count'=>'P0tL5TGyV2r0e9YEgriOLroQxwUAAAUElTRVJWRVJcU0lHTUFJUy5TSUdURU1QL####################'),
	'MTR456A69'=>array('Temp'=>'P0tL5TGyV2r0e9YEgriOLroQxAUAAAUElTRVJWRVJcU0lHTUFJUy5TSUdURU1QL####################', 'Hum'=>'P0tL5TGyV2r0e9YEgriOLroQxQUAAAUElTRVJWRVJcU0lHTUFJUy5TSUdURU1QL####################', 'Battery'=>'P0tL5TGyV2r0e9YEgriOLroQwwUAAAUElTRVJWRVJcU0lHTUFJUy5TSUdURU1QL####################', 'Count'=>'P0tL5TGyV2r0e9YEgriOLroQxgUAAAUElTRVJWRVJcU0lHTUFJUy5TSUdURU1QL####################'),
	'MTR458063'=>array('Temp'=>'P0tL5TGyV2r0e9YEgriOLroQ6wUAAAUElTRVJWRVJcU0lHTUFJUy5TSUdURU1QL####################', 'Hum'=>'P0tL5TGyV2r0e9YEgriOLroQ6gUAAAUElTRVJWRVJcU0lHTUFJUy5TSUdURU1QL####################', 'Battery'=>'P0tL5TGyV2r0e9YEgriOLroQ6AUAAAUElTRVJWRVJcU0lHTUFJUy5TSUdURU1QL####################', 'Count'=>'P0tL5TGyV2r0e9YEgriOLroQ6QUAAAUElTRVJWRVJcU0lHTUFJUy5TSUdURU1QL####################'),
	'MTR456B1B'=>array('Temp'=>'P0tL5TGyV2r0e9YEgriOLroQ8AUAAAUElTRVJWRVJcU0lHTUFJUy5TSUdURU1QL####################', 'Hum'=>'P0tL5TGyV2r0e9YEgriOLroQ7wUAAAUElTRVJWRVJcU0lHTUFJUy5TSUdURU1QL####################', 'Battery'=>'P0tL5TGyV2r0e9YEgriOLroQ7QUAAAUElTRVJWRVJcU0lHTUFJUy5TSUdURU1QL####################', 'Count'=>'P0tL5TGyV2r0e9YEgriOLroQ7gUAAAUElTRVJWRVJcU0lHTUFJUy5TSUdURU1QL####################')
];

$TempField = ['MTR45####'=>array('Temperature'=>'temperature'),'MTR45####'=>array('Temperature'=>'temperature'), 'MTR45####'=>array('Temperature'=>'temperature2'), 'MTR45####'=>array('Temperature'=>'temperature'), 'MTR45####'=>array('Temperature'=>'temperature'), 'MTR45####'=>array('Temperature'=>'temperature')];


function postPI($id ,$value, $timestamp){

    $opts = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => array('Content-type: application/json', 'Authorization: Basic YWRtaW5pc####################'),
        'content' => '{"Value":'.$value.', "Timestamp": "'.$timestamp.'"}'
    ),
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    )
    );

    $context = stream_context_create($opts);

    $result = file_get_contents('https://###.##.###.##/#########/#######/'.$id.'/value', true, $context);
    return $result;
}

//echo "Id Temp =  $ids[$post['device']['Temp']]";

echo postPI($ids[$post['device']]['Temp'],$post[$TempField[$post['device']]['Temperature']],$post['date']);
echo postPI($ids[$post['device']]['Hum'],$post['humidity'],$post['date']);
echo postPI($ids[$post['device']]['Battery'],$post['battery'],$post['date']);
echo postPI($ids[$post['device']]['Count'],$post['count2'],$post['date']);
?>
