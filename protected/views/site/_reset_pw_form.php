<?php
/**
 * 重設登入密碼表單
 * 
 * 顯示設定重設登入密碼表單。
 *
 * @author KeaNy
 * @date 2013.11.7
 * @spend 30 min
 * ------------------
 * RWD改版
 *
 * @author Denny
 * @date 2014.1.16
 * @spend 1 min
 */
?>
<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'reset-pw',
		'enableAjaxValidation'=>false,
		'htmlOptions'=>array(
			'name'=>'reset-pw',
			'class'=>'form-horizontal',
		),
	)); ?>

	<div class="form-group">
		<label class="col-md-2 col-sm-2 control-label">新密碼</label>
		<div class="col-md-8 col-sm-8">
			<?php echo $form->passwordField($model,'password',
					array('class'=>'form-control input-sm', 'data-name'=>'新密碼', 
						'placeholder'=>'必填', 'required'=>'required')); ?>
		</div>
	</div>

	<div class="form-group">
		<label class="col-md-2 col-sm-2 control-label">再次輸入</label>
		<div class="col-md-8 col-sm-8">
			<?php echo $form->passwordField($model,'repeat_password',
					array('class'=>'form-control input-sm', 'data-name'=>'密碼確認', 
						'placeholder'=>'必填', 'required'=>'required')); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-10 col-sm-10 text-right">
			<button id="reset-pw" type="button" class="btn btn-primary">設定密碼</button>
		</div>
	</div>

<?php $this->endWidget(); ?>