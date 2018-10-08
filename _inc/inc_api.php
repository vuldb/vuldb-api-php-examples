<?php

function vuldb_api($apikey, $postarr, $details=0, $endpoint='https://vuldb.com/?api'){
	//Add API key
	$postarr['apikey']	= $apikey;
	$postarr['details']	= $details;

	//Prepare http query
	$postdata = http_build_query($postarr);

	//Post data as opts
	$opts =[ 'http' =>
		[
			'method'  => 'POST',
			'content' => $postdata
		]
	];

	//Request from API endpoint
	$context = stream_context_create($opts);
	$result = file_get_contents($endpoint, false, $context);
	
	return $result;
}

?>
