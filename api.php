<?phpphp

    $drug = htmlspecialchars($_REQUEST['drug']);
// $needle = $drug;
$radius = htmlspecialchars($_REQUEST['radius'] ?? '15');
$zipCode = htmlspecialchars($_REQUEST['zipCode'] ?? '90210');
$ndc = htmlspecialchars($_REQUEST['ndc'] ?? '65628007005');
$quantity = htmlspecialchars($_REQUEST['quantity'] ?? '30');



$curl = curl_init();

curl_setopt_array($curl, array(
CURLOPT_URL => "https://argusprod.dstsystems.com/pharmacy-drug-pricing/1.0/service/PharmacyPricing/?radius=$radius&zipCode=$zipCode&quantity=$quantity&ndc=$ndc",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => '',
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 0,
CURLOPT_FOLLOWLOCATION => true,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => 'GET',
CURLOPT_HTTPHEADER => array(
'Authorization: Basic V1NBWElBUlg6OFBaNzU1ZUVrZVVnQ3ByUHg1V3p1TUFDcGlJPQ==',
),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
die()

    ?>