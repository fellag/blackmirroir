<?php

 

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"http://adneomapisubject.herokuapp.com/");
curl_setopt($ch, CURLOPT_POST, 1);

curl_setopt($ch, CURLOPT_POSTFIELDS,
            "Id=7");
curl_setopt($ch, CURLOPT_VERBOSE, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type:application/x-www-form-urlencoded','X-Auth-Token:TokenAPIadneom2018PhPSym'));


// receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec ($ch);

 
curl_close ($ch);
 
$data = json_decode($server_output, true);
var_export($data);