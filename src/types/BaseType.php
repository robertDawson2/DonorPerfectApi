<?php
namespace DonorPerfectApi\Types;

use Exception;

class BaseType {
    protected static $fields = [];
    protected static $required = [];
    protected $data = [];

    public function __construct($data)
    {
        // Set all supplied & allowed fields
        foreach(static::$fields as $field) {
            if(isset($data[$field])) {
                $this->data[$field] = $data[$field];
            }
        }
    }

    public function getData() {
        if(!$this->isDataClean()) {
            throw new Exception("Required fields missing.");
        }

        return $this->data;
    }

    public function isDataClean() {
        foreach(static::$required as $requiredField) {
            if(!isset($this->data[$requiredField])) {
                return false;
            }
        }
        return true;
    }
}