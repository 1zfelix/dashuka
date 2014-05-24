<?php
	class db
	{
		public $con;
		function db($db)
		{
			global $con ;
			//$con = mysql_connect("localhost","root","123");
			$con = mysql_connect("localhost","root","");
			mysql_select_db($db,$con);
			
		}
		function db_close()
		{
			global $con ;
			mysql_close($con);
		}


		public function checkAccountExist($account){
			global $con;
			$sql ="select count(*) as num from user where account='".$account."'";
			$result=mysql_query($sql,$con);
			$result=mysql_fetch_array($result);
			return $result;
		}

		
		public function insertNewUser($account,$password,$username)
		{
			global $con;
			$sql ="insert into user values(0,'".$account."','".$password."','".$username."')";
			$result = mysql_query($sql,$con);
			return $result;
		}
		
		//2013.4.12 by zm
		public function getAllUsers()
		{
			global $con;
			$sql="select iduser,account,fullname,affliation from user";
			$result=mysql_query($sql,$con);
			return $result;
		}
		
		public function DeleteUsers($ID)
		{
			global $con;
			$sql="delete from user where iduser='".$ID."'";
			$result=mysql_query($sql,$con);
			return true;
		}
		
		public function getAllFiles()
		{
			global $con;
			$sql="select idfiles,filename,filesize,uptime from files";
			$result=mysql_query($sql,$con);
			return $result;
		}
		
		//2013.4.15 by zm
		public function insertFileInfo($filename,$filesize,$uptime)
		{
			global $con;
			$sql="select count(*) as num  from files where filename = '".$filename."'";
			$check = mysql_query($sql,$con);
			$check = mysql_fetch_array($check);
			if(!$check['num'])
			{
				$sql="insert into files values(0,'".$filename."','".$filesize."','".$uptime."')";
				$result=mysql_query($sql,$con);
				return $result;
			}
			return false;
		}
		
		public function DeleteFiles($ID)
		{
			global $con;
			$sql="select filename from files where idfiles='".$ID."'";
			$result=mysql_query($sql,$con);
			$row=mysql_fetch_array($result);
			$filename=$row['filename'];
			if($filename!=""){
			$path="./uploads/".$filename;		
			if(file_exists($path))
			{
				$delete=unlink($path);
			}
			$sql="delete from files where idfiles='".$ID."'";
			$result=mysql_query($sql,$con);
			}
			return true;
		}
	}