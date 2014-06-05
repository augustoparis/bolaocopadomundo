var OperadoresNovo = {
	show : function() {
		$('#modal-operadores-novo').modal('show');
	},
	salvar : function() {
		$('#form-operadores-novo').validate({
			submitHandler: function( form ) {
				var params = { 
					'method' : 'salvar',
					'form' : $("#form-operadores-novo").serialize()		
				};
				$.post('?m=controller&c=OperadoresController', params, function( data ) {
					if ( typeof data == 'string' ) {
						Alert.show( data );
					} 
					else {
						$('#modal-operadores-novo'  ).modal('hide');
						$('#modal-operadores-salvar').modal('show');
					}
				}, 'json');
				
				return false;
			}  	
		});			
	}
};

$(document).ready(function() {
	Login.init();
	OperadoresNovo.salvar();

	Menu.init('inicio'); 
	$('#menu-inicio').click(function() { 
		Menu.init('inicio'); 
	});		
	
	$('#menu-users').click(function() { 
		Menu.init('users'); 
		Users.init();
	});		
	
	$('#menu-operadores').click(function() { 
		Menu.init('operadores'); 
		Operadores.init();			 
	});

	$('#menu-servidor').click(function() { 
		Menu.init('servidor'); 
		Servidor.init();			 
	});

	$('#menu-aplicativo').click(function() { 
		Menu.init('aplicativo'); 
		Aplicativo.init();			 
	});
	
	$('#menu-descriptografia').click(function() { 
		Menu.init('descriptografia'); 
		Descriptografia.init();			 
	});	
});