		<table class="table table-striped">
			<tr>
				<th>日期</th>
				<th>Banner</th>
				<th>分類</th>
				<th>裝置</th>
				<th>收視次數</th>
				<th>收視率</th>
				<th>25%收視數</th>
				<th>50%收視數</th>
				<th>75%收視數</th>
				<th>100%收視數</th>
			</tr>
			<?php 
				foreach ($items as $row) { 
					$tottot = $tottot+$row['tot'];
					$tot25 = $tot25+$row['25'];
					$tot50 = $tot50+$row['50'];
					$tot75 = $tot75+$row['75'];
					$tot100 = $tot100+$row['100'];
				?>
				<tr>
					<td><?php echo $row['day']; ?></td>
					<td><?php echo $row['banner']; ?></td>
					<td><?php echo $row['product']; ?></td>
					<td><?php echo $row['device']; ?></td>
					<td><?php echo $row['tot']; ?></td>
					<td><?php echo ""; ?></td>
					<td><?php echo $row['25']; ?></td>
					<td><?php echo $row['50']; ?></td>
					<td><?php echo $row['75']; ?></td>
					<td><?php echo $row['100']; ?></td>
				</tr>				
			<?php } ?>
				<tr>
					<td>總計:</td>
					<td></td>
					<td></td>
					<td></td>
					<td><?php echo $tottot; ?></td>
					<td><?php echo ""; ?></td>
					<td><?php echo $tot25; ?></td>
					<td><?php echo $tot50; ?></td>
					<td><?php echo $tot75; ?></td>
					<td><?php echo $tot100; ?></td>
				</tr>
		</table>