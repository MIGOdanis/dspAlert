<link rel="stylesheet" href="/ytb/assets/jquery-ui/ss-theam/jquery-ui.css">
<script src="/ytb/assets/jquery.js"></script>
<script src="/ytb/assets/jquery-ui/jquery-ui.js"></script>
<script>
$(function() {
	$( "#day" ).datepicker({
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
});
</script>
<?PHP if($tot > 0): ?>
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<script type="text/javascript">
	  google.load("visualization", "1", {packages:["corechart"]});
	  google.setOnLoadCallback(drawChart);
	  function drawChart() {
	    var data = google.visualization.arrayToDataTable([
	      ['Time', 'Imp'],
	    <?php foreach ($COT as $key => $row) {?>
	    	['<?php echo $key; ?>',  <?php echo $row; ?>],
	    <?php }?>
	      
	    ]);

	    var options = {
	      title: '實時曝光走勢(分鐘)'
	    };

	    var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

	    chart.draw(data, options);
	  }
	</script>
	<script type="text/javascript">
	  google.load("visualization", "1", {packages:["corechart"]});
	  google.setOnLoadCallback(drawChart);
	  function drawChart() {
	    var data = google.visualization.arrayToDataTable([
	      ['URL', 'CBU'],
	    <?php foreach ($CBU as $key => $row) {?>
	    	['<?php echo $key; ?>',  <?php echo $row; ?>],
	    <?php }?>
	    ]);

	    var options = {
	      title: '曝光頁面占比(總計 : <?php echo $tot; ?>)',
	      pieHole: 0.4,
	    };

	    var chart = new google.visualization.PieChart(document.getElementById('chart_div2'));
	    chart.draw(data, options);
	  }
	</script>
<?php endif; ?>
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
<?PHP if($tot > 0): ?>	
	<div id="chart_div" style="width: 100%; height: 300px;"></div>
	<div id="chart_div2" style="width: 100%; height: 300px;"></div>
<?php endif; ?>	
	<div>
		<div id="search-bar">
		<form method="get">
			<label>URL進階查詢</label>
			<input type="text" id="Url" name="Url" value="<?php echo $_GET['Url'];?>">		
			<label>Zone ID</label>
			<input type="text" id="Zone" name="Zone" value="<?php echo $_GET['Zone'];?>">		
			<label>日期</label>
			<input type="text" id="day" name="day" value="<?php echo date("Y-m-d")?>">
			<button id="search-button">查詢</button>
		</form>
		</div>
		<div id="list">
			<?php 
			if(count($items) > 0){
				$this->renderPartial('_item', array('items'=>$items,'tot'=>$tot));
			}else{
				echo "沒有資料";
			}
			?>
		</div>
	</div>
</div>
