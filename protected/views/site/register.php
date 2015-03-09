<?php
/**
 * 註冊會員
 * 
 * 顯示註冊會員表單。
 *
 * @author	KeaNy
 * @date	2013.4
 * @spend	30 min
 * -------------------
 * 修改註冊會員欄位驗證。
 *
 * @author	KeaNy
 * @date	2013.7.10
 * @spend	15 min
 * -------------------
 * 套新版，內容待調整
 *
 * @author	KeaNy
 * @date	2013.9.26
 * @spend	15 min
 * -------------------
 * 套新版內容
 *
 * @author	KeaNy
 * @date	2013.10.2
 * @spend	1 hour
 * -------------------
 * 加上載入套件，修改地區選項
 *
 * @author	KeaNy
 * @date	2013.10.14
 * @spend	15 min
 * -------------------
 * 修改註冊服務條款的超連結
 *
 * @author	KeaNy
 * @date	2013.11.5
 * @spend	5 min
 * -------------------
 * 修改驗證碼版型
 *
 * @author	KeaNy
 * @date	2013.11.6
 * @spend	5 min
 * -------------------
 * 表單驗證的js優化
 *
 * @author	Denny
 * @date	2013.12.9
 * @spend	20 min
 * -------------------
 * 表單驗證的js優化修改
 *
 * @author	Denny
 * @date	2013.12.19
 * @spend	1 min
 * -------------------
 * 驗證碼設定為必填欄位
 *
 * @author	KeaNy
 * @date	2013.12.23
 * @spend	5 min
 * -------------------
 * 增加來訪來源，修改欄位順序
 *
 * @author	Denny
 * @date	2014.1.13
 * @spend	10 min
 * -------------------
 * 來訪來源欄位的firefox無效修復
 *
 * @author	Denny
 * @date	2014.1.14
 * @spend	3 min
 * ------------------
 * 增加使用者來源選擇
 *
 * @author Danis
 * @date 2014.1.15
 * @spend 10 min
 * ------------------
 * RWD改版
 *
 * @author Denny
 * @date 2014.1.15
 * @spend 5 min
 */
$baseUrl = Yii::app()->baseUrl; 
$cs = Yii::app()->getClientScript();
$cs->registerCssFile('/assets/css/plugins/jquery.alertify/alertify.css');
$cs->registerCssFile('/assets/css/plugins/jquery.alertify/alertify.default.css');
$cs->registerScriptFile('/assets/js/plugins/jquery.alertify.min.js');
$cs->registerCssFile('/assets/css/pages/register/member-register.css');
$cs->registerScriptFile('/assets/js/components/area.js');
$cs->registerScriptFile('/assets/js/plugins/form/jquery.formatter.min.js');
$cs->registerScriptFile('/assets/js/plugins/form/kuru.formCheck.js');
$cs->registerScriptFile('/assets/js/pages/register/member-register.js');

$this->pageTitle = '加入會員 - ' . Yii::app()->name;

$this->breadcrumbs_items = array(
	array('label'=>'<i class="icon-home icon-large"></i>', 'url'=>'/'),
	array('label'=>'加入庫嚕網會員', 'url'=>'site/register','class'=>'active'),
);
?>
<script>
$(function(){
	// 通訊地址
	var model = 'User';

	// 活動地區
	$('#User_activity_city_id').change(function(){
		htmlSelectAreas(model, 'activity_area_id', $(this).val(), 0);
	});

	$('#User_activity_area_id').live('change', function(){
		htmlZipcode('User_activity_zipcode', $(this).val());
	});

	// 通訊地址
	$('#User_city_id').change(function(){
		htmlSelectAreas(model, 'area_id', $(this).val(), 0);
	});

	$('#User_area_id').live('change', function(){
		htmlZipcode('User_zipcode', $(this).val());
	});
});
</script>

