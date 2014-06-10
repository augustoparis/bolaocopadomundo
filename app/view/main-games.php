<div id="modal-finalized" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button class="bootbox-close-button close" aria-hidden="true" data-dismiss="modal" type="button">×</button>
				<h2 class="modal-title"><?= L::games_title; ?></h2>
			</div>
			<!-- dialog body -->
			<form id="form-finalized" role="form" >	
				<div class="modal-body">
					<input type="hidden" class="form-control" id="id_game" name="id_game" >
					<div class="form-inline">
						<div class="form-group" style="width:20%;" >
							<label id="lb-team1" name="lb-team1" for="result1" ><?= L::games_result1; ?></label>
							<div class="input-group margin-bottom-sm">
								<span class="input-group-addon"><i class="fa fa-flag fa-fw"></i></span>
								<input type="text" class="form-control" id="result1" name="result1" required minlength="1" maxlength="2" onkeydown="Mask.mascara(this, Mask.mnumeros)" >
							</div>							
						</div>
						<div class="form-group" >
							<label> </label>
							<div class="input-group margin-bottom-sm" style="padding-top:6px;" >
							  	<span class="input-group-addon" style="border-left:1px solid #CCCCCC;" ><i class="glyphicon glyphicon-remove"></i></span>
							</div>							
						</div>
						<div class="form-group" style="width:20%;" >
							<label id="lb-team2" name="lb-team2" for="result2" ><?= L::games_result2; ?></label>
							<div class="input-group margin-bottom-sm">
							  	<span class="input-group-addon"><i class="fa fa-flag fa-fw"></i></span>
								<input type="text" class="form-control" id="result2" name="result2" required minlength="1" maxlength="2" onkeydown="Mask.mascara(this, Mask.mnumeros)" >
							</div>							
						</div>
					</div>
				</div>
				<!-- dialog buttons -->
				<div class="modal-footer" >
					<button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-ok"></span> <?= L::button_ok ?></button>
					<button type="button" class="btn btn-primary" aria-hidden="true" data-dismiss="modal" ><span class="glyphicon glyphicon-remove"></span> <?= L::button_close ?></button>
				</div>
			</form>
		</div>
	</div>
</div>

<div id="div-games" style="display: none;" >

	<div class="page-header" >
		<h1><?= L::games_title; ?></h1>
	</div>	
	<div class="row">
		<div class="col-sm-6">
			<div id="panel-games" class="panel panel-default" style="display:none;" >
				<div class="panel-body">
					<form id="form-games" role="form" >	
						<input type="hidden" class="form-control" id="id_game" name="id_game" required editar="ID_GAME" >
						<div class="form-group">
							<label for="team1"><?= L::games_team1; ?></label>
							<div class="input-group margin-bottom-sm">
							  	<span class="input-group-addon"><i class="fa fa-flag fa-fw"></i></span>
								<input type="text" class="form-control" id="team1" name="team1" required editar="TEAM1" minlength="2" >
							</div>							
						</div>
						<div class="form-group">
							<label for="team2"><?= L::games_team2; ?></label>
							<div class="input-group margin-bottom-sm">
							  	<span class="input-group-addon"><i class="fa fa-flag fa-fw"></i></span>
								<input type="text" class="form-control" id="team2" name="team2" required editar="TEAM2" minlength="2" >
							</div>							
						</div>
						<div class="form-group">
							<label for="value"><?= L::games_value; ?></label>
							<div class="input-group margin-bottom-sm">
							  	<span class="input-group-addon"><i class="fa fa-money fa-fw"></i></span>
								<input type="text" class="form-control" id="value" name="value" required editar="VALUE" minlength="4" onkeydown="Mask.mascara(this, Mask.mvalorbr)" >
							</div>							
						</div>
						<div class="form-group">
							<label for="date"><?= L::games_date; ?></label>
							<div class="input-group margin-bottom-sm">
							  	<span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
								<input type="text" class="form-control" id="date" name="date" required editar="DATE" minlength="10" maxlength="10" onkeydown="Mask.mascara(this, Mask.mdata)" >
							</div>							
						</div>
						<div class="form-group">
							<label for="hour"><?= L::games_hour; ?></label>
							<div class="input-group margin-bottom-sm">
							  	<span class="input-group-addon"><i class="fa fa-clock-o fa-fw"></i></span>
								<input type="text" class="form-control" id="hour" name="hour" required editar="HOUR" minlength="5" maxlength="5" onkeydown="Mask.mascara(this, Mask.mhora)" >
							</div>							
						</div>
						<div class="checkbox">
							<label for="active" ><input id="active" name="active" type="checkbox" value="1" checked editar="ACTIVE" > <?= L::checkbox_active; ?></label>
						</div>				
						<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> <?= L::button_save ?></button>
						<button type="reset" class="btn btn-primary" onclick="Games.reset()" ><span class="glyphicon glyphicon-plus"></span> <?= L::button_new ?></button>
					</form>
				</div>
			</div>
		</div>
	</div> 

	<div class="table-responsive">
		<table id='table-games' class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width='4%' ><div onclick="Games.insert()" class="btn btn-primary" ><span class="glyphicon glyphicon-plus"></span></div></th>
					<th><label><?= L::games_team1; ?></label></th>
					<th><label><?= L::games_team2; ?></label></th>
					<th width='10%' ><label><?= L::games_value; ?></label></th>
					<th width='10%' ><label><?= L::games_date; ?></label></th>
					<th width='5%'  ><label><?= L::games_hour; ?></label></th>
					<th width='5%'  ><label><?= L::games_status; ?></label></th>
					<th width='6%'  ><label><input id="active" name="active" type="checkbox" value="1" onclick="Games.active()" checked > <?= L::checkbox_active; ?></label></th>
					<th width='5%'  ><label><?= L::button_end_bets; ?></label></th>
					<th width='5%'  ><label><?= L::button_end; ?></label></th>
					<th width='5%'  ><label><?= L::button_edit; ?></label></th>
					<th width='5%'  ><label><?= L::button_delete; ?></label></th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>	
	</div>
</div>