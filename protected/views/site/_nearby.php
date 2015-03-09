<?php
/**
 * 附近店家
 * 
 * 註冊會員完成頁的附近店家訊息
 * 
 * @author KeaNy
 * @date 2013.10.2
 * @spend 5 min
 * ----------------
 * 加入附近店家功能
 *
 * @author Danis
 * @date 2013.10.3
 * @spend 15 min
 * ----------------
 * 微調程式
 *
 * @author KeaNy
 * @date 2013.11.6
 * @spend 5 min
 */
?>
<?php
foreach($nearby AS $row):
	$abbreviation = (!empty($row['abbreviation'])) ? $row['abbreviation'] : mb_substr($row['company_name'], 0, 4, "utf-8");
	$name = "【 {$abbreviation} 】" . mb_substr($row['content'], 0, 28, "utf-8") . "...";
	?><li><?php echo CHtml::link($name, array('company/'.$row['company_id'])); ?></li><?php
endforeach;
?>