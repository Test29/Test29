<?php

class PromotionDAO
{
	public function findPromotion($id)
    {
		$sql = "SELECT promotion.id, promotion.name, promotion.year, school.name AS school FROM `promotion` JOIN school ON promotion.school_id=school.id WHERE promotion.id=$id";
		$command = Yii::app()->db->createCommand($sql);
		return $command->queryAll();
    }
        
     public function findAllStudents($id)
    {
		$sql = "SELECT * FROM `student` WHERE student.promotion_id=$id";
		$command = Yii::app()->db->createCommand($sql);
		return $command->queryAll();
    }
}

?>