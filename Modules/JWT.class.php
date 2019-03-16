<?php
	class JWT{
		// create token after successfull login
			// create header
			static $secret="abc123!";
			static $setPayload="";
			static $payload="";
			 static function createHeader(){
				$header = json_encode(['typ' => 'JWT', 'alg' => 'SHA256']);
				$base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));
				return $base64UrlHeader;
			}
			// create payload
			 static function createPayload(){

				$payload = json_encode(JWT::$setPayload);
				$base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));
				return $base64UrlPayload;
			}
			// create signature
			 static function createSignature($secret){
				$base64UrlHeader=JWT::createHeader();
				$base64UrlPayload=JWT::createPayload();
				$signature = hash_hmac('SHA256', $base64UrlHeader . "." . $base64UrlPayload, $secret);
				$base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));
				return $base64UrlSignature;
			}
			public static function createToken(){
				$header=JWT::createHeader();
				$payload=JWT::createPayload();
				$signature=JWT::createSignature(JWT::$secret);
				return ($header.".".$payload.".".$signature);
			}
//---------------------  end of token creation -----------------------//
		// validate token 
			public static function checkBugs($header,$payload,$signature){
				// read algo from header
				$header_data=str_replace(['-', '_', ''],['+', '/', '='],  $header);
				
				$header_data=json_decode(base64_decode($header_data));
				// creating new signature using payload and header
				$newSignature=hash_hmac($header_data->alg,$header.".".$payload,JWT::$secret);
				// encoding the signature 
				$newSignature=str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($newSignature));
				// checking if signature matches
				if($newSignature==$signature){
					return true;
				}
				else{
					return false;
				}
			}
			// parse the token
			public  static function  parseToken($token){
				$data=explode(".",$token);
				$header=$data[0];
				$payload=$data[1];
				$base64UrlPayload=str_replace( ['-', '_', ''],['+', '/', '='],$payload);
				$base64UrlPayload = base64_decode($base64UrlPayload);
				JWT::$payload=$base64UrlPayload;
				$signature=$data[2];
				if(JWT::checkBugs($header,$payload,$signature)){
					return true;
				}
				else{
					return false;
				}

				

			}
			public  static function verifyToken($token){
				if(JWT::parseToken($token)){
					return true;
				}
				else{
					return false;
				}
			}
			public static function getPayload(){
				return json_decode(JWT::$payload);
			}
				// split header ,payload ,signature

				// get the algo from header
				// get the payload data
				
	}



	 
?>
