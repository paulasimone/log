<?php

namespace App\Controller;

class RestController {

    public function __construct() {
        try {
            if(isset($_SERVER['REQUEST_METHOD'])) {
                $this->{'_' . $_SERVER['REQUEST_METHOD']}();
            }
            
        } catch (\Exception $e) {
            echo 'Exception: ',  $e->getMessage(), "\n";
        }
    }
        
    public function _GET(){}
    public function _POST() {}
    public function _PUT() {}
    public function _DELETE() {}
}