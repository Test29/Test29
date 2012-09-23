<?php

class ArticleDAO
{
	public function findAllArticle($filter=array(), $sort=array())
    {
		$sql = "SELECT * FROM `article`";
		$command = Yii::app()->db->createCommand($sql);
		return $command->queryAll();
	}
}

?>