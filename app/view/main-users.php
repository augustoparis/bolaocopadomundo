<div id="div-users" style="display: none;" >

	<div class="page-header" >
		<h1><?= L::user_title ?></h1>
	</div>	

	<div class="row">
		<div class="col-sm-6">
			<div id="panel-users" class="panel panel-default" style="display:none;" >
				<div class="panel-body">
					<form id="form-users" role="form" >	
						<input type="hidden" class="form-control" id="id_user" name="id_user" required editar="ID_USER" >
						<div class="form-group">
							<label for="name"><?= L::user_name ?></label>
							<div class="input-group margin-bottom-sm">
							  	<span class="input-group-addon"><i class="fa fa-smile-o fa-fw"></i></span>
								<input type="text" class="form-control" id="name" name="name" required editar="NAME" minlength="2" >
							</div>							
						</div>
						<div class="form-group">
							<label for="email"><?= L::user_email ?></label>
							<div class="input-group margin-bottom-sm">
							  	<span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
								<input type="email" class="form-control" id="email" name="email" required editar="EMAIL" minlength="2" >
							</div>							
						</div>
						<div class="form-group">
							<label for="username"><?= L::user_username ?></label>
							<div class="input-group margin-bottom-sm">
							  	<span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
								<input type="text" class="form-control" id="username" name="username" required editar="USERNAME" maxlength="10" minlength="5" >
							</div>							
						</div>
						<div class="form-group">
							<label for="password"><?= L::user_password ?></label>
							<div class="input-group margin-bottom-sm">
							  	<span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>
								<input type="password" class="form-control" id="password" name="password" required editar="PASSWORD" maxlength="10" minlength="5" >
							</div>							
						</div>
						<div class="checkbox">
							<label for="active" ><input id="active" name="active" type="checkbox" value="1" checked editar="ACTIVE" > <?= L::checkbox_active ?></label>
						</div>	
						<div class="form-group">
							<label for="access_level"><?= L::user_access_level ?></label>
							<div class="input-group margin-bottom-sm">
								<input type="radio" name="access_level" value="0" checked > <?= L::user_punter ?><br/>
								<input type="radio" name="access_level" value="1" > <?= L::user_manager ?><br/>
								<input type="radio" name="access_level" value="2" > <?= L::user_administrator ?><br/>
							</div>							
						</div>
						<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> <?= L::button_save ?></button>
						<button type="reset" class="btn btn-primary" onclick="Users.reset()" ><span class="glyphicon glyphicon-plus"></span> <?= L::button_new ?></button>
					</form>
				</div>
			</div>
		</div>
	</div> 

	<div class="table-responsive">
		<table id="table-users" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width='4%' ><div onclick="Users.insert()" class="btn btn-primary" ><span class="glyphicon glyphicon-plus"></span></div></th>
					<th><label><?= L::user_name ?></label></th>
					<th><label><?= L::user_email ?></label></th>
					<th><label><?= L::user_username ?></label></th>
					<th><label><?= L::user_password ?></label></th>
					<th><label><?= L::user_access_level ?></label></th>
					<th width='6%' ><label><input id="active" name="active" type="checkbox" value="1" onclick="Users.active()" checked > <?= L::checkbox_active ?></label></th>
					<th width='5%' ><label><?= L::button_edit ?></label></th>
					<th width='5%' ><label><?= L::button_delete ?></label></th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>	
	</div>

</div>