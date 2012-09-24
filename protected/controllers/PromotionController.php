<?php

class PromotionController extends Controller
{
	public function actionView($id){
		$promotionDAO = new PromotionDAO();
                $promotion = $promotionDAO->findPromotion($id);
                $students = $promotionDAO->findAllStudents($id);
		// on rend la vue
		$this->render('view', array('promotion'=>$promotion,'students'=>$students));
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
