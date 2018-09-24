<?php

// ---------- class file uploading -------------//

// get file name
// change file name optional
// check the mime
// check file size 
// get target directory name 
// message if file uploaded 
class FileUploader{

	public function __construct() 
	{
		
		$upload;
		$this->upload=0;
	}
	public function file_ref($file_ref) //-- ref of file name //-- 
	{
		$this->file_ref=$file_ref;
		$this->file_name=$_FILES[$file_ref]['name'];
		
	}
	public function get_extension()
	{
		$ext=explode(".",$this->file_name);
		return $ext[1];
	}
	public function rename_file($name)
	{
		$ext=explode(".",$this->file_name);
		$this->file_name=$name.".".$ext[1];
		return $this->file_name;
	}

	public function type($type,$id)    //------- file extension validator,accepts --array-- or --string--
	{
		$this->file_type=explode(".",$_FILES[$this->file_ref]['name']);
		
		if(is_array($type))
		{
			if(!in_array($this->file_type[1],$type))
			{
				$this->upload=0;
				$this->message_box('Invalid extension',$id);
				return false;
			}
			else
			{
				$this->upload=1;
				return true;
			}
		}
		else{
			
			if($this->file_type[1]!=$type)
			{
				$this->upload=0;
				$this->message_box("Invalid extension",$id);
				return false;
			}
			else{
				$this->upload=1;
				return true;
			}
		}
	}

	public function size($size,$id) //-- optional limit file size
	{
		$this->file_size=$_FILES[$this->file_ref]['size'];
		if($this->file_size>$size)
		{
			$this->upload=0;
			$this->message_box("File is greater than specified size",$id);
		}
		else{
			$this->upload=1;
		}
	}

	public function upload_location($directory) //-------  path of uploading directory
	{
		$this->target_file=$directory.$this->file_name;
		//echo $this->target_file;
		if(!file_exists($directory))
		{
			mkdir($directory);
		}
	}

	public function message_box($msg,$id)
	{
		echo "<script>document.getElementById('".$id."').innerHtml='".$msg."';
			document.getElementById('msg_box').style.display='block';
		</script>";
	}
	public function upload($id) // ------ if every thing goes ok upload file
	{
		if($this->upload==1)
		{
			if(move_uploaded_file($_FILES[$this->file_ref]['tmp_name'],$this->target_file))
			{
				$this->message_box("File Uploaded Successfully",$id);

			}
			else{
				echo "error";
			}
		}
	}


}

?>



<!-- ################################# documentation ########################################  -->
<!-- html>
<head>
	<title></title>
</head>
<body>
<form method="POST"  enctype="multipart/form-data">
	<input type="file" name="file">						//- file ref
	<input type="submit" name="submit" value="upload">
</form>
</body>
</html !-->



<!--?php 
if(isset($_POST['submit']))
{
	$uploader=new Upload();     			    //- creating uploader class with id of message box *
	$uploader->file_ref('file');				    //- use file ref as param *
	$uploader->rename_file('text');				    //- rename file to be uploaded (optional)
	$uploader->type('pdf','id');					//- validate the file type (recomended for security)
	$uploader->size('3000','id');					//- limit file size  (optional)
	$uploader->upload_location('../upload/');		//- path to upload the file *
	$uploader->upload('id');						//- if everything ok upload file *
}

? -->

