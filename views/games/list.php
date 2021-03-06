<div class="col-sm-8" align="center">
	<h2>Liste des jeux</h2>
</div>
<div class="col-sm-4" align="center">
	<span class="btn btn-success" onClick="set_value('a', 'new'); defaultform.submit()">
		<i class="glyphicon glyphicon-plus"></i>
		<span>Nouveau jeu ...</span>
	</span>
</div>
<div class="col-sm-12" align="center">
<table id="list_jeu">
	<thead>
		<tr>
		<th>Nom</th>
		<th>ESAR</th>
		<th>Etat</th>
		</tr>
	</thead>
	<tbody>
<?php
while(list($key, $val) = each($games)) { ?>
	<tr>
		<td>
			<a href="index.php?o=games&a=edit&i=<?=$val->id?>"><?=$val->name?></a>
		</td>
		<td>
			<?=$val->label?>
		</td>
		<td>
			<?=($val->loan_status == "") ? "Libre" : "Emprunte"?>
		</td>
	</tr>
<?php } ?>
	</tbody>
</table>
</div>
<script>
$(document).ready(function() {
	$('#list_jeu').DataTable(
		/*{"autoWidth": false}*/
		)
/*		.removeClass( 'display' )
		.addClass('table table-striped table-bordered');*/
});
/* FIXME : translation of the table
see https://datatables.net/plug-ins/i18n/French
*/
</script>
