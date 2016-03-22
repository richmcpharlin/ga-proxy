<?php
//Load Config info
include('./config.inc.php');


//Check if we're looking to send data to Google
if($_SERVER['REQUEST_URI'] == '/collect'){

  //Build our GA url
  //Set Host
  $host = 'https://www.google-analytics.com/collect?';
  //Set parameters
  $params = http_build_query($_GET);
  //Add users IP address
  $params.= '&uip='.$_SERVER['REMOTE_ADDR'];
  
  //Start CURL handle
  $ch = curl_init();
  
  //Set Curl URL
  curl_setopt($ch, CURLOPT_URL, $host.$params); 
  
  //Execute CURL request and send output to browser
  curl_exec($ch);

  // close cURL resource, and free up system resources
  curl_close($ch);

}
