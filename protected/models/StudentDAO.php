<?php

class StudentDAO
{
    public function findStudent($id)
    {
        $sql = "SELECT * FROM `student` WHERE id=$id";
        $command = Yii::app()->db->createCommand($sql);
        return $command->queryAll();
    }

     public function findAllArticles($id)
    {
	$sql = "SELECT article.`id`, `name`, article.`date_add`, `date_update`, `picture_id`, `login`  FROM `article` JOIN student ON article.student_id=student.id WHERE student.id=$id";
	$command = Yii::app()->db->createCommand($sql);
	return $command->queryAll();
    }
    
       public function findAllMessages($id)
    {
	$sql = "SELECT COUNT('id') FROM `message` JOIN student ON student.id=message.student_id_receive WHERE student.id=$id";
	$command = Yii::app()->db->createCommand($sql);
	return $command->queryAll();
    }

    public function getLogin($login)
    {
        $sql = "SELECT `login` FROM `student` WHERE `login`='".$login."'";
        $command = Yii::app()->db->createCommand($sql);
        return $command->queryRow();
    }

    public function getPass($login)
    {
        $sql = "SELECT `password` FROM `student` WHERE `login`='".$login."'";
        $command = Yii::app()->db->createCommand($sql);
        return $command->queryRow();
    }

    public function getStudent($idStudent)
    {
        $sql = "SELECT * FROM `student` WHERE `id`='".$idStudent."'";
        $command = Yii::app()->db->createCommand($sql);
        return $command->queryRow();
    }

    public function insertStudent($aStudentData)
    {
        $sql = "INSERT INTO `aybox`.`student` (`login`, `password`, `dob`, `email`, `date_add`, `gender`, `status`, `right`, `promotion_id`, `profil_id`)
        VALUES (:login, :password, :dob, :email, :date_add, :gender, :status, :right, :promotion_id, :profil_id);";
        $connection=Yii::app()->db;
        $command=$connection->createCommand($sql);
        return $command->execute(array(':login'=>$aStudentData['login'],
        ':password'=>$aStudentData['password'],
        ':dob'=>$aStudentData['dob'],
        ':email'=>$aStudentData['email'],
        ':date_add'=>date("Y-m-d H:i:s"),
        ':gender'=>$aStudentData['gender'],
        ':status'=>$aStudentData['status'],
        ':right'=>'student',
        ':promotion_id'=>1,
        ':profil_id'=>1));
    }

    public function updateStudent($aStudentData)
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

    public function validateStudent($aPost)
    {
        $aError= array();
        foreach ($aPost as $key => $value) {
            if (empty($value))
            {
                $aError[$key]=  'Le champ '.$key.' est vide';
            }
        }
        if (!isset($aPost['gender']))
        {
            $aError['gender']=  'Veuillez sélectionner une option';
        }
        //var_dump($aError) or die();
        return $aError;
    }

    public function deleteStudent()
    {
        $sql="DELETE FROM `student` WHERE `student`.`id`=:id";
        $connection=Yii::app()->db;
        $command=$connection->createCommand($sql);
        return $command->execute(array(':id'=>$_SESSION['id']));
    }

    public function setSession($login)
    {
        $sql = "SELECT * FROM `student` WHERE `login` = '".$login."';";
        $command = Yii::app()->db->createCommand($sql);
        $result = $command->queryRow();
        foreach ($result as $key => $value2)
        {
                $_SESSION[$key] = $value2;
        }
    }

    public function sessionDelete()
    {
        session_destroy();
        unset($_SESSION);
    }
}

?>