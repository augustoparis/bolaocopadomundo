var NivelAcesso = {
	descricao : function(valor) {
		if ( valor == 0 ) 
			return 'Bronze'
		else if ( valor == 1 )  
			return 'Prata'
		else
			return 'Ouro';
	},
	valor : function(descricao) {
		if ( descricao.toLowerCase() == 'Bronze'.toLowerCase() ) 
			return 0
		else if ( descricao.toLowerCase() == 'Prata'.toLowerCase()  ) 
			return 1
		else
			return 2;
	}
}