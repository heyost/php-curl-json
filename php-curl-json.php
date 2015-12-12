<?php
class phpCurl{
  public function rest($endpoint = '', $method = '', $var = '', $optional = '', $header = ''){
    // initiated variable curl
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $endpoint);
    if($method === 'post'){
      // post data
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($var));
    }
    // set data inside header
    curl_setopt($ch, CURLOPT_HEADER, $header);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    if(isset($optional)){
      curl_setopt($ch, CURLOPT_HTTPHEADER, $optional);
    }
    // return data into json
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec($ch);
    curl_close ($ch);
    return $server_output;
  }
}
$phpCurl = new phpCurl();
?>
