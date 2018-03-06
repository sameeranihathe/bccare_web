<?php

class Bccm extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	/////
	public function all_available_nurse_data_m()
	{	
		
		//$patient_id = $_POST["patient_id"];
		$patient_id = "17";
		
		$mysql_qry = "select n.*,g.gendar,l.loc_name,t.title from nurse_tbl as n,gendar_tbl as g,treatment_location_tbl as l, title as t where n.n_gen_id = g.gen_id AND n.n_loc_id = l.loc_id AND n.n_ti_id = t.ti_id AND n.n_id NOT IN (select n_id from nurse_patient where p_id = '$patient_id')";
		//$result = mysqli_query($conn ,$mysql_qry);
		$result = $this->db->get($mysql_qry);
		
			$temp_array = array();
			
		if(mysqli_num_rows($result) > 0) {
			
		
			
			while($row = $result->fetch_assoc()) 
			{
      			  $temp_array[]= $row;
    		}
					
		}
		else
		{
			echo "Error";
		}
		header('Content-Type: application/json');
		echo json_encode(array("AllAvailableNurse"=>$temp_array));
		mysqli_close($conn);
				
	}
	///////
	
}


?>