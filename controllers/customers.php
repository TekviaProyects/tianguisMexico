<?php
require ('controllers/common.php');
require ("models/customers.php");

class customers extends Common {
	public $customersModel;
	function __construct() {
		$this -> customersModel = new customersModel();
	}

///////////////// ******** ----							 save							------ ************ //////////////////
//////// Call the function to save customer on the DB
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
	// If the object is empty (called from the ajax) it assigns $ _POST that is sent from the index
	// If not, take its normal value
		$objet = (empty($objet)) ? $_POST : $objet;
		$rep['status'] = 1;
		
	// Save customer
		$rep['result'] = $this -> customersModel -> save($objet);
		
		echo json_encode($rep);
	}
	
///////////////// ******** ----						END save							------ ************ //////////////////

///////////////// ******** ----						update								------ ************ //////////////////
//////// Call the function to update customer and schedules on the DB
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
		
		
	function update($objet) {
	// If the object is empty (called from the ajax) it assigns $ _POST that is sent from the index
	// If not, take its normal value
		$objet = (empty($objet)) ? $_POST : $objet;
		$rep['status'] = 1;
		
	// Save customer
		$rep['result'] = $this -> customersModel -> update($objet);
		
		echo json_encode($rep);
	}
	
///////////////// ******** ----						END update						------ ************ //////////////////

///////////////// ******** ----							 add							------ ************ //////////////////
//////// Loaded the view to add a customer
	// The parameters that can receive are:
		// div -> Div where the content is loaded
	
	function add($objet) {
	// If the object is empty (called from the ajax) it assigns $ _POST that is sent from the index
	// If not, take its normal value
		$objet = (empty($objet)) ? $_POST : $objet;
		
		if($objet['edit'] == 1){
			$customer = $this -> customersModel -> list_customers($objet);
			$customer = $customer['rows'][0];
		}
		
		
		require ('views/customers/add.php');
	}
	
///////////////// ******** ----						END add								------ ************ //////////////////

///////////////// ******** ----						list_customers						------ ************ //////////////////
////////Check the customers and loaded the view
	// The parameters that can receive are:
		// name -> Customer name
	
	function list_customers($objet) {
	// If the object is empty (called from the ajax) it assigns $ _POST that is sent from the index
	// If not, take its normal value
		$objet = (empty($objet)) ? $_POST : $objet;
		
		$customers = $this -> customersModel -> list_customers($objet);
		$customers = $customers['rows'];
		
		require ('views/customers/list_customers.php');
	}
	
///////////////// ******** ----						END list_customers					------ ************ //////////////////

}

?>