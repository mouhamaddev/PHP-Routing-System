<?php

namespace app;
use \Database;

class HelloController {
    
    public function index($data) {
        $params = $data['$params']; // Params usage example
        $object = Database::query("SELECT * FROM objects WHERE params = '$params'")[0]; // DB usage example
        if(!empty($object)) {
            $response = array(
                'status' => 'success',
                'message' => $object['message'],
            );
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'Object not found',
            );
        }
        return $response;
    }
}