<div id="div-start" style="display:none;" >

	<div class="page-header" >
		<h1 id="title"><?= L::welcome; ?></h1>
	</div>
	<div class="page-header" >
		<h2>Ganhadores</h2>
	</div>
	<div class="table-responsive">
		<table id='table-winners' class="table table-bordered">
			<thead>
				<tr>
					<th><label>Usuário</label></th>
					<th width='10%' ><label>Valor (R$)</label></th>
				</tr>
			</thead>
			<tbody>
			</tbody>
			<tfoot>
				<tr>
					<td align="right" ><label style="text-align:right; width:100%;" >Total (R$)</label></td>
					<td><label style="text-align:center; width:100%;" >0,00</label></td>
				</tr>
			</tfoot>			
		</table>	
	</div>

	<input type="hidden" class="form-control" id="id_user" name="id_user" value="<?= Session::get('ID_USER'); ?>" > 
	<div class="page-header" >
		<h2>Todas Apostas</h2>
	</div>
	<div class="table-responsive">
		<table id='table-all' class="table table-bordered">
			<thead>
				<tr>
					<th><label>Usuário</label></th>
					<th><label>Seleção</label></th>
					<th width='10%' ><label>Resultado</label></th>
					<th width='10%' ><label>Resultado</label></th>
					<th><label>Seleção</label></th>
					<th width='5%' ><label>Valor</label></th>
					<th width='5%' ><label>Pago</label></th>
					<th width='5%' ><label>Valor</label></th>
				</tr>
			</thead>
			<tbody>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="5" align="right" ><label style="text-align:right; width:100%;" >Total (R$)</label></td>
					<td><label style="text-align:center; width:100%;" >0,00</label></td>
					<td align="center" ><label style="text-align:center; width:100%;" >-</label></td>
					<td><label style="text-align:center; width:100%;" >0,00</label></td>
				</tr>
			</tfoot>			
		</table>	
	</div>

</div>