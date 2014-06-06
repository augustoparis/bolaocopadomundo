var Bets = {	
	init : function() {
		Bets.all();
		Bets.allUsers();
		Bets.save();
		Bets.allGames();
		Bets.change();
		Bets.insert();
	},
	all : function() {
		var id = '#table-bets';		
		bootTable.clear( id );		
		
		var params = { 
			'method' : 'all',
			'active'  : $(id + ' #active').val()
		};
		$.post('?m=controller&c=BetsController', params, function( data ) {
			$.each( data, function( key, values ) {				
		        var header = { 
		            "CODE" : values.ID_BET
		        };
		        var values = {
		        	"CODE"  		: values.ID_BET,
			        "TEAM1" 		: values.TEAM1,
		            "RESULT1" 		: values.RESULT1,
		            "RESULT2" 		: values.RESULT2,
		            "TEAM2" 		: values.TEAM2,
			        "VALUE"			: values.VALUE,
		            "EDIT"  		: '<div onclick="Bets.edit('+values.ID_BET+')" class="btn btn-warning" ><span class="glyphicon glyphicon-pencil"></span></div>',
		            "REMOVE" 		: '<div onclick="Bets.remove('+values.ID_BET+')" class="btn btn-danger" ><span class="glyphicon glyphicon-trash"></span></div>'
		        };
		        bootTable.addItem( 
		            id, 
		            header, 
		            values 
		        );
		    });  			
		}, 'json');
		
		Bets.allUsers();
	},
	allUsers : function() {
		var id = '#table-bets-all';		
		bootTable.clear( id );		
		
		var params = { 
			'method' : 'allUsers',
			'active'  : $(id + ' #active').val()
		};
		$.post('?m=controller&c=BetsController', params, function( data ) {
			$.each( data, function( key, values ) {	
				
				var cls = '';
				if ( $('#div-bets #id_user').val() == values.ID_USER ) {
					cls = 'bg-red';
				}
							
		        var header = { 
		            "CODE" : values.ID_BET,
		            "class" : cls
		        };
		        var values = {
		        	"USER"			: values.NAME,
			        "TEAM1" 		: values.TEAM1,
		            "RESULT1" 		: values.RESULT1,
		            "RESULT2" 		: values.RESULT2,
		            "TEAM2" 		: values.TEAM2,
			        "VALUE"			: values.VALUE
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
		$('#table-bets #active').val( ( $('#table-bets #active').is(':checked') ) ? 1 : 0 );
		Bets.all();
	},
	reset : function() {
		bootForm.resetar('Bets');
	},	
	insert : function() {
		// bootForm.novo('Bets');
		Bets.reset();
	},	
	edit : function( id ) {
		bootForm.editar('Bets', id);
	},	
	save : function() {
		bootForm.salvar('Bets');
	},	
	remove : function( id ) {
		bootForm.deletar('Bets', id);
	},
	allGames : function() {
		var params = { 
			'method' : 'getGames'
		};
		
		$.post('?m=controller&c=BetsController', params, function( data ) {
			var str = '<option value="0" ></option>';			
			
			$.each( data, function( key, values ) {	
				str += "<option value='" + values.ID_GAME + "' team1='" + values.TEAM1 + "' team2='" + values.TEAM2 + "' > " 
				+ values.TEAMS + " </option>";
			});
			
			
			$('#panel-bets #id_game').html( str );
		}, 'json' );
		
		// $('#table-bets-all thead tr th:nth-child(2)').css('border-left-color', '#FF0000');
		// $('#table-bets-all thead tr th:nth-child(2)').css('border-left-width', '2px');
		// $('#table-bets-all tbody tr td:nth-child(2)').css('border-left-color', '#FF0000');
		// $('#table-bets-all tbody tr td:nth-child(2)').css('border-left-width', '2px');
// 		
		// $('#table-bets-all thead tr th:nth-child(5)').css('border-right-color', '#FF0000');
		// $('#table-bets-all thead tr th:nth-child(5)').css('border-right-width', '2px');
		// $('#table-bets-all tbody tr td:nth-child(5)').css('border-right-color', '#FF0000');
		// $('#table-bets-all tbody tr td:nth-child(5)').css('border-right-width', '2px');
// 		
		// $('#table-bets-all tbody tr:last td:nth-child(2)').css('border-bottom-color', '#FF0000');
		// $('#table-bets-all tbody tr:last td:nth-child(2)').css('border-bottom-width', '2px');
		// $('#table-bets-all tbody tr:last td:nth-child(3)').css('border-bottom-color', '#FF0000');
		// $('#table-bets-all tbody tr:last td:nth-child(3)').css('border-bottom-width', '2px');
		// $('#table-bets-all tbody tr:last td:nth-child(4)').css('border-bottom-color', '#FF0000');
		// $('#table-bets-all tbody tr:last td:nth-child(4)').css('border-bottom-width', '2px');
		// $('#table-bets-all tbody tr:last td:nth-child(5)').css('border-bottom-color', '#FF0000');
		// $('#table-bets-all tbody tr:last td:nth-child(5)').css('border-bottom-width', '2px');
	},
	change: function() {
		$('#panel-bets #id_game').change(function() {
			$('#lb-team1').text( Select.option_select_attr('panel-bets #id_game', 'team1' ) );
			$('#lb-team2').text( Select.option_select_attr('panel-bets #id_game', 'team2' ) );
		});
	}
};
