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

    public function findAllArticles($id)
    {
	$sql = "SELECT * FROM `article` JOIN student ON article.student_id=student.id WHERE student.promotion_id=$id";
	$command = Yii::app()->db->createCommand($sql);
	return $command->queryAll();
    }

    public function insertPromotion($aPromotionData)
    {
        $sql = "INSERT INTO `aybox`.`promotion` (`name`, `year`, `date_add`, `date_update`, `school_id`)
        VALUES (:name, :year, :date_add, :date_update, :school_id);";
        $connection=Yii::app()->db;
        $command=$connection->createCommand($sql);
        return $command->execute(array(':name'=>$aPromotionData['name'],
	':year'=>$aPromotionData['year'],
        ':date_add'=>date("Y-m-d H:i:s"),
        ':date_update'=>date("Y-m-d H:i:s"),
        ':school_id'=>$aPromotionData['id']));
    }

    public function updatePromotion($aPromotionData)
    {
        $sql = "UPDATE `promotion` SET `name`=:name,
	`year`=:year,
        `date_update`=:date_update
        WHERE `id`=:id;";
        $connection=Yii::app()->db;
        $command=$connection->createCommand($sql);
        return $command->execute(array(':name'=>$aPromotionData['name'],
	':year'=>$aPromotionData['year'],
        ':date_update'=>date("Y-m-d H:i:s"),
        ':id'=>$aPromotionData['id']));
    }

    public function validatePromotion($aPost)
    {
        $aError= array();
        foreach ($aPost as $key => $value) {
            if (empty($value) && $key != 'id')
            {
                $aError[$key]=  'Le champ '.$key.' est vide';
            }
        }
        //var_dump($aError) or die();
        return $aError;
    }

    public function deletePromotion($idPromotion)
    {
        $sql="DELETE FROM `promotion` WHERE `promotion`.`id`=:id";
        $connection=Yii::app()->db;
        $command=$connection->createCommand($sql);
        return $command->execute(array(':id'=>$idPromotion));
    }

    public function joinPromotion($idPromotion)
    {
        $sql="UPDATE `student` SET `promotion_id`=:promotion_id WHERE `id`=:id;";
        $connection=Yii::app()->db;
        $command=$connection->createCommand($sql);
        return $command->execute(array(':promotion_id'=>$idPromotion,
	    ':id'=>$_SESSION['id']));
    }

    public function getPromotion($idPromotion)
    {
        $sql = "SELECT * FROM `promotion` WHERE `id`='".$idPromotion."'";
        $command = Yii::app()->db->createCommand($sql);
        return $command->queryRow();
    }
}

?>