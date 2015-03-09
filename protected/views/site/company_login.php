<?php
/**
 * 廠商登入
 * 
 * 顯示廠商登入表單。
 *
 * @author KeaNy
 * @date 2013.4
 * @spend 1 min
 * ------------------
 * 修改欄位
 *
 * @author KeaNy
 * @date 2013.7.11
 * @spend 5 min
 * ------------------
 * 套新版，加上驗證碼
 *
 * @author KeaNy
 * @date 2013.11.7
 * @spend 15 min
 * ------------------
 * 修改頁面標題、麵包屑
 *
 * @author KeaNy
 * @date 2013.11.8
 * @spend 1 min
 * ------------------
 * 表單移到_company_login_form.php
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
 */
$this->pageTitle = '店家登入 - ' . Yii::app()->name;

$this->breadcrumbs_items = array(
	array('label'=>'<i class="icon-home icon-large"></i>', 'url'=>'/'),
	array('label'=>'店家登入', 'class'=>'active'),
);
?>

<!-- article -->
<article class="article box">

	<h1>店家登入</h1>

	<!-- #login -->
	<section id="login" class="row section">

		<div class="col-md-7 col-sm-7">

			<?php $this->renderPartial('_company_login_form', array('model'=>$model)); ?>
			
		</div><!-- /.col-md-7 -->

		<div class="col-md-4 col-sm-4">

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">若無法登入</h3>
				</div>
				<div class="panel-body">
					<ul>
						<li><?php echo CHtml::link('忘記密碼請按此', array('login/company-forgot-pw')); ?></li>
						<li>還不是庫嚕網合作店家？請<?php echo CHtml::link('註冊刊登', array('register/company')); ?></li>
					</ul>
				</div>
			</div>

		</div><!-- /.col-md-4 -->

	</section><!-- /#login -->

</article>
