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
	
	public function insertStudent($aStudentData)
	{
		$sql = "INSERT INTO `aybox`.`student` (`login`, `password`, `dob`, `email`, `date_add`, `gender`, `status`, `right`, `promotion_id`, `profil_id`) 
		VALUES (:login, :password, :dob, :email, :date_add, :gender, :status, :right, :promotion_id, :profil_id);";
		$connection=Yii::app()->db;
		$command=$connection->createCommand($sql);
		return $command->execute(array(':login'=>$aStudentData['login'],
		':password'=>$aStudentData['password'],
		':dob'=>$aStudentData['dob'],
		':email'=>$aStudentData['email'],
		':date_add'=>date("Y-m-d H:i:s"),
		':gender'=>$aStudentData['gender'],
		':status'=>$aStudentData['status'],
		':right'=>'student',
		':promotion_id'=>$aStudentData['promotion_id'],
		':profil_id'=>$aStudentData['profl_id']));
	}
	
	public function validateStudent($aPost)
	{
		$aError= array();
		foreach ($aPost as $key => $value) {
			if ((empty($value)) && ($key !== 'description'))
			{
				$aError[$key]=  'Le champ '.$key.' est vide';
			}
		}
		//var_dump($aError) or die();
		return $aError;
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