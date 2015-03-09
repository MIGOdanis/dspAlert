<?php
/**
 * 店家註冊表單
 * 
 * 顯示註冊店家表單。
 *
 * @author KeaNy
 * @date 2013.11.11
 * @spend 1 min
 * -----------------
 * 加上CSS和JS, 修改表單用到的變數
 *
 * @author KeaNy
 * @date 2013.11.13
 * @spend 15 min
 * -----------------
 * 加上電話欄位格式js
 *
 * @author Denny
 * @date 2013.11.15
 * @spend 1 min
 * ----------------
 * 表單優化
 *
 * @author Denny
 * @date 2013.12.19
 * @spend 10 min
 * -------------------
 * 驗證碼設定為必填欄位
 *
 * @author	KeaNy
 * @date	2013.12.23
 * @spend	5 min
 * -------------------
 * 統一編號設定為非必填欄位，調整欄位位置
 *
 * @author	KeaNy
 * @date	2013.01.06
 * @spend	5 min
 * ------------------
 * 修改廠商註冊驗證(加上username)
 *
 * @author Danis
 * @date 2014.1.8
 * @spend 5 min
 * ------------------
 * 加入有無分店
 *
 * @author Danis
 * @date 2014.1.23
 * @spend 10 min
 * ------------------
 * 修正驗證碼更新連結
 *
 * @author Danis
 * @date 2014.1.27
 * @spend 3 min
 * ---------------------
 * 店家註冊欄位新增
 *
 * @author Danis
 * @date 2014.02.14
 * @spend 15 min
 * ---------------------
 * 店家註冊新增來源
 *
 * @author Danis
 * @date 2014.5.14
 * @spend 10 min
 * ---------------------
 * 店家註冊新增來源增加項目
 *
 * @author Danis
 * @date 2014.5.16
 * @spend 3 min
 */
$baseUrl = Yii::app()->baseUrl; 
$cs = Yii::app()->getClientScript();
$cs->registerCssFile('/assets/css/plugins/jquery.alertify/alertify.css');
$cs->registerCssFile('/assets/css/plugins/jquery.alertify/alertify.default.css');
$cs->registerScriptFile('/assets/js/plugins/jquery.alertify.min.js');
$cs->registerCssFile('/assets/css/pages/register/member-register.css');
$cs->registerScriptFile('/assets/js/components/area.js');
$cs->registerScriptFile('/assets/js/plugins/form/kuru.formCheck.js');
$cs->registerScriptFile('/assets/js/plugins/form/jquery.formatter.min.js');
$cs->registerScriptFile('/assets/js/pages/register/company-register.js');
?>

<script>
$(function(){
	var model = 'CompanyRegister';

	$('#CompanyRegister_city_id').change(function(){
		htmlSelectAreas(model, 'area_id', $(this).val(), 0);
	});

	$('#CompanyRegister_area_id').live('change', function(){
		htmlZipcode('CompanyRegister_zipcode', $(this).val());
	});
});
</script>

