<?php
/**
 * 註冊會員完成頁
 * 
 * 顯示註冊會員完成訊息。
 *
 * @author	KeaNy
 * @date	2013.4
 * @spend	1 min
 * ------------------
 * 套新版，內容待調整
 *
 * @author	KeaNy
 * @date	2013.9.26
 * @spend	5 min
 * ------------------
 * 新版內容調整
 *
 * @author	KeaNy
 * @date	2013.9.26
 * @spend	5 min
 * ----------------
 * 加入附近店家功能
 *
 * @author Danis
 * @date 2013.10.3
 * @spend 30 min
 * ----------------
 * 修改附近店家功能
 *
 * @author KeaNy
 * @date 2013.11.6
 * @spend 15 min
 * ----------------
 * 引入css、樣式修改
 *
 * @author Denny
 * @date 2013.11.7
 * @spend 10 min
 * ------------------
 * 修改附近店家連結
 *
 * @author KeaNy
 * @date 2013.11.11
 * @spend 1 min
 * ------------------
 * 修改連結、文字
 *
 * @author Denny
 * @date 2013.12.16
 * @spend 5 min
 * ------------------
 * RWD改版
 *
 * @author Denny
 * @date 2014.1.15
 * @spend 2 min
 */
$baseUrl = Yii::app()->baseUrl; 
$cs = Yii::app()->getClientScript();
$cs->registerCssFile('/assets/css/pages/register/member-register-done.css');

$this->pageTitle = '加入會員完成 - ' . Yii::app()->name;

$this->breadcrumbs_items = array(
	array('label'=>'<i class="icon-home icon-large"></i>', 'url'=>'/'),
	array('label'=>'註冊完成', 'url'=>'','class'=>'active'),
);

$cityarea = $user->activity_city->name . $user->activity_area->name;
?>

<div class="col-md-12">

	<!-- #wellcome -->	
	<section id="wellcome">
		<div class="jumbotron">
			<div class="container">
				<h1><i class="fa fa-check-square-o"></i> 完成會員加入</h1>
				<p>
					歡迎您成為庫嚕網會員。<br>
					庫嚕網有許多<strong>找去處</strong>、<strong>享優惠</strong>等實用功能，請<?php echo CHtml::link('瀏覽說明',
									array('about/legend')); ?>。或直接開始體驗功能！
				</p>	
				<p>
					<?php echo CHtml::link('回首頁', Yii::app()->homeUrl, array('class'=>'btn btn-kuru btn-lg')); ?>
					<?php echo CHtml::link('瀏覽說明', array('about/legend'), array('class'=>'btn btn-kuru btn-lg')); ?>
				</p>
			</div>
		</div>
	</section><!-- /#wellcome -->

	<section class="row section">
		<!-- #setting -->
		<div id="setting" class="col-md-8 col-sm-8">
			<!-- article -->
			<article class="article box">		                        
				<h1 class="no-margin-top">完成設定，使用KURU更容易</h1>

				<section class="row">

					<div class="item col-md-6 col-sm-6">
						<h4>設定個人喜好</h4>
						<p>設定您的喜好類型，如「美食」或「3C」，系統可篩選出更符合您喜好的相關訊息。</p>
						<p class="text-center"><?php echo CHtml::link('<i class="fa fa-wrench"></i> 進行喜好設定',
									array('member-admin/preference'),
									array('class'=>'btn btn-primary')); ?></p>
					</div>

					<div class="item col-md-6 col-sm-6">
						<h4>訂閱店家資訊</h4>
						<p>把店家加入訂閱後，店家的訊息會自動發送到您的會員專區中，方便隨時瀏覽資訊。</p>
						<p class="text-center"><?php echo CHtml::link('<i class="icon-map-marker"></i> 瀏覽附近店家',
								array('member-admin/map?location=' . $cityarea),
								array('class'=>'btn btn-primary')); ?></p>
					</div>

				</section>
			</article><!-- /article -->
		</div>

		<!-- aside -->
		<aside class="col-md-4 col-sm-4">

			<!-- #active -->
			<div id="active" class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">附近店家</h4>
				</div>
				<div class="panel-body">
					<ul>
						<?php $this->renderPartial('_nearby',array('nearby'=>$nearby,'activity_area_id'=>$user->activity_area_id)); ?>
					</ul>
					<p><?php echo CHtml::link('<i class="icon-map-marker"></i> 更多',
							array('/search?type=0&category=&location=' . $cityarea . '&keyword='),
							array('class'=>'pull-right btn btn-default btn-sm')); ?></p>
				</div>
			</div><!-- /#active -->

		</aside><!-- /aside -->

	</section><!-- /#setting -->

</div>