<?php

class AdxController extends Controller
{
	public function actionIndex()
	{
		$this->writeLog('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],"adx.txt");
		Yii::app()->end();
	}

	public function actionClick()
	{
		if(isset($_GET['p'])){
			$fileName = date("Y-m-d");
			$path = dirname(__FILE__)."/../../adx/json/".$fileName.".json";
			if(is_file($path)){

				$data = file_get_contents($path);
				$data = json_decode($data,true);
			}else{
				$data["totClick"] = 0;
			}

			//$data["totClick"] <= 100 && 

			if(rand(0,100000) > 99930 ){
				$data["totClick"] = $data["totClick"]+1;
				$this->writeDayClicks($data,$fileName.".json");
				$this->writeLog("Click : " . $data["totClick"] . " | p : " . $_GET['p'],$fileName."_click.log");
				header('Content-Type: application/javascript');
				echo "
						var cfadimg = document.createElement('img');
						cfadimg.src = '" . $_GET['link'] . "&dest=http%3A%2F%2Fclickforce.com.tw%3Fcfads%3D765&';
						cfadimg.setAttribute('style', 'display: none;');
						document.getElementsByTagName('body')[0].appendChild(cfadimg);
						console.log('c');
					 ";
			}
		}	
		Yii::app()->end();
	}

	function writeLog($str,$fileName){
		if (!is_dir(dirname(__FILE__)."/../../adx")){     //檢察upload資料夾是否存在
			mkdir(dirname(__FILE__)."/../../adx");
		}
		$path = dirname(__FILE__)."/../../adx/".$fileName;
		$type = (is_file($path)) ? "a+" : "w+";
		$file = fopen($path,$type);
		$content = date("Y-m-d H:i:s") . " | " . $str ."\r\n";
	    fwrite($file,$content);
	    fclose($file);	
	}

	function writeDayClicks($data,$fileName){
		if (!is_dir(dirname(__FILE__)."/../../adx/json")){     //檢察upload資料夾是否存在
			mkdir(dirname(__FILE__)."/../../adx/json");
		}
		$path = dirname(__FILE__)."/../../adx/json/".$fileName;
		$type = "w+";
		$file = fopen($path,$type);
		$content = json_encode($data);
	    fwrite($file,$content);
	    fclose($file);	
	}	
}