<?php
header('Content-type: text/html; charset=utf-8');


function curl_connects($service_url) {
$ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_URL, $service_url);
    curl_setopt($ch, CURLOPT_REFERER, $service_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;	
}
  $service_url = 'http://www.nagieos.com/BankPullTransaction/cronjob';
  echo $api_get_data = curl_connects($service_url)."aa";


 




?>
