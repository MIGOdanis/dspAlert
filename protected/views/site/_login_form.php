<?php
/**
 * 會員登入表單
 * 
 * 顯示會員登入表單
 *
 * @author KeaNy
 * @date 2013.11.12
 * @spend 5 min
 * ------------------
 * RWD改版
 *
 * @author Denny
 * @date 2014.1.15
 * @spend 1 min
 * ------------------
 * 登入錯誤訊息加上判斷
 *
 * @author KeaNy
 * @date 2014.4.1
 * @spend 1 min
 */
$baseUrl = Yii::app()->baseUrl; 
$cs = Yii::app()->getClientScript();
$cs->registerCssFile('/assets/css/plugins/jquery.alertify/alertify.css');
$cs->registerCssFile('/assets/css/plugins/jquery.alertify/alertify.default.css');
$cs->registerScriptFile('/assets/js/plugins/jquery.alertify.min.js');
?>
<script>
$(function(){
	// 表單檢查
	$('form #login-member').click(function(e){
		var form = 'form[name="login-member"]';
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

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-member',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
		'name'=>'login-member',
		'class'=>'form-horizontal',
	),
)); ?>

	<?php if (!empty($_POST) && Yii::app()->session['login-fail'] > 0): ?>
		<div class="alert alert-danger text-center">
			<h4 style="margin: 0;">登入錯誤！</h4>
		</div>
	<?php endif; ?>

	<div class="form-group">
		<label class="col-md-4 col-sm-4 control-label">帳號(電子信箱)</label>
		<div class="col-md-8 col-sm-8">
			<?php echo $form->textField($model,'username', 
					array('class'=>'form-control input-sm', 'data-name'=>'帳號', 'required'=>'requried')); ?>
		</div>
	</div>

	<div class="form-group">
		<label class="col-md-4 col-sm-4 control-label">密碼</label>
		<div class="col-md-8 col-sm-8">
			<?php echo $form->passwordField($model,'password', 
					array('class'=>'form-control input-sm', 'data-name'=>'密碼', 'required'=>'requried')); ?>					
		</div>
	</div>

	<?php if (Yii::app()->session['login-fail'] >= 2): ?>
		<div class="captcha-submit-set form-group">
			<div class="set-group">
				<div class="captcha-img set">
					<?php $this->widget('CCaptcha',array('buttonLabel'=>' ')); ?>
				</div>
				<div class="captcha-input set input-group">
					<?php echo $form->textField($model,"verifyCode",array("class"=>"form-control","placeholder"=>"輸入驗證碼")); ?>
					<span class="captcha-reload input-group-addon" title="重新發送證碼">
						<a id="yw0_button" href="<?php echo Yii::app()->baseUrl; ?>/site/captcha?refresh=1"><span><i class="glyphicon glyphicon-repeat"></i></span></a>
					</span>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<div class="form-group">
		<div class="col-md-offset-4 col-md-8 col-sm-offset-4 col-sm-8 text-right">
			<label>
				<?php echo $form->checkBox($model,'rememberMe'); ?> <?php echo $form->label($model,'rememberMe'); ?>
			</label>
			<button id="login-member" type="submit" class="btn btn-primary">會員登入</button>
		</div>
	</div>

<?php $this->endWidget(); ?>