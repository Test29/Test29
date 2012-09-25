<?php

class MessageController extends Controller
{
    public function actionIndex($id){
	    $messageDAO = new MessageDAO();
	    // on rend la vue
	    $this->render('index');
    }

    public function actionView($id){
	    $messageDAO = new MessageDAO();
	    // on rend la vue
	    $this->render('view');
    }

    public function actionCreate()
    {
	if (isset($_SESSION['id']))
	{
	    $aErrorCreate = array();
	    if (isset($_POST['message'])) {
		 $messageDAO = new MessageDAO();
		 $aErrorCreate = $messageDAO->validateMessage($_POST['message']);
		 if (empty($aErrorCreate)) {
		     $ok = $messageDAO->insertMessage($_POST['message']);
		     if ($ok) {
			 // message utilisateur
			 Yii::app()->user->setFlash('info','La message a bien été envoyé');
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

    public function actionDelete()
    {
        if (isset($_SESSION['id']))
        {
            $messageDAO = new MessageDAO();
            $message = $messageDAO->deleteMessage($_GET['id']);
            if($message == 0) {
                Yii::app()->user->setFlash('error','Le message n\'a pas été supprimé');
            }
            else {
                //on redirige la vue
                Yii::app()->user->setFlash('info','Le message a bien été supprimé');
            }
            $this->redirect(array('/student/'.$_SESSION['id']));
        }
        else {
            $this->redirect(array('/student/connect'));
        }
    }
}
