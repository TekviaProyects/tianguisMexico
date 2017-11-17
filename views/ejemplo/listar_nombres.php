<table class="responsive-table striped">
	<thead>
		<tr>
			<th>Nombre</th>
		</tr>
	</thead>
	<tbody><?php
		foreach ($nombres as $key => $value) { ?>
			<tr>
				<td><?php echo $value['nombre'] ?></td>
			</tr><?php
		} ?>
	</tbody>
</table>