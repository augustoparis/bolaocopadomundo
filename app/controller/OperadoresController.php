<?php
  
require_once("Operadores.php");
  
class OperadoresController
{
    private $model; 
	
    public function __construct() {
        $this->model = new Operadores();
    }
      
    public function all( $params ) {
        return $this->model->all( $params );
    }
	
    public function editar( $params ) {
		return $this->model->editar( $params );
    }	
	
    public function salvar( $params ) {
    	parse_str( $params['form'], $params );
		return $this->model->salvar( $params );
    }

    public function deletar( $params ) {
		return $this->model->deletar( $params );
    }
}
  
$controller = new OperadoresController();

$method = $_POST['method'];
$params = $_POST;

echo json_encode( $controller->$method($params) );