<?php
/**
 * 重設登入密碼 - 設定完成
 * 
 * 顯示設定完成訊息。
 *
 * @author KeaNy
 * @date 2013.11.8
 * @spend 5 min
 * ------------------
 * RWD改版
 *
 * @author Denny
 * @date 2014.1.16
 * @spend 1 min
 */
$this->pageTitle = '重設登入密碼 - ' . Yii::app()->name;

$this->breadcrumbs_items = array(
	array('label'=>'<i class="icon-home icon-large"></i>', 'url'=>'/'),
	array('label'=>'重設登入密碼', 'class'=>'active'),
);
?>

<!-- article -->
<article class="article box">

	<h1 class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">重設登入密碼</h1>

	<section class="row section">
		<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">

			<div class="alert alert-info"><h4 class="no-margin-tb">設定完成，請使用新密碼進行登入</h4></div>
			
		</div><!-- /.col-md-8 -->

	</section>

</article><!-- /article -->