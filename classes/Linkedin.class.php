<?php

class Linkedin {
	
	private $accessToken;
    
    function __construct($userId = null) {
		if ($userId) {
			$user = User::get($userId);
			$this->accessToken = $user->linkedin_token;
		} else {
			//use the acess token of the loged in user
			$this->accessToken = $_SESSION['access_token'];
		}
	}
	
	function fetch($method, $resource, $body = '') {
 
	    $opts = array(
	        'http'=>array(
	            'method' => $method,
	            'header' => "Authorization: Bearer " . $this->accessToken . "\r\n" . "x-li-format: json\r\n"
	        )
	    );
 
	    // Need to use HTTPS
	    $url = 'https://api.linkedin.com' . $resource;
 
	    // Append query parameters (if there are any)
	    if (count($params)) { $url .= '?' . http_build_query($params); }
 
	    // Tell streams to make a (GET, POST, PUT, or DELETE) request
	    // And use OAuth 2 access token as Authorization
	    $context = stream_context_create($opts);
 
	    // Hocus Pocus
	    $response = file_get_contents($url, false, $context);
 
	    // Native PHP object, please
	    return json_decode($response);
	}
}


?>