<?php

error_reporting(E_ALL & ~E_NOTICE);

//You need to put your personal API key as 1st argument or hardcoded in here
if(strlen($argv[1]) == 32){
	$my_api_key = $argv[1];
}else{
	$my_api_key = '[your_personal_api_key]';
}

$DIRINCLUDES = '_inc/';
require $DIRINCLUDES.'inc_api.php';

$api_request		= [ 'recent' => 3, 'details' => 0 ];		//Prepare request
$api_response_json	= vuldb_api($my_api_key, $api_request);		//Send request and receive json
$api_response_arr	= json_decode($api_response_json, TRUE);	//Convert json to php variable

//Show results

echo "\n";
echo 'API RESPONSE HEADER FIELDS'."\n";
foreach($api_response_arr['response'] as $k=>$v){
	echo htmlentities($k).': '.htmlentities($v)."\n";
}
echo "\n\n";

echo 'API REQUEST HEADER FIELDS'."\n";
foreach($api_response_arr['request'] as $k=>$v){
	echo htmlentities($k).': '.htmlentities($v)."\n";
}
echo "\n\n";

echo 'API RESULT DATA'."\n";
if(is_array($api_response_arr['result'])){
	htmlentities(print_r($api_response_arr['result']));
}
echo "\n\n";

?>
