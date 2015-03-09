<?php
/**
 * 錯誤訊息
 * 
 * 顯示錯誤訊息。
 *
 * @author KeaNy
 * @date 2013.4
 * @spend 1 min
 * -----------------
 * 修改頁面標題，隱藏錯誤訊息內容。
 *
 * @author KeaNy
 * @date 2013.12.9
 * @spend 1 min
 * ------------------
 * 新增404套版與500預留位置
 *
 * @author Danis
 * @date 2013.12.12
 * @spend 1 min
 */
// $baseUrl = Yii::app()->baseUrl; 
// $cs = Yii::app()->getClientScript();
// if($code == '404'){
// 	$cs->registerCssFile('/assets/css/pages/404.css');
// 	$this->pageTitle = '找不到頁面 - ' . Yii::app()->name;
// 	$this->breadcrumbs_items = array(
// 		array('label'=>'<i class="icon-home icon-large"></i>', 'url'=>'/'),
// 		array('label'=>'找不到頁面', 'url'=>'','class'=>'active'),
// 	);
// 	$this->renderPartial('_404');
// }elseif($code == '500'){
// 	//500預留位置
// 	$cs->registerCssFile('/assets/css/pages/404.css');
// 	$this->pageTitle = '網站維護中 - ' . Yii::app()->name;
// 	$this->breadcrumbs_items = array(
// 		array('label'=>'<i class="icon-home icon-large"></i>', 'url'=>'/'),
// 		array('label'=>'網站維護中', 'url'=>'','class'=>'active'),
// 	);
// 	$this->renderPartial('_500');
// }
echo $error['message'];
?>