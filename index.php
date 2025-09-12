<?php 

$url = 'https://www.google.com/';

$handle = curl_init($url);

// define o retorno como string
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

$retorno = curl_exec($handle);

curl_close($handle);

echo $retorno;