<?php
  
require_once("DataBase.php");
require_once("Session.php");
require_once("Crypto.php");

class Login
{
    var $database;
      
    public function __construct() {
        $this->database = new DataBase();
    }
      
    public function logar( $params=null ) {
    	$usuario = strtoupper(utf8_decode($params["usuario"]));
    	$senha   = Crypto::encode(strtoupper(utf8_decode($params["senha"])));
    	
		$sql  = "";
        $sql .= " SELECT * 
        	FROM OPERADORES
        	WHERE USUARIO = '$usuario'
        	AND SENHA = '$senha' 
        	AND ATIVO = 1 ";
        
		$retorno = $this->database->select_sql( $sql );
        
		if ( $retorno != false ) {
			Session::create( $retorno[0] );
			return true;
		}
		
		return false;		
    }   
}