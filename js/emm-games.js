var Games = {	
	init : function() {
		Games.all();
		Games.save();
	},
	all : function() {
		var id = '#table-games';		
		bootTable.clear( id );		
		
		var params = { 
			'method' : 'all',
			'active'  : $(id + ' #active').val()
		};
		$.post('?m=controller&c=GamesController', params, function( data ) {
			$.each( data, function( key, values ) {
		        var header = { 
		            "CODE" : values.ID_GAME
		        };
		        var values = {
		        	"CODE"  		: values.ID_GAME,
			        "TEAM1" 		: values.TEAM1,
		            "TEAM2"   		: values.TEAM2,
			        "VALUE" 		: values.VALUE,
		            "DATE"   		: values.DATE,
		            "HOUR"   		: values.HOUR,
		            "ACTIVE"   		: ( values.ACTIVE == '1' ) ? 'Sim' : 'Não',
		            "EDIT"  		: '<div onclick="Games.edit('+values.ID_GAME+')" class="btn btn-warning" ><span class="glyphicon glyphicon-pencil"></span></div>',
		            "REMOVE" 		: '<div onclick="Games.remove('+values.ID_GAME+')" class="btn btn-danger" ><span class="glyphicon glyphicon-trash"></span></div>'
		        };
		        bootTable.addItem( 
		            id, 
		            header, 
		            values 
		        );
		    });  			
		}, 'json');
	},
	active : function() {
		$('#table-games #active').val( ( $('#table-games #active').is(':checked') ) ? 1 : 0 );
		Games.all();
	},
	reset : function() {
		bootForm.resetar('Games');
	},	
	insert : function() {
		bootForm.novo('Games');
	},	
	edit : function( id ) {
		bootForm.editar('Games', id);
	},	
	save : function() {
		bootForm.salvar('Games');
	},	
	remove : function( id ) {
		bootForm.deletar('Games', id);
	}
};