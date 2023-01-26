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

function sendTransaction($api_key, $api_secret, $account_id, $to, $amount, $currency) {
    try {
        $result = geturl("$api_url/send?api_key=$api_key&api_secret=$api_secret&account=$account_id&to=$to&amount=$amount");
        return $result;
    }
    catch(Exception $e) {
        return 'Error: ' .$e;
    }
}

function getTransaction($api_key, $api_secret, $transaction_id, $currency) {
    try {
        $result = geturl("$api_url/tx?api_key=$api_key&api_secret=$api_secret&txid=$transaction_id&currency=$currency");
        return $result;
    }
    catch(Exception $e) {
        return 'Error: ' .$e;
    }
}

function getBalance($api_key, $api_secret, $currency) {
    try {
        $result = geturl("$api_url/balance?api_key=$api_key&api_secret=$api_secret&currency=$currency");
        return $result;
    }
    catch(Exception $e) {
        return 'Error: ' .$e;
    }
}

function getAccounts($api_key, $api_secret) {
    try {
        $result = geturl("$api_url/accounts?api_key=$api_key&api_secret=$api_secret");
        return $result;
    }
    catch(Exception $e) {
        return 'Error: ' .$e;
    }
}

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