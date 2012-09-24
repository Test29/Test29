<?php

class SchoolDAO
{
    public function findAllSchool($filter=array(), $sort=array())
    {
        $sql = "SELECT * FROM `school`";
        $command = Yii::app()->db->createCommand($sql);
        return $command->queryAll();
    }

    public function insertSchool($aSchoolData)
    {
        $sql = "INSERT INTO `aybox`.`school` (`name`, `date_add`, `date_update`, `description`, `picture_id`)
        VALUES (:name, :date_add, :date_update, :description, :picture_id);";
        $connection=Yii::app()->db;
        $command=$connection->createCommand($sql);
        return $command->execute(array(':name'=>$aSchoolData['name'],
        ':date_add'=>date("Y-m-d H:i:s"),
        ':date_update'=>date("Y-m-d H:i:s"),
        ':description'=>$aSchoolData['description'],
        ':picture_id'=>1));
    }

    public function updateSchool($aSchoolData)
    {
        $sql = "UPDATE `student` SET `login`=:login,
        `password`=:password,
        `dob`=:dob,
        `email`=:email,
        `gender`=:gender,
        `status`=:status
        WHERE `id`=:id;";
        $connection=Yii::app()->db;
        $command=$connection->createCommand($sql);
        return $command->execute(array(':login'=>$aStudentData['login'],
        ':password'=>$aStudentData['password'],
        ':dob'=>$aStudentData['dob'],
        ':email'=>$aStudentData['email'],
        ':gender'=>$aStudentData['gender'],
        ':status'=>$aStudentData['status'],
        ':id'=>$_SESSION['id']));
    }

    public function validateSchool($aPost)
    {
        $aError= array();
        foreach ($aPost as $key => $value) {
            if (empty($value))
            {
                $aError[$key]=  'Le champ '.$key.' est vide';
            }
        }
        //var_dump($aError) or die();
        return $aError;
    }

    public function deleteSchool($idSchool)
    {
        $sql="DELETE FROM `school` WHERE `school`.`id`=:id";
        $connection=Yii::app()->db;
        $command=$connection->createCommand($sql);
        return $command->execute(array(':id'=>$idSchool));
    }
}

?>
