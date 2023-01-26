<?php

$api_url = "https://coinbaseapi.vercel.app";

function createAddress($api_key, $api_secret, $account_id, $webhook) {
    try {
        $result = geturl("$api_url/address?api_key=$api_key&api_secret=$api_secret&account=$account_id&webhook=$webhook");
        return $result;
    }
    catch(Exception $e) {
        return 'Error: ' .$e;
    }

}

function sendTransaction($api_key, $api_secret, $account_id, $webhook) {
    
}

function getTransaction() {}

function getBalance() {}

function getAccounts() {}

function geturl($url) {
    $crl = curl_init();
    curl_setopt($crl, CURLOPT_URL, $url);
    curl_setopt($crl, CURLOPT_FRESH_CONNECT, true);
    curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($crl);
    curl_close($crl);
    return json_decode($response, true);
}

?>