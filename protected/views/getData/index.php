<link rel="stylesheet" href="/ytb/assets/jquery-ui/ss-theam/jquery-ui.css">
<script src="/ytb/assets/jquery.js"></script>
<script src="/ytb/assets/jquery-ui/jquery-ui.js"></script>
<script>
$(function() {
	$( "#start_day" ).datepicker({
		defaultDate: "+0d",
		maxDate: "today",
		minDate: "2014-12-01",
		changeMonth: true,
		numberOfMonths: 2,
		dateFormat:"yy-mm-dd",
		onClose: function( selectedDate ) {
			$( "#end_day" ).datepicker( "option", "minDate", selectedDate );
		}
	});
	$( "#end_day" ).datepicker({
		defaultDate: "+0d",
		maxDate: "today",
		minDate: "<?php echo date('Y-m-01') ?>",
		changeMonth: true,
		numberOfMonths: 2,
		dateFormat:"yy-mm-dd",
		onClose: function( selectedDate ) {
			$( "#start_day" ).datepicker( "option", "maxDate", selectedDate );
		}
	});


	$('#export').click(function() {
		location.href= location.href+'&export=1';
	});
});
</script>
<style type="text/css">
	.table{
		text-align: center;
	}
	th{
		text-align: center;
	}
</style>
<div id="ytb-get-box">
	<div id="logo"><img src="/ytb/assets/image/ytblog.jpg"></div>
	<div>
		<div id="search-bar">
		<form method="get">
			<label>Campaign ID</label>
			<input type="text" id="Campaign" name="Campaign" value="<?php echo $_GET['Campaign'];?>">			
			<label>從</label>
			<input type="text" id="start_day" name="start_day" value="<?php echo date("Y-m-d")?>">
			<label>到</label>
			<input type="text" id="end_day" name="end_day" value="<?php echo date("Y-m-d")?>">
			<button id="search-button">查詢</button>
		</form>
		 <button id="export">輸出報表</button>
		</div>
		<div id="list">
			<?php 
			if(count($items) > 0){
				$this->renderPartial('_item', array('items'=>$items));
			}else{
				echo "沒有資料";
			}
			?>
		</div>
	</div>
</div>
