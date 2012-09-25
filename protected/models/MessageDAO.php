<?php

class MessageDAO
{
    public function findAllMessages($id)
    {
	$sql = "SELECT message.id, message.content, message.student_id_send FROM `message` JOIN student ON student.id=message.student_id_receive WHERE student.id=$id";
	$command = Yii::app()->db->createCommand($sql);
	return $command->queryAll();
    }

    public function getLogin($id)
    {
	$sql = "SELECT login FROM student WHERE id=$id";
	$command = Yii::app()->db->createCommand($sql);
	return $command->queryRow();
    }

    public function insertMessage($aMessageData)
    {
        $sql = "INSERT INTO `aybox`.`message` (`content`, `date_send`, `date_read`, `read`, `student_id_receive`, `student_id_send`)
        VALUES (:content, :date_send, :date_read, :read, :student_id_receive, :student_id_send);";
        $connection=Yii::app()->db;
        $command=$connection->createCommand($sql);
        return $command->execute(array(':content'=>$aMessageData['content'],
        ':date_send'=>date("Y-m-d H:i:s"),
        ':date_read'=>'0000-00-00 00:00:00',
        ':read'=>'no',
	':student_id_receive'=>$aMessageData['id'],
	':student_id_send'=>$_SESSION['id']));
    }

    public function setRead($idMessage)
    {
        $sql = "UPDATE `message` SET `read`=:read,
        `date_read`=:date_read
        WHERE `id`=:id;";
        $connection=Yii::app()->db;
        $command=$connection->createCommand($sql);
        return $command->execute(array(':read'=>'yes',
        ':date_read'=>date("Y-m-d H:i:s"),
        ':id'=>$idMessage));
    }

    public function validateMessage($aPost)
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

    public function deleteMessage($idMessage)
    {
        $sql="DELETE FROM `message` WHERE `message`.`id`=:id";
        $connection=Yii::app()->db;
        $command=$connection->createCommand($sql);
        return $command->execute(array(':id'=>$idMessage));
    }

}

?>