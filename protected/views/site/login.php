<?php
/**
 * 會員登入
 * 
 * 顯示會員登入頁面
 *
 * @author KeaNy
 * @date 2013.3
 * @spend 1 day
 * ------------------
 * 修改欄位
 *
 * @author KeaNy
 * @date 2013.7.11
 * @spend 5 min
 * -------------------
 * 會員登入的忘記密碼連結錯誤
 *
 * @author KeaNy
 * @date 2013.7.15
 * @spend 5 min
 * ------------------
 * 加上臉書登入註冊和帳號連結
 *
 * @author KeaNy 
 * @date 2013.7.16
 * @spend 5 min 
 * ------------------
 * 套新版，加上驗證碼
 *
 * @author KeaNy
 * @date 2013.11.7
 * @spend 30 min 
 * ------------------
 * 修改頁面標題、麵包屑
 *
 * @author KeaNy
 * @date 2013.11.8
 * @spend 1 min 
 * ------------------
 * 表單移到_login_form.php
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
$this->pageTitle = '會員登入 - ' . Yii::app()->name;

$this->breadcrumbs_items = array(
	array('label'=>'<i class="icon-home icon-large"></i>', 'url'=>'/'),
	array('label'=>'會員登入', 'class'=>'active'),
);
?>

<!-- article -->
<article class="article box">

	<h1>會員登入</h1>

	<!-- #login -->
	<section id="login" class="row section">

		<div class="col-md-7 col-sm-7">

			<?php $this->renderPartial('_login_form', array('model'=>$model)); ?>
		
		</div><!-- /.col-md-7 -->

		<div class="col-md-4 col-sm-4">

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">若無法登入</h3>
				</div>
				<div class="panel-body">
					<ul>
						<li><?php echo CHtml::link('忘記密碼請按此', array('login/forgot-pw')); ?></li>
						<li>還不是會員？請<?php echo CHtml::link('加入會員', array('register/member')); ?></li>
					</ul>
				</div>
			</div>

		</div><!-- /.col-md-4 -->

	</section><!-- /#login -->
	
</article>