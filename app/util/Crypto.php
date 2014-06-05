<?php

/**
 * Description of Crypto
 * 
 * by Leandro Parasita
 * 
 */
class Crypto
{

    public static function encode($expression)
    {
        return self::ascii2hex( self::encodeStr($expression) );
    }
    
    public static function decode($expression)
    {
    	return self::decodeStr( self::hex2ascii($expression) );
    }

    public static function encodeStr($str)
    {
        $offSet = null;
        $iMax = strlen($str);
        for ($iCnt = 0; $iCnt < $iMax; $iCnt++)
        {
            $offSet = ord($str[$iCnt]);
            $offSet = ord(chr($offSet << 3) ^ chr($offSet >> 5));

            if ($offSet < 0)
                $offSet = 256 + ($offSet);

            $iCounter = 0;
            while ($iCounter < $iCnt)
            {
                $offSet = $offSet ^ (ord($str[$iCounter]));
                $iCounter++;
            }

            $offSet = $offSet + hexdec('2D');

            if ($offSet < 0)
                $offSet = 256 + ($offSet);

            $iCounter = $iMax;
            while ($iCounter > $iCnt)
            {
            	if (isset($str[$iCounter]))
                	$offSet = $offSet ^ (ord($str[$iCounter]));
                
                $iCounter--;
            }

            $offSet = $offSet + hexdec('1E');
            $str[$iCnt] = chr($offSet);
        }

        return $str;
    }
    
    public static function decodeStr($str)
    {
    	$offSet = null;
    	$iMax = strlen($str);
    	$iCnt = $iMax;
    	
    	while ($iCnt--)
    	{
			$offSet = ord($str[$iCnt]);
			$offSet = $offSet - hexdec('1E');
			
			$iCounter = $iMax;
            while ($iCounter > $iCnt)
            {
            	if (isset($str[$iCounter]))
            		$offSet = $offSet ^ (ord($str[$iCounter]));
                $iCounter--;
            }
            
            $offSet = $offSet - hexdec('2D');
            
            $iCounter = 0;
			while ($iCounter < $iCnt)
			{
				$offSet = $offSet ^ (ord($str[$iCounter]));
                $iCounter++;
            }
            
			if ($offSet < 0)
                $offSet = 256 + ($offSet);
            
            $str[$iCnt] = chr( ($offSet >> 3) ^ ($offSet << 5) );
    	}
    	
    	return $str;
    }
    
    public static function ascii2hex($ascii)
    {
        $hexadecimal = '';
        
        for ($i = 0; $i < strlen($ascii); $i++)
			$hexadecimal .= strtoupper( str_pad( dechex(ord($ascii{$i})) , 2, "0", STR_PAD_LEFT) );
        
        return $hexadecimal;
    }
    
	public static function hex2ascii($hex)
	{
		$ascii	= '';
		$hex	= str_replace(" ", "", $hex);
		
		for ($i = 0; $i < strlen($hex); $i = $i + 2)
			$ascii .= chr( hexdec( substr( $hex, $i, 2 ) ) );
		
		return $ascii;
	}
}