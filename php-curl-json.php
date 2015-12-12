<?php
class phpCurl{
  public function rest($endpoint = '', $method = '', $var = '', $optional = ''){
    // initiated variable curl
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $api_var ."verification/auth.do");
    // post data
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('username' => $_POST['email'], 'password' => $_POST['password'])));
    // set data inside header
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('TOKEN: 123'));
    // return data into json
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec($ch);
    curl_close ($ch);
    return $server_output;
  }
}
$phpCurl = new phpCurl();
?>
