<?php require_once("Session.php"); ?>
<div class="menu-logo" >
	<img src="img/logo2.png" class="img-responsive" alt="Responsive image" >
</div>
<div class="logout" >
	<span><?= Session::get('NAME'); ?></span>, <a href="?">Sair</a>
</div>	
<div class="sidebar-nav" >
	<div class="navbar navbar-default" role="navigation">
		<div class="navbar-header" >
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
				<span class="sr-only">Menu</span>
				<span class="icon-bar" ></span>
				<span class="icon-bar" ></span>
				<span class="icon-bar" ></span>
			</button>
			<span class="visible-xs navbar-brand"></span>
		</div>
		<div id="menu" class="navbar-collapse collapse sidebar-navbar-collapse">
			<ul class="nav navbar-nav">
				<li><hr/></li>
				<li class="active"><a id="menu-inicio" href="javascript:void(0)" ><?= L::menu_option_1; ?></a></li>
				<li><a id="menu-games" href="javascript:void(0)" ><span class="glyphicon glyphicon-chevron-right"></span><?= L::menu_option_2; ?></a></li>
				<li><hr/></li>
				<li class="active"><a href="javascript:void(0)" >Cadastros</a></li>
				<li><a id="menu-users" href="javascript:void(0)" ><span class="glyphicon glyphicon-chevron-right"></span>Usuários</a></li>
				<li class="active"><a id="menu-inicio" href="javascript:void(0)" ><?= L::menu_option_1; ?></a></li>
				<li><a id="menu-operadores" href="javascript:void(0)" ><span class="glyphicon glyphicon-chevron-right"></span><?= L::menu_option_2; ?></a></li>
				<li><hr/></li>
				<li class="active"><a href="javascript:void(0)" ><?= L::menu_option_3; ?></a></li>
				<li><ul class="nav navbar-nav">
						<li><a id="menu-servidor" href="javascript:void(0)" ><span class="glyphicon glyphicon-chevron-right"></span><?= L::menu_option_4; ?></a></li>
						<li><a id="menu-aplicativo" href="javascript:void(0)" ><span class="glyphicon glyphicon-chevron-right"></span><?= L::menu_option_5; ?></a></li>
				</ul></li>
				<li><hr/></li>
				<li><a id="menu-descriptografia" href="javascript:void(0)" ><span class="glyphicon glyphicon-chevron-right"></span><?= L::menu_option_6; ?></a></li>
			</ul>
		</div>
	</div>
</div>