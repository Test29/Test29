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
	
	public function actionCreate($id){
		$articleDAO = new ArticleDAO();	
		// on rend la vue
		$this->render('create');
	}
	
	public function actionUpdate($id){
		$articleDAO = new ArticleDAO();	
		// on rend la vue
		$this->render('update');
	}
	
	public function actionDelete($id){
		$articleDAO = new ArticleDAO();	
		// on rend la vue
		$this->render('index');
	}
}
