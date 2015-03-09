<?php
/**
 * 店家註冊完成頁
 * 
 * 顯示註冊店家完成訊息。
 *
 * @author KeaNy
 * @date 2013.11.5
 * @spend 15 min
 * --------------------
 * 修改回首頁連結
 *
 * @author KeaNy
 * @date 2013.11.29
 * @spend 1 min
 */
$this->pageTitle = '店家註冊完成 - ' . Yii::app()->name;

$this->breadcrumbs_items = array(
	array('label'=>'<i class="icon-home icon-large"></i>', 'url'=>'/'),
	array('label'=>'店家註冊完成', 'class'=>'active'),
);
?>
<!-- #wellcome -->
<section id="wellcome">
	<div class="jumbotron">
		<div class="container">
			<h1><i class="fa fa-check-square-o"></i> 註冊資料送出，請等待開通</h1>
			<p>感謝您完成申請庫嚕網合作店家。</p>
			<p>資料已完成送出，我們將儘速開通您的帳號，<br><span class="text-danger">帳號開通後會寄發通知信至您的註冊信箱</span>，請您留意信箱訊息。</p>
			<p><?php echo CHtml::link('回首頁', Yii::app()->homeUrl, array('class'=>'btn btn-kuru btn-lg')); ?></p>
		</div>
	</div>
</section><!-- /#wellcome -->