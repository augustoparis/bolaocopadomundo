var Operadores = {	
	init : function() {
		Operadores.all();
		Operadores.salvar();
	},
	all : function() {
		var id = '#table-operadores';		
		bootTable.clear( id );		
		
		var params = { 
			'method' : 'all',
			'ativo'  : $(id + ' #ativo').val()
		};
		$.post('?m=controller&c=OperadoresController', params, function( data ) {
			$.each( data, function( key, values ) {
		        var header = { 
		            "CODIGO" : values.ID_OPERADORES
		        };
		        var values = {
		        	"CODIGO"  		: values.ID_OPERADORES,
			        "NOME" 			: values.NOME,
		            "EMAIL"   		: values.EMAIL,
			        "USUARIO" 		: values.USUARIO,
		            "SENHA"   		: values.SENHA,
		            "ATIVO"   		: ( values.ATIVO == '1' ) ? 'Sim' : 'Não',
		            "EDITAR"  		: '<div onclick="Operadores.editar('+values.ID_OPERADORES+')" class="btn btn-success" ><span class="glyphicon glyphicon-pencil"></span></div>',
		            "DELETAR" 		: '<div onclick="Operadores.deletar('+values.ID_OPERADORES+')" class="btn btn-danger" ><span class="glyphicon glyphicon-trash"></span></div>'
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
		$('#table-operadores #ativo').val( ( $('#table-operadores #ativo').is(':checked') ) ? 1 : 0 );
		Operadores.all();
	},
	resetar : function() {
		bootForm.resetar('Operadores');
	},	
	novo : function() {
		$('#panel-operadores').hide('slow');
		// bootForm.novo('Operadores');
	},	
	editar : function( id ) {
		Input.readOnly('email');
		Input.readOnly('usuario');

		bootForm.editar('Operadores', id);
	},	
	salvar : function() {
		bootForm.salvar('Operadores');
	},	
	deletar : function( id ) {
		bootForm.deletar('Operadores', id);
	}
};