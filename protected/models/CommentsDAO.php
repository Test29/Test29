<?php

class CommentsDAO
{
	public function findAllComments($filter=array(), $sort=array())
    {
		$sql = "SELECT * FROM `comments`";
		$command = Yii::app()->db->createCommand($sql);
		return $command->queryAll();
	}
}

?>