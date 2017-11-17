<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Tianguis México</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
<!-- /////////////////// ===================				CSS						=================== /////////////////// -->

	<!-- bootstrap -->
		<link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css" type="text/css" />
	<!-- font-awesome -->
		<link rel="stylesheet" href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" type="text/css">
	<!-- dataTables  -->
		<link rel="stylesheet" href="plugins/dataTable/css/datatablesboot.min.css">
	    <link rel="stylesheet" href="plugins/dataTable/css/jquery.dataTables.min.css">
	<!-- Animate -->
		<link href="plugins/animate.css" rel="stylesheet" />
	<!-- bootstrap-datetimepicker -->
		<link rel="stylesheet" href="plugins/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />
	<!-- sweetalert -->
		<link rel="stylesheet" href="plugins/sweetalert-master/dist/sweetalert.css" />
		
	<!-- Sytem -->
		<link rel="stylesheet" href="css/signup-form.css" type="text/css" />
		
<!-- /////////////////// ===================			END CSS						=================== /////////////////// -->

	</head>
	<body>
		<div class="container">
			<div class="signup-form-container">
				<div class="form-header">
					<h3 class="form-title"><i class="fa fa-user"></i> Locatarios</h3> &nbsp; &nbsp;
					<button class=" btn btn-info" onclick="customers.add({div: 'container'})">
						<i class="fa fa-plus"></i> Registrar
					</button>
				</div>
				<div class="form-body" style="padding: 30px">
					<div class="row">
						<div class="input-group input-group-lg col-sm-12 col-md-5"> 
							<input 
								onkeypress="if(((document.all) ? event.keyCode : event.which)==13)
									customers.list_customers({name: $('#input_search').val()})
								"
								class="form-control" 
								placeholder="Juan perez" 
								id="input_search"> 
							<span class="input-group-btn"> 
								<button 
									onclick="customers.list_customers({name: $('#input_search').val()})"
									class="btn btn-default" 
									type="button">
									Buscar
								</button> 
							</span>
						</div>
					</div>
				</div>
			</div>
			<div id="container">
			  
			</div>
		</div>
		
<!-- /////////////////// ===================				JS						=================== /////////////////// -->

		<script src="plugins/jquery-1.11.2.min.js"></script>
		<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
	<!-- dataTables  -->
		<script src="plugins/dataTable/js/datatables.min.js"></script>
		<script src="plugins/dataTable/js/dataTables.bootstrap.min.js"></script>
	    <script src="plugins/export_print/dataTables.buttons.min.js"></script>
	    <script src="plugins/export_print/buttons.html5.min.js"></script>
	    <script src="plugins/export_print/buttons.print.min.js"></script>
	    <script src="plugins/export_print/jszip.min.js"></script>
	<!-- sweetalert -->
		<script type="text/javascript" src="plugins/sweetalert-master/dist/sweetalert.min.js"></script>
	<!-- validate -->
		<script src="plugins/jquery.validate.min.js"></script>
		<script src="plugins/register.js"></script>
	<!-- Date-time Peaker -->
		<script type="text/javascript" src="plugins/moment/moment.js"></script>
		<script type="text/javascript" src="plugins/transition.js"></script>
		<script type="text/javascript" src="plugins/collapse.js"></script>
		<script type="text/javascript" src="plugins/bootstrap-datetimepicker/src/js/bootstrap-datetimepicker.js"></script>
		
	<!-- System -->
		<script src="js/customers.js"></script>
		
<!-- /////////////////// ===================			END JS						=================== /////////////////// -->

		 <script type="text/javascript">
            $(function () {
                $('#period').datetimepicker({
                	format: 'YYYY-MM-DD'
                });
		        $('#period2').datetimepicker({
                	format: 'YYYY-MM-DD',
		            useCurrent: false //Important! See issue #1075
		        });
		        $("#period").on("dp.change", function (e) {
		            $('#period2').data("DateTimePicker").minDate(e.date);
		        });
		        $("#period2").on("dp.change", function (e) {
		            $('#period').data("DateTimePicker").maxDate(e.date);
		        });
            });
            customers.list_customers({name: $('#input_search').val()});
        </script>
	</body>
</html>