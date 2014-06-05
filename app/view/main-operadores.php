<div id="div-operadores" style="display: none;" >

	<div class="page-header" >
		<h1><?= L::operators_title ?></h1>
	</div>	

	<div class="row">
		<div class="col-sm-6">
			<div id="panel-operadores" class="panel panel-default" style="display:none;" >
				<div class="panel-body">
					<form id="form-operadores" role="form" >	
						<input type="hidden" class="form-control" id="id_operadores" name="id_operadores" required editar="ID_OPERADORES" >
						<div class="form-group">
							<label for="nome"><?= L::operators_name ?></label>
							<div class="input-group margin-bottom-sm">
							  	<span class="input-group-addon"><i class="fa fa-smile-o fa-fw"></i></span>
								<input type="text" class="form-control" id="nome" name="nome" required editar="NOME" minlength="2" >
							</div>							
						</div>
						<div class="form-group">
							<label for="email"><?= L::operators_email ?></label>
							<div class="input-group margin-bottom-sm">
							  	<span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
								<input type="email" class="form-control" id="email" name="email" required editar="EMAIL" minlength="2" >
							</div>							
						</div>
						<div class="form-group">
							<label for="usuario"><?= L::operators_username ?></label>
							<div class="input-group margin-bottom-sm">
							  	<span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
								<input type="text" class="form-control" id="usuario" name="usuario" required editar="USUARIO" maxlength="10" minlength="5" >
							</div>							
						</div>
						<div class="form-group">
							<label for="senha"><?= L::operators_password ?></label>
							<div class="input-group margin-bottom-sm">
							  	<span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>
								<input type="password" class="form-control" id="senha" name="senha" required editar="SENHA" maxlength="10" minlength="5" >
							</div>							
						</div>
						<div class="checkbox">
							<label for="ativo" ><input id="ativo" name="ativo" type="checkbox" value="1" checked editar="ATIVO" > <?= L::operators_active ?></label>
						</div>						
						<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> <?= L::button_save ?></button>
						<!-- <button type="reset" class="btn btn-primary" onclick="Operadores.resetar()" ><span class="glyphicon glyphicon-plus"></span> Novo</button> -->
					</form>
				</div>
			</div>
		</div>
	</div> 

	<div class="table-responsive">
		<table id='table-operadores' class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width='4%' ><div onclick="Operadores.novo()" class="btn btn-primary" ><span class="glyphicon glyphicon-plus"></span></div></th>
					<th><label><?= L::operators_name ?></label></th>
					<th><label><?= L::operators_email ?></label></th>
					<th><label><?= L::operators_username ?></label></th>
					<th><label><?= L::operators_password ?></label></th>
					<th width='6%' ><label><input id="ativo" name="ativo" type="checkbox" value="1" onclick="Operadores.ativo()" checked > <?= L::operators_active ?></label></th>
					<th width='5%' ><label><?= L::button_edit ?></label></th>
					<th width='5%' ><label><?= L::button_delete ?></label></th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>	
	</div>

</div>