<?php

//------------  class for basic database operation --------//

class DB{
	public function __construct(){
	        $this->host="localhost";
			$this->user="root";
			$this->password="";
			$this->db="gym";
			$this->conn=new mysqli($this->host,$this->user,$this->password,$this->db);
			if(!$this->conn)
			die("error".$this->{$conn->error});
			
		}
	public function input($inputs,$type)
	{
		if($type==NULL)
		{
			$type="POST";

		}
		if(is_array($inputs) && $type=="POST")
		{
			
			foreach($inputs as $input)
			{
				$request[$input]=$_POST[$input];
				
			}
			$request=(object) $request;
		}
		elseif(is_array($inputs) && $type=="GET")
		{
			$i=0;
			foreach($request as $input)
			{
				$requset[$i]=$_GET[$input];
				$i++;
			}
		}
		return $request;
	}
	public function qry($query)    // -------------- make a sql query -------//
	{
	        
	        
	        if($this->result=$this->conn->query($query))
		{
			if(is_object($this->result))
			{
				//----------- script Runs on select query---------//
				$array=array();
				while($row=$this->result->fetch_object())
				{
					array_push($array,$row);
				}
				return $array;
			}
			else{
				//----------Display on insert update and delete ----------//
				
				return true;
			}
		}
		else{
			
			return $this->conn->error;
		}

	}

	public function validate($variable,$id) //------- check if the input is empty -----//
	{
		if(is_object($variable))
		{	//var_dump($variable);
			foreach($variable as $key=>$values)
			{
				if(empty($variable->$key))
				{

					DB::message_box($id,"some fields are empty");
					die();
				}
				else{
					$variable->$key=stripslashes($variable->$key);
					$variable->$key=$this->conn->real_escape_string($variable->$key);
				}
			}
			return $variable;
		}
		else
		{
			if(empty($variable)){
			DB::message_box($id,"some fields are empty");
			die();

			}
			else{
				$variable=stripslashes($variable);
				$variable=$this->conn->real_escape_string($variable);
				return $variable;
			}
		}
	}
	public function __destruct(){
		$this->conn->close();
	}
	public function message_box($id,$message)
	{
		echo "<script>
		document.getElementById('".$id."').innerHTML='".$message."';
		document.getElementById('".$id."').style.display='block';
		</script>";
	}
} 

// Login t

/*
//-------------  here is synopsis ------------//
$object=new DB();							
$object->validate($variable,$id)  						//-- check if input is empty											 //-- initializing database class
//$object->qry("INSERT INTO `derpartment` (`id`, `name`) VALUES (NULL, \"chemistry\")"); //-- inserting
$result=$object->qry("select * from derpartment");		//--- fetching data

foreach($result as $row)
{
	echo $row->name."\n";
}
*/
?>