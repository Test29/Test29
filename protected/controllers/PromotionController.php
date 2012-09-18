<?php

class PromotionController extends Controller
{
	public function actionIndex($id){
		$promotionDAO = new PromotionDAO();	
		// on rend la vue
		$this->render('index');
	}
	
	public function actionView($id){
		$promotionDAO = new PromotionDAO();	
		// on rend la vue
		$this->render('view');
	}
	
	public function actionCreate($id){
		$promotionDAO = new PromotionDAO();	
		// on rend la vue
		$this->render('create');
	}
	
	public function actionUpdate($id){
		$promotionDAO = new PromotionDAO();	
		// on rend la vue
		$this->render('update');
	}
	
	public function actionDelete($id){
		$promotionDAO = new PromotionDAO();	
		// on rend la vue
		$this->render('index');
	}
}
