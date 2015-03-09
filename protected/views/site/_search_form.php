<form action="search" method="get" name="search" id="search">
	<input name="type" type="hidden" id="type" value="0">
	<div class="action">
		<input name="category" type="radio" value="" checked><label class="checkall">全部</label>
		<input name="category" type="radio" value="2"><label>吃</label>
		<input name="category" type="radio" value="3"><label>買</label>
		<input name="category" type="radio" value="7"><label>玩</label>
		<input name="category" type="radio" value="4"><label>住</label>
		<input name="category" type="radio" value="104"><label>活動</label>
	</div>
	<div class="tag"><img src="/assets/images/index/header-input-tag.png"></div>				
	<div class="main-input slideDown">
		<div class="where input-group">
			<span class="input-group-addon">地點</span>
		<input  name="location" type="text" class="form-control"  id="location" AutoComplete="Off" placeholder="例：台北市信義區">
		</div><!-- /input-group -->
		<div class="what input-group">
			<span class="input-group-addon">搜尋</span>
		<input name="keyword" type="text" class="form-control" id="keyword" placeholder="例：日本料理 或 買衣服"  AutoComplete="Off">
		</div><!-- /input-group -->
		<div class="input-group"><button class="go btn btn-kuru" type="submit"><i class="fa fa-location-arrow"></i> GO</button></div>				
	</div>
</form>