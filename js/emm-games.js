var Games = {	
	init : function() {
		Games.all();
		Games.salvar();
	},
	all : function() {
		var id = '#table-games';		
		bootTable.clear( id );		
		
		var params = { 
			'method' : 'all'
			//'ativo'  : $(id + ' #ativo').val()
		};
		$.post('?m=controller&c=GamesController', params, function( data ) {
			$.each( data, function( key, values ) {
		        var header = { 
		            "CODIGO" : values.ID_GAME
		        };
		        var values = {
		        	"CODIGO"  		: values.ID_GAME,
			        "TEAM1" 		: values.TEAM1,
		            "TEAM2"   		: values.TEAM2,
			        "VALUE" 		: values.VALUE,
		            "DATE"   		: values.DATE,
		            "HOUR"   		: values.HOUR,
		            "EDITAR"  		: '<div onclick="Games.editar('+values.ID_GAME+')" class="btn btn-success" ><span class="glyphicon glyphicon-pencil"></span></div>',
		            "DELETAR" 		: '<div onclick="Operadores.deletar('+values.ID_GAME+')" class="btn btn-danger" ><span class="glyphicon glyphicon-trash"></span></div>'
		        };
		        bootTable.addItem( 
		            id, 
		            header, 
		            values 
		        );
		    });  			
		}, 'json');
	},
	ativo : function() {
		//$('#table-games #ativo').val( ( $('#table-operadores #ativo').is(':checked') ) ? 1 : 0 );
		//Operadores.all();
	},
	resetar : function() {
		bootForm.resetar('Games');
	},	
	novo : function() {
		//$('#panel-games').hide('slow');
		bootForm.novo('Games');
	},	
	editar : function( id ) {
		Input.readOnly('email');
		Input.readOnly('usuario');

		bootForm.editar('Games', id);
	},	
	salvar : function() {
		bootForm.salvar('Games');
	},	
	deletar : function( id ) {
		bootForm.deletar('Games', id);
	}
};