<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'sign-up',
		'enableAjaxValidation'=>false,
		'htmlOptions'=>array(
			'name'=>'sign-up',
			'class'=>'form-horizontal',
		),
	)); ?>

	<?php if ($form->errorSummary(array($model))): ?>
	<div class="col-md-12">
		<div class="alert alert-danger">
			<?php echo $form->errorSummary(array($model),'<p>輸入錯誤：</p>'); ?>
			<style>
				.errorSummary ul {
					list-style: none;
					padding-left:0;
				}
			</style>
		</div>
	</div>
	<?php endif; ?>
	<?php if ($form->errorSummary(array($user))): ?>
	<div class="col-md-12">
		<div class="alert alert-danger">
			<?php echo $form->errorSummary(array($user),'<p>輸入錯誤：</p>'); ?>
			<style>
				.errorSummary ul {
					list-style: none;
					padding-left:0;
				}
			</style>
		</div>
	</div>
	<?php endif; ?>
	<div class="col-md-7 col-sm-7">
			<div class="form-group">
				<label class="col-md-4 col-sm-4 control-label"><strong>＊</strong>電子信箱</label>
				<div class="col-md-8 col-sm-8">
					<?php echo $form->emailField($user,'username',array('class'=>'form-control input-sm','data-name'=>'電子信箱','required'=>'required', 'data-check'=>"email")); ?>
					<span class="help-block">電子信箱為店家登入帳號</span>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-4 col-sm-4 control-label"><strong>＊</strong>店名</label>
				<div class="col-md-8 col-sm-8">
					<?php echo $form->textField($model,'company_name',array('class'=>'form-control input-sm','data-name'=>'店名','required'=>'required')); ?>
					<!-- <span class="help-block pull-right">檢查是否可用</span> -->
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-4 col-sm-4 control-label"><strong>＊</strong>店家型態</label>
				<div class="col-md-8 col-sm-8">
					<label class="checkbox-inline">
						<?php echo $form->checkBox($model,'general_store',  array('checked'=>'checked')); ?> 一般店家
					</label>
					<label class="checkbox-inline">
						<?php echo $form->checkBox($model,'enterprise_hq'); ?> 企業總部
					</label>
					<label class="checkbox-inline">
						<?php echo $form->checkBox($model,'online_shopping'); ?> 網購店家
					</label>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-4 col-sm-4 control-label"><strong>＊</strong>有無分店</label>
				<div class="col-md-8 col-sm-8">
					<label class="radio-inline">
						<input name="CompanyRegister[has_store]" type="radio" value="0" checked="checked"> 無分店
					</label>
					<label class="radio-inline">
						<input name="CompanyRegister[has_store]" type="radio" value="1" data-branch="1"> 有分店
					</label>
					<span class="help-block">
						<span class="text-danger">
						* 若分店有「各自刊登訊息」的需求，請點選「無分店」，再分別註冊各家分店資料及相關資訊。</span>
					</span>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-4 control-label"><strong>＊</strong>聯絡人</label>
				<div class="col-md-8">
					<?php echo $form->textField($model,'name',array('class'=>'form-control input-sm','data-name'=>'聯絡人','required'=>'required')); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-4 col-sm-4 control-label"><strong>＊</strong>地址</label>
				<div class="col-md-8 col-sm-8">
					<div class="row inline-group">
						<div class="col-md-4 col-sm-4">
							<?php echo CHtml::dropDownList('CompanyRegister[city_id]', $model->city_id, LookupCity::items(), array('class'=>'form-control input-sm', 'data-name'=>'縣市')); ?>								
						</div>
						<div id="area_id" class="col-md-4 col-sm-4">
							<?php echo CHtml::dropDownList('CompanyRegister[area_id]', $model->area_id, LookupArea::items($model->city_id), 
									array('class'=>'form-control input-sm', 'data-name'=>'區域')); ?>								
						</div>
						<div class="col-md-4 col-sm-4">
							<?php echo $form->textField($model,'zipcode',
									array('class'=>"form-control input-sm", 'placeholder'=>'郵遞區號', 'readonly'=>'readonly')); ?>
						</div>
					</div>
				</div>
			</div>
		
			<div class="form-group">
				<div class="col-md-offset-4 col-md-8 col-sm-offset-4 col-sm-8">
					<?php echo $form->textField($model,'address',
							array('class'=>"form-control input-sm", 'data-name'=>'地址', 'required'=>'required', 'placeholder'=>'地址')); ?>
				</div>
				<div class="col-md-offset-4 col-md-8 col-sm-offset-4 col-sm-8">
					<label class="radio">
						<input name="CompanyRegister[hide_address]" type="radio" value="0" checked="checked"> 顯示地址
					</label>
					<label class="radio">
						<input name="CompanyRegister[hide_address]" type="radio" value="1"> 隱藏地址 (例企業總部或網購店家)，設定隱藏時頁面及地圖中不顯示地址
					</label>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-4 col-sm-4 control-label"><strong>＊</strong>電話號碼</label>
				<div class="col-md-8 col-sm-8">
					<?php echo $form->telField($model,'tel',array('class'=>'form-control input-sm','data-name'=>'電話號碼','required'=>'required')); ?>
					<span class="help-block">電話需加上區碼</span>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-4 col-sm-4 control-label">傳真號碼</label>
				<div class="col-md-8 col-sm-8">
					<?php echo $form->telField($model,'fax',array('class'=>'form-control input-sm','data-name'=>'傳真號碼')); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-4 col-sm-4 control-label">網站</label>
				<div class="col-md-8 col-sm-8">
					<?php echo $form->urlField($model,'web',array('class'=>'form-control input-sm','data-name'=>'網站', 'data-check'=>"url")); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-4 col-sm-4 control-label">統一編號</label>
				<div class="col-md-8 col-sm-8">
					<?php echo $form->textField($model,'ubi',array('class'=>'form-control input-sm','data-name'=>'統一編號')); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-4 col-sm-4 control-label"><strong>＊</strong>如何得知本網站</label>
				<div class="col-md-8 col-sm-8">
					<label class="radio">
						<input name="CompanyRegister[come_from]" type="radio" value="DM傳單"> DM傳單
					</label>
					<label class="radio">
						<input name="CompanyRegister[come_from]" type="radio" value="業務介紹"> 業務介紹
					</label>
					<label class="radio">
						<input name="CompanyRegister[come_from]" type="radio" value="業務代為申請"> 業務代為申請
					</label>
					<label class="radio">
						<input name="CompanyRegister[come_from]" type="radio" value="臉書訊息"> 臉書訊息
					</label>
					<label class="radio">
						<input name="CompanyRegister[come_from]" type="radio" value="臉書粉絲團"> 本站的臉書粉絲團
					</label>
					<label class="radio">
						<input name="CompanyRegister[come_from]" type="radio" value="搜尋引擎"> 搜尋引擎(Yahoo、Gooogle搜尋)
					</label>
					<label class="radio">
						<input name="CompanyRegister[come_from]" type="radio" value="親友介紹"> 親友介紹
					</label>
					<label class="radio">
						<input name="CompanyRegister[come_from]" type="radio" value="其他"> 其他
					</label>
					<label class="radio">
						<input name="CompanyRegister[come_from]" type="text" class="form-control input-sm" data-name="如何得知網站" placeholder="若為其他請輸入" disabled="disabled">
					</label>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-4 col-sm-4 control-label"><strong>＊</strong>服務條款</label>
				<div class="col-md-8 col-sm-8">
					<label class="checkbox-inline">
						<input id="agree" name="CompanyRegister[terms_of_service]" type="checkbox" data-name="同意條款"> 勾選表示同意<?php echo CHtml::link('註冊服務條款', array('about/company-terms-of-signup'), array('target'=>'_blank')); ?>
					</label>
				</div>
			</div>

			<div class="captcha-submit-set form-group">
				<label class="col-md-4 col-sm-4 control-label"><strong>＊</strong>驗證碼</label>
				<div class="set-group">
					<div class="captcha-img set">
						<?php $this->widget('CCaptcha',array('buttonLabel'=>' ')); ?>
					</div>
					<div class="captcha-input set input-group">
						<?php echo $form->textField($model,"verifyCode",array("class"=>"form-control","placeholder"=>"輸入驗證碼","data-name"=>"驗證碼","required"=>"required")); ?>
						<span class="captcha-reload input-group-addon" title="重新發送驗證碼">
							<a id="yw0_button" href="<?php echo Yii::app()->baseUrl; ?>/site/captcha?refresh=1"><span><i class="glyphicon glyphicon-repeat"></i></span></a>
						</span>	
					</div>
				</div>
			</div>			


			<div class="form-group">
				<div class="col-md-offset-4 col-md-8 col-sm-offset-4 col-sm-8">
					<button id="sign-up" type="button" class="btn btn-primary btn-block">註冊</button>
				</div>
			</div>

	</div><!-- /.col-md-8 -->

	<div class="col-md-4 col-sm-4">

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">填寫說明</h3>
			</div>
			<div class="panel-body">
				<ul>
					<li><span class="required">標記＊</span>的欄位為必填項目</li>
					<li>電子信箱為寄發認證信及查詢密碼使用，請輸入您慣用之信箱</li>
				</ul>
			</div>
		</div>

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">隱私聲明</h3>
			</div>
			<div class="panel-body">
				<p class="text-danger">注意！<br>您的下列註冊資料都會顯示在網站上，如不同意請勿註冊。</p>
				<p>顯示：<br>統編、店名、地址、電話、傳真、網站，亦包括店家發佈的訊息、照片等。</p>
			</div>
		</div>

	</div><!-- /.col-md-4 -->

<?php $this->endWidget(); ?>