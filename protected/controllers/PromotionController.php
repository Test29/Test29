<?php

class PromotionController extends Controller
{
    public function actionView($id){
	    $promotionDAO = new PromotionDAO();
	    $promotion = $promotionDAO->findPromotion($id);
	    $students = $promotionDAO->findAllStudents($id);
	    // on rend la vue
	    $this->render('view', array('promotion'=>$promotion,'students'=>$students));
    }

    public function actionCreate(){
	$aErrorCreate = array();
	if (isset($_POST['promotion']))
	{
	    if (isset($_GET['id']))
	    {
		$promotionDAO = new PromotionDAO();
		$aErrorCreate = $promotionDAO->validatePromotion($_POST['promotion']);
		if (empty($aErrorCreate)) {
		    $ok = $promotionDAO->insertPromotion($_POST['promotion']);
		    if ($ok) {
			// message utilisateur
			Yii::app()->user->setFlash('info','La promotion a bien été crée');
			$this->redirect(array('/school/index'));
		    }
		}
		$this->render('create',array(
				'aErrorCreate' => $aErrorCreate,));
	    }
	}
	else 
        {
             $this->redirect(array('/student/connect'));
        }
    }

    public function actionUpdate(){
        if (isset($_SESSION['id']))
        {
            $promotionDAO = new PromotionDAO();
            if (isset($_GET['id'])) {
                $promotion = $promotionDAO->getPromotion(intval($_GET['id']));
                if (!$promotion) {
                        Yii::app()->user->setFlash('error','Cette promotion n\'existe pas');
                        $this->redirect(array('/school/index'));
                }
                $this->render('update', array('promotion'=>$promotion,));
                //var_dump($promotion) or die();
            }
            //if there is at least one error
            else if (isset($_POST['promotion'])) {
                $aErrorUpdate = $promotionDAO->validatePromotion($_POST['promotion']);
                if (empty($aErrorUpdate)) {
                    $ok = $promotionDAO->updatePromotion($_POST['promotion']);
                    $promotionDAO->setSession($_SESSION['login']);
                    // message utilisateur
                    Yii::app()->user->setFlash('info','La promotion a bien été mis à jour');
                    $this->redirect(array('/school/index'));
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
            $promotion = $promotionDAO->deletePromotion();
            if($promotion == 0) {
                Yii::app()->user->setFlash('error','La promotion n\'a pas été supprimé');
            }
            else {
                //on redirige la vue
                Yii::app()->user->setFlash('info','La promotion a bien été supprimé');
            }
            $this->redirect(array('/school/index'));
        }
        else {
            $this->redirect(array('/student/connect'));
        }
    }
    
}
