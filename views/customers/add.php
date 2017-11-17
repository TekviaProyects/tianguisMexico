<script>
	customers.edit = <?php echo (!empty($objet['edit'])) ? 1 : 0 ; ?>
</script>
<div class="signup-form-container">
<!-- form start -->
	<form
		method="post"
		role="form"
		id="register-form"
		onsubmit="event.preventDefault();  customers.save({form: 'register-form', edit: customers.edit})">
		<div class="form-header">
			<h3 class="form-title">
				<i class="fa fa-user"></i> 
				<?php echo (!empty($objet['edit'])) ? 'Editar' : 'Registrar' ; ?>
			</h3>
		</div>
		<div class="form-body">
			<div class="alert alert-info" id="message" style="display:none;">
				Registrado
			</div>
			<h4>Requeridos (*)</h4>
			<div class="row">
				<div class="col-sm-12 col-md-4">
					<div class="form-group form-group-lg">
						<div class="input-group">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-user"></span>
							</div>
							<input 
								required="1"
								value="<?php echo $customer['name'] ?>"
								id="name" 
								name="name" 
								type="text" 
								class="form-control" 
								placeholder="Nombre *">
						</div>
						<span class="help-block" id="error"></span>
					</div>
				</div>
				<div class="col-sm-12 col-md-4">
					<div class="form-group form-group-lg">
						<div class="input-group">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-user"></span>
							</div>
							<input
								required="1"
								value="<?php echo $customer['last_name'] ?>"
								id="last_name"
								name="last_name"
								type="text"
								class="form-control"
								placeholder="Apellido paterno *">
						</div>
						<span class="help-block" id="error"></span>
					</div>
				</div>
				<div class="col-sm-12 col-md-4">
					<div class="form-group form-group-lg">
						<div class="input-group">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-user"></span>
							</div>
							<input
								value="<?php echo $customer['last_name2'] ?>"
								id="last_name2"
								name="last_name2"
								type="text"
								class="form-control"
								placeholder="Apellido materno">
						</div>
						<span class="help-block" id="error"></span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="form-group form-group-lg col-sm-12 col-md-4">
					<div class="input-group">
						<div class="input-group-addon">
							<span class="glyphicon glyphicon-envelope"></span>
						</div>
						<input 
							required="1"
							value="<?php echo $customer['mail'] ?>" 
							id="mail" 
							name="mail" 
							type="email" 
							class="form-control" 
							placeholder="Correo *">
					</div>
					<span class="help-block" id="error"></span>
				</div>
				<div class="form-group form-group-lg col-sm-12 col-md-4">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-phone" aria-hidden="true"></i>
						</div>
						<input 
							value="<?php echo $customer['tel'] ?>" 
							id="tel" 
							name="tel" 
							type="tel" 
							class="form-control" 
							placeholder="01234569">
					</div>
					<span class="help-block" id="error"></span>
				</div>
			</div>
			<h4>Periodo:</h4>
			<div class="row">
				<div class="form-group form-group-lg col-sm-12 col-md-4">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-calendar" aria-hidden="true"></i>
						</div>
						<input
							value="<?php echo (!empty($customer['period'])) ? $customer['period'] : date('Y-m-d'); ?>" 
							id="period"
							name="period"
							type="date"
							class="form-control">
					</div>
					<span class="help-block" id="error"></span>
				</div>
				<div class="form-group form-group-lg col-sm-12 col-md-4">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-calendar" aria-hidden="true"></i>
						</div>
						<input 
							required="1"
							value="<?php echo $customer['period2'] ?>" 
							id="period2" 
							name="period2" 
							type="date" 
							class="form-control">
					</div>
					<span class="help-block" id="error"></span>
				</div>
				<div class="form-group form-group-lg col-sm-12 col-md-4">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-user" aria-hidden="true"></i>
						</div>
						<select id="sex" name="sex" class="form-control">
							<option value="1" <?php echo ($customer['sex'] == 1) ? 'selected' : ''; ?>>Hombre</option>
							<option value="2" <?php echo ($customer['sex'] == 2) ? 'selected' : ''; ?>>Mujer</option>
						</select>
					</div>
					<span class="help-block" id="error"></span>
				</div>
			</div>
			<h4>Superficie *</h4>
			<div class="row">
				<div class="form-group form-group-lg col-sm-6 col-md-2">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-superscript" aria-hidden="true"></i>
						</div>
						<input
							required="1"
							value="<?php echo $customer['surface'] ?>" 
							id="surface"
							name="surface"
							type="number"
							class="form-control"
							placeholder="100">
					</div>
					<span class="help-block" id="error"></span>
				</div>
				<div class="form-group form-group-lg col-sm-6 col-md-2">
					<select id="surface_type" name="surface_type" class="form-control" >
						<option value="1" <?php echo ($customer['surface_type'] == 1) ? 'selected' : ''; ?>>
							Cuadrados
						</option>
						<option value="2" <?php echo ($customer['surface_type'] == 2) ? 'selected' : ''; ?>>
							Lineales
						</option>
					</select>
					<span class="help-block" id="error"></span>
				</div>
				<div class="form-group form-group-lg col-sm-12 col-md-4">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-undo" aria-hidden="true"></i>
						</div>
						<input
							value="<?php echo $customer['turn'] ?>" 
							id="turn"
							name="turn"
							type="text"
							class="form-control"
							placeholder="Giro">
					</div>
					<span class="help-block" id="error"></span>
				</div>
				<div class="form-group form-group-lg col-sm-12 col-md-4">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-undo" aria-hidden="true"></i>
						</div>
						<input
							value="<?php echo $customer['sub_turn'] ?>" 
							id="sub_turn"
							name="sub_turn"
							type="text"
							class="form-control"
							placeholder="Sub-giro">
					</div>
					<span class="help-block" id="error"></span>
				</div>
			</div>
			<h4>Horario:</h4>
			<div class="row">
				<div class="form-group form-group-lg col-sm-12 col-md-4">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-clock-o" aria-hidden="true"></i>
						</div>
						<input
							required="1"
							value="<?php echo $customer['schedule_ini'] ?>" 
							id="schedule_ini"
							name="schedule_ini"
							type="time"
							class="form-control"
							placeholder="Entrada">
					</div>
					<span class="help-block" id="error"></span>
				</div>
				<div class="form-group form-group-lg col-sm-12 col-md-4">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-clock-o" aria-hidden="true"></i>
						</div>
						<input
							required="1"
							value="<?php echo $customer['schedule_end'] ?>" 
							id="schedule_end"
							name="schedule_end"
							type="time"
							class="form-control"
							placeholder="Salida">
					</div>
					<span class="help-block" id="error"></span>
				</div>
				<div class="col-sm-12 col-md-4" style="margin-top: -5px">
					<label class="pull-left" style="padding: 0px 14px 10px 14px">
						<input 
							type="checkbox" 
							id="lu" 
							<?php echo ($customer['lu'] == 1) ? 'checked' : '' ;  ?>>
							Lu 
					</label>
					<label class="pull-left" style="padding: 0px 14px 10px 14px">
						<input 
							type="checkbox" 
							id="ma" 
							<?php echo ($customer['ma'] == 1) ? 'checked' : '' ;  ?>>
							Ma 
					</label>
					<label class="pull-left" style="padding: 0px 14px 10px 14px">
						<input 
							type="checkbox" 
							id="mi" 
							<?php echo ($customer['mi'] == 1) ? 'checked' : '' ;  ?>>
							Mi 
					</label>
					<label class="pull-left" style="padding: 0px 14px 10px 14px">
						<input 
							type="checkbox" 
							id="ju" 
							<?php echo ($customer['ju'] == 1) ? 'checked' : '' ;  ?>>
							Ju 
					</label>
					<label class="pull-left" style="padding: 0px 14px 10px 14px">
						<input 
							type="checkbox" 
							id="vi" 
							<?php echo ($customer['vi'] == 1) ? 'checked' : '' ;  ?>>
							Vi 
					</label>
					<label class="pull-left" style="padding: 0px 14px 10px 14px">
						<input 
							type="checkbox" 
							id="sa" 
							<?php echo ($customer['sa'] == 1) ? 'checked' : '' ;  ?>>
							Sa 
					</label>
					<label class="pull-left" style="padding: 0px 14px 10px 14px">
						<input 
							type="checkbox" 
							id="do" 
							<?php echo ($customer['do'] == 1) ? 'checked' : '' ;  ?>>
							Do 
					</label>
				</div>
			</div>
			<h4>Opcionales</h4>
			<div class="row">
				<div class="form-group form-group-lg col-sm-12 col-md-4">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-id-card-o" aria-hidden="true"></i>
						</div>
						<input
							value="<?php echo $customer['badge'] ?>" 
							name="badge"
							id="badge"
							type="text"
							class="form-control"
							placeholder="No. Gafete">
					</div>
					<span class="help-block" id="error"></span>
				</div>
				<div class="form-group form-group-lg col-sm-12 col-md-4">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-id-card-o" aria-hidden="true"></i>
						</div>
						<input
							value="<?php echo $customer['folio'] ?>" 
							name="folio"
							id="folio"
							type="text"
							class="form-control"
							placeholder="Folio">
					</div>
					<span class="help-block" id="error"></span>
				</div>
				<div class="form-group form-group-lg col-sm-12 col-md-4">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-map" aria-hidden="true"></i>
						</div>
						<input
							value="<?php echo $customer['zone'] ?>" 
							name="zone"
							id="zone"
							type="text"
							class="form-control"
							placeholder="Zona">
					</div>
					<span class="help-block" id="error"></span>
				</div>
			</div>
			<div class="row">
				<div class="form-group form-group-lg col-sm-12 col-md-4">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-star" aria-hidden="true"></i>
						</div>
						<input
							value="<?php echo $customer['clasification'] ?>" 
							id="clasification"
							name="clasification"
							type="text"
							class="form-control"
							placeholder="Clasificacion">
					</div>
					<span class="help-block" id="error"></span>
				</div>
				<div class="form-group form-group-lg col-sm-12 col-md-4">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-briefcase" aria-hidden="true"></i>
						</div>
						<input
							value="<?php echo $customer['job'] ?>" 
							id="job"
							name="job"
							type="text"
							class="form-control"
							placeholder="Puesto">
					</div>
					<span class="help-block" id="error"></span>
				</div>
				<div class="form-group form-group-lg col-sm-12 col-md-4">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-map" aria-hidden="true"></i>
						</div>
						<input
							value="<?php echo $customer['ubication'] ?>" 
							id="ubication"
							name="ubication"
							type="text"
							class="form-control"
							placeholder="Ubicacion">
					</div>
					<span class="help-block" id="error"></span>
				</div>
			</div>
		</div>
		<div class="form-footer">
			<button type="submit" class="btn btn-info">
				<i class="fa fa-check"></i> Ok
			</button>
		</div>
	</form>
</div>
<script>
	$(function () {
        $('#period').datetimepicker({
        	format: 'Y-MM-DD'
        });
        $('#period2').datetimepicker({
        	format: 'Y-MM-DD',
            useCurrent: false //Important! See issue #1075
        });
        $("#period").on("dp.change", function (e) {
            $('#period2').data("DateTimePicker").minDate(e.date);
        });
        $("#period2").on("dp.change", function (e) {
            $('#period').data("DateTimePicker").maxDate(e.date);
        });
    });
</script>