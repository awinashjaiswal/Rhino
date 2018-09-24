<?php

class UrlMapper{
	// two array for holding register path and methods
	public static $validPaths=array(0=>"#!");
	public static $validMethods=array(0=>"#!");

	// use to map the path with methods
	public static function mapper($path,$method=NULL) 
	{
		self::$validPaths[]=$path;
		Self::$validMethods[]=$method;

	}
	public static function routes(){   //find all the register methods and paths
		print_r(self::$validPaths);
		print_r(self::$validMethods);
	}

}
?>