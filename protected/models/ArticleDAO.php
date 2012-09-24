<?php

class ArticleDAO
{
	public function findAllArticle($filter=array(), $sort=array())
    {
		$sql = "SELECT * FROM `article`";
		$command = Yii::app()->db->createCommand($sql);
		return $command->queryAll();
	}

    public function insertArticle($aArticleData)
    {
        $sql = "INSERT INTO `aybox`.`article` (`name`, `content`, `date_add`, `date_update`, `student_id`, `picture_id`)
        VALUES (:name, :content, :date_add, :date_update, :student_id, :picture_id);";
        $connection=Yii::app()->db;
        $command=$connection->createCommand($sql);
        return $command->execute(array(':name'=>$aArticleData['name'],
	':content'=>$aArticleData['content'],
        ':date_add'=>date("Y-m-d H:i:s"),
        ':date_update'=>date("Y-m-d H:i:s"),
        ':student_id'=>$_SESSION['id'],
	':picture_id'=>1));
    }

    public function updateArticle($aArticleData)
    {
        $sql = "UPDATE `article` SET `name`=:name,
	`content`=:content,
        `date_update`=:date_update
        WHERE `id`=:id;";
        $connection=Yii::app()->db;
        $command=$connection->createCommand($sql);
        return $command->execute(array(':name'=>$aArticleData['name'],
	':content'=>$aArticleData['content'],
        ':date_update'=>date("Y-m-d H:i:s"),
        ':id'=>$aArticleData['id']));
    }

    public function validateArticle($aPost)
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

    public function deleteArticle($idArticle)
    {
        $sql="DELETE FROM `article` WHERE `article`.`id`=:id";
        $connection=Yii::app()->db;
        $command=$connection->createCommand($sql);
        return $command->execute(array(':id'=>$idArticle));
    }

    public function getArticle($idArticle)
    {
        $sql = "SELECT * FROM `article` WHERE `id`='".$idArticle."'";
        $command = Yii::app()->db->createCommand($sql);
        return $command->queryRow();
    }
}

?>