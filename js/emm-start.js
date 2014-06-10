var Start = {	
	init : function() {
		Start.winner();
		Start.all();
	},
	winner : function() {
		var id = '#table-winners';		
		bootTable.clear( id );		
		
		var params = { 
			'method' : 'winners',
			'active'  : $(id + ' #active').val()
		};
		var total = 0;
		$.post('?m=controller&c=StartController', params, function( data ) {
			$.each( data, function( k, v ) {
				var d = k.split("|"); 
				
				var r1 = d[6];
				var r2 = d[7];

				var winners = v.length;
				var vlr = Number( d[8] );
				total += vlr;
				
				var vlr_winners = 0;
				if ( winners > 0 ) 
					vlr_winners = Number(vlr) / Number(winners);
				
				var tr = '';
				tr += '<tr class="'+Status.color( d[5] )+'" >';
				tr += '<td colspan="2" >'+d[1]+' '+r1+' x '+r2+' '+d[2]+' - '+d[3]+' ás '+d[4]+' - <label>'+Status.descricao( d[5] )+'</label></td>';
				tr += '</tr>';
				
		        $( id ).append( tr );
				$.each( v, function( key, values ) {	
					
					var cls = '';
					if ( (values.RESULT1 == r1) && (values.RESULT2 == r2) )
						cls = 'bg-winner';
					
					var header = { 
			            "CODE" : values.ID_BET,
			            "class" : cls
			        };
			        var values = {
			        	"USER"	 		: values.NAME,
				        "VALUE"			: Money.formatBr( vlr_winners )
			        };
			        bootTable.addItem( 
			            id, 
			            header, 
			            values 
			        );
			    });
				
				var tr = '';
				tr += '<tr>';
				tr += '<td align="right" ><label style="text-align:right; width:100%;" >Valor (R$)</label></td>';
				tr += '<td><label style="text-align:center; width:100%;" >'+Money.formatBr( vlr )+'</label></td>';
				tr += '</tr>';
				
		        $( id ).append( tr );
			});	
			
			$('#table-winners tfoot tr td:nth-child(2) label').text( Money.formatBr(total) ); 			
		}, 'json');
	},
	all : function() {
		var id = '#table-all';		
		bootTable.clear( id );		
		
		var params = { 
			'method' : 'all',
			'active'  : $(id + ' #active').val()
		};
		var total = 0;
		$.post('?m=controller&c=StartController', params, function( data ) {
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
					if ( $('#div-start #id_user').val() == values.ID_USER )
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
			
			$('#table-all tfoot tr td:nth-child(2) label').text( Money.formatBr(total) ); 			
		}, 'json');
	}
};