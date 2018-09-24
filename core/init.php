<?php


//--- load classes that are needed only -----//
spl_autoload_register(function($class)
{
	require_once	"../Modules/".$class.'.class.php';
});


?>
