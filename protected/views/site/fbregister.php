<?php
/**
 * 臉書註冊會員
 * 
 * 顯示臉書註冊會員表單。
 *
 * @author	KeaNy
 * @date	2013.4
 * @spend	5 min
 */
$baseUrl = Yii::app()->baseUrl; 
$cs = Yii::app()->getClientScript();
$cs->registerCssFile($baseUrl.'/css/user_profile.css');
$cs->registerScriptFile('http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js');
$cs->registerScriptFile('https://maps.googleapis.com/maps/api/js?key=AIzaSyDDSuU3TKYJF0nm_GJBJrtlomRpZaIKc4Y&sensor=false');
$cs->registerScriptFile($baseUrl.'/js/profile.js');
$cs->registerScriptFile($baseUrl.'/js/chosen/chosen.jquery.min.js');
$cs->registerScriptFile($baseUrl.'/js/ajax-chosen/ajax-chosen.min.js');
$cs->registerCssFile($baseUrl.'/css/profile.css');
$cs->registerCssFile($baseUrl.'/js/chosen/chosen.min.css');

$this->breadcrumbs=array(
	'註冊會員',
);
?>

<script type="text/javascript">
$(document).ready(function() {  
	model_name = "User";
	
    $(".chosen-select").chosen().live('change', function() {
        var id = $(this).attr('id');
        if (typeof id != 'undefined' && id.indexOf("city_id_") != -1) {
            id = id.replace('city_id_','');
            if ($('#area_id_' + id).length == 0) {
                $('#city_id_' + id).parent().append(' <div id="area_id_' + id + '" style="display:inline"></div><br>');
            }
            htmlSelectAreas(id, $(this).val(), 0);
        }
    }); 
    
    $('#city_id_1_chosen input, #area_id_1 input, #User_address').live('blur', function() {
        getLatlng();
	});
});

var fbid = '<?php echo $fb_id ?>';

<?php if(isset($_POST['fbid']) && empty($_POST['fbid'])){ ?>
$("body").ready(function(e) {
    close_img();
});
<?php } ?>

function close_img(){
	$("#img").attr("src","../image/Icon-user.png");
	$("#fbid").val("");
	$("#change_link").html('<a href="#" onclick="open_img()">使用大頭貼</a>');
}

function open_img(){
	$("#img").attr("src","http://graph.facebook.com/"+fbid+"/picture?type=large");
	$("#fbid").val(fbid);
	$("#change_link").html('<a href="#" onclick="close_img()">不使用大頭貼</a>');
}
</script>

<h1>註冊會員</h1>

<?php
/* @var $this SiteController */
/* @var $model Site */
/* @var $form CActiveForm */
?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'site-form',
	'enableAjaxValidation'=>false,
)); ?>

<?php // echo $form->errorSummary($model); ?>
<img id="img" src="<?php echo 'http://graph.facebook.com/'.$fb_id.'/picture?type=large' ?>" width="180" height="180" />
<input id="fbid" name="fbid" type="hidden" value="<?php echo $fb_id ?>" />
<div  id="change_link"><a href="#" onclick="close_img()">不使用大頭貼</a></div>
<div class="row">
	  <?php echo $form->labelEx($model,'username'); ?>
	  <?php echo $form->textField($model,'username',array('size'=>30,'maxlength'=>30)); ?>
	  <?php echo $form->error($model,'username'); ?>
