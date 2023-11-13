<?php
    class ApiView{
        
        public function response($data, $status){
            // le decimos al cliente que es un json  lo que estamos mandando
            header("content-Type: application/json");
            // le decimos el estado, si es 204 etc
            header("HTTP/1.1 {$status} " . $this->_requestStatus($status));
            // mandamos los datos del recurso
            echo json_encode($data); 
        }

        private function _requestStatus($code){
            // con esta funcion mapeamos y decimos que mensaje mandar decorde al estado
            $status = array(
                200 => "OK",
                201 => "created",
                404 => "Not found",
                500 => "international server error",
            );
            return (isset($status[$code])) ? $status[$code] : $status[500];
        }
        
    }