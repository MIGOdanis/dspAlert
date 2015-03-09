<?php
/**
 * 廠商忘記密碼
 * 
 * 顯示廠商忘記密碼表單。
 *
 * @author	KeaNy
 * @date	2013.4
 * @spend	5 min
 * ------------------
 * 套新版
 *
 * @author KeaNy
 * @date 2013.11.7
 * @spend 30 min
 * -------------------
 * 修改忘記密碼驗證
 *
 * @author Danis 
 * @date 2014.01.08
 * @spend 5 min
 * ------------------
 * RWD改版
 *
 * @author Denny
 * @date 2014.1.16
 * @spend 1 min
 */
$this->pageTitle = '店家重設登入密碼 - ' . Yii::app()->name;

$this->breadcrumbs_items = array(
	array('label'=>'<i class="icon-home icon-large"></i>', 'url'=>'/'),
	array('label'=>'店家重設登入密碼', 'class'=>'active'),
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

	<h1 class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">店家重設登入密碼</h1>

	<section id="sign-up" class="row section">
		<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">

			<?php if (isset($_GET['done'])): ?>
			
				<div class="alert alert-info"><h4 class="no-margin-tb">密碼變更信件已寄出，請查收信箱</h4></div>
				
			<?php else: ?>
				
				<h4>請輸入您的註冊信箱，系統將寄發變更密碼的專用連結至您的信箱。</h4>

				<?php echo CHtml::errorSummary(array($user), '<div class="alert alert-danger">', '</div>'); ?>
				
				<?php if(Yii::app()->user->hasFlash('company_recover')): ?>
					<div class="alert alert-danger"><?php echo Yii::app()->user->getFlash('company_recover'); ?></div>
				<?php endif; ?>
				
				<?php echo $this->renderPartial('_company_recover_form', array('user'=>$user)); ?>
					
			<?php endif; ?>
				
		</div><!-- /.col-md-8 -->

	</section>

</article><!-- /article -->
