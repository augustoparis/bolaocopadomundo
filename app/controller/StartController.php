<?php
  
require_once("Start.php");
  
class StartController
{
    private $model; 
	
    public function __construct() {
        $this->model = new Start();
    }
      
    public function winners( $params ) {
        return $this->model->winners( $params );
    }
    
    public function all( $params ) {
        return $this->model->all( $params );
    }
}
  
$controller = new StartController();

$method = $_POST['method'];
$params = $_POST;

echo json_encode( $controller->$method($params) );