</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nickname'); ?>
		<?php echo $form->textField($model,'nickname',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'nickname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'birthday'); ?>
        <div>
        <?php 
        $birthday_month = array('0'=>'月');
        for ($i = 1; $i <= 12; $i++) {
            $birthday_month[$i] = $i . ' 月';
        }
        echo $form->dropDownList($model,'birthday_month',$birthday_month, array('options' => array($_POST['User']['birthday_month']=>array('selected'=>true))));
        echo ' ';
        
        $birthday_day = array('0'=>'日');
        for ($i = 1; $i <= 31; $i++) {
            $birthday_day[$i] = $i;
        }
        echo $form->dropDownList($model,'birthday_day',$birthday_day, array('options' => array($_POST['User']['birthday_day']=>array('selected'=>true))));
        echo ' ';
        
        $birthday_year = array('0'=>'年');
        for ($i = date('Y'); $i > date('Y') - 109; $i--) {
            $birthday_year[$i] = $i;
        }
        echo $form->dropDownList($model,'birthday_year',$birthday_year, array('options' => array($_POST['User']['birthday_year']=>array('selected'=>true))));
        ?>
        </div>        
		<?php echo $form->error($model,'birthday'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gender'); ?>
		<?php //echo $form->textField($model,'gender',array('size'=>30,'maxlength'=>30)); 
            echo $form->radioButtonList($model,'gender',
                array('1'=>'女生', '2'=>'男生'),
                array('separator'=>' ','labelOptions'=>array('style'=>'display:inline')));
        ?>
		<?php echo $form->error($model,'gender'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mobile'); ?>
		<?php echo $form->textField($model,'mobile',array('size'=>12,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'mobile'); ?>
	</div>
 
	<div class="row">
		<?php echo $form->labelEx($model,'country'); ?>
        
        <select id="User[country]" name="User[country]"><option value="TT">千里達及托巴哥</option><option value="TR">土耳其</option><option value="TC">土克斯及開科斯群島</option><option value="TM">土庫曼</option><option value="BT">不丹</option><option value="CF">中非共和國</option><option value="CN">中國</option><option value="DK">丹麥</option><option value="EC">厄瓜多</option><option value="ER">厄利垂亞</option><option value="PG">巴布亞紐幾內亞</option><option value="BR">巴西</option><option value="BB">巴貝多</option><option value="PY">巴拉圭</option><option value="BH">巴林</option><option value="BS">巴哈馬</option><option value="PA">巴拿馬</option><option value="PS">巴勒斯坦民族權力機構</option><option value="PK">巴基斯坦</option><option value="JP">日本</option><option value="BE">比利時</option><option value="JM">牙買加</option><option value="IL">以色列</option><option value="CA">加拿大</option><option value="GA">加彭</option><option value="MP">北馬里安納群島</option><option value="KP">北韓</option><option value="QA">卡達</option><option value="CU">古巴</option><option value="CW">古拉梳</option><option value="CC">可可斯群島</option><option value="TW" selected="">台灣</option><option value="SZ">史瓦濟蘭</option><option value="SJ">央棉</option><option value="NE">尼日</option><option value="NI">尼加拉瓜</option><option value="NP">尼泊爾</option><option value="BF">布吉納法索</option><option value="BV">布威島</option><option value="GT">瓜地馬拉</option><option value="WF">瓦利斯及福杜納群島</option><option value="GM">甘比亞</option><option value="BY">白俄羅斯</option><option value="PN">皮特康群島</option><option value="LT">立陶宛</option><option value="IQ">伊拉克</option><option value="IR">伊朗</option><option value="IS">冰島</option><option value="LI">列支敦斯登</option><option value="HU">匈牙利</option><option value="ID">印尼</option><option value="IN">印度</option><option value="DJ">吉布地</option><option value="KI">吉里巴斯</option><option value="KG">吉爾吉斯</option><option value="TV">吐瓦魯</option><option value="DM">多米尼克</option><option value="DO">多明尼加</option><option value="TG">多哥</option><option value="AI">安圭拉</option><option value="AG">安地卡及巴布達</option><option value="AO">安哥拉</option><option value="AD">安道爾</option><option value="TK">托克勞群島</option><option value="BM">百慕達</option><option value="ET">衣索比亞</option><option value="ES">西班牙</option><option value="HR">克羅埃西亞</option><option value="LY">利比亞</option><option value="HN">宏都拉斯</option><option value="GR">希臘</option><option value="BN">汶萊</option><option value="XS">沙巴</option><option value="SA">沙烏地阿拉伯</option><option value="BZ">貝里斯</option><option value="BJ">貝南</option><option value="GQ">赤道幾內亞</option><option value="ZW">辛巴威</option><option value="AM">亞美尼亞</option><option value="AZ">亞塞拜然</option><option value="TZ">坦尚尼亞</option><option value="NG">奈及利亞</option><option value="VE">委內瑞拉</option><option value="BD">孟加拉</option><option value="ZM">尚比亞</option><option value="PW">帛琉</option><option value="LV">拉脫維亞</option><option value="TO">東加</option><option value="TL">東帝汶</option><option value="FR">法國</option><option value="FO">法羅群島</option><option value="GF">法屬圭亞那</option><option value="TF">法屬南半球及南極陸地</option><option value="PF">法屬玻里尼西亞</option><option value="BA">波士尼亞赫塞哥維納</option><option value="BW">波札那</option><option value="PR">波多黎各</option><option value="BQ">波奈</option><option value="PL">波蘭</option><option value="GI">直布羅陀</option><option value="KE">肯亞</option><option value="FI">芬蘭</option><option value="AE">阿拉伯聯合大公國</option><option value="AR">阿根廷</option><option value="OM">阿曼</option><option value="AF">阿富汗</option><option value="AW">阿路巴</option><option value="DZ">阿爾及利亞</option><option value="AL">阿爾巴尼亞</option><option value="RU">俄羅斯</option><option value="BG">保加利亞</option><option value="MK">前南斯拉夫馬其頓共和國</option><option value="ZA">南非</option><option value="GS">南喬治亞及南三明治群島</option><option value="AQ">南極大陸</option><option value="KZ">哈薩克</option><option value="TD">查德</option><option value="KH">柬埔寨</option><option value="CK">柯克群島</option><option value="BO">玻利維亞</option><option value="KW">科威特</option><option value="CI">科特迪瓦共和國</option><option value="TN">突尼西亞</option><option value="JO">約旦</option><option value="US">美國</option><option value="UM">美國外島</option><option value="VI">美屬維爾京群島</option><option value="AS">美屬薩摩亞</option><option value="UK">英國</option><option value="IO">英屬印度洋領土</option><option value="VG">英屬維爾京群島</option><option value="MR">茅利塔尼亞</option><option value="GH">迦納</option><option value="HK">香港特別行政區</option><option value="CD">剛果民主共和國</option><option value="CG">剛果共和國</option><option value="CO">哥倫比亞</option><option value="CR">哥斯大黎加</option><option value="GP">哥德洛普</option><option value="EG">埃及</option><option value="NO">挪威</option><option value="GG">根息</option><option value="GL">格陵蘭</option><option value="GD">格瑞那達</option><option value="TH">泰國</option><option value="HT">海地</option><option value="UG">烏干達</option><option value="UA">烏克蘭</option><option value="UY">烏拉圭</option><option value="UZ">烏茲別克斯坦</option><option value="RE">留尼旺</option><option value="PE">秘魯</option><option value="NA">納米比亞</option><option value="NZ">紐西蘭</option><option value="NU">紐威島</option><option value="SO">索馬利亞</option><option value="SB">索羅門群島</option><option value="MQ">馬丁尼克島</option><option value="ML">馬利</option><option value="MY">馬來西亞</option><option value="MW">馬拉威</option><option value="YT">馬約特島</option><option value="MH">馬紹爾群島</option><option value="MG">馬達加斯加</option><option value="MT">馬爾他</option><option value="MV">馬爾地夫</option><option value="FM">密克羅尼西亞</option><option value="CZ">捷克共和國</option><option value="SY">敘利亞</option><option value="IM">曼城島</option><option value="VA">梵帝崗</option><option value="NL">荷蘭</option><option value="MZ">莫三比克</option><option value="CM">喀麥隆</option><option value="GE">喬治亞</option><option value="GN">幾內亞</option><option value="GW">幾內亞比索</option><option value="FJ">斐濟</option><option value="LK">斯里蘭卡</option><option value="SK">斯洛伐克</option><option value="SI">斯洛維尼亞</option><option value="CL">智利</option><option value="PH">菲律賓</option><option value="VN">越南</option><option value="KY">開曼群島</option><option value="TJ">塔吉克</option><option value="SN">塞內加爾</option><option value="SC">塞席爾</option><option value="RS">塞爾維亞</option><option value="AT">奧地利</option><option value="AX">奧蘭島</option><option value="EE">愛沙尼亞</option><option value="IE">愛爾蘭</option><option value="SG">新加坡</option><option value="NC">新喀里多尼亞群島</option><option value="SL">獅子山</option><option value="CH">瑞士</option><option value="SE">瑞典</option><option value="IT">義大利</option><option value="PM">聖匹島</option><option value="BL">聖巴特島</option><option value="VC">聖文森及格瑞那丁</option><option value="ST">聖多美普林西比</option><option value="XE">聖佑達修斯</option><option value="KN">聖克里斯多福及尼維斯</option><option value="MF">聖馬丁</option><option value="SX">聖馬丁</option><option value="SM">聖馬利諾</option><option value="SH">聖赫勒拿島</option><option value="CX">聖誕島</option><option value="LC">聖露西亞</option><option value="VU">萬那杜</option><option value="YE">葉門</option><option value="KM">葛摩</option><option value="PT">葡萄牙</option><option value="FK">福克蘭群島 (馬爾維納斯群島)</option><option value="CV">維德角</option><option value="MN">蒙古</option><option value="ME">蒙特內哥羅</option><option value="MS">蒙特色拉特島</option><option value="BI">蒲隆地</option><option value="GY">蓋亞納</option><option value="HM">赫德島及麥當勞群島</option><option value="MX">墨西哥</option><option value="LA">寮國</option><option value="DE">德國</option><option value="MA">摩洛哥</option><option value="MC">摩納哥</option><option value="MD">摩爾多瓦</option><option value="MU">模里西斯</option><option value="MM">緬甸</option><option value="LB">黎巴嫩</option><option value="JE">澤西島</option><option value="AU">澳大利亞</option><option value="MO">澳門特別行政區</option><option value="RW">盧安達</option><option value="LU">盧森堡</option><option value="NF">諾福克島</option><option value="NR">諾魯</option><option value="LR">賴比瑞亞</option><option value="LS">賴索托</option><option value="CY">賽普勒斯</option><option value="KR">韓國</option><option value="SV">薩爾瓦多</option><option value="WS">薩摩亞</option><option value="RO">羅馬尼亞</option><option value="GU">關島</option><option value="SD">蘇丹</option><option value="SR">蘇利南</option></select>        
        
		<?php echo $form->error($model,'country'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'zipcode'); ?>
		<?php echo $form->textField($model,'zipcode',array('size'=>10,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'zipcode'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
        
        <?php echo CHtml::dropDownList('city_id', $model->city_id, LookupCity::items(), array(
            'id'=>'city_id_1', 'class'=>'chosen-select', 'data-placeholder'=>'選擇城市',
            'style'=>'width:100px;')); ?> <div id="area_id_1" style="display:inline"></div>
        <script>htmlSelectAreas(1, <?php echo ($model->city_id) ? $model->city_id : 0; ?>, <?php echo ($model->area_id) ? $model->area_id : 0; ?>);</script>
        
		<?php echo $form->textField($model,'address',array('size'=>50,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'address'); ?>
		
		<div class="leftbox">
		<?php echo $form->hiddenField($model,'lat'); ?>
		<?php echo $form->error($model,'lat'); ?>
		</div>
		
		<div class="leftbox" style="margin-left:10px;">
		<?php echo $form->hiddenField($model,'lng'); ?>
		<?php echo $form->error($model,'lng'); ?>
		</div>
    </div>	
	
    <?php if(CCaptcha::checkRequirements()): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?><br>
		<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
		<div class="hint">請輸入圖片中的文字。</div>
        <?php echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; ?>
	<div class="row buttons">
		<?php echo CHtml::submitButton('註冊'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->