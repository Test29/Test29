<?php

class SchoolDAO
{
	public function findAllSchool($filter=array(), $sort=array())
    {
		$sql = "SELECT * FROM `school`";
		$command = Yii::app()->db->createCommand($sql);
		return $command->queryAll();
	}
}

?>