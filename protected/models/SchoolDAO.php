<?php

class SchoolDAO
{
	public function findAllSchool($filter=array(), $sort=array())
    {
		$sql = "SELECT * FROM `school`";
		$command = Yii::app()->db->createCommand($sql);
		return $command->queryAll();
    }
    
    	public function findSchool($idSchool)
    {
		$sql = "SELECT * FROM school WHERE school.id=".$idSchool;
		$command = Yii::app()->db->createCommand($sql);
		return $command->queryAll();
    }
    
    	public function findAllPromotionsBySchool($idSchool)
    {
		$sql = "SELECT promotion.name, promotion.id FROM `promotion` JOIN school ON school.id=promotion.school_id WHERE school.id=".$idSchool;
		$command = Yii::app()->db->createCommand($sql);
		return $command->queryAll();
    }
}

?>