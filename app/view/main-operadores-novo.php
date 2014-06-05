<!-- set up the modal to start hidden and fade in and out -->
<div id="modal-operadores-salvar" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header" >
				<h3>Informação</h3>
			</div>
			<div class="modal-body" >
				<p>Cadastro realizado com sucesso!</p>
			</div>
			<div class="modal-footer"><button type="button" data-dismiss="modal" class="btn btn-danger">Fechar</button></div>
		</div>
	</div>
</div>
			
<div id="modal-operadores-novo" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="form-operadores-novo" role="form" >	
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<div class="page-header" style="margin:0 0 20px;" >
						<h1><?= L::operators_title ?></h1>
					</div>	
					<div class="row">
						<div class="">
							<div id="panel-operadores-novo" class="panel panel-default" >
								<div class="panel-body">
									<input type="hidden" class="form-control" id="operadores-novo" name="operadores-novo" value="1" >
									<input type="hidden" class="form-control" id="id_operadores" name="id_operadores" value="0" >
									<div class="form-group">
										<label for="nome"><?= L::operators_name ?></label>
										<div class="input-group margin-bottom-sm">
										  	<span class="input-group-addon"><i class="fa fa-smile-o fa-fw"></i></span>
											<input type="text" class="form-control" id="nome" name="nome" required minlength="2" >
										</div>							
									</div>
									<div class="form-group">
										<label for="email"><?= L::operators_email ?></label>
										<div class="input-group margin-bottom-sm">
										  	<span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
											<input type="email" class="form-control" id="email" name="email" required minlength="2" >
										</div>							
									</div>
									<div class="form-group">
										<label for="usuario"><?= L::operators_username ?></label>
										<div class="input-group margin-bottom-sm">
										  	<span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
											<input type="text" class="form-control" id="usuario" name="usuario" required maxlength="10" minlength="5" >
										</div>							
									</div>
									<div class="form-group">
										<label for="senha"><?= L::operators_password ?></label>
										<div class="input-group margin-bottom-sm">
										  	<span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>
											<input type="password" class="form-control" id="senha" name="senha" required maxlength="10" minlength="5" >
										</div>							
									</div>
								</div>
							</div>
						</div>
					</div> 
				</div>
				<!-- dialog buttons -->
				<div class="modal-footer">
					<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> <?= L::button_save ?></button>
					<button type="button" data-dismiss="modal" class="btn btn-primary"><?= L::button_close ?></button>
				</div>
			</form>
		</div>
	</div>
</div>