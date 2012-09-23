<?php

class SchoolController extends Controller
{
	public function actionIndex(){
		$schoolDAO = new SchoolDAO();
                $schools = $schoolDAO->findAllSchool();
		// on rend la vue
		$this->render('index', array('schools'=>$schools));
	}
	
	public function actionView($id){
		$schoolDAO = new SchoolDAO();
                $school = $schoolDAO->findSchool($id);
                $promotion = $schoolDAO->findAllPromotionsBySchool($id);
		// on rend la vue
		$this->render('view', array('school'=>$school, 'promotion'=>$promotion));
	}
	
	public function actionCreate($id){
		$schoolDAO = new SchoolDAO();
		// on rend la vue
		$this->render('create');
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
