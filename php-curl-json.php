<?php
class phpCurl{
  public function rest($data){
    // initiated variable curl
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $data['endpoint']);
    if($data['method'] === 'post'){
      // post data
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data['variable']));
      if(isset($data['file'])){
        curl_setopt($ch, CURLOPT_POSTFIELDS, array(
          $data['file']['name'] => '@' . realpath($data['file']['realpath'])
        ));
      }
    } else if($data['method'] === 'delete'){
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data['variable']));
    }

// output the response
curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
    // set data inside header
    curl_setopt($ch, CURLOPT_HEADER, $data['header']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    if(@$data['http_header']){
      curl_setopt($ch, CURLOPT_HTTPHEADER, $data['http_header']);
    }
    // return data into json
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec($ch);
    curl_close ($ch);
    $dataset = json_decode($server_output, true);
    return $dataset;
  }
}
$phpCurl = new phpCurl();
?>
