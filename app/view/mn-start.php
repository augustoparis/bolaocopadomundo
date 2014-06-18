<div id="div-start" style="display:none;" >

	<div class="page-header" >
		<h1 id="title"><?= L::view_start_title; ?></h1>
	</div>
	<div class="page-header" >
		<h2><?= L::view_start_winner_title; ?></h2>
	</div>
	<div class="table-responsive">
		<table id='table-winners' class="table table-bordered">
			<thead>
				<tr>
					<th><label><?= L::view_start_winner_user; ?></label></th>
					<th width='10%' ><label><?= L::view_start_winner_value; ?></label></th>
				</tr>
			</thead>
			<tbody>
			</tbody>
			<tfoot>
				<tr>
					<td align="right" ><label style="text-align:right; width:100%;" >Total (R$)</label></td>
					<td><label style="text-align:center; width:100%;" >0,00</label></td>
				</tr>
			</tfoot>			
		</table>	
	</div>

	<input type="hidden" class="form-control" id="id_user" name="id_user" value="<?= Session::get('ID_USER'); ?>" > 
	<input type="hidden" class="form-control" id="access_level" name="access_level" value="<?= Session::get('ACCESS_LEVEL'); ?>" > 

	<div class="page-header" >
		<h2><?= L::view_start_bets_title; ?></h2>
	</div>
	<div class="table-responsive">
		<table id='table-all' class="table table-bordered">
			<thead>
				<tr>
					<th><label><?= L::view_start_bets_user; ?></label></th>
					<th><label><?= L::view_start_bets_team; ?></label></th>
					<th width='10%' ><label><?= L::view_start_bets_score; ?></label></th>
					<th width='10%' ><label><?= L::view_start_bets_score; ?></label></th>
					<th><label><?= L::view_start_bets_team; ?></label></th>
					<th width='5%'  ><label><?= L::view_start_bets_value; ?></label></th>
					<th width='10%' ><label><?= L::view_start_bets_paid;  ?></label></th>
					<th width='5%'  ><label><?= L::view_start_bets_value; ?></label></th>
				</tr>
			</thead>
			<tbody>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="5" align="right" ><label style="text-align:right; width:100%;" >Total (R$)</label></td>
					<td><label style="text-align:center; width:100%;" >0,00</label></td>
					<td align="center" ><label style="text-align:center; width:100%;" >-</label></td>
					<td><label style="text-align:center; width:100%;" >0,00</label></td>
				</tr>
			</tfoot>			
		</table>	
	</div>

</div>