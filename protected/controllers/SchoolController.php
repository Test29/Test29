<?php

class SchoolController extends Controller
{
	public function actionIndex(){
		$schoolDAO = new SchoolDAO();
		// on rend la vue
		$this->render('index');
	}

	public function actionView($id){
		$schoolDAO = new SchoolDAO();
		// on rend la vue
		$this->render('view');
	}

	public function actionCreate(){
            $aErrorCreate = array();
            if (isset($_POST['school'])) {
                    $schoolDAO = new SchoolDAO();
                    $aErrorCreate = $schoolDAO->validateSchool($_POST['school']);
                    if (empty($aErrorCreate)) {
                        $ok = $schoolDAO->insertSchool($_POST['school']);
                        if ($ok) {
                            // message utilisateur
                            Yii::app()->user->setFlash('info','L\'&eacute;cole a bien été crée');
                            $this->redirect(array('/school/index'));
                        }
                    }
            }
            $this->render('create',array(
                            'aErrorCreate' => $aErrorCreate,));
	}

	public function actionUpdate($id){
		if (isset($_SESSION['id']))
		{
			$schoolDAO = new SchoolDAO();
			// on rend la vue
			$this->render('update');
		}
		else {
			$this->redirect(array('/student/connect'));
		}
	}

	public function actionDelete($id){
		$schoolDAO = new SchoolDAO();
		// on rend la vue
		$this->render('index');
	}
}
