<?php
// url recieved validator //
	$url=$_SERVER['REQUEST_URI'];     // recieving the request url from the url bar

	$newUrl=str_replace("/Rhino/public","",$url);

	
		// remove the bugs from uri
	$valid_url=trim($newUrl,"?.- %");

	if($key=array_search($valid_url,UrlMapper::$validPaths)){

		call_user_func(UrlMapper::$validMethods[$key]);
	}
	

	else{
		echo "404 Url specified not found";

	}
?>