var Bets = {	
	init : function() {
		Bets.change();
		
		Bets.allGames();
		Bets.all();
		Bets.insert();
		Bets.save();
	},
	change: function() {
		$('#panel-bets #id_game').change(function() {
			$('#panel-bets #lb-team1').text( Select.option_select_attr('panel-bets #id_game', 'team1' ) );
			$('#panel-bets #lb-team2').text( Select.option_select_attr('panel-bets #id_game', 'team2' ) );
		});
	},
	allGames : function() {
		var params = { 
			'method' : 'allGames'
		};
		
		$.post('?m=controller&c=BetsController', params, function( data ) {
			var str = '<option value="0" ></option>';			
			
			$.each( data, function( key, values ) {	
				str += "<option value='" + values.ID_GAME + "' team1='" + values.TEAM1 + "' team2='" + values.TEAM2 + "' > " 
				+ values.TEAMS + " </option>";
			});
			
			$('#panel-bets #id_game').html( str );
		}, 'json' );
	},
	all : function() {
		var id = '#table-bets';		
		bootTable.clear( id );		
		
		var params = { 
			'method' : 'all',
			'active'  : $(id + ' #active').val()
		};
		var total = 0;
		$.post('?m=controller&c=BetsController', params, function( data ) {
			$.each( data, function( k, v ) {
				var d = k.split("|"); 
				
				var r1 = d[6];
				var r2 = d[7];

				var tr = '';
				tr += '<tr class="'+Status.color( d[5] )+'" >';
				tr += '<td colspan="7" >'+d[1]+' '+r1+' x '+r2+' '+d[2]+' - '+d[3]+' ás '+d[4]+' - <label>'+Status.descricao( d[5] )+'</label></td>';
				tr += '</tr>';
				
		        $( id ).append( tr );

		        var vlr = 0;
				$.each( v, function( key, values ) {	
					vlr += Number(values.VALUE);

					var EDIT = '';
					if ( d[5] == 0 ) 
						EDIT = '<div onclick="Bets.edit('+values.ID_BET+')" class="btn btn-warning" ><span class="glyphicon glyphicon-pencil"></span></div>';
					
					var REMOVE = '';
					if ( d[5] == 0 ) 
						REMOVE = '<div onclick="Bets.remove('+values.ID_BET+')" class="btn btn-danger" ><span class="glyphicon glyphicon-trash"></span></div>';
					
					var cls = '';
					if ( (values.RESULT1 == r1) && (values.RESULT2 == r2) )
						cls = 'bg-winner';

					var header = { 
			            "CODE" : values.ID_BET,
			            "class" : cls
			        };
			        var values = {
			        	"TEAM1" 		: values.TEAM1,
			            "RESULT1" 		: values.RESULT1,
			            "RESULT2" 		: values.RESULT2,
			            "TEAM2" 		: values.TEAM2,
				        "VALUE"			: Money.formatBr(values.VALUE),
			            "EDIT"  		: EDIT,
			            "REMOVE" 		: REMOVE
			        };
			        bootTable.addItem( 
			            id, 
			            header, 
			            values 
			        );
			    });
				total += vlr;
				
				var tr = '';
				tr += '<tr>';
				tr += '<td colspan="4" align="right" ><label style="text-align:right; width:100%;" >Valor (R$)</label></td>';
				tr += '<td><label style="text-align:center; width:100%;" >'+Money.formatBr(vlr)+'</label></td>';
				tr += '</tr>';
				
		        $( id ).append( tr );
			});	
			
			$('#table-bets tfoot tr td:nth-child(2) label').text( Money.formatBr(total) ); 			
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
		var total = 0;
		$.post('?m=controller&c=BetsController', params, function( data ) {
			$.each( data, function( k, v ) {
				var d = k.split("|"); 

				var r1 = d[6];
				var r2 = d[7];
				
				var tr = '';
				tr += '<tr class="'+Status.color( d[5] )+'" >';
				tr += '<td colspan="7" >'+d[1]+' '+r1+' x '+r2+' '+d[2]+' - '+d[3]+' ás '+d[4]+' - <label>'+Status.descricao( d[5] )+'</label></td>';
				tr += '</tr>';
				
		        $( id ).append( tr );

		        var vlr = 0;
				$.each( v, function( key, values ) {	
					vlr += Number(values.VALUE);

					var cls = '';
					if ( $('#div-bets #id_user').val() == values.ID_USER )
						cls = 'bg-user';
					
					if ( (values.RESULT1 == r1) && (values.RESULT2 == r2) )
						cls = 'bg-winner';
					
					var header = { 
			            "CODE" : values.ID_BET,
			            "class" : cls
			        };
			        var values = {
			        	"USER"	 		: values.NAME,
			        	"TEAM1" 		: values.TEAM1,
			            "RESULT1" 		: values.RESULT1,
			            "RESULT2" 		: values.RESULT2,
			            "TEAM2" 		: values.TEAM2,
				        "VALUE"			: Money.formatBr(values.VALUE)
			        };
			        bootTable.addItem( 
			            id, 
			            header, 
			            values 
			        );
			    });
				total += vlr;
				
				var tr = '';
				tr += '<tr>';
				tr += '<td colspan="5" align="right" ><label style="text-align:right; width:100%;" >Valor (R$)</label></td>';
				tr += '<td><label style="text-align:center; width:100%;" >'+Money.formatBr(vlr)+'</label></td>';
				tr += '</tr>';
				
		        $( id ).append( tr );
			});	
			
			$('#table-bets-all tfoot tr td:nth-child(2) label').text( Money.formatBr(total) ); 			
		}, 'json');
	},
	active : function() {
		$('#table-bets #active').val( ( $('#table-bets #active').is(':checked') ) ? 1 : 0 );
		Bets.all();
	},
	reset : function() {
		$('#form-bets #lb-team1').text('Seleção 1');
		$('#form-bets #lb-team2').text('Seleção 2');		
		
		bootForm.resetar('Bets');
	},	
	insert : function() {
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
	}
};