<!-- article -->
<article class="article box">

	<h1>加入庫嚕網會員</h1>

	<!-- #sign-up -->
	<section id="sign-up" class="row section">

	<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'sign-up',
			'enableAjaxValidation'=>false,
			'htmlOptions'=>array(
				'name'=>'sign-up',
				'class'=>'form-horizontal',
			),
		)); ?>

		<?php if ($form->errorSummary($model)): ?>
		<div class="col-md-12">
			<div class="alert alert-danger">
				<?php echo $form->errorSummary($model,'<p>輸入錯誤：</p>'); ?>
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
						<?php echo $form->emailField($model,'username',array('class'=>'form-control input-sm','data-name'=>'電子信箱','data-check'=>'email','required'=>'required')); ?>
						<span class="help-block">電子信箱為會員登入帳號</span>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 col-sm-4 control-label"><strong>＊</strong>密碼</label>
					<div class="col-md-8 col-sm-8">
						<?php echo $form->passwordField($model,'password',array('class'=>'form-control input-sm','data-name'=>'密碼','required'=>'required')); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 col-sm-4 control-label"><strong>＊</strong>再次輸入密碼</label>
					<div class="col-md-8 col-sm-8">
						<?php echo $form->passwordField($model,'repeat_password',array('class'=>'form-control input-sm','data-name'=>'密碼確認','required'=>'required')); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 col-sm-4 control-label"><strong>＊</strong>暱稱</label>
					<div class="col-md-8 col-sm-8">
						<?php echo $form->textField($model,'nickname',array('class'=>'form-control input-sm','data-name'=>'暱稱','required'=>'required')); ?>
						<!-- <span class="help-block pull-right">檢查是否可用</span> -->
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 col-sm-4 control-label">手機號碼</label>
					<div class="col-md-8 col-sm-8">
						<?php echo $form->telField($model,'mobile',array('class'=>'form-control input-sm','data-name'=>'手機號碼','data-check'=>"mobile")); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 col-sm-4 control-label"><strong>＊</strong>姓名</label>
					<div class="col-md-8 col-sm-8">
						<?php echo $form->textField($model,'name',array('class'=>'form-control input-sm','data-name'=>'姓名','required'=>'required')); ?>
						<span class="help-block">姓名僅為店家提供優惠或活動時登記之用</span>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 col-sm-4 control-label"><strong>＊</strong>活動地區</label>
					<div class="col-md-8 col-sm-8">
						<div class="row inline-group">
							<div class="col-md-4 col-sm-4">
								<?php echo CHtml::dropDownList('User[activity_city_id]', $model->activity_city_id, LookupCity::items(),
										array('class'=>'form-control input-sm', 'data-name'=>'縣市')); ?>
							</div>
							<div id="activity_area_id" class="col-md-4 col-sm-4">
								<?php echo CHtml::dropDownList('User[activity_area_id]', $model->activity_area_id, LookupArea::items($model->activity_city_id), 
										array('class'=>'form-control input-sm', 'data-name'=>'區域')); ?>					
							</div>
							<div class="col-md-4 col-sm-4">
								<?php echo $form->textField($model,'activity_zipcode',
										array('class'=>"form-control input-sm", 'placeholder'=>'郵遞區號', 'readonly'=>'readonly')); ?>
							</div>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 col-sm-4 control-label">通訊地址</label>
					<div class="col-md-8 col-sm-8">
						<div class="row inline-group">
							<div class="col-md-4 col-sm-4">
								<?php echo CHtml::dropDownList('User[city_id]', $model->city_id, LookupCity::items(), 
										array('class'=>'form-control input-sm', 'data-name'=>'通訊縣市')); ?>								
							</div>
							<div id="area_id" class="col-md-4 col-sm-4">
								<?php echo CHtml::dropDownList('User[area_id]', $model->area_id, LookupArea::items($model->city_id), 
										array('class'=>'form-control input-sm', 'data-name'=>'通訊區域')); ?>								
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
								array('class'=>"form-control input-sm", 'placeholder'=>'(選填)')); ?>
						<span class="help-block">地址僅為店家提供優惠或活動時登記之用</span>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 col-sm-4 control-label">出生日期</label>
					<div class="col-md-8 col-sm-8">
						<div class="row inline-group">
							<div class="col-md-4 col-sm-4">
								<?php
								$birthday_year = array('0'=>'年');
								for ($i = date('Y'); $i > date('Y') - 109; $i--) {
									$birthday_year[$i] = $i;
								}
								echo $form->dropDownList($model,'birthday_year',$birthday_year, 
										array('options' => array($_POST['User']['birthday_year']=>array('selected'=>true)),'class'=>'form-control input-sm'));
								?>
							</div>
							<div class="col-md-4 col-sm-4">
								<?php
								$birthday_month = array('0'=>'月');
								for ($i = 1; $i <= 12; $i++) {
									$birthday_month[$i] = $i . ' 月';
								}
								echo $form->dropDownList($model,'birthday_month',$birthday_month, 
										array('options' => array($_POST['User']['birthday_month']=>array('selected'=>true)),'class'=>'form-control input-sm'));
								?>
							</div>
							<div class="col-md-4 col-sm-4">
								<?php
								$birthday_day = array('0'=>'日');
								for ($i = 1; $i <= 31; $i++) {
									$birthday_day[$i] = $i;
								}
								echo $form->dropDownList($model,'birthday_day',$birthday_day, 
										array('options' => array($_POST['User']['birthday_day']=>array('selected'=>true)),'class'=>'form-control input-sm'));
								?>
							</div>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 col-sm-4 control-label">性別</label>
					<div class="col-md-8 col-sm-8 compact-radio">
						<?php echo $form->radioButtonList($model,'gender',
							array('2'=>'男性', '1'=>'女性'),
							array('separator'=>' ')); ?>
						<style>
							.compact-radio label {
								display:inline;
								font-weight:normal;
								margin-left:3px;
								margin-right:10px;
								cursor: pointer;
							}
							.compact-radio input {
								margin-top:8px;
							}
						</style>						
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 col-sm-4 control-label"><strong>＊</strong>如何得知本網站</label>
					<div class="col-md-8 col-sm-8">
						<label class="radio">
							<input name="User[come_from]" type="radio" value="臉書訊息"> 臉書訊息
						</label>
						<label class="radio">
							<input name="User[come_from]" type="radio" value="臉書粉絲團"> 本站的臉書粉絲團
						</label>
						<label class="radio">
							<input name="User[come_from]" type="radio" value="搜尋引擎"> 搜尋引擎(Yahoo、Gooogle搜尋)
						</label>
						<label class="radio">
							<input name="User[come_from]" type="radio" value="親友介紹"> 親友介紹
						</label>
						<label class="radio">
							<input name="User[come_from]" type="radio" value="其他"> 其他
						</label>
						<label class="radio">
							<input name="User[come_from]" type="text" class="form-control input-sm" data-name="如何得知網站" placeholder="若為其他請輸入" disabled="disabled">
						</label>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 col-sm-4 control-label"><strong>＊</strong>服務條款</label>
					<div class="col-md-8 col-sm-8">
						<label class="checkbox-inline">
							<input id="agree" name="User[terms_of_service]" type="checkbox" data-name="同意條款"> 勾選表示同意<?php echo CHtml::link('註冊服務條款', array('about/terms-of-signup'), array('target'=>'_blank')); ?>
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
								<a id="yw0_button" href="<?php echo Yii::app()->baseUrl; ?>/user/captcha?refresh=1"><span><i class="glyphicon glyphicon-repeat"></i></span></a>
							</span>	
						</div>
					</div>
				</div>			

				<div class="form-group">
					<div class="col-md-offset-4 col-md-8 col-sm-offset-4 col-sm-8">
						<button id="sign-up" type="submit" class="btn btn-primary btn-block">註冊</button>
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
						<li>為使網站或配合店家提供完整服務，其他欄位輸入請盡量詳實</li>
						<li>電子信箱為寄發認證信及查詢密碼使用，請輸入您慣用之信箱</li>
						<!-- <li>若無法收到認證信，可能被郵件系統誤判為垃圾信件，建議您至「垃圾信件夾」中查找</li> -->
					</ul>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">隱私聲明</h3>
				</div>
				<div class="panel-body">
					<ul>
						<li>未經您的允許、同意，庫嚕網不會向任何第三方公開或洩漏您的個人資訊</li>
						<li>為保障您的隱私，若您以外站帳號登入時，系統不會記錄您的帳號與密碼</li>
					</ul>
				</div>
			</div>

		</div><!-- /.col-md-4 -->

	<?php $this->endWidget(); ?>
	</section><!-- /#sign-up -->

</article><!-- /article -->