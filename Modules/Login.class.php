<?php
	class Login {
		
		function __constructor(){
			
		}
		
		
		// login method to log in to the database
		public function  log($userid,$password,$table)
		{	global $db;

			$userid=$db->validate($userid,'msg');
			$password=$db->validate($password,"msg");
			// query for login

			$result=$db->qry("select * from $table where phone=\"$userid\"" );
			
			

			if(!empty($result) and is_array($result))
			{
				
					
					if($password==$result[0]->password)
					{
						
						$_SESSION['id']=$result[0]->id;
						$_SESSION['token']=$result[0]->phone;
						return true;
						
					}
					else{
						echo false;
					}
			}
			else{
				return false;
			}

		}

		// is looged in to check if user is logged in or not to wiew the page
		public static function  isLoggedIn($table)
		{
			global $db;
			if(isset($_SESSION['id']))
			{
				$id=$_SESSION['id'];
				$person=$db->qry("select * from $table where id=\"$id\"");
				
				if(empty($person))
				{
					return false;
				}

				else{
					
					if($person[0]->phone==$_SESSION['token'])

						return true;
				}
			}
			else{
				return false;
			}
			
			
			
		}
	}
?>