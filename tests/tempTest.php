<?php
require_once "../src/DonorPerfectApi.php";
require_once "../src/types/BaseType.php";
require_once "../src/types/DonorUserDefinedFieldType.php";

use DonorPerfectApi\DonorPerfectApi;


$dpApi = new DonorPerfectApi("sHmOaMBhaDF7ml5wnralegttGDrosCpwRZYWgaXDd5JkkYyKnQE8IEgkufFWX3BFLSVY2A%2bg1iQRPKZ3fhYqhs0EdjOfLKjIIyhfefm0p0M%3d");

$result = $dpApi->updateDonorUserDefinedFields(143, ['DS_RATING' => "DS1-2", "NO_GIFT_MATCHES" => 55, 'MATCH_QUALITY' => 19.9]);

//$dpApi->executeDynamicQuery("SELECT * FROM dp WHERE donor_id=132");

//$result = $dpApi->executeDynamicQuery("SELECT donor_id, first_name, last_name, middle_name, suffix, address, city, state, zip, created_date, modified_date FROM dp WHERE COALESCE(modified_date, created_date) > '2021-01-01 00:00:00' order by donor_id");
print_r($result);

//$dpApi->testConnection();