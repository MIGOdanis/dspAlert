<?php
/**
 * 新增臉書按讚會員登入表單
 *
 * @author Danis
 * @date 2013.12.31
 * @spend 20 min
 */
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-member',
	'enableAjaxValidation'=>false,
	'action'=>array('site/login',"redirect"=>"site/fblikechk"),
	'htmlOptions'=>array(
		'name'=>'login-member',
		'class'=>'form-horizontal',

	),
)); ?>
<div class="alert alert-danger text-center" style="padding: 8px;">若還不是會員，請先 
	<?php
	echo CHtml::link('<button id="login-member" type="button" class="btn btn-kuru btn-sm">加入會員</button>', 
		array('register/member'));
	?>
</div>
<div class="form-group">
	<label class="col-md-3 control-label">帳號(電子信箱)</label>
	<div class="col-md-9">
	<?php echo $form->textField($model,'username', 
			array('class'=>'form-control input-sm', 'data-name'=>'帳號', 'required'=>'requried')); ?>
	</div>
</div>

<div class="form-group">
	<label class="col-md-3 control-label">密碼</label>
	<div class="col-md-9">
	<?php echo $form->passwordField($model,'password', 
			array('class'=>'form-control input-sm', 'data-name'=>'密碼', 'required'=>'requried')); ?>					
	</div>
</div>
<div class="form-group">
	<div class="col-md-offset-4 col-md-8 text-right">
		</label>
		<button id="login-member" type="submit" class="btn btn-primary">會員登入</button>
	</div>
</div>

<?php $this->endWidget(); ?>