/*jslint plusplus: true, devel: true, nomen: true, indent: 4, maxerr: 50 */ 
/*global define, $, jQuery, swal */
/*jslint browser: true*/
var customers = {
// Initialize vars
	edit: 0,

///////////////// ******** ----							 save							------ ************ //////////////////
//////// Save customer
	// The parameters that can receive are:
		// form -> Form with the inputs with the customer values
		
	save : function($objet){
		"use strict";
		console.log('==========> $objet save', $objet);
		
		var data = {},
			$required = [],
			message = 'Debes llenar los siguientes campos: \n',
			error = 0, 
			count = 0,
			$function  =  'save';
		
	// Direction to save or edit
		if($objet.edit === 1){
			$function = 'edit';
		}
		
		$("#"+$objet.form).find(':input').each(function(key, value){
			var required = $(this).attr('required'),
				valor = $(this).val(),
				id = this.id;
			
		// Validate that the required input not are empty
			if (required === '1' && valor.length <= 0) {
				error = 1;

				$required.push(id);
			}
			
			if(id){
				if(value.type === 'checkbox'){
				// Validate the selected days
					if(!$("#"+id).prop("checked")){
						count ++;
						data[id] = 0;
					}else{
						data[id] = 1;
					}
				}else{
					data[id] = $(this).val();
				}
			}
		});
		
	// Build the error message
		if ($required.length > 0) {
			$.each($required, function(index, value) {
				message += '-->' + this + ' \n';
			});
		}
		
	// Error
		if (error === 1) {
			swal({
				title : 'Campos no validos',
				text : message,
				timer : 5000,
				showConfirmButton : true,
				type : 'warning'
			});
			
			return;
		}
		
	// Validate the selected days
		if(count > 6){
			swal({
				title : 'Horario no valido',
				text : 'Tienes que seleccionar al menos un dia',
				timer : 5000,
				showConfirmButton : true,
				type : 'warning'
			});
			
			return;
		}
		
		console.log('==========> data', data);
		
		$.ajax({
			data : data,
			url : 'ajax.php?c=customers&f='+$function,
			type : 'post',
			dataType : 'json'
		}).done(function(resp) {
			console.log('==========> done agregar_nombre', resp);
			
			swal({
				title : 'Datos guardados',
				text : 'Los datos se han guardado con exito',
				timer : 5000,
				showConfirmButton : true,
				type : 'success'
			});
		
		// List customers
            customers.list_customers({name: $('#input_search').val()});
		}).fail(function(resp) {
			console.log('==========> fail !!! save', resp);
			
			swal({
				title : 'Error',
				text : 'A ocurrido un problema al guardar los datos',
				timer : 5000,
				showConfirmButton : true,
				type : 'error'
			});
		});
	},

///////////////// ******** ----							END save						------ ************ //////////////////

///////////////// ******** ----							 add							------ ************ //////////////////
//////// Loaded the view to add a customer
	// The parameters that can receive are:
		// div -> Div where the content is loaded
		
	add : function($objet){
		"use strict";
		console.log('==========> $objet add', $objet);
		
		$.ajax({
			data : $objet,
			url : 'ajax.php?c=customers&f=add',
			type : 'post',
			dataType : 'html'
		}).done(function(resp) {
			$("#"+$objet.div).html(resp);
		}).fail(function(resp) {
			console.log('==========> fail !!! add', resp);
			
			swal({
				title : 'Error',
				text : 'No se puede cargar la vista',
				timer : 5000,
				showConfirmButton : true,
				type : 'error'
			});
		});
	},

///////////////// ******** ----							END add						------ ************ //////////////////

///////////////// ******** ----							list_customers				------ ************ //////////////////
////////Check the customers and loaded the view
	// The parameters that can receive are:
		// div -> Div where the content is loaded
		// name -> Customer name
		
	list_customers : function($objet){
		"use strict";
		console.log('==========> $objet list_customers', $objet);
		
		$.ajax({
			data : $objet,
			url : 'ajax.php?c=customers&f=list_customers',
			type : 'post',
			dataType : 'html'
		}).done(function(resp) {
			
			if(!$objet.div){
				$objet.div = 'container';
			}
			
			$("#"+$objet.div).html(resp);
		}).fail(function(resp) {
			console.log('==========> fail !!! list_customers', resp);
			
			swal({
				title : 'Error',
				text : 'No se puede cargar la vista',
				timer : 5000,
				showConfirmButton : true,
				type : 'error'
			});
		});
	}

///////////////// ******** ----					END list_customers					------ ************ //////////////////

};