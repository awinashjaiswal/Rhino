<?php
	class Request{
		
		public static function inputs()
		{
			if(!empty($_POST))
			return (object)$_POST;
			elseif(!empty($_GET))
				return (object)$_GET;
			else
				return "error:no request found";
		}
		
	}
?>