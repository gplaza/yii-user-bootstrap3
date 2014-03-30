<?php

class UserController extends Controller
{
	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return CMap::mergeArray(parent::filters(), [
			'accessControl', // perform access control for CRUD operations
		]);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return [
			['allow',  // allow all users to perform 'index' and 'view' actions
				'actions' => ['index', 'view'],
				'users' => UserModule::getAdmins(),
			],
			['deny',  // deny all users
				'users' => ['*'],
			],
		];
	}	

	/**
	 * Displays a particular model.
	 */
	public function actionView()
	{
		$model = $this->loadModel();
		$this->render('view', [
			'model' => $model,
		]);
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider = new CActiveDataProvider('User', [
			'criteria' => [
		        'condition' => 'status>' . User::STATUS_BANNED,
		    ],
				
			'pagination' => [
				'pageSize' => Yii::app()->controller->module->user_page_size,
			],
		]);

		$this->render('index', [
			'dataProvider' => $dataProvider,
		]);
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{
		if ($this->_model === null) {
			if (isset($_GET['id'])) {
				$this->_model = User::model()->findbyPk($_GET['id']);
			}

			if ($this->_model === null) {
				throw new CHttpException(404, 'The requested page does not exist.');
			}
		}

		return $this->_model;
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the primary key value. Defaults to null, meaning using the 'id' GET variable
	 */
	public function loadUser($id = null)
	{
		if ($this->_model === null) {
			if ($id !== null || isset($_GET['id'])) {
				$this->_model = User::model()->findbyPk($id !== null ? $id : $_GET['id']);
			}

			if ($this->_model === null) {
				throw new CHttpException(404,'The requested page does not exist.');
			}
		}

		return $this->_model;
	}
}