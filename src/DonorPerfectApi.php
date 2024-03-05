<?php

namespace DonorPerfectApi;
use DonorPerfectApi\Types\DonorUserDefinedFieldType;

class DonorPerfectApi
{
    private $apiKey;
    private $apiBaseUrl = 'https://www.donorperfect.net/prod/xmlrequest.asp';
    private $action;
    private $params;

    protected const ROW_RETRIEVAL_LIMIT = 500;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * Set the API key dynamically.
     *
     * @param string $apiKey
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function testConnection() {
        $sql = "SELECT donor_id FROM dp where donor_id = 1";
        $result = $this->executeDynamicQuery($sql);
        return $result['success'];
    }

    /**
     * Get donor information by donor ID.
     *
     * @param int $donorId
     * @return array|null
     */
    public function getDonor($donorId)
    {
        // Implementation to fetch donor information from the DonorPerfect API
        // Use $this->makeApiRequest() or similar method for making API requests

        // Example:
        // $response = $this->makeApiRequest('GET', 'donors/' . $donorId);

        // Parse and return the response
        // return json_decode($response, true);

        // For simplicity, return a dummy response
        return ['id' => $donorId, 'name' => 'John Doe', 'email' => 'john@example.com'];
    }

    /**
     * Upsert donor-level user-defined fields.
     *
     * @param int $donorId - id of the donor to update - required for the query to be successful
     * @param array $fields - array of fields to update, as a key value pair, based on DP API fields
     * @return array of successful and fail-state field names, in the format of 
     * [successes => [a,b,c,..], failures => [d,e,f,...]]
     * 
     * Throws generic exception on api error
     */
    public function updateDonorUserDefinedFields($donorId, $fields)
    {
        $fields['donor_id'] = $donorId;
        // create new Donor UDF type to clean the fields, including donor id
        $dudf = new DonorUserDefinedFieldType($fields);
        $this->action = "dp_save_udf_xml";
        $useableData = $dudf->getData();

        // remove donor_id -> we don't need it in the iteration
        unset($useableData['donor_id']);

    $results = array('successes' => [], 'failures' => []);
    // iterate all fields to update, as the endpoint can only do one update at a time
        foreach($useableData as $field => $value) {
            $this->params = ['@matching_id' => $donorId];

            // parse out numeric types where applicable
            if(in_array($field, DonorUserDefinedFieldType::getNumericTypes())) {
                $this->params['@data_type'] = "N";
                $this->params['@numeric_value'] = $value;
            } else {
                $this->params['@data_type'] = "C";
                $this->params['@char_value'] = $value;
            }
            $this->params['@field_name'] = $field;
            $this->params['@user_id'] = 'DpApiConnect';

            // make our request, and build our return structure
            $result = $this->makeApiRequest();
            if($result['success']) {
                $results['successes'][] = $field;
            } else {
                $results['failures'][] = $field;
            }
        }

        return $results;
    }

    /**
     * Function to execute a dynamic query not already created as a standard endpoint
     * 
     * returns a php object response
     */
    public function executeDynamicQuery($query) {
        $this->action = $query;
        return $this->makeApiRequest();
    }

    /**
     * Make a request to the DonorPerfect API.
     *
     * @param string $method
     * @param string $endpoint
     * @param array $data
     * @return string
     */

    private function makeApiRequest()
    {
        $url = $this->apiBaseUrl;
        $url .= "?apikey=" . $this->apiKey;
        $url .= "&action=" . urlencode($this->action);
        if(!empty($this->params)) {
            $url .= "&params=";
            foreach($this->params as $key => $val) {
                $url .= $key . "=";
                if(is_numeric($val)) {
                    $url .= $val;
                } else {
                    $url .= "'$val'"; 
                }
                $url .= ",";
            }
            $url = substr($url, 0, -1);
        }

        echo $url . "\n";
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 60,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/xml"
            ],
        ]);

        $response = curl_exec($curl);
        $xml = simplexml_load_string($response);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            return [
                'success' => false,
                'errors' => [
                    [
                        'name' => 'curl-error',
                        'reason' => $err,
                        'id' => 'curl-error',
                        'value' => false
                    ]
                ]
                    ];
        } else {
            return self::parseXml($xml);
        }
    }

    private static function parseXml($xml) {
        $result = array('success' => true);

        if(isset($xml->record)) {
                $result['records'] = [];
                foreach($xml->record as $nestedRecord) {
                    $nr = [];
                    foreach($nestedRecord->field as $nestedField) {
                        $attributesArray = (array) $nestedField->attributes();
                        $attributes = $attributesArray["@attributes"];
                        $nr[$attributes['id']] = $attributes['value'];
                    }
                    $result['records'][] = $nr;
                }
            }
            if(isset($xml->error)) {
                $result['success'] = false;
                $result['errors'] = [];
                $errors = (array) $xml->field;
                $result['errors'][] = $errors['@attributes'];
            }
        

        return $result;
    }
}
