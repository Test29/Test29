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

    public function actionCreate()
    {
	if (isset($_SESSION['id']))
	{
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
	else
	{
	    $this->redirect(array('/student/connect'));
	}
    }

    public function actionUpdate()
    {
	if (isset($_SESSION['id']))
	{
	    $schoolDAO = new SchoolDAO();
	    if (isset($_GET['id'])) {
		$school = $schoolDAO->getSchool(intval($_GET['id']));
		if (!$school) {
			Yii::app()->user->setFlash('error','Cette &eacute;cole n\'existe pas');
			$this->redirect(array('/school/index'));
		}
		$this->render('update', array('school'=>$school,));
		//var_dump($school) or die();
	    }
	    //if there is at least one error
	    else if (isset($_POST['school'])) {
		$aErrorUpdate = $schoolDAO->validateSchool($_POST['school']);
		if (empty($aErrorUpdate)) {
		    $ok = $schoolDAO->updateSchool($_POST['school']);
		    // message utilisateur
		    Yii::app()->user->setFlash('info','L\'&eacute; a bien été mis à jour');
		    $this->redirect(array('/school/index'));
		}
		$this->render('update/', array('aErrorUpdate' => $aErrorUpdate,));
	    }
	}
	else
	{
	    $this->redirect(array('/student/connect'));
	}
    }

    public function actionDelete($id)
    {
	if (isset($_SESSION['id']))
	{
	    $schoolDAO = new SchoolDAO();
	    $student = $schoolDAO->deleteSchool($id);
	    if($student == 0) {
		Yii::app()->user->setFlash('error','L\'&eacute;cole n\'a pas été supprimée');
	    }
	    else
	    {
		//on redirige la vue
		Yii::app()->user->setFlash('info','L\'&eacute;cole a bien été supprimée');
	    }
	    $this->redirect(array('/school/index'));
	 }
	 else
	 {
	    $this->redirect(array('/student/connect'));
	 }
    }
}

?>