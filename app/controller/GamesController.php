<?php
  
require_once("Games.php");
  
class GamesController
{
    private $model; 
	
    public function __construct() {
        $this->model = new Games();
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
  
$controller = new GamesController();

$method = $_POST['method'];
$params = $_POST;

echo json_encode( $controller->$method($params) );