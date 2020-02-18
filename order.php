<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$uri = 'http://api.cpagetti.com/order/register';

    $order = [
        'api_key' => '2ex4PT88Z2rLD6Z4KDWV68AXTQAKjXuV', //  API ключ
        'name' => $_REQUEST['name'],
        'phone' => $_REQUEST['phone'],
        'offer_id' => '3955', //  ID оффера
        'country' => 'RO',  // страна https://ru.wikipedia.org/wiki/ISO_3166-1
		'lang' => 'RO', // язык https://www.exlab.net/tools/tables/languages.html
	//	'stream_code' => '',  // айди потока (необязательно)
		'ip' => (!empty($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : null),
        'sub1' => '', 
    ];
	
$headers = [
    "Host" => $uri,
    "User-Agent" => (!empty($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : null),
    "Accept" => (!empty($_SERVER['HTTP_ACCEPT']) ? $_SERVER['HTTP_ACCEPT'] : null),
    "Accept-Language" => (!empty($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? $_SERVER['HTTP_ACCEPT_LANGUAGE'] : null),
    "Keep-Alive" => '15',
    "Connection" => "keep-alive",
    "Referer" => (!empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null),
];

$curl = curl_init();

curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_URL, $uri);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $order);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$return= curl_exec($curl); 
curl_close($curl); 
}
    header('Location: ./success.html');
    exit;
	
?>