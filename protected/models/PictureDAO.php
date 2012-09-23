<?php

class PictureDAO
{
	public function findAllpicture($filter=array(), $sort=array())
    {
		$sql = "SELECT * FROM `picture`";
		$command = Yii::app()->db->createCommand($sql);
		return $command->queryAll();
	}
}

?>