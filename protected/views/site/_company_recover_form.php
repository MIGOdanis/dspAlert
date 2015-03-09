<?php
/**
 * 忘記密碼表單
 * 
 * 顯示忘記密碼表單。
 *
 * @author KeaNy
 * @date 2013.4
 * @spend 15 min
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
?>
<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'forgot-pw',
		'enableAjaxValidation'=>false,
		'htmlOptions'=>array(
			'name'=>'forgot-pw',
			'class'=>'form-horizontal',
		),
	)); ?>

	<div class="form-group">
		<label class="col-md-2 col-sm-2 control-label">電子信箱</label>
		<div class="col-md-8 col-sm-8">
			<?php echo $form->textField($user,'username',
				array('class'=>'form-control input-sm','placeholder'=>'必填','data-name'=>'電子信箱','required'=>'required')); ?>
		</div>
	</div>

	<div class="captcha-submit-set form-group">
		<div class="set-group col-md-10 col-sm-10">
			<div class="captcha-img set">
				<?php $this->widget('CCaptcha',array('buttonLabel'=>' ')); ?>
			</div>
			<div class="captcha-input set input-group">
				<?php echo $form->textField($user,"verifyCode",
						array("class"=>"form-control","placeholder"=>"輸入驗證碼",'data-name'=>'驗證碼','required'=>'required')); ?>
				<span class="captcha-reload input-group-addon" title="重新發送驗證碼">
					<a id="yw0_button" href="<?php echo Yii::app()->baseUrl; ?>/user/captcha?refresh=1"><span><i class="glyphicon glyphicon-repeat"></i></span></a>
				</span>	
			</div>
			<div class="set">
				<button id="forgot-pw" type="button" class="btn btn-primary">寄發變更信</button>
			</div>
		</div>
	</div>

<?php $this->endWidget(); ?>