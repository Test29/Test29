<?php

class MessageDAO
{
    public function findAllMessage($filter=array(), $sort=array())
    {
	$sql = "SELECT * FROM `message`";
	$command = Yii::app()->db->createCommand($sql);
	return $command->queryAll();
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