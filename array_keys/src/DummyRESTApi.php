<?php

namespace ArrayKeys;

require_once 'ArrayKeys.php';

/**
 * This class is a dummy responder.
 *  
 * @author Elías A. Angulo Klein <elias.angulo.klein(at)gmail.com>
 * @see https://github.com/crossplatformdev
 * @version nightly
 * @license https://www.gnu.org/licenses/gpl-3.0.html GPLv3
 * @copyright (c) Humankind, all of them (oh, and of course Dolphins too!). ☺
 */
class DummyRESTApi {

    private $arrayKeys = null;
    private $request = null;
    private $response = null;

    /**
     * Empty constructor. Some frameworks won't work without it. 
     * This one initialices $arrayKeys.
     */
    public function __construct() {
        $this->arrayKeys = new ArrayKeys();
    }

    public function handleRequest() {
        $value = $this->checkPostVariable(json_decode(file_get_contents('php://input')));
        $this->request = (!is_null($value)) ? $value : null;
    }

    /**
     * TODO
     * 
     * Intends to accept a comment vía GET method.
     * This would be the place to save it to DB.
     * 
     */
    public function acceptComment() {
        $this->response = null;

        $name = $_GET['name'];
        $message = $_GET['message'];
        $stars = $_GET['stars'];
        $date = $_GET['date'];

        $this->response = '{
            "name": "' . $name . '",
            "message": "' . $message . '",
            "stars": ' . $stars . ',
            "date": "' . $date . '"
        }';
        echo $this->response;
    }

    /**
     * Receives a JSON array on POST requests,
     * parses its arguments to invoke my_array_keys(...)
     * and echoes the response.
     * 
     * This function take no arguments.
     */
    public function emmitResponse() {
        $this->handleRequest();
        $this->response = null;
        $params = [
            "array" => $this->checkPostVariable($this->request->array),
            "searchValue" => $this->checkPostVariable($this->request->search_value),
            "strict" => $this->checkPostVariable($this->request->strict),
            "expandArray" => $this->checkPostVariable($this->request->expand_array),
            "depth" => $this->checkPostVariable($this->request->depth),
            "MAX_DEPTH" => $this->checkPostVariable($this->request->max_depth),
            "keys" => $this->checkPostVariable($this->request->keys),
        ];

        $this->response = $this->arrayKeys->my_array_keys($params["array"], $params["searchValue"], $params["strict"], $params["expandArray"], $params["depth"], $params["MAX_DEPTH"], $params["keys"]);

        echo json_encode($this->response, JSON_PRETTY_PRINT);
    }

    /**
     * Performs a simple error check.
     * 
     * @param type $var variable to check.
     * @return type $var if is set and not empty, INF if equals to "INF".
     */
    private function checkPostVariable($var) {
        $return = false;

        if (isset($var) && !empty($var)) {
            $return = $var;
            if ($var === "INF") {
                return INF;
            }
        }

        return $var;
    }

}

?>