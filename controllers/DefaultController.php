<?php

class DefaultController extends Controller
{
	
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

		$this->render('/user/index', [
			'dataProvider' => $dataProvider,
		]);
	}

}