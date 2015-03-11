		<h3>日報表</h3>
		<table class="table table-striped" width="1024px" style="word-wrap: break-word;
word-break: break-all;">			
			<tr>
				<th>日期</th>
				<th width="70%">行為</th>
				<th>次數</th>
				<th>比率</th>
			</tr>
			<?php 
				$totArray = array();
				foreach ($items as $row) {
					$totArray[$row['url']] += $row['count'];
				?>
				<tr>
					<td><?php echo $row['day'];?></td>
					<td><?php echo $row['url'];?></td>
					<td><?php echo $row['count'];?></td>
					<td><?php echo round((($row['count'] / $tot) * 100),1)."%";?></td>
				</tr>				
			<?php } ?>
				<tr>
					<td>總計:</td>
					<td></td>
					<td><?php echo $tot;?></td>
					<td></td>
				</tr>
		</table>
		<br/>
		<h3>行為報表</h3>
<table class="table table-striped" width="1024px" style="word-wrap: break-word;
word-break: break-all;">
			<tr>
				<th>行為</th>
				<th>次數</th>
				<th>比率</th>				
			</tr>
			<?php foreach ($totArray as $key => $row) {	?>
				<tr>				
					<td><?php echo $key;?></td>
					<td><?php echo $row;?></td>
					<td><?php echo round((($row / $tot)*100),1)."%"; ?></td>
				</tr>				
			<?php } ?>
				
		</table>