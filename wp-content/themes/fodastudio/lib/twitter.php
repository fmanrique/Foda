<?php



function _BaseString($base_url, $method, $values) {
    $ret = array();
    ksort($values);
    foreach($values as $key=>$value)
    $ret[] = $key."=".rawurlencode($value);
    return $method."&".rawurlencode($base_url).'&'.rawurlencode(implode('&', $ret));
}

function _AuthorizationHeader($oauth) {
    $ret = 'Authorization: OAuth ';
    $values = array();
    foreach($oauth as $key=>$value)
    $values[] = $key.'="'.rawurlencode($value).'"';
    $ret .= implode(', ', $values);
    return $ret;
}

 
function tf_tweets() {
	/**
	 *  Usage:
	 *  Send the url you want to access url encoded in the url paramater, for example (This is with JS): 
	 *  /twitter-proxy.php?url='+encodeURIComponent('statuses/user_timeline.json?screen_name=MikeRogers0&count=2')
	*/

	

	$params = $_REQUEST['request']['parameters'];

	// The tokens, keys and secrets from the app you created at https://dev.twitter.com/apps
	$config = array(
		'oauth_access_token' => '2811669614-HD9K5n3PbZuIm6sCqQMIkZ9J6JczCUeXRb1BTdy',
		'oauth_access_token_secret' => 'Hsrupr0U50fS9YVonix2ymcntAG6eKg31uiTT0hIR4pnc',
		'consumer_key' => 'g1yULqZxNtoO1JjCjCPg8gXyk',
		'consumer_secret' => 'dvpqep5IMDlAbc8fcH1OCdoNuImg9TQaezaGJ2iyvhRwxfmJBu',
		'base_url' => 'https://api.twitter.com/1.1/',
		//Request specific user
	    'screen_name' => $params['screen_name'][0],
	    'count' => $params['count']
	);

	$twitter_request = 'statuses/user_timeline.json?screen_name='.$config['screen_name'].'&count='.$config['count'].'&exclude_replies=true&contributor_details=false&include_rts=false';


	// Parse $twitter_request into URL parameters
	$url_part = parse_url($twitter_request);

	/* url_arguments=
	* Array
	* (
	*    [screen_name] => lcherone
	*    [count] => 3
	* )
	*/
	parse_str($url_part['query'], $url_arguments);

	$base_url = $config['base_url'].$url_part['path'];
	$full_url = $config['base_url'].$twitter_request;

	// Set up the OAuth authorization array
	$oauth = array(
	'oauth_consumer_key' => $config['consumer_key'],
	'oauth_nonce' => time(),
	'oauth_signature_method' => 'HMAC-SHA1',
	'oauth_token' => $config['oauth_access_token'],
	'oauth_timestamp' => time(),
	'oauth_version' => '1.0'
	);

	// Build vectors for request
	$composite_request = _BaseString($base_url, 'GET', array_merge($oauth, $url_arguments));
	$composite_key     = rawurlencode($config['consumer_secret']).'&'.rawurlencode($config['oauth_access_token_secret']);
	$oauth_signature   = base64_encode(hash_hmac('sha1', $composite_request, $composite_key, true));
	$oauth['oauth_signature'] = $oauth_signature;

	// Make cURL Request
	$options = array(
	CURLOPT_HTTPHEADER => array(_AuthorizationHeader($oauth),'Expect:'),
	CURLOPT_HEADER => false,
	CURLOPT_URL => $full_url,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_SSL_VERIFYPEER => false
	);

	$feed = curl_init();
	curl_setopt_array($feed, $options);
	$result = curl_exec($feed);
	$info = curl_getinfo($feed);
	curl_close($feed);

	// Send suitable headers to the end user.
	/*if(isset($info['content_type']) && isset($info['size_download'])){
	    header('Content-Type: '.$info['content_type']);
	    header('Content-Length: '.$info['size_download']);
	}*/

	echo "{\"response\":";
	print_r($result);
	echo ",\"message\":false}";
	
	die;
}
 
function add_tf_tweets () {
    // - add it to WP RSS feeds -
    add_feed('twitter', 'tf_tweets');
}
 
add_action('init','add_tf_tweets');

?>