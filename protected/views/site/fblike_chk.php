<?php
/**
 * 臉書按讚功能頁
 *
 * @author Danis
 * @date 2013.12.31
 * @spend 100 min
 */
$this->pageTitle = '按讚拿好禮 - ' . Yii::app()->name;
$baseUrl = Yii::app()->baseUrl; 
$cs = Yii::app()->getClientScript();
$cs->registerCssFile("/assets/css/pages/publish/fb-like.css");
$this->breadcrumbs_items = array(
		array('label'=>'<i class="icon-home icon-large"></i>', 'url'=>'/'),
		array('label'=>'按讚拿好禮', 'url'=>'','class'=>'active'),
);
?>
<div id="fb-root"></div>
<script>
	window.fbAsyncInit = function() {
		$('#step-2').hide();
		$('#step-tab a[href="#step-2"]').parent('li').hide();
		FB.init({
	      appId      : '<?php echo $appId; ?>',                    // App ID from the app dashboard
	      cookie	 : true,
	      status     : true,                                 // Check Facebook Login status
	      xfbml      : true,                                  // Look for social plugins on the page
	      oauth      : true  
		});

		FB.Event.subscribe('edge.create',function(response){
			window.location = "/site/fblikechk"; 
		});

  //       FB.Event.subscribe('auth.statusChange', function(response) {
  //          //chkStatus(response)
  //       });

		// FB.Event.subscribe('auth.authResponseChange', function(response) {
		// 	//chkStatus(response)	
		// });
		<?php if(!Yii::app()->user->isGuest): ?>
			FB.getLoginStatus(function(response) {
				chkStatus(response);
			});
		<?php endif;?>
	};
	
	function chkStatus(response){
		if (response.status === 'connected') {
			// 就是已經登入而且但是還沒有同意你的app 所以你可以在這裡 do something
			FB.api('/me/likes/553731008043791', function(response) {
				if(response.data.length > 0){
					stepFinish();
					ajaxSendGp();
					
				}else{
					$("#step-like").show();
					
				}
				});
		} else if (response.status === 'not_authorized') {
			// 就是已經登入而且但是還沒有同意你的app
			$("#step-auth").show();
			
		} else {
			// 就是完全沒有登入
			$("#step-auth").show();
			
		}
	}
	
	function fb_login_r(){
		FB.login(function(response) {
			window.top.location = baseUrl + '/site/fblogin';
		}, {scope: 'email,user_birthday,publish_stream,user_likes'});
	}

	function ajaxSendGp(){
		$.post("fblikegp", function( data ) {
		if (typeof data.data !== 'undefined' && data.data.error === 0) {
			
		} else {
			if(data.data != 'undefined'){
				$("#step-2-msg").html(data.data);
			}else{
				
			}
		}               
		},'json')
		.fail(function(e) {
			if(e.status == 403){
				window.location.reload();
			}
		});
	}


	// 完成所有步驟後執行此函式
	function stepFinish() {
		$('#step-tab a[href="#step-1"]').parent('li').add('#step-1').hide().removeClass('active');
		$('#step-tab a[href="#step-2"]').parent('li').show().add('#step-2').fadeIn(1200).addClass('active');
	}
</script>
<!-- article -->
<article class="article box">

	<section id="activity" class="row section">
		<div id="activity-inner" class="col-md-12">
			<!-- <img src="http://nbsolutions.github.io/public/publish/fb-like/main.png"> -->

			<ul id="step-tab" class="nav nav-tabs">
				<li class="active"><a href="#step-1" data-toggle="tab">進行認證</a></li>
				<li><a href="#step-2" data-toggle="tab">完成活動</a></li>
			</ul>

			<div id="step-tab-content" class="tab-content">
				
				<!-- 認證 -->
				<div id="step-1" class="tab-pane active">
					<div id="step-login" class="step">
					<?php
					if(Yii::app()->user->isGuest):
						echo $this->renderPartial('_fblike_login_form', array('model'=>$model));
					else:
					?>
					<!-- #step-auth -->
					<div id="step-auth" class="step">
						<h4>請完成臉書認證</h4>
						<a href="#" class="btn btn-primary btn-lg fb-login" data-redirect="site/fblikechk">按此進行認證</a>
					</div><!-- /#step-auth -->
					<!-- #step-like -->
					<div id="step-like" class="step">
						<h4>請於下方按鈕「按讚」</h4>
						<div><?php $this->widget('FbLikeWidget'); ?></div>
					</div><!-- /#step-like -->
					<?
					endif;
					?>
					</div><!-- /#step-login -->
				</div>
				<!-- /.tab-pane -->

				<!-- .tab-pane -->
				<div id="step-2" class="tab-pane">
					<h3 id="step-2-msg"></h3>
					<?php echo CHtml::link('會員主頁', array('member-admin/index'), array('class'=>'btn btn-kuru btn-lg')); ?>
				</div>
				<!-- /.tab-pane -->

			</div>
			<!-- /.tab-content -->

		</div>
    </section><!-- /#activity -->

</article><!-- /article -->