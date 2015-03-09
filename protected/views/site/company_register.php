<?php
/**
 * 店家註冊
 * 
 * 顯示註冊店家。
 *
 * @author KeaNy
 * @date 2013.11.5
 * @spend 2 hour
 * ----------------
 * 表單另存新檔
 *
 * @author KeaNy
 * @date 2013.11.11
 * @spend 5 min
 * ----------------
 * CSS和JS移到_company_register_form.php
 *
 * @author KeaNy
 * @date 2013.11.13
 * @spend 5 min
 * ------------------
 * 修改廠商註冊驗證(加上user)
 *
 * @author Danis
 * @date 2014.1.8
 * @spend 5 min
 */
$this->pageTitle = '店家註冊 - ' . Yii::app()->name;

$this->breadcrumbs_items = array(
	array('label'=>'<i class="icon-home icon-large"></i>', 'url'=>'/'),
	array('label'=>'店家註冊', 'class'=>'active'),
);
?>
<!-- article -->
<article class="article box">

	<h1>店家註冊</h1>

	<!-- #sign-up -->
	<section id="sign-up" class="row section">

		<?php $this->renderPartial('_company_register_form', array('model'=>$model,'user' => $user)); ?>
		
	</section><!-- /#sign-up -->

</article><!-- /article -->