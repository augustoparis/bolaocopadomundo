<?php
  
require_once("DataBase.php");
require_once("Session.php");
require_once("Crypto.php");
require_once("Util.php");
  
class Bets
{
    var $database;
      
    public function __construct() {
    	Utils::setFullLimit();
        
    	$this->database = new DataBase();
    }
	      
    public function all( $params ) {
    	$sql  = "";
        //$sql .= " SELECT BETS.*, CONCAT( GAMES.TEAM1, ': ', BETS.RESULT1 ) AS GAME1, CONCAT( GAMES.TEAM2, ': ', BETS.RESULT2 ) AS GAME2, ";
		//$sql .= " GAMES.VALUE AS VALUEGAME ";
		$sql .= " SELECT BETS.*, GAMES.* " ;
		$sql .= " FROM BETS LEFT JOIN GAMES ON BETS.ID_GAME = GAMES.ID_GAME ";
        $sql .= " WHERE ID_USER = " . $_SESSION['ID_USER'];
        $sql .= " ORDER BY ID_BET ";

		$retorno = $this->database->select_sql( $sql );

		foreach ($retorno as $key => $value) {
			$retorno[ $key ][ 'VALUE' ] = Utils::formatCurrencyBr( $value['VALUE'] );
		}
		
		return $retorno;
    }  
	
	public function allUsers( $params ) {
    	$sql  = "";
		$sql .= " SELECT USERS.ID_USER, BETS.*, GAMES.*, USERS.NAME " ;
		$sql .= " FROM BETS INNER JOIN GAMES ON BETS.ID_GAME = GAMES.ID_GAME INNER JOIN USERS ON BETS.ID_USER = USERS.ID_USER ";
        $sql .= " ORDER BY USERS.ID_USER ";

		$retorno = $this->database->select_sql( $sql );

		foreach ($retorno as $key => $value) {
			$retorno[ $key ][ 'VALUE' ] = Utils::formatCurrencyBr( $value['VALUE'] );
		}
		
		return $retorno;
    }
	
	public function edit( $params ) {		
		$codigo = utf8_decode($params['code']);
		
		$sql  = "";
        $sql .= " SELECT BETS.*, CONCAT( GAMES.TEAM1, ': ', BETS.RESULT1 ) AS GAME1, CONCAT( GAMES.TEAM2, ': ', BETS.RESULT2 ) AS GAME2, ";
		$sql .= " GAMES.VALUE AS VALUEGAME "; 
		$sql .= " FROM BETS LEFT JOIN GAMES ON BETS.ID_GAME = GAMES.ID_GAME ";
        $sql .= " WHERE ID_USER = " . $_SESSION['ID_USER'];
		$sql .= " AND BETS.ID_BET = $codigo ";
        $sql .= " ORDER BY ID_BET ";

		$retorno = $this->database->select_sql( $sql );
		
		
		foreach ($retorno as $key => $value) {
			$retorno[ $key ][ 'VALUEGAME' ] = Utils::formatCurrencyBr( $value['VALUEGAME'] );
		}
		
		return $retorno[0];
	}						
       
    public function save( $params ) {		
    	$id_bet 	= utf8_decode( $params['id_bet'] );									    	
    	$id_game 	= utf8_decode( $params['id_game'] );
		$id_user	= $_SESSION['ID_USER'];
    	$result1	= utf8_decode( $params['result1'] );		
 		$result2 	= utf8_decode( $params['result2'] );		
    	    	    	
    	$params = array(
    		'ID_BET' 	=> $id_bet,
    		'ID_USER'	=> $id_user,
    		'ID_GAME' 	=> $id_game,
    		'RESULT1' 	=> $result1,
    		'RESULT2' 	=> $result2
    	);
				
		return (int) $this->database->execute_sp('SX_BETS', $params);
    }

	public function remove( $params ) {
		$code = utf8_decode($params['code']);
		return $this->database->execute_sql("UPDATE GAMES SET ACTIVE = 0 WHERE ID_GAME = $code ");
	}	
	
	public function getGamaes() {
		$sql = "";
		$sql .= " SELECT CONCAT( ID_GAME, ' - ', TEAM1, ' X ', TEAM2, ' - Dia ', DATE_FORMAT( `DATE` , '%d/%c/%Y' ) , ' ás ', HOUR ) AS TEAMS, ";
		$sql .= " ID_GAME, TEAM1, TEAM2 FROM GAMES ";
		
		return $this->database->select_sql( $sql );
	}
}