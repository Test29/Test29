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
	
	public function actionCreate($id){
		$messageDAO = new MessageDAO();	
		// on rend la vue
		$this->render('create');
	}
	
	public function actionUpdate($id){
		$messageDAO = new MessageDAO();	
		// on rend la vue
		$this->render('update');
	}
	
	public function actionDelete($id){
		$messageDAO = new MessageDAO();	
		// on rend la vue
		$this->render('index');
	}
}
