<?php

$response = json_decode(file_get_contents('response.json'), true);
$data = $response['DrugPricing'];

$pharmacyList = [];
$filtered = array_filter($data, function($element) use (&$pharmacyList) {
    foreach ($pharmacyList as $pharmacyIncluded) {
        if ($pharmacyIncluded['pharmacy'] === $element['pharmacy']) {
            if ($pharmacyIncluded['price'] === $element['price']) {
                // This is a duplicate based on pharmacy name and price
                return false;
            }
        }
    }

    $pharmacyList[] = $element;

    return true;
});

$response['DrugPricing'] = $filtered;

print_r($response);die();
