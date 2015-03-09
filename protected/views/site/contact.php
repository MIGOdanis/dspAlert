<?php
/**
 * 聯絡我們
 * 
 * 顯示聯絡我們表單。
 *
 * @author	KeaNy
 * @date	2013.4
 * @spend	1 min
 * ---------------------
 * 錯誤訊息中文化
 *
 * @author	KeaNy 
 * @date	2013.7.11
 * @spend	5 min
 * ---------------------
 * 套入新版聯絡我們
 *
 * @author Danis
 * @date 2013.11.6
 * @spend 15 min
 * ---------------------
 * 拿掉警告視窗
 *
 * @author KeaNy
 * @date 2013.11.14
 * @spend 1 min
 * ---------------------
 * 移除多的Div
 *
 * @author KeaNy
 * @date 2013.11.29
 * @spend 1 min
 * ---------------------
 * 修改頁面標題
 *
 * @author KeaNy
 * @date 2013.12.10
 * @spend 1 min
 */
$this->pageTitle = '聯絡我們 - ' . Yii::app()->name;
$baseUrl = Yii::app()->baseUrl; 
$cs = Yii::app()->getClientScript();
// alertify
$cs->registerCssFile("/assets/css/plugins/jquery.alertify/alertify.css");
$cs->registerCssFile("/assets/css/plugins/jquery.alertify/alertify.default.css");
$cs->registerScriptFile("/assets/js/plugins/jquery.alertify.min.js");
$pageJS = <<<PAGE
	// 表單檢查
	$('form #contact').click(function(e){
		var updatForm = 'form[name="contact"]';
		var emptyInput = [];
		var i = 0;
		$('.alertify-logs').empty();

        // 輸入框未填
        $(updatForm +' input[required]').add(updatForm +' textarea[required]').each(function(){
        	if ($(this).val() == '') {
        		emptyInput[i] = $(this).data('name');
        		i++;
        	}
        });

        // 表單動作
        if (emptyInput.length > 0) {
			emptyInfo = '「' + emptyInput.join() + '」欄位未填寫';
		    Alertify.log.error(emptyInfo, 5000);
    	} else {
    		$(updatForm).submit();
    	}
    });
PAGE;
$cs->registerScript('form', $pageJS);

$this->breadcrumbs_items = array(
	array('label'=>'<i class="icon-home icon-large"></i>', 'url'=>'/'),
	array('label'=>'聯絡我們', 'url'=>'','class'=>'active'),
);
?>

<!-- article -->
<article class="article box">
	<h1>聯絡我們</h1>
	<!-- #contact -->
	<section id="contact" class="row section">
		<div class="col-md-7 col-sm-7">
			<?php if(Yii::app()->user->hasFlash('contact')): ?>
				<div class="col-md-12">
					<?php echo Yii::app()->user->getFlash('contact'); ?></p>
				</div>
			<?php else: ?>
				<?php echo $this->renderPartial('_contact_form', array('model'=>$model)); ?>
			<?php endif; ?>
		</div><!-- /.col-md-7 -->
		<div class="col-md-4 col-sm-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">填寫說明</h3>
				</div>
				<div class="panel-body">
					<ul>
						<li><span class="required">標記＊</span>的欄位為必填項目</li>
						<li>為能順利與您聯繫，各項欄位輸入請盡量詳實</li>
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
					</ul>
				</div>
			</div>
		</div><!-- /.col-md-4 -->
	</section><!-- /#contact -->
</article><!-- /article -->