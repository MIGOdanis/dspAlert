		
		<table class="table table-striped" width="1024px" style="word-wrap: break-word;
word-break: break-all;">
			<tr>
				<th>時間</th>
				<th width="70%">曝光頁面</th>
				<th>曝光次數</th>
				<th>曝光占比</th>
			</tr>
			<?php 
				foreach ($items as $row) { 
				?>
				<tr>
					<td><?php echo $row['hour'].":00 ~ ".$row['hour'].":59";?></td>
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