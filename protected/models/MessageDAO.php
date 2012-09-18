<?php

class MessageDAO
{
	public function findAllMessage($filter=array(), $sort=array())
    {
		$sql = "SELECT * FROM `message`";
		$command = Yii::app()->db->createCommand($sql);
		return $command->queryAll();
	}
}

?>