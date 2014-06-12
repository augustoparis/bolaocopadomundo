<?php require_once("Session.php"); ?>
<div id="div-bets" style="display: none;" >

	<input type="hidden" class="form-control" id="id_user" name="id_user" value="<?= Session::get('ID_USER'); ?>" > 
	<div class="page-header" >
		<h1><?= L::bets_title; ?></h1>
	</div>	
	
	<div class="row">
		<div class="col-sm-6">
			<div id="panel-bets" class="panel panel-default" >
				<div class="panel-body">
					<form id="form-bets" role="form" >	
						<input type="hidden" class="form-control" id="id_bet" name="id_bet" required editar="ID_BET" >
						<div class="form-group">
							<label for="id_game"><?= L::bets_game; ?></label>
							<div class="input-group margin-bottom-sm">
							  	<span class="input-group-addon"><i class="fa fa-flag fa-fw"></i></span>
								<select class="form-control" id="id_game" name="id_game" required editar="ID_GAME" /></select>
							</div>							
						</div>
						<div class="form-inline">
							<div class="form-group" >
								<label id="lb-team1" name="lb-team1" for="result1" editar="TEAM1" ><?= L::bets_team1; ?></label>
								<div class="input-group margin-bottom-sm">
									<span class="input-group-addon"><i class="fa fa-flag fa-fw"></i></span>
									<input type="text" class="form-control" id="result1" name="result1" required editar="RESULT1" minlength="1" maxlength="2" onkeydown="Mask.mascara(this, Mask.mnumeros)" >
								</div>							
							</div>
							<div class="form-group" >
								<label  id="lb-team2"for="result2" for="result2" editar="TEAM2" ><?= L::bets_team2; ?></label>
								<div class="input-group margin-bottom-sm">
								  	<span class="input-group-addon"><i class="fa fa-flag fa-fw"></i></span>
									<input type="text" class="form-control" id="result2" name="result2" required editar="RESULT2" minlength="1" maxlength="2" onkeydown="Mask.mascara(this, Mask.mnumeros)" >
								</div>							
							</div>
						</div>
						<div class="form-group"></div>
						<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> <?= L::button_save ?></button>
						<button type="reset" class="btn btn-primary" onclick="Bets.reset()" ><span class="glyphicon glyphicon-plus"></span> <?= L::button_new ?></button>
					</form>
				</div>
			</div>
		</div>
	</div> 
	
	<div class="page-header" >
		<h2><?= L::bets_title1 ?></h2>
	</div>
	<div class="table-responsive">
		<table id='table-bets' class="table table-bordered">
			<thead>
				<tr>
					<th><label><?= L::bets_team ?></label></th>
					<th width='15%' ><label><?= L::bets_result ?></label></th>
					<th width='15%' ><label><?= L::bets_result ?></label></th>
					<th><label><?= L::bets_team ?></label></th>
					<th width='5%' ><label><?= L::bets_value ?></label></th>
					<th width='5%' ><label><?= L::bets_pay ?></label></th>
					<th width='5%' ><label><?= L::bets_value ?></label></th>
					<th width='5%' ><label><?= L::button_edit; ?></label></th>
					<th width='5%' ><label><?= L::button_delete; ?></label></th>
				</tr>
			</thead>
			<tbody>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="4" align="right" ><label style="text-align:right; width:100%;" >Total (R$)</label></td>
					<td><label style="text-align:center; width:100%;" >0,00</label></td>
					<td align="center" ><label style="text-align:center; width:100%;" >-</label></td>
					<td><label style="text-align:center; width:100%;" >0,00</label></td>
				</tr>
			</tfoot>				
		</table>	
	</div>
	<div class="page-header" ></div>
	
	<div class="page-header" >
		<h2><?= L::bets_title2 ?></h2>
	</div>
	<div class="table-responsive">
		<table id='table-bets-all' class="table table-bordered">
			<thead>
				<tr>
					<th><label><?= L::bets_user ?></label></th>
					<th><label><?= L::bets_team ?></label></th>
					<th width='10%' ><label><?= L::bets_result ?></label></th>
					<th width='10%' ><label><?= L::bets_result ?></label></th>
					<th><label><?= L::bets_team ?></label></th>
					<th><label><?= L::bets_value ?></label></th>
					<th><label><?= L::bets_pay ?></label></th>
					<th><label><?= L::bets_value ?></label></th>
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