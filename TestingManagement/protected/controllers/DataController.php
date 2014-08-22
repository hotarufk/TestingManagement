<?php

class DataController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
	Yii::app()->user->setReturnUrl('index.php?r=data/view&id='.$id);
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Data("create");

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Data']))
		{
			$model->attributes=$_POST['Data'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->dataID));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$model->scenario = 'update';
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Data']))
		{
			$model->attributes=$_POST['Data'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->dataID));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$logrelated = Log::model()->findAllByAttributes(array('Ndata'=>$this->loadModel($id)->dataID));
		if(count($logrelated) > 0) {
			Yii::app()->user->setFlash('deletemessage','Sorry, but there are still related Log !');
			$this->redirect(Yii::app()->user->returnUrl);
			//echo "Sorry, but there are still related Log!";
		}
		else { 
		//sebelum delete data , delete terlebih dahulu semua log yang berhubungan degan data tersebut
		$this->loadModel($id)->delete();
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
		}
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser

	}

	/**
	 * Lists all models.
	 */
	// public function actionIndex()
	// {
		// $dataProvider=new CActiveDataProvider('Data');
		// $this->render('index',array(
			// 'dataProvider'=>$dataProvider,
		// ));
	// }

	/**
	 * Manages all models.
	 */
	public function actionIndex()
	{
	Yii::app()->user->setReturnUrl('index.php?r=data/index');
		$model=new Data('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Data']))
			$model->attributes=$_GET['Data'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	
	
	////Buat Liat Log yg ID nya dari Data ini

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Data the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Data::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Data $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='data-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	//custom function
	public function actionLoadScenario()
{
   $data=Data::model()->findAll('Stream=:Stream', 
   array(':Stream'=>$_POST['Stream']));
 
   $data=CHtml::listData($data,'Stream','Stream');
 
   echo "<option value=''>Select City</option>";
   foreach($data as $value=>$ScenarioList)
   echo CHtml::tag('option', array('value'=>$value),CHtml::encode($ScenarioList),true);
}
	
}
