<?php

class PictureController extends Controller
{
	public function actionIndex($id){
		$pictureDAO = new PictureDAO();
		// on rend la vue
		$this->render('index');
	}
	
	public function actionView($id){
		$pictureDAO = new PictureDAO();
		// on rend la vue
		$this->render('view');
	}
	
	public function actionCreate($id){
		$pictureDAO = new PictureDAO();
		// on rend la vue
		$this->render('create');
	}
	
	public function actionUpdate($id){
		$pictureDAO = new PictureDAO();
		// on rend la vue
		$this->render('update');
	}
	
	public function actionDelete($id){
		$pictureDAO = new PictureDAO();
		// on rend la vue
		$this->render('index');
	}
}
