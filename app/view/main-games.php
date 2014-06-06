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
							<label for="nome"><?= L::games_team1; ?></label>
							<div class="input-group margin-bottom-sm">
							  	<span class="input-group-addon"><i class="fa fa-flag fa-fw"></i></span>
								<input type="text" class="form-control" id="team1" name="team1" required editar="TEAM1" minlength="2" >
							</div>							
						</div>
						<div class="form-group">
							<label for="email"><?= L::games_team2; ?></label>
							<div class="input-group margin-bottom-sm">
							  	<span class="input-group-addon"><i class="fa fa-flag fa-fw"></i></span>
								<input type="text" class="form-control" id="team2" name="team2" required editar="TEAM2" minlength="2" >
							</div>							
						</div>
						<div class="form-group">
							<label for="usuario"><?= L::games_value; ?></label>
							<div class="input-group margin-bottom-sm">
							  	<span class="input-group-addon"><i class="fa fa-money fa-fw"></i></span>
								<input type="text" class="form-control" id="value" name="value" required editar="VALUE" minlength="4" onkeydown="Mask.mascara(this, Mask.mvalorbr)" >
							</div>							
						</div>
						<div class="form-group">
							<label for="senha"><?= L::games_date; ?></label>
							<div class="input-group margin-bottom-sm">
							  	<span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
								<input type="text" class="form-control" id="date" name="date" required editar="DATE" minlength="10" maxlength="10" onkeydown="Mask.mascara(this, Mask.mdata)" >
							</div>							
						</div>
						<div class="form-group">
							<label for="senha"><?= L::games_hour; ?></label>
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
					<th><label><?= L::games_value; ?></label></th>
					<th><label><?= L::games_date; ?></label></th>
					<th><label><?= L::games_hour; ?></label></th>
					<th width='6%' ><label><input id="active" name="active" type="checkbox" value="1" onclick="Games.active()" checked > <?= L::checkbox_active; ?></label></th>
					<th width='5%' ><label><?= L::button_edit; ?></label></th>
					<th width='5%' ><label><?= L::button_delete; ?></label></th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>	
	</div>
</div>