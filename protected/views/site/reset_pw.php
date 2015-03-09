<?php
/**
 * 重設密碼
 * 
 * 顯示重設密碼表單。
 *
 * @author	KeaNy
 * @date	2013.4
 * @spend	15 min
 * ------------------
 * 忘記密碼改為發送重設密碼確認信
 *
 * @author 	KeaNy
 * @date	2013.7.11
 * @spend	5 min
 * ------------------
 * 套新版
 *
 * @author 	KeaNy
 * @date	2013.11.8
 * @spend	30 min
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

$baseUrl = Yii::app()->baseUrl; 
$cs = Yii::app()->getClientScript();
$cs->registerCssFile('/assets/css/plugins/jquery.alertify/alertify.css');
$cs->registerCssFile('/assets/css/plugins/jquery.alertify/alertify.default.css');
$cs->registerScriptFile('/assets/js/plugins/jquery.alertify.min.js');
?>
<script>
$(function(){
	// 表單檢查
	$('form #reset-pw').click(function(e){
		var form = 'form[name="reset-pw"]';
		var emptyInput = [];
		var passwordCheck = '';
		var i = 0;
		$('.alertify-logs').empty();

        // 輸入框未填
        $(form +' input[required]').add(form +' textarea[required]').each(function(){
        	if ($(this).val() == '') {
        		emptyInput[i] = $(this).data('name');
        		i++;
        	}
        });

        // 密碼欄位不一致
		if ($('input#User_password', form).val() != $('input#User_repeat_password', form).val()) {
			var passwordCheck = '密碼欄位不一致';
		}

        // 表單動作
        if (emptyInput.length > 0) {
			emptyInfo = '「' + emptyInput.join() + '」欄位未填寫';
		    Alertify.log.error(emptyInfo, 5000);
		} else if (passwordCheck.length > 0) {
	    	Alertify.log.error(passwordCheck, 5000);
	    	return false;
    	} else {
    		$(form).submit();
    	}
    });

})
</script>

<!-- article -->
<article class="article box">

	<h1 class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">重設登入密碼</h1>

	<section class="row section">
		<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">

			<h4>請設定一組新密碼</h4>

			<?php echo CHtml::errorSummary($model, '<div class="alert alert-danger">', '</div>'); ?>

			<?php echo $this->renderPartial('_reset_pw_form', array('model'=>$model)); ?>
			
		</div><!-- /.col-md-8 -->

	</section>

</article><!-- /article -->