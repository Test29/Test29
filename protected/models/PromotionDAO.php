<?php

class PromotionDAO
{
	public function findAllPromotion($filter=array(), $sort=array())
    {
		$sql = "SELECT * FROM `promotion`";
		$command = Yii::app()->db->createCommand($sql);
		return $command->queryAll();
	}
}

?>