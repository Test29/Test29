<?php

class StudentController extends Controller
{
	public function actionIndex(){
		if (isset($_SESSION['id']))
		{
			$studentDAO = new StudentDAO();	
			// on rend la vue
			$this->render('index');
		}
		else {
			$this->redirect(array('student/connect'));
		}
	}
	
	public function actionView($id){
		if (isset($_SESSION['id']))
		{
			$studentDAO = new StudentDAO();	
			// on rend la vue
			$this->render('view');
		}
		else {
			$this->redirect(array('student/connect'));
		}
	}
	
	public function actionCreate(){
		$aErrorCreate = array();
		if (isset($_POST['student'])) {
			// si on a récupéré des données projet depuis un formulaire
			$studentDAO = new StudentDAO();
			//$aErrorCreate = $studentDAO->validateStudent($_POST['student']);
			if (empty($aErrorCreate)) {
				$ok = $studentDAO->insertStudent($_POST['student']);
				if ($ok) {
					// message utilisateur
					Yii::app()->user->setFlash('info','Votre compte a bien été crée');
					$this->redirect(array('index'));
				}
			}
		}
		$this->render('create');
	}
	
	public function actionUpdate($id){
		if (isset($_SESSION['id']))
		{
			$studentDAO = new StudentDAO();	
			// on rend la vue
			$this->render('update');
		}
		else {
			$this->redirect(array('student/connect'));
		}
	}
	
	public function actionDelete($id){
		if (isset($_SESSION['id']))
		{
			$studentDAO = new StudentDAO();	
			// on rend la vue
			$this->render('index');
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
				$this->redirect(array('/school/index'));
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
			$this->redirect(array('/school/index'));
		}
	}
	
}
