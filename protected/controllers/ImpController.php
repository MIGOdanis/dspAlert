<?php

class ImpController extends Controller
{
	// public function actionIndex()
	// {
	// 	$this->render('index');
	// }

	public function actionNew()
	{
		//曝光收集
		if(!isset($_GET['c']))
			Yii::app()->end();

		$model = new DspImp();
		$model->c = (int)$_GET['c'];
		$model->creat_time = time();
		$model->save();
		Yii::app()->end();
	}

	public function actionNewUrl()
	{
		//曝光收集
		if(!isset($_GET['p'])){
			echo "no data";
			Yii::app()->end();
		}

		$model = new ImpUrl();
		$model->p = $_GET['p'];
		$model->url = $_GET['url'];
		$model->creat_time = time();
		$model->save();
	//	print_r($model->getErrors());

		Yii::app()->end();
	}

}