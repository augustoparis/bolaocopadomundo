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
							<div class="form-group">
								<label id="lb-team1" name="lb-team1" for="result1"><?= L::bets_result1; ?></label>
								<div class="input-group margin-bottom-sm">
									<span class="input-group-addon"><i class="fa fa-flag fa-fw"></i></span>
									<input type="text" class="form-control" id="result1" name="result1" required editar="RESULT1" minlength="1" >
								</div>							
							</div>
							<div class="form-group">
								<label  id="lb-team2"for="result2"><?= L::bets_result2; ?></label>
								<div class="input-group margin-bottom-sm">
								  	<span class="input-group-addon"><i class="fa fa-flag fa-fw"></i></span>
									<input type="text" class="form-control" id="result2" name="result2" required editar="RESULT2" minlength="1" >
								</div>							
							</div>
						</div>
						<div class="form-group"></div>
						<!--
						<div class="form-group">
							<label for="value"><?= L::bets_value; ?></label>
							<div class="input-group margin-bottom-sm">
							  	<span class="input-group-addon"><i class="fa fa-money fa-fw"></i></span>
								<input type="text" class="form-control" id="valuegame" name="valuegame" required editar="VALUEGAME" minlength="3"  onkeydown="Mask.mascara(this, Mask.mvalorbr)" >
							</div>							
						</div>
						-->
						<!--
						<div class="checkbox">
							<label for="active" ><input id="active" name="active" type="checkbox" value="1" checked editar="ACTIVE" > <?= L::checkbox_active; ?></label>
						</div>
						-->				
						<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> <?= L::button_save ?></button>
						<button type="reset" class="btn btn-primary" onclick="Bets.reset()" ><span class="glyphicon glyphicon-plus"></span> <?= L::button_new ?></button>
					</form>
				</div>
			</div>
		</div>
	</div> 
	<div class="page-header" >
		<h2>Suas Apostas</h2>
	</div>
	<div class="table-responsive">
		<table id='table-bets' class="table table-bordered table-striped">
			<thead>
				<tr>
					<!--<th width='4%' ><div onclick="Bets.insert()" class="btn btn-primary" ><span class="glyphicon glyphicon-plus"></span></div></th>-->
					<th><label>Código</label></th>
					<th><label>Seleção</label></th>
					<th><label>Resultado</label></th>
					<th><label>Resultado</label></th>
					<th><label>Seleção</label></th>
					<th><label>Valor</label></th>
					<th width='5%' ><label><?= L::button_edit; ?></label></th>
					<th width='5%' ><label><?= L::button_delete; ?></label></th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>	
	</div>
	<div class="page-header" >
		<h2>Todas Apostas</h2>
	</div>
	<div class="table-responsive">
		<table id='table-bets-all' class="table table-bordered table-striped">
			<thead>
				<tr>
					<!--<th width='4%' ><div onclick="Bets.insert()" class="btn btn-primary" ><span class="glyphicon glyphicon-plus"></span></div></th>-->
					<!--<th><label>Código</label></th>-->
					<th><label>Usuário</label></th>
					<th><label>Seleção</label></th>
					<th><label>Resultado</label></th>
					<th><label>Resultado</label></th>
					<th><label>Seleção</label></th>
					<th><label>Valor</label></th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>	
	</div>
</div>