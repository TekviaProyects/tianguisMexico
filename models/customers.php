<?php
//Carga la clase de coneccion con sus metodos para consultas o transacciones
//require("models/connection.php"); // funciones mySQL
require ("models/connection_sqli.php");
class customersModel extends Connection {

///////////////// ******** ----							 save							------ ************ //////////////////
//////// Call the dunction to save customer on the DB
	// The parameters that can receive are:
		// badge -> Number of badge customer 				// lu -> 1 -> Selected, 0 -> Not selected
		// clasification -> Customer clasification 			// ma -> 1 -> Selected, 0 -> Not selected
		// folio -> Customer folio 							// mi -> 1 -> Selected, 0 -> Not selected
		// job -> Customer job 								// ju -> 1 -> Selected, 0 -> Not selected
		// last_name -> Customer last name 					// vi -> 1 -> Selected, 0 -> Not selected
		// last_name2 -> Customer last name mom 			// sa -> 1 -> Selected, 0 -> Not selected
		// mail -> Customer mail 							// do -> 1 -> Selected, 0 -> Not selected
		// name -> Customer name
		// period -> Start date
		// period2 -> End date
		// schedule_end -> End schedulde
		// schedule_ini -> Start schedulde
		// sex -> 1 -> Man, 2-> Woman
		// sub_turn -> Customer sub turn
		// surface -> Local surface in metters
		// surface_type -> 1 -> Squares, 2-> Linear
		// Tel -> Customer phone number
		// turn -> Customer turn
		// ubication -> Local ubication
		// zone -> Local zone
	
	function save($objet) {
		date_default_timezone_set('America/Mexico_City');
		
		$date = date('Y-m-d H:i:s');
		$full_name = $objet['name'].' '.$objet['last_name'].' '.$objet['last_name2'];
		
		$sql = "INSERT INTO 
						customers(badge, clasification, folio, full_name, last_name, last_name2, mail, name, period, period2, sex, 
									sub_turn, surface, surface_type, tel, turn, ubication, zone, create_date, update_date)
				VALUES	
					('".$objet['badge']."', '".$objet['clasification']."', '".$objet['folio']."', '".$full_name."', 
					'".$objet['last_name']."', '".$objet['last_name2']."', '".$objet['mail']."', '".$objet['name']."', 
					'".$objet['period']."', '".$objet['period2']."', '".$objet['sex']."', '".$objet['sub_turn']."', 
					'".$objet['surface']."', '".$objet['surface_type']."', '".$objet['tel']."',  '".$objet['turn']."', 
					'".$objet['ubication']."', '".$objet['zone']."', '".$date."', '".$date."')";
		$result = $this -> insert_id($sql);
		
		$sql = "INSERT INTO 
						schedules(customer_id, lu, ma, mi, ju, vi, sa, do, schedule_ini, schedule_end)
				VALUES	
					('".$result."', '".$objet['lu']."', '".$objet['ma']."', '".$objet['mi']."', '".$objet['ju']."', 
					'".$objet['vi']."', '".$objet['sa']."', '".$objet['do']."', '".$objet['schedule_ini']."', 
					'".$objet['schedule_end']."')";
		$result = $this -> query($sql);
		
		return $result;
	}
	
///////////////// ******** ----						END save							------ ************ //////////////////

///////////////// ******** ----						list_customers						------ ************ //////////////////
//////// Check the customers in the DB and return into array
	// The parameters that can receive are:
		// name -> Customer name
		// id -> Customer ID
	
	function list_customers($objet) {
	// Filter by the ID if exists
		$condition .= (!empty($objet['id'])) ? ' AND c.id = '.$objet['id'] : '' ;
	// Filter by the name if exists
		$condition .= (!empty($objet['name'])) ? ' AND c.full_name LIKE \'%'.$objet['name'].'%\'' : '' ;
		
		$sql = "SELECT
					c.*, s.lu, s.ma, s.mi, s.ju, s.vi, s.sa, s.do, s.schedule_ini, s.schedule_end
				FROM
					customers c 
				LEFT JOIN
						schedules s
					ON
						s.customer_id = c.id
				WHERE
					1 = 1".
				$condition;
		// return $sql;
		$result = $this -> query_array($sql);
		
		return $result;
	}
	
///////////////// ******** ----						END list_customers					------ ************ //////////////////

///////////////// ******** ----							update							------ ************ //////////////////
//////// Check the customers in the DB and return into array
	// The parameters that can receive are:
		// name -> Customer name
		// id -> Customer ID
	
	function update($objet) {
		$sql = "UPDATE 
					customers
				SET ".
					$objet['customer_columns']." 
				WHERE
					id = ".$objet['id'];
		// return $sql;
		$result = $this -> query($sql);
		
		$sql = "UPDATE 
					schedules
				SET ".
					$objet['schedules_columns']." 
				WHERE
					customer_id = ".$objet['id'];
		// return $sql;
		$result = $this -> query($sql);
		
		return $result;
	}
	
///////////////// ******** ----						END update							------ ************ //////////////////

}

?>