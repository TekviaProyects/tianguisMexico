<?php
// Validate the customers
	if (empty($customers)) {?>
		<div align="center">
			<h3>
				<span class="label label-default">
					* Sin resultados *
				</span>
			</h3>
		</div><?php
		
		return;
	} 
?>
<div class="signup-form-container">
	<div class="form-header">
		<h3 class="form-title"><i class="fa fa-users"></i> Resultados</h3>
	</div>
	<div class="form-body" style="padding: 30px">
		<table class="table table-striped table-bordered" cellspacing="0" width="100%" id="customers_table">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>A. Paterno</th>
					<th>A. Materno</th>
					<th>Correo</th>
					<th>Tel.</th>
					<th><i class="fa fa-pencil"></i></th>
				</tr>
			</thead>
			<tbody><?php
				foreach ($customers as $key => $value) { ?>
					<tr>
						<td><?php echo $value['name'] ?></td>
						<td><?php echo $value['last_name'] ?></td>
						<td><?php echo $value['last_name2'] ?></td>
						<td><?php echo $value['mail'] ?></td>
						<td align="center"><?php echo $value['tel'] ?></td>
						<td align="center">
							<button 
								class="btn btn-primary"
								onclick="customers.add({
									edit: 1,
									id: <?php echo $value['id'] ?>,
									div: 'container'
								})">
								<i class="fa fa-pencil"></i>
							</button>
						</td>
					</tr><?php
				} ?>
			</tbody>
		</table>
	</div>
</div>
<script>
	$('#customers_table').DataTable({
	    fixedHeader: {
	        header: true,
	        footer: true
	    },
	    scrollX: true,
		language : {
			dom : 'Bfrtip',
			destroy: true,
			search : "<i class=\"fa fa-search\"></i>",
			lengthMenu : "_MENU_ por pagina",
			zeroRecords : "No hay datos.",
			infoEmpty : "No hay datos para mostrar.",
			info : " ",
			infoFiltered : " -> <strong> _TOTAL_ </strong> resultados encontrados",
			paginate : {
				first : "Primero",
				previous : "<<",
				next : ">>",
				last : "Último"
			}
		}
	});
</script>