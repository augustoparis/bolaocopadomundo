<?php
  
require_once("DataBase.php");
// require_once("Util.php");
require_once("Crypto.php");
  
class Operadores
{
    var $database;
      
    public function __construct() {
    	// Utils::setFullLimit();
        $this->database = new DataBase();
    }
	      
    public function all( $params ) {
    	$sql  = "";
        $sql .= " SELECT OPERADORES.ID_OPERADORES, OPERADORES.NOME, OPERADORES.EMAIL, 
        	OPERADORES.USUARIO, OPERADORES.SENHA, OPERADORES.ATIVO ";
        $sql .= " FROM OPERADORES ";
        $sql .= " WHERE OPERADORES.ATIVO = " . $params['ativo'];
        $sql .= " AND OPERADORES.ID_OPERADORES = " . Session::get('ID_OPERADORES');
        $sql .= " ORDER BY OPERADORES.ID_OPERADORES ";
			
		$retorno = $this->database->select_sql( $sql );
		foreach ($retorno as $key => $value) {
			$retorno[ $key ][ 'SENHA' ] = Crypto::decode( $value['SENHA'] );
		}
		return $retorno;
	}  
	
	public function editar( $params ) {
		$codigo = utf8_decode($params['codigo']);
		
    	$sql  = "";
        $sql .= " SELECT * FROM OPERADORES ";
        $sql .= " WHERE ID_OPERADORES = " . $codigo;
        $sql .= " ORDER BY ID_OPERADORES ";
			 
       	$r = $this->database->select_sql( $sql );
		$r[0]['SENHA'] = Crypto::decode($r[0]['SENHA']);
		return $r[0];
	}		

	private function usuarioExiste( $params ) {
		$params = utf8_decode($params);
		
    	$sql  = "";
        $sql .= " SELECT * FROM OPERADORES ";
        $sql .= " WHERE USUARIO = '" . $params . "'";
        $sql .= " ORDER BY ID_OPERADORES ";
			 
       	return $this->database->select_sql( $sql );
	}
	
	private function emailExiste( $params ) {
		$params = utf8_decode($params);
		
    	$sql  = "";
        $sql .= " SELECT * FROM OPERADORES ";
        $sql .= " WHERE EMAIL = '" . $params . "'";
        $sql .= " ORDER BY ID_OPERADORES ";
			 
       	return $this->database->select_sql( $sql );
	}
	
	private function cadastroValidate( $params ) {
		if ( $params['id_operadores'] == 0 ) 
		{
			$r = $this->usuarioExiste( $params['usuario'] );
			if ( is_array($r) ) 
				return 'Este usuário já está sendo usado.';
		
			$r = $this->emailExiste( $params['email'] );
			if ( is_array($r) ) 
				return 'Este endereço de e-mail já está sendo usado.';
		}
		
		return true;
	}				
       
    public function salvar( $params ) {
    	if ( is_string($r = $this->cadastroValidate( $params )) ) {
    		return $r;
    	}
    	
    	if ( array_key_exists('operadores-novo', $params) ) {
 		   	$params['id_operadores'] = 0;
 		   	$params['ativo'] = '1';
    	} else {
    		$params['email'  ] = Session::get('EMAIL');
			$params['usuario'] = Session::get('USUARIO');
    	}
    	
    	$id_operadores 	= utf8_decode( $params['id_operadores'] );
    	$nome  		   	= utf8_decode( $params['nome'] );		
 		$email 	 		= utf8_decode( $params['email'] );		
		$usuario 		= strtoupper(utf8_decode( $params['usuario'] ));
    	$senha 	 	   	= Crypto::encode(strtoupper(utf8_decode( $params['senha'] )));
    	$ativo 	 	   	= utf8_decode( $params['ativo'] );
    	    	    	
    	$params = array(
    		'ID_OPERADORES' 	=> $id_operadores,
    		'NOME' 				=> "'$nome'",
    		'EMAIL' 			=> "'$email'",
    		'USUARIO' 			=> "'$usuario'",
    		'SENHA' 			=> "'$senha'",
    	    'ATIVO' 			=> $ativo,
    	);
    	
    	// var_dump( $params );
    	// exit;
    	
    	return (int) $this->database->execute_sp('SX_OPERADORES', $params, $id_name, $id);
    }

	public function deletar( $params ) {
		$codigo = utf8_decode($params['codigo']);
		return $this->database->execute_sql("UPDATE OPERADORES SET ATIVO = 0 WHERE ID_OPERADORES = $codigo ");
	}	
}