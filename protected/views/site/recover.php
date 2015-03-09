<?php
/**
 * 會員忘記密碼
 * 
 * 顯示忘記密碼表單。
 * @var $this SiteController
 * @var $model Site
 * @var $form CActiveForm
 * 
 * @author	KeaNy
 * @date	2013.4
 * @spend	15 min
 * ------------------
 * 套新版，驗證碼的部分版型待調整
 * 
 * @author	KeaNy
 * @date	2013.9.26
 * @spend	15 min
 * ------------------
 * 微調版面
 * 
 * @author	KeaNy
 * @date	2013.10.1
 * @spend	1 min
 * ------------------
 * 修改驗證碼版型
 * 
 * @author	KeaNy
 * @date	2013.11.6
 * @spend	15 min
 * ------------------
 * RWD改版
 *
 * @author Denny
 * @date 2014.1.15
 * @spend 1 min
 */
$this->pageTitle = '忘記登入密碼 - ' . Yii::app()->name;

$this->breadcrumbs_items = array(
	array('label'=>'<i class="icon-home icon-large"></i>', 'url'=>'/'),
	array('label'=>'忘記登入密碼', 'class'=>'active'),
);

$baseUrl = Yii::app()->baseUrl; 
$cs = Yii::app()->getClientScript();
$cs->registerCssFile('/assets/css/plugins/jquery.alertify/alertify.css');
$cs->registerCssFile('/assets/css/plugins/jquery.alertify/alertify.default.css');
$cs->registerScriptFile('/assets/js/plugins/jquery.alertify.min.js');
?>
<script>
$(function(){
	// 表單檢查
	$('form #forgot-pw').click(function(e){
		var form = 'form[name="forgot-pw"]';
		var emptyInput = [];
		var i = 0;
		$('.alertify-logs').empty();

        // 輸入框未填
        $(form +' input[required]').add(form +' textarea[required]').each(function(){
        	if ($(this).val() == '') {
        		emptyInput[i] = $(this).data('name');
        		i++;
        	}
        });

        // 表單動作
        if (emptyInput.length > 0) {
			emptyInfo = '「' + emptyInput.join() + '」欄位未填寫';
		    Alertify.log.error(emptyInfo, 5000);
    	} else {
    		$(form).submit();
    	}
    });

})
</script>

<!-- article -->
<article class="article box">

	<h1 class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">會員重設登入密碼</h1>

	<section id="sign-up" class="row section">
		<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">

			<?php if (isset($_GET['done'])): ?>
			
				<div class="alert alert-info"><h4 class="no-margin-tb">密碼變更信件已寄出，請查收信箱</h4></div>
				
			<?php else: ?>
				
				<h4>
					請輸入您的註冊信箱，系統將寄發變更密碼的專用連結至您的信箱。<br>
					<small>此為會員變更密碼功能，若為店家請<?php echo CHtml::link('至此設定', array('login/company-forgot-pw')); ?></small>
				</h4>

				<?php echo CHtml::errorSummary($model, '<div class="alert alert-danger">', '</div>'); ?>
				
				<?php if(Yii::app()->user->hasFlash('recover')): ?>
					<div class="alert alert-danger"><?php echo Yii::app()->user->getFlash('recover'); ?></div>
				<?php endif; ?>
					
				<?php echo $this->renderPartial('_recover_form', array('model'=>$model)); ?>
					
			<?php endif; ?>

		</div><!-- /.col-md-8 -->

	</section>

</article><!-- /article -->