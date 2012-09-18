<?php

class StudentDAO
{
	public function findAllStudent($filter=array(), $sort=array())
    {
		$sql = "SELECT * FROM `student`";
		$command = Yii::app()->db->createCommand($sql);
		return $command->queryAll();
	}
	
	public function getLogin($login)
	{
		$sql = "SELECT `login` FROM `student` WHERE `login`='".$login."'";
		$command = Yii::app()->db->createCommand($sql);
		return $command->queryRow();
	}
	
	public function getPass($login)
	{
		$sql = "SELECT `password` FROM `student` WHERE `login`='".$login."'";
		$command = Yii::app()->db->createCommand($sql);
		return $command->queryRow();
	}
	
	public function setSession($login)
	{
		$sql = "SELECT * FROM `student` WHERE `login` = '".$login."';";
		$command = Yii::app()->db->createCommand($sql);
		$result = $command->queryRow();
		foreach ($result as $key => $value2)
		{
			$_SESSION[$key] = $value2;
		}
	}
	
	function sessionDelete()
	{
		session_destroy();
    	unset($_SESSION);
	}
}

?>