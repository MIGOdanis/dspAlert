<link rel="stylesheet" href="/ytb/assets/jquery-ui/jquery-ui.css">
<script src="/ytb/assets/jquery.js"></script>
<script src="/ytb/assets/jquery-ui/jquery-ui.js"></script>
<script>
$(function() {
	$( "#endday" ).datepicker({
		defaultDate: "+0d",
		maxDate: "today",
		minDate: "2014-12-01",
		changeMonth: true,
		numberOfMonths: 2,
		dateFormat:"yy-mm-dd",
		onClose: function( selectedDate ) {
			$( "#startday" ).datepicker( "option", "maxDate", selectedDate );
		}
	});
	$( "#startday" ).datepicker({
		defaultDate: "+0d",
		maxDate: "today",
		minDate: "2014-12-01",
		changeMonth: true,
		numberOfMonths: 2,
		dateFormat:"yy-mm-dd",
		onClose: function( selectedDate ) {
			$( "#endday" ).datepicker( "option", "minDate", selectedDate );
		}
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
			<div>
				<label>曝光方式</label>
				<input type="text" id="Url" name="Url" value="<?php echo (!empty($_GET['Url']))?$_GET['Url']:""; ?>">
			</div>
			<div>
				<label>Campaing ID</label>
				<input type="text" id="Campaing" name="Campaing" value="<?php echo(!empty($_GET['Campaing']))? $_GET['Campaing']:""; ?>"> 		
				<label>Zone ID</label>
				<input type="text" id="Zone" name="Zone" value="<?php echo (!empty($_GET['Zone']))? $_GET['Zone']:""; ?>">		
			</div>
			<div>
				<label>起始日期</label>
				<input type="text" id="startday" name="startday" value="<?php echo (!empty($_GET['startday']))? $_GET['startday']: date("Y-m-d");?>">
				<label>結束日期</label>
				<input type="text" id="endday" name="endday" value="<?php echo (!empty($_GET['endday']))? $_GET['endday']: date("Y-m-d");?>">
			</div>
			<div>	
				<button id="search-button">查詢</button>
			</div>

		</form>
		</div>
		<div id="list">
			<?php 
			if(count($items) > 0){
				$this->renderPartial('_cpeReport',
					array('items'=>$items,
					 	'tot'=>$tot)
					 );
			}else{
				echo "沒有資料";
			}
			?>
		</div>
	</div>
</div>
