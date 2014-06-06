<?php
  
require_once("DataBase.php");
require_once("Crypto.php");
require_once("Util.php");
  
class Games
{
    var $database;
      
    public function __construct() {
    	// Utils::setFullLimit();
        $this->database = new DataBase();
    }
	      
    public function all( $params ) {
			
    	$sql  = "";
        $sql .= " SELECT * FROM GAMES ";
        $sql .= " WHERE ACTIVE = " . $params['active'];
        $sql .= " ORDER BY GAMES.ID_GAME ";

		return $this->database->select_sql( $sql );				
	}  
	
	public function edit( $params ) {		
		$codigo = utf8_decode($params['code']);
		
    	$sql  = "";
        $sql .= " SELECT * FROM GAMES ";
        $sql .= " WHERE ID_GAME = " . $codigo;
        $sql .= " ORDER BY ID_GAME ";
			 
       	$r = $this->database->select_sql( $sql );
		return $r[0];
	}						
       
    public function save( $params ) {					    	
    	$id_game 	= utf8_decode( $params['id_game'] );
    	$team1 		= utf8_decode( $params['team1'] );		
 		$team2 	 	= utf8_decode( $params['team2'] );		
		$value 		= utf8_decode( Utils::formatCurrency($params['value']) );
    	$date 		= utf8_decode( Utils::formatadata_sql($params['date']) );
    	$hour 		= utf8_decode( $params['hour'] . ':00' );
		$active 	= utf8_decode( $params['active'] );
    	    	    	
    	$params = array(
    		'ID_GAME' 	=> $id_game,
    		'TEAM1' 	=> "'$team1'",
    		'TEAM2' 	=> "'$team2'",
    		'VALUE' 	=> $value,
    		'DATE' 		=> "'$date'",
    	    'HOUR' 		=> "'$hour'",
    	    'ACTIVE' 	=> $active
    	);
				
		return (int) $this->database->execute_sp('SX_GAMES', $params);
    }

	public function remove( $params ) {
		$code = utf8_decode($params['code']);
		return $this->database->execute_sql("UPDATE GAMES SET ACTIVE = 0 WHERE ID_GAME = $code ");
	}	
}