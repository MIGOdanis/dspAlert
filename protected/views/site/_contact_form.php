<?php
/**
 * 聯絡我們 表單
 * 
 * @author Danis
 * @date 2013.11.6
 * @spend 30 min
 * ------------------
 * 增加停權頁來源設定 
 * 
 * @author Danis
 * @date 2014.2.13
 * @spend 5 min
 */
if(isset($_GET['type']) && $_GET['type'] == "active"){
	$model->question = "帳號停權處理";
}

function radioChecked($value){
	if(isset($_GET['type']) && $_GET['type'] == "active" && $value == "註冊店家"){
		return "checked";
	}elseif($value == "瀏覽訪客"){
		return "checked";
	}
}
 ?>
	<?php $form=$this->beginWidget('CActiveForm', array(
		'enableAjaxValidation'=>false,
		'htmlOptions'=>array(
			'name'=>'contact',
			'class'=>'form-horizontal',
		)
	)); ?>
	
	<div class="form-group">
		<label class="col-md-4 col-sm-4 control-label"><strong>＊</strong>姓名</label>
		<div class="col-md-8 col-sm-8">
			<?php echo $form->textField($model,'name',array("class"=>"form-control input-sm","data-name"=>"姓名","required"=>"required")); ?>
			<?php echo $form->error($model,'name'); ?>
		</div>
	</div>

	<div class="form-group">
		<label class="col-md-4 col-sm-4 control-label"><strong>＊</strong>電子信箱</label>
		<div class="col-md-8 col-sm-8">
			<?php echo $form->textField($model,'email',array("class"=>"form-control input-sm","data-name"=>"電子信箱","required"=>"required")); ?>
			<?php echo $form->error($model,'email'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-md-4 col-sm-4 control-label">電話</label>
		<div class="col-md-8 col-sm-8">
			<?php echo $form->textField($model,'phone',array('maxlength'=>15,"class"=>"form-control input-sm","data-name"=>"電話")); ?>
			<?php echo $form->error($model,'phone'); ?>
		</div>
	</div>

	<div class="form-group">
		<label class="col-md-4 col-sm-4 control-label">傳真</label>
		<div class="col-md-8 col-sm-8">
			<?php echo $form->textField($model,'fax',array('maxlength'=>15,"class"=>"form-control input-sm","data-name"=>"傳真")); ?>
			<?php echo $form->error($model,'fax'); ?>
		</div>
	</div>

	<div class="form-group">
		<label class="col-md-4 col-sm-4 control-label">來訪身分</label>
		<div class="col-md-8 col-sm-8">
			<label class="radio-inline">
				<input name="Contact[role]" type="radio" value="瀏覽訪客" <?php echo radioChecked("瀏覽訪客"); ?>> 瀏覽訪客
			</label>
			<label class="radio-inline">
				<input name="Contact[role]" type="radio" value="網站會員" <?php echo radioChecked("網站會員"); ?>> 網站會員
			</label>
			<label class="radio-inline">
				<input name="Contact[role]" type="radio" value="註冊店家" <?php echo radioChecked("註冊店家"); ?>> 註冊店家
			</label>
		</div>
	</div>

	<div class="form-group">
		<label class="col-md-4 col-sm-4 control-label">問題類別</label>
		<div class="col-md-8 col-sm-8">
			<?php echo $form->dropDownList($model,'question',array(
						"網站建議"=>"網站建議",
						"網站使用問題"=>"網站使用問題",
						"無法註冊會員"=>"無法註冊會員",
						"無法刊登店家資料"=>"無法刊登店家資料",
						"廣告服務"=>"廣告服務",
						"業務合作"=>"業務合作",
						"帳號停權處理"=>"帳號停權處理"
					), 
					array('class'=>'form-control input-sm'));
			?>
		</div>
	</div>

	<div class="form-group">
		<label class="col-md-4 col-sm-4 control-label"><strong>＊</strong>主旨</label>
		<div class="col-md-8 col-sm-8">
			<?php echo $form->textField($model,'subject',array('maxlength'=>128,"class"=>"form-control input-sm","data-name"=>"主旨","required"=>"required")); ?>
			<?php echo $form->error($model,'subject'); ?>
		</div>
	</div>

	<div class="form-group">
		<label class="col-md-4 col-sm-4 control-label"><strong>＊</strong>您的意見</label>
		<div class="col-md-8 col-sm-8">
			<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50,"class"=>"form-control input-sm","data-name"=>"您的意見","required"=>"required")); ?>
			<?php echo $form->error($model,'body'); ?>
		</div>
	</div>

	<div class="captcha-submit-set form-group">
		<label class="col-md-4 col-sm-4 control-label"><strong>＊</strong>驗證碼</label>
		<div class="set-group">
			<div class="captcha-img set">
				<?php 
				$this->widget('CCaptcha',array(
					'buttonLabel' => ''
				)); ?>
			</div>
			<div class="captcha-input set input-group">
				<?php echo $form->error($model,'verifyCode'); ?>
				<?php echo $form->textField($model,"verifyCode",array("class"=>"form-control","placeholder"=>"輸入驗證碼")); ?>
				<span class="captcha-reload input-group-addon" title="重新發送證碼">
				    <?php echo CHtml::link('<span><i class="glyphicon glyphicon-repeat"></i></span>',
						array('site/captcha',"refresh"=>1), array("id"=>"yw1_button")); ?>
				</span>	
			</div>
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-offset-4 col-md-8 col-sm-offset-4 col-sm-8">
			<button id="contact" type="button" class="btn btn-primary btn-block">送出</button>
		</div>
	</div>
<?php $this->endWidget(); ?>