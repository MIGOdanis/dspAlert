<?php

class AnalysisController extends Controller
{
	public function actionIndex()
	{
		//ini_set("display_errors", 1);
		ini_set("memory_limit","512M");
		$item = array();
		if(isset($_GET['Zone']) && $_GET['Zone'] > 0){
			$startTime = strtotime(date("Y-m-d"). " 00:00");
			$endTime = strtotime(date("Y-m-d"). " 24:00");

			if(isset($_GET['day']))
				$startTime = strtotime($_GET['day']. " 00:00");

			if(isset($_GET['day']))
				$endTime = strtotime($_GET['day']. " 24:00");

			$criteria=new CDbCriteria;
			$criteria->addCondition("creat_time > " . $startTime);
			$criteria->addCondition("creat_time <= " . $endTime);	
			$criteria->addCondition("p like '%" . (int)$_GET['Zone'] .":%'");

			if(isset($_GET['Url']) && !empty($_GET['Url']))
				$criteria->addCondition("url like '%" . $_GET['Url'] ."%'");
			$model = ImpUrl::model()->findAll($criteria);

			$countHourily = $this->countHourily($model);
			$item = $this->transferItem($countHourily['hourily']);
			
		}
		$this->render('index', array(
			'items' => $item['item'],
			'COT' => $countHourily['COT'],
			'CBU' => $item['CBU'],
			'tot' => count($model)
		));
	}
	function countHourily($model){
		$hourily = array();
		$countOfTime = array();

		foreach ($model as $row) {
			$hour = $this->getHour($row->creat_time);
			//$url = $this->analysisUrl($row->url);

			$url = $row->url;
			$newValue = $hourily[$hour][$url] + 1;
			$hourily[$hour][$url] = $newValue;

			$newCount = $countOfTime[date("H:i",$row->creat_time)] + 1;
			$countOfTime[date("H:i",$row->creat_time)] = $newCount;

		}

		return array(
			"hourily" => $hourily,
			"COT" => $countOfTime
		);
	}

	function transferItem($hourily){
		$item = array();
		$dayily = array();
		$contByUrl = array();
		foreach ($hourily as $hourKey => $hourValue) {
			$hour = $hourKey;
			foreach ($hourValue as $urlKey => $urlValue) {
				$zone = $zoneKey;
				$item[] = array(
					'hour'=>$hour,
					'url' => $urlKey,
					'count' => $urlValue,
				);
				$url = $this->analysisUrl($urlKey);
				$contByUrl[$url] = $contByUrl[$url] + $urlValue;
			}
		}
		return array(
			"item" => $item,
			"CBU" =>$contByUrl
		);
	}

	function getHour($time){
		//$time = $time + 28800;
		return date("H",$time);
	}

	function analysisUrl($url){
		$url = str_replace ("http://","",$url);
		$url = str_replace ("https://","",$url);

		$urlArray = explode("/",$url);
		$count = count($urlArray) - 1;
		unset($urlArray[$count]);
		
		return  implode("/", $urlArray);
	}

	public function actionReportCpe()
	{
		ini_set("memory_limit","512M");
		$item = array();

		$model = ImpUrl::model()->findByCPE();
		$countDayily = $this->countDayily($model);
		$item = $this->transByDay($countDayily['dayily']);

		$this->render('reportCpe', array(
			'items' => $item['item'],
			'COT' => $item['COT'],
			'tot' => count($model)
		));
	}
	function countDayily($model){
		$dayily = array();
		$countOfTime = array();

		foreach ($model as $row) {
			$day = $this->getDay($row->creat_time);
			$url = $row->url;
			$newValue = $dayily[$day][$url] + 1;
			$dayily[$day][$url] = $newValue;

			$newCount = $countOfTime[date("m/d",$row->creat_time)] + 1;
			$countOfTime[date("m/d",$row->creat_time)] = $newCount;
		}

		return array(
			"dayily" => $dayily,
			"COT" => $countOfTime
		);
	}
	
	function transByDay($dayily){
		$item = array();
		$day = array();
		$contByUrl = array();		
		foreach ($dayily as $dayKey => $dayValue) {
			$day = $dayKey;
			foreach ($dayValue as $urlKey => $urlValue) {
				$zone = $zoneKey;
				$item[] = array(
					'day'=>$day,
					'url' => $urlKey,
					'count' => $urlValue,
				);
				
				$contByUrl[$url] = $contByUrl[$url] + $urlValue;
			}
		}
		return array(
			"item" => $item,
			"CBU" =>$contByUrl
		);
	}
	function getDay($time){
		return date("m/d",$time);
	}
}