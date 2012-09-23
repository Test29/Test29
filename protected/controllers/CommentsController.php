<?php

class CommentsController extends Controller
{
	public function actionIndex($id){
		$commentsDAO = new CommentsDAO();
		// on rend la vue
		$this->render('index');
	}
	
	public function actionView($id){
		$commentsDAO = new CommentsDAO();
		// on rend la vue
		$this->render('view');
	}
	
	public function actionCreate($id){
		$commentsDAO = new CommentsDAO();
		// on rend la vue
		$this->render('create');
	}
	
	public function actionUpdate($id){
		$commentsDAO = new CommentsDAO();
		// on rend la vue
		$this->render('update');
	}
	
	public function actionDelete($id){
		$commentsDAO = new CommentsDAO();
		// on rend la vue
		$this->render('index');
	}
}
