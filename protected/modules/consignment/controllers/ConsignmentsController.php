<?php

class ConsignmentsController extends GxController {

public function filters() {
	return array(
			'accessControl', 
			);
}

public function accessRules() {
	return array(
			array('allow',
				'actions'=>array('index','view'),
				'users'=>array('*'),
				),
			array('allow', 
				'actions'=>array('minicreate', 'create','update', 'viewMyConsignments'),
				'users'=>array('@'),
				),
			array('allow', 
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
				),
			array('deny', 
				'users'=>array('*'),
				),
			);
}

	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Consignments'),
		));
	}

	public function actionCreate() {
		$model = new Consignments;

		$this->performAjaxValidation($model, 'consignments-form');

 
            
		if (isset($_POST['Consignments'])) {
			$wayBillNumber = $_POST['Consignments']['way_bill_number'];
			$model2 = Consignments::model()->findByAttributes(array('way_bill_number'=>$wayBillNumber));
			
		if(!$model2){
			$model->setAttributes($_POST['Consignments']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
			}
		else{
		throw new CHttpException(404,'A consignment already exists with the Way Bill Number: #'.$wayBillNumber.'. Press "Back" button on the keyboard and retry.');
		}
			
		}
		
		
$model2 = AuthAssignment::model()->findAllByAttributes(array('itemname'=>'Normal'));
$user_list = CHtml::listData($model2, 
                'userid','userid');
		$usermodel=Users::model()->findAllByPk($user_list);
				$user_list2 = CHtml::listData($usermodel, 
                'id', 'user_name');
				
		$centers_models = Centers::model()->findAll(
                 array('order' => 'center_code'));
 
// format models as $key=>$value with listData
$code_list = CHtml::listData($centers_models, 
                'center_id', 'center_code');		

 // retrieve the sender models from db
//$User_models = Users::model()->findAll(
                 //array('order' => 'name'));
 
// format models as $key=>$value with listData
//$User_list = CHtml::listData($sender_models, 
                //'sender_id', 'name');
		$this->render('create', array( 'model' => $model, 'user_list2' =>$user_list2, 'code_list'=>$code_list));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Consignments');

		$this->performAjaxValidation($model, 'consignments-form');

		if (isset($_POST['Consignments'])) {
			$model->setAttributes($_POST['Consignments']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Consignments')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Consignments');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		if( ( Yii::app()->user->checkAccess('consignment_manage')) ){
		$model = new Consignments('search');
		$model->unsetAttributes();

		if (isset($_GET['Consignments']))
			$model->setAttributes($_GET['Consignments']);

		$this->render('admin', array(
			'model' => $model,
		));}else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}
	public function actionViewMyConsignments() {
		if( ( Yii::app()->user->checkAccess('consignment_manage')) ){
		$model = new Consignments('search');
		$model->unsetAttributes();

		if (isset($_GET['Consignments']))
			$model->setAttributes($_GET['Consignments']);

		$this->render('viewMyConsignments', array(
			'model' => $model,
		));}else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

}