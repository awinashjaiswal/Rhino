<?php
// -- manage session ---//

class Session{
	public function __construct()
	{
		session_start();
	}

	// create session variable
	public function create($key,$data)
	{
		$_SESSION[$key]=$data;
	}
	// get session variable 
	public function get_data($key)
	{
		return $_SESSION[$key];
	}
	// set session variable
	public function set_data($key,$data)
	{
		$_SESSION[$key]=$data;
	}
	// session destroy
	public function destroy($key)
	{
		unset($_SESSION[$key]);
	}
	// destroy all session
	public function destroy_all()
	{
		session_destroy();
	}
}
?>