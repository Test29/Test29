<?php

class StudentController extends Controller
{

    public function actionView($id){
        if (isset($_SESSION['id']))
        {
                $studentId = $_GET['id'];
                $studentDAO = new StudentDAO();
                $student = $studentDAO->findStudent($studentId);
                $articles = $studentDAO->findAllArticles($id);
                // on rend la vue
                $this->render('view', array('student'=>$student,'articles'=>$articles));
        }
        else {
	    $this->redirect(array('student/connect'));
        }
    }

    public function actionCreate(){
        $aErrorCreate = array();
        if (isset($_POST['student'])) {
                $studentDAO = new StudentDAO();
                if (isset($_POST['student']['status']))
                {
                    if ($_POST['student']['status'] == 'Célibataire')
                    {
                        $_POST['student']['status'] = 'single';
                    }
                    else if ($_POST['student']['status'] == 'En couple')
                    {
                        $_POST['student']['status'] = 'couple';
                    }
                    else if ($_POST['student']['status'] == 'Secret')
                    {
                        $_POST['student']['status'] = 'no';
                    }
                }
                $aErrorCreate = $studentDAO->validateStudent($_POST['student']);
                if (empty($aErrorCreate)) {
                    $ok = $studentDAO->insertStudent($_POST['student']);
                    if ($ok) {
                        // message utilisateur
			$studentDAO->setSession($_POST['student']['login']);
                        Yii::app()->user->setFlash('info','Votre compte a bien été crée');
                        $this->redirect(array('/student/'.$_SESSION['id']));
                    }
                }
        }
        $this->render('create',array(
			'aErrorCreate' => $aErrorCreate,));
    }

    public function actionUpdate(){
        if (isset($_SESSION['id']))
        {
            $studentDAO = new StudentDAO();
            if (isset($_GET['id'])) {
                $student = $studentDAO->getStudent($_SESSION['id']);
                if (!$student) {
                        Yii::app()->user->setFlash('error','Cette personne n\'existe pas');
                        $this->redirect(array('/student/'.$_SESSION['id']));
                }
                $this->render('update', array('student'=>$student,));
                //var_dump($student) or die();
            }
            //if there is at least one error
            else if (isset($_POST['student'])) {
                if (isset($_POST['student']['status']))
                {
                    if ($_POST['student']['status'] == 'Célibataire')
                    {
                        $_POST['student']['status'] = 'single';
                    }
                    else if ($_POST['student']['status'] == 'En couple')
                    {
                        $_POST['student']['status'] = 'couple';
                    }
                    else if ($_POST['student']['status'] == 'Secret')
                    {
                        $_POST['student']['status'] = 'no';
                    }
                }
                $aErrorUpdate = $studentDAO->validateStudent($_POST['student']);
                if (empty($aErrorUpdate)) {
                    $ok = $studentDAO->updateStudent($_POST['student']);
                    $studentDAO->setSession($_SESSION['login']);
                    // message utilisateur
                    Yii::app()->user->setFlash('info','Votre profil a bien été mis à jour');
                    $this->redirect(array('/student/'.$_SESSION['id']));
                }
                $this->render('update', array('aErrorUpdate' => $aErrorUpdate,));
            }
        }
        else {
            $this->redirect(array('student/connect'));
        }
    }

    public function actionDelete()
    {
        if (isset($_SESSION['id']))
        {
            $studentDAO = new StudentDAO();
            $student = $studentDAO->deleteStudent();
            if($student == 0) {
                Yii::app()->user->setFlash('error','Votre profil n\'a pas été supprimé');
		$this->redirect(array('/student/'.$_SESSION['id']));
            }
            else {
                //on redirige la vue
                Yii::app()->user->setFlash('info','Votre profil a bien été supprimé');
		$studentDAO->sessionDelete();
		$this->redirect(array('/site/index'));
            }
        }
        else {
            $this->redirect(array('student/connect'));
        }
    }

    public function actionConnect()
    {
        if (isset($_POST['connect']))
        {
	    $studentDAO = new StudentDAO();
	    $aLogin = $studentDAO->getLogin($_POST['connect']['login']);
	    $aMdp = $studentDAO->getPass($_POST['connect']['login']);
	    if (($_POST['connect']['login']!= $aLogin['login']) || ($_POST['connect']['password']!= $aMdp['password']))
	    {
		    $this->render('connect');
	    }
	    else
	    {
		    $studentDAO->setSession($aLogin['login']);
		    $this->redirect(array('/student/'.$_SESSION['id']));
	    }
        }
        else
        {
	    $this->render('connect');
        }
    }

    public function actionDeconnect()
    {
        if (isset($_SESSION['id']))
        {
	    $studentDAO = new StudentDAO();
	    $studentDAO->sessionDelete();
	    $this->redirect(array('/site/index'));
        }
    }

}
?>
