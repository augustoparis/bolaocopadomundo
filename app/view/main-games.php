<div id="div-games" style="display: none;" >

	<div class="page-header" >
		<h1>Cadastro de Jogos</h1>
	</div>	
	<div class="row">
		<div class="col-sm-6">
			<div id="panel-games" class="panel panel-default" style="display:none;" >
				<div class="panel-body">
					<form id="form-games" role="form" >	
						<input type="hidden" class="form-control" id="id_game" name="id_game" required editar="ID_GAME" >
						<div class="form-group">
							<label for="nome">Time 1</label>
							<div class="input-group margin-bottom-sm">
							  	<span class="input-group-addon"><i class="fa fa-smile-o fa-fw"></i></span>
								<input type="text" class="form-control" id="team1" name="team1" required editar="TEAM1" minlength="2" >
							</div>							
						</div>
						<div class="form-group">
							<label for="email">Time 2</label>
							<div class="input-group margin-bottom-sm">
							  	<span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
								<input type="text" class="form-control" id="team2" name="team2" required editar="TEAM2" minlength="2" >
							</div>							
						</div>
						<div class="form-group">
							<label for="usuario">Valor Aposta</label>
							<div class="input-group margin-bottom-sm">
							  	<span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
								<input type="text" class="form-control" id="value" name="value" required editar="VALUE" minlength="4" onkeydown="Mask.mascara(this, Mask.mvalorbr)" >
							</div>							
						</div>
						<div class="form-group">
							<label for="senha">Data</label>
							<div class="input-group margin-bottom-sm">
							  	<span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>
								<input type="text" class="form-control" id="date" name="date" required editar="DATE" minlength="10" maxlength="10" onkeydown="Mask.mascara(this, Mask.mdata)" >
							</div>							
						</div>
						<div class="form-group">
							<label for="senha">Hora</label>
							<div class="input-group margin-bottom-sm">
							  	<span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>
								<input type="text" class="form-control" id="hour" name="hour" required editar="HOUR" minlength="5" maxlength="5" onkeydown="Mask.mascara(this, Mask.mhora)" >
							</div>							
						</div>
						<div class="checkbox">
							<label for="active" ><input id="active" name="active" type="checkbox" value="1" checked editar="ACTIVE" > Ativo</label>
						</div>				
						<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span>Salvar</button>
						<button type="reset" class="btn btn-primary" onclick="Games.reset()" ><span class="glyphicon glyphicon-plus"></span> Novo</button>
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
					<th><label>Time 1</label></th>
					<th><label>Time 2</label></th>
					<th><label>Valor Aposta</label></th>
					<th><label>Data</label></th>
					<th><label>Hora</label></th>
					<th width='6%' ><label><input id="active" name="active" type="checkbox" value="1" onclick="Games.active()" checked > Ativo</label></th>
					<th width='5%' ><label>Editar</label></th>
					<th width='5%' ><label>Deletar</label></th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>	
	</div>
</div>