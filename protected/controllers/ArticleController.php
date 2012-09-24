<?php

class ArticleController extends Controller
{
	public function actionIndex($id){
		$articleDAO = new ArticleDAO();
		// on rend la vue
		$this->render('index');
	}

	public function actionView($id){
		$articleDAO = new ArticleDAO();
		// on rend la vue
		$this->render('view');
	}

    public function actionCreate()
    {
	if (isset($_SESSION['id']))
	   {
	       $aErrorCreate = array();
	       if (isset($_POST['article'])) {
		    $articleDAO = new ArticleDAO();
		    $aErrorCreate = $articleDAO->validateArticle($_POST['article']);
		    if (empty($aErrorCreate)) {
			$ok = $articleDAO->insertArticle($_POST['article']);
			if ($ok) {
			    // message utilisateur
			    Yii::app()->user->setFlash('info','L\'article a bien été crée');
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
            $articleDAO = new ArticleDAO();
            if (isset($_GET['id'])) {
                $article = $articleDAO->getArticle(intval($_GET['id']));
                if (!$article) {
                        Yii::app()->user->setFlash('error','L\'article n\'existe pas');
                        $this->redirect(array('/student/'.$_SESSION['id']));
                }
                $this->render('update', array('article'=>$article,));
                //var_dump($article) or die();
            }
            //if there is at least one error
            else if (isset($_POST['article'])) {
                $aErrorUpdate = $articleDAO->validateArticle($_POST['article']);
                if (empty($aErrorUpdate)) {
                    $ok = $articleDAO->updateArticle($_POST['article']);
                    // message utilisateur
                    Yii::app()->user->setFlash('info','L\'article a bien été mis à jour');
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
            $articleDAO = new ArticleDAO();
            $article = $articleDAO->deleteArticle($_GET['id']);
            if($article == 0) {
                Yii::app()->user->setFlash('error','L\'article n\'a pas été supprimé');
            }
            else {
                //on redirige la vue
                Yii::app()->user->setFlash('info','L\'article a bien été supprimé');
            }
            $this->redirect(array('/student/'.$_SESSION['id']));
        }
        else {
            $this->redirect(array('/student/connect'));
        }
    }
}
