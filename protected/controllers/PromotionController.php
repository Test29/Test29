<?php

class PromotionController extends Controller
{
    public function actionView($id){
	    $promotionDAO = new PromotionDAO();
	    $promotion = $promotionDAO->findPromotion($id);
	    $students = $promotionDAO->findAllStudents($id);
            $articles = $promotionDAO->findAllArticles($id);
	    // on rend la vue
	    $this->render('view', array('promotion'=>$promotion,'students'=>$students, 'articles'=>$articles));
    }

    public function actionCreate()
    {
	if (isset($_SESSION['id']))
	   {
	       $aErrorCreate = array();
	       if (isset($_POST['promotion'])) {
		    $promotionDAO = new PromotionDAO();
		    $aErrorCreate = $promotionDAO->validatePromotion($_POST['promotion']);
		    if (empty($aErrorCreate)) {
			$ok = $promotionDAO->insertPromotion($_POST['promotion']);
			if ($ok) {
			    // message utilisateur
			    Yii::app()->user->setFlash('info','La promotion a bien été crée');
			    $this->redirect(array('/student/'.$_SESSION['id']));
			}
		    }
	       }
	       //var_dump($aErrorCreate) or die();
	       $this->render('create',array(
			       'aErrorCreate' => $aErrorCreate,));
	}
	else
	{
	    $this->redirect(array('/student/connect'));
	}
    }

    public function actionUpdate()
    {
        if (isset($_SESSION['id']))
        {
            $promotionDAO = new PromotionDAO();
            if (isset($_GET['id'])) {
                $promotion = $promotionDAO->getPromotion(intval($_GET['id']));
                if (!$promotion) {
                        Yii::app()->user->setFlash('error','Cette promotion n\'existe pas');
                        $this->redirect(array('/student/'.$_SESSION['id']));
                }
                $this->render('update', array('promotion'=>$promotion,));
                //var_dump($promotion) or die();
            }
            //if there is at least one error
            else if (isset($_POST['promotion'])) {
                $aErrorUpdate = $promotionDAO->validatePromotion($_POST['promotion']);
                if (empty($aErrorUpdate)) {
                    $ok = $promotionDAO->updatePromotion($_POST['promotion']);
                    // message utilisateur
                    Yii::app()->user->setFlash('info','La promotion a bien été mis à jour');
                    $this->redirect(array('/student/'.$_SESSION['id']));
                }
                $this->render('update', array('aErrorUpdate' => $aErrorUpdate,));
            }
        }
        else {
            $this->redirect(array('/student/connect'));
        }
    }

    public function actionDelete()
    {
        if (isset($_SESSION['id']))
        {
            $promotionDAO = new PromotionDAO();
            $promotion = $promotionDAO->deletePromotion($_GET['id']);
            if($promotion == 0) {
                Yii::app()->user->setFlash('error','La promotion n\'a pas été supprimé');
            }
            else {
                //on redirige la vue
                Yii::app()->user->setFlash('info','La promotion a bien été supprimé');
            }
            $this->redirect(array('/student/'.$_SESSION['id']));
        }
        else {
            $this->redirect(array('/student/connect'));
        }
    }

    public function actionJoin()
    {
        if (isset($_SESSION['id']))
        {
            $promotionDAO = new PromotionDAO();
	    $studentDAO = new StudentDAO();
            $promotion = $promotionDAO->joinPromotion($_GET['id']);
	    $aPromotion = $promotionDAO->getPromotion($_GET['id']);
            if($promotion != 0) {
		$studentDAO->setSession($_SESSION['login']);
                Yii::app()->user->setFlash('info','Vous avez rejoint la promotion '.$aPromotion['name']);
            }
            else {
                Yii::app()->user->setFlash('error','Vous n\'avez pas rejoint la promotion '.$aPromotion['name']);
            }
            $this->redirect(array('/student/'.$_SESSION['id']));
        }
        else {
            $this->redirect(array('/student/connect'));
        }
    }

}
