<?php
		
class BreastCareController extends CI_Controller
{
	public $conn;
	
	function __construct()
	{
		$this->connection();
	}
	
	public function index()
	{
		echo "This is our first controller!!!";
	} 
	
	public function connection()
	{
		$db_name = "breast_cancer123";
		$mysql_username = "root";
		$mysql_password = "@arthur#";
		$server_name = "localhost";
		$this->conn = mysqli_connect($server_name, $mysql_username, $mysql_password,$db_name);
	}
	
	public function testlogin()
	{	
		
		$user_name = $_POST["user_name"];
		$user_pass = $_POST["password"];
		//$user_name = "123";
		//$user_pass = "123";
		
		
		$mysql_qry = "select * from employee_data where username like ".$user_name." and password like ".$user_pass.";";
		$result = mysqli_query($this->conn ,$mysql_qry);
		if(mysqli_num_rows($result) > 0) {
		echo "success";
		}
		else {
		echo "login not success";
		}
		//mysqli_close($conn);
				
	}
	
	
	
	public function preLoadChatData()
	{	
		
		$user_room = $_POST["room_name"];
		$chatMsgTable = $_POST["chatMsgTable"];
		//$user_Chat_room = $_POST["user_chat_room"];
		//$user_room = "001p001n";
		
		if($chatMsgTable == "NP")
		{
			$mysql_qry = "select msg.* from private_chat_tbl as room,private_chat_msg_tbl as msg where room.pri_ch_id=msg.pri_ch_id AND msg.pri_ch_id=(select pri_ch_id from private_chat_tbl where pri_ch_room_name='$user_room')";
		}
		else if($chatMsgTable == "DN")
		{
			$mysql_qry = "select msg.* from d_n_private_chat_tbl as room,d_n_private_chat_msg_tbl as msg where room.pri_ch_id=msg.pri_ch_id AND msg.pri_ch_id=(select pri_ch_id from d_n_private_chat_tbl where pri_ch_room_name='$user_room')";
		}
		else if($chatMsgTable == "PC")
		{
			$mysql_qry = "select * from public_chat_msg_tbl where pub_ch_id = '$user_room'";
		}
		
		
		$result = mysqli_query($this->conn ,$mysql_qry);
		
			$temp_array = array();
			
		if(mysqli_num_rows($result) > 0) {
			
		
			
			while($row = $result->fetch_assoc()) 
			{
      			  $temp_array[]= $row;
    		}
					
		}
		header('Content-Type: application/json');
		echo json_encode(array("ChatRoom01"=>$temp_array));
		//mysqli_close($conn);
				
	}
	
	
	
	public function testlogin2()
	{	
		$user_n = $_POST["user_name"];
		//$user_n = "123";
		$user_p = $_POST["user_password"];
		//$user_p = "123";
		
		
		$mysql_qry = "select type from employee_data where username = '".$user_n."' and password = '".$user_p."';";
		$result = mysqli_query($this->conn ,$mysql_qry);
		
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
		echo json_encode(array("LoginResults"=>$temp_array));
		//mysqli_close($conn);
				
	}
	
	/////////
	public function testlogin3()
	{	
		$user_n = $_POST["user_name"];
		//$user_n = "002n";
		
		$user_p = $_POST["user_password"];
		//$user_p = "002n";
	
		$user_p_md = md5($user_p);
		
		$mysql_qry = "select user_type_id from login_tbl where user_name = '".$user_n."' and password = '".$user_p_md."';";
		$result = mysqli_query($this->conn ,$mysql_qry);
		
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
		echo json_encode(array("LoginResults"=>$temp_array));
		//mysqli_close($conn);
				
	}
	////////
	
	
	
	/////////
	public function patient_all_info()
	{	
		$user_n = $_POST["user_name"];
		//$user_n = "001p";
		//$user_p = $_POST["user_password"];
		//$user_p = "892820520v";
		//$user_p_md = md5($user_p);
		
		
		$mysql_qry = "select p.*,g.gendar from patient_tbl as p ,gendar_tbl as g where p.p_nic = '$user_n' AND p.p_gen_id = g.gen_id;";
		$result = mysqli_query($this->conn ,$mysql_qry);
		
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
		echo json_encode(array("DataResults"=>$temp_array));
		//mysqli_close($conn);
				
	}
	
	////////
	
	
	/////////
	public function patient_schedule_info()
	{	
		
		$patient_id = $_POST["patient_id"];
		//$patient_id = "7";
		//$user_p = $_POST["user_password"];
		//$user_p = "892820520v";
		//$user_p_md = md5($user_p);
	
		$mysql_qry = "select * from schdule_tbl where p_id = '$patient_id';";
		$result = mysqli_query($this->conn ,$mysql_qry);
		
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
		echo json_encode(array("PatientScheduleResults"=>$temp_array));
		//mysqli_close($conn);
				
	}
	
	////////
	
	
	/////////
	public function nurse_all_info()
	{	
		$user_n = $_POST["user_name"];
		//$user_n = "002n";
		//$user_p = $_POST["user_password"];
		//$user_p = "002n";
		//$user_p_md = md5($user_p);
		
		$mysql_qry = "select n.*,g.gendar,l.loc_name,t.title from nurse_tbl as n ,gendar_tbl as g,treatment_location_tbl as l, title as t where n.n_nic = '$user_n' AND n.n_gen_id = g.gen_id AND n.n_loc_id = l.loc_id AND n.n_ti_id = t.ti_id;";
		$result = mysqli_query($this->conn ,$mysql_qry);
		
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
		echo json_encode(array("DataResults"=>$temp_array));
		//mysqli_close($conn);
				
	}
	
	////////
	
	
	/////////
	public function doctor_all_info()
	{	
		
		$user_n = $_POST["user_name"];
		//$user_n = "002d";
		//$user_p = $_POST["user_password"];
		//$user_p = "002n";
		//$user_p_md = md5($user_p);
		
		$mysql_qry = "select d.*,g.gendar,l.loc_name,t.title from doctor_tbl as d ,gendar_tbl as g,treatment_location_tbl as l, title as t where d.d_nic = '$user_n' AND d.d_ged_id = g.gen_id AND d.d_loc_id = l.loc_id AND d.d_ti_id = t.ti_id;";
		$result = mysqli_query($this->conn ,$mysql_qry);
		
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
		echo json_encode(array("DataResults"=>$temp_array));
		//mysqli_close($conn);
				
	}
	
	////////
	
	
	
	
	/////////
	public function all_assigned_nurse()
	{
		$patient_id = $_POST["patient_id"];
		//$patient_id = "17";
		//$user_p = $_POST["user_password"];
		//$user_p = "892820520v";
		//$user_p_md = md5($user_p);
	
		$mysql_qry = "select n.*,g.gendar,l.loc_name,t.title,prvt.pri_ch_room_name,prvt.pri_ch_id from nurse_patient
as np, nurse_tbl as n ,gendar_tbl as g,treatment_location_tbl as l, title as t,private_chat_tbl as prvt where np.p_id = '$patient_id' AND np.n_id=n.n_id AND n.n_gen_id = g.gen_id AND n.n_loc_id = l.loc_id AND n.n_ti_id = t.ti_id AND prvt.p_id ='$patient_id' AND prvt.n_id =n.n_id;";
		$result = mysqli_query($this->conn ,$mysql_qry);
		
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
		echo json_encode(array("AssignedNurseResults"=>$temp_array));
		//mysqli_close($conn);
				
	}
	
	///////
	
	
	/////////
	public function all_assigned_patients()
	{	
		
		$nurse_id = $_POST["nurse_id"];
		//$nurse_id = "11";
		//$user_p = $_POST["user_password"];
		//$user_p = "892820520v";
		//$user_p_md = md5($user_p);
		
		
		
		$mysql_qry = "select p.*,g.gendar,l.loc_name,t.title,prvt.pri_ch_room_name,prvt.pri_ch_id from nurse_patient
as np, patient_tbl as p ,gendar_tbl as g,treatment_location_tbl as l, title as t,private_chat_tbl as prvt where np.n_id = '$nurse_id' AND np.p_id=p.p_id AND p.p_gen_id = g.gen_id AND p.p_loc_id = l.loc_id AND p.p_ti_id = t.ti_id AND prvt.n_id ='$nurse_id' AND prvt.p_id =p.p_id;";
		$result = mysqli_query($this->conn,$mysql_qry);
		
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
		echo json_encode(array("AssignedPatientResults"=>$temp_array));
		//mysqli_close($conn);
				
	}
	
	///////
	
	/////////
	public function all_assigned_doctors()
	{	
		
		$nurse_id = $_POST["nurse_id"];
		//$nurse_id = "13";
		//$user_p = $_POST["user_password"];
		//$user_p = "892820520v";
		//$user_p_md = md5($user_p);
		
		$mysql_qry = "select d.*,g.gendar,l.loc_name,t.title,prvt.pri_ch_room_name,prvt.pri_ch_id from doctor_nurse_tbl
as dn, doctor_tbl as d ,gendar_tbl as g,treatment_location_tbl as l, title as t,d_n_private_chat_tbl as prvt where dn.n_id = '$nurse_id' AND dn.d_id=d.d_id AND d.d_ged_id = g.gen_id AND d.d_loc_id = l.loc_id AND d.d_ti_id = t.ti_id AND prvt.n_id ='$nurse_id' AND prvt.d_id =d.d_id;";
		$result = mysqli_query($this->conn ,$mysql_qry);
		
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
		echo json_encode(array("AssignedDoctorsResults"=>$temp_array));
		//mysqli_close($conn);
				
	}
	
	///////
	
	
	/////////
	public function all_doctors_assigned_nurse()
	{	
		$doctor_id = $_POST["doctor_id"];
		//$doctor_id = "11";
		
		$mysql_qry = "select n.*,g.gendar,l.loc_name,t.title,prvt.pri_ch_room_name,prvt.pri_ch_id from doctor_nurse_tbl as dn, nurse_tbl as n ,gendar_tbl as g,treatment_location_tbl as l, title as t,d_n_private_chat_tbl as prvt where dn.d_id = '$doctor_id' AND dn.n_id=n.n_id AND n.n_gen_id = g.gen_id AND n.n_loc_id = l.loc_id AND n.n_ti_id = t.ti_id AND prvt.d_id ='$doctor_id' AND prvt.n_id =n.n_id;";
		$result = mysqli_query($this->conn ,$mysql_qry);
		
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
		echo json_encode(array("AssignedNurseResults"=>$temp_array));
		//mysqli_close($conn);
				
	}
	
	///////
	
	/////////
	public function all_doctor_assigned_patients()
	{	
		
		$doctor_id = $_POST["doctor_id"];
		//$doctor_id = "11";
		//$user_p = $_POST["user_password"];
		//$user_p = "892820520v";
		//$user_p_md = md5($user_p);
		
		
		
		$mysql_qry = "select p.*,g.gendar,l.loc_name,t.title from doctor_patient_tbl
as dp, patient_tbl as p ,gendar_tbl as g,treatment_location_tbl as l, title as t where dp.d_id = '$doctor_id' AND dp.p_id=p.p_id AND p.p_gen_id = g.gen_id AND p.p_loc_id = l.loc_id AND p.p_ti_id = t.ti_id;";
		$result = mysqli_query($this->conn ,$mysql_qry);
		
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
		echo json_encode(array("AssignedPatientResults"=>$temp_array));
		//mysqli_close($conn);
				
	}
	
	///////
	
	/////////
	public function all_doctors_assigned_nurse_and_patients()
	{	
		$doctor_id = $_POST["doctor_id"];
		$nurse_id = $_POST["nurse_id"];
		//$doctor_id = "5";
		//$nurse_id = "20";
		//$user_p = $_POST["user_password"];
		//$user_p = "892820520v";
		//$user_p_md = md5($user_p);
		
		
		$mysql_qry = "select p.*,g.gendar,l.loc_name,t.title,prvt.pri_ch_room_name,prvt.pri_ch_id from nurse_patient
as np, patient_tbl as p ,gendar_tbl as g,treatment_location_tbl as l, title as t,private_chat_tbl as prvt where (np.n_id = '$nurse_id' AND np.p_id=p.p_id AND p.p_gen_id = g.gen_id AND p.p_loc_id = l.loc_id AND p.p_ti_id = t.ti_id AND prvt.n_id ='$nurse_id' AND prvt.p_id =p.p_id) AND (p.p_id IN (select dp.p_id from doctor_patient_tbl as dp where dp.d_id= '$doctor_id')) ;";
		
		$result = mysqli_query($this->conn,$mysql_qry);
		
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
		echo json_encode(array("AssignedNurseWITHPatiemtsResults"=>$temp_array));
		//mysqli_close($conn);
				
	}
	
	///////
	
	/////////
	public function assigned_nurse_all_info()
	{	
		$nurse_id = $_POST["nurse_id"];
		//$nurse_id = "9";
		//$user_p = $_POST["user_password"];
		//$user_p = "892820520v";
		//$user_p_md = md5($user_p);
		
		$mysql_qry = "select n.*,g.gendar,l.loc_name,t.title,lan.language from nurse_tbl as n ,gendar_tbl as g,treatment_location_tbl as l, title as t,languages_tbl as lan where n.n_id = '$nurse_id' AND n.n_gen_id = g.gen_id AND n.n_loc_id = l.loc_id AND n.n_ti_id = t.ti_id AND lan.lang_id = n.n_lang_id;";
		$result = mysqli_query($this->conn ,$mysql_qry);
		
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
		echo json_encode(array("OneAssignedNurseResults"=>$temp_array));
		//mysqli_close($conn);
				
	}
	
	////////
	
	/////////
	public function assigned_patient_all_info()
	{	
		$patient_id = $_POST["patinet_id"];
		//$patient_id = "27";
		
		$mysql_qry = "select p.*,g.gendar,l.loc_name,t.title,lan.language from patient_tbl as p ,gendar_tbl as g,treatment_location_tbl as l, title as t,languages_tbl as lan where p.p_id = '$patient_id' AND p.p_gen_id = g.gen_id AND p.p_loc_id = l.loc_id AND p.p_ti_id = t.ti_id AND lan.lang_id = p.p_lang_id;";
		$result = mysqli_query($this->conn ,$mysql_qry);
		
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
		echo json_encode(array("OneAssignedPatientResults"=>$temp_array));
		//mysqli_close($conn);
				
	}
	
	////////
	
	/////////
	public function assigned_nurse_ass_doctors_all_info()
	{	
		
		$doctors_id = $_POST["doctors_id"];
		//$doctors_id = "5";
		
		$mysql_qry = "select d.*,g.gendar,l.loc_name,t.title from doctor_tbl as d ,gendar_tbl as g,treatment_location_tbl as l, title as t where d.d_id = '$doctors_id' AND d.d_ged_id = g.gen_id AND d.d_loc_id = l.loc_id AND d.d_ti_id = t.ti_id;";
		$result = mysqli_query($this->conn ,$mysql_qry);
		
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
		echo json_encode(array("OneNurseAssignedDoctorResults"=>$temp_array));
		//mysqli_close($conn);
				
	}
	
	////////
	
	/////
	public function all_treatment_locations_data()
	{		
		
		$mysql_qry = "select * from treatment_location_tbl";
		$result = mysqli_query($this->conn ,$mysql_qry);
		
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
		echo json_encode(array("TreatmentLocationResults"=>$temp_array));
		//mysqli_close($conn);
				
	}
	///////
	
	/////
	public function all_news_data()
	{	
		$mysql_qry = "select * from news_tbl ORDER BY news_id DESC";
		$result = mysqli_query($this->conn ,$mysql_qry);
		
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
		echo json_encode(array("AllNews"=>$temp_array));
		//mysqli_close($conn);
				
	}
	///////
	
	
	/////
	public function all_products_data()
	{	
	
		$mysql_qry = "select * from products_tbl ORDER BY product_id DESC";
		$result = mysqli_query($this->conn ,$mysql_qry);
		
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
		echo json_encode(array("AllProducts"=>$temp_array));
		//mysqli_close($conn);
				
	}
	///////
	
	/////
	public function all_available_nurse_data()
	{	
		$patient_id = $_POST["patient_id"];
		//$patient_id = "20";
		
		$mysql_qry = "select n.*,g.gendar,l.loc_name,t.title from nurse_tbl as n,gendar_tbl as g,treatment_location_tbl as l, title as t where n.n_gen_id = g.gen_id AND n.n_loc_id = l.loc_id AND n.n_ti_id = t.ti_id AND n.n_id NOT IN (select n_id from nurse_patient where p_id = '$patient_id')";
		$result = mysqli_query($this->conn ,$mysql_qry);
		
		
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
		//mysqli_close($conn);
			
	}
	///////
	
	
	/////////
	public function all_patient_history()
	{	
		$patient_id = $_POST["patient_id"];
		//$patient_id = "17";
	
		$mysql_qry = "select * from patient_history_tbl where p_id = '$patient_id' ";
		$result = mysqli_query($this->conn ,$mysql_qry);
		
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
		echo json_encode(array("AllHistory"=>$temp_array));
		//mysqli_close($conn);
				
	}
	
	///////
	
	public function newscheck()
	{	
		
		$mysql_qry = "select news_id from news_tbl ORDER BY news_id DESC LIMIT 1";
		$result = mysqli_query($this->conn ,$mysql_qry);
		
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
		echo json_encode(array("NewsResults"=>$temp_array));
		//mysqli_close($conn);
				
	}
	
	////////
	///////
	
	public function productcheck()
	{	
		
		$mysql_qry = "select product_id from products_tbl ORDER BY product_id DESC LIMIT 1";
		$result = mysqli_query($this->conn ,$mysql_qry);
		
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
		echo json_encode(array("ProductsResults"=>$temp_array));
		//mysqli_close($conn);
				
	}
	
	////////
	
	/////////
	public function patientdailystatus()
	{	
		$patient_id = $_POST["patient_id"];
		$statdate = $_POST["statdate"];
		$stattime = $_POST["stattime"];
		$statvalue = $_POST["statvalue"];
		
	/*$patient_id = "17";
		$statdate = "2017-03-10";
		$stattime = "06:58:52";
		$statvalue = "06:58:52";*/
	
		$mysql_qry = "INSERT INTO p_dly_status_tbl (p_id,p_dly_stat_date,p_dly_stat_time,p_dly_stat_value) VALUES ('$patient_id','$statdate','$stattime','$statvalue')";
		$result = mysqli_query($this->conn,$mysql_qry);
		
		$temp_array = array();
		
		header('Content-Type: application/json');
		echo json_encode(array("DailyStatus"=>$temp_array));
		//mysqli_close($conn);
				
	}
	
	///////
	
	
	/////////
	public function insertmgstodatabase()
	{	
		$chat_Msg_table = $_POST["chat_Msg_table"];
		
		$pri_chat_room_id = $_POST["pri_chat_room_id"];//room name id
		
		$u_Uname_id = $_POST["u_Uname_id"];
		$u_Msg = $_POST["u_Msg"];
		
		$pri_chat_dtatime = $_POST["pri_chat_dtatime"];
		
		$NickNAME = $_POST["NickNAME"];
		
		if($chat_Msg_table == "DN")
		{
			$mysql_qry = "INSERT INTO d_n_private_chat_msg_tbl(pri_ch_id,pri_ch_user_id,pri_ch_msg,pri_ch_msg_date_time) VALUES ('$pri_chat_room_id','$u_Uname_id','$u_Msg','$pri_chat_dtatime')";
		}
		else if($chat_Msg_table == "NP")
		{
			$mysql_qry = "INSERT INTO private_chat_msg_tbl(pri_ch_id,pri_ch_user_id,pri_ch_msg,pri_ch_msg_date_time,utype) VALUES ('$pri_chat_room_id','$u_Uname_id','$u_Msg','$pri_chat_dtatime','$NickNAME')";
			}
			else if($chat_Msg_table == "PC")
		{
			$mysql_qry = "INSERT INTO public_chat_msg_tbl(pub_ch_id,pri_ch_msg,pri_ch_user_id,pub_ch_msg_date_time) VALUES ('$pri_chat_room_id','$u_Msg','$u_Uname_id','$pri_chat_dtatime')";
			}
		
		
		/*$u_Uname = "17";
		$u_Msg = "2017-03-10";*/
	
		
		$result = mysqli_query($this->conn,$mysql_qry);
		
		$temp_array = array();
		
		header('Content-Type: application/json');
		echo json_encode(array("InsertMsgs"=>$temp_array));
		//mysqli_close($conn);
				
	}
	////
	
	/////////
	public function requestNewNurse()
	{	
		$patient_id = $_POST["patient_id"];
		$nurse_id = $_POST["nurse_id"];
		
	    //$patient_id = "17";
		//$nurse_id = "20";
		
	
		$mysql_qry = "INSERT INTO nurse_requests_tbl (p_id,n_id,n_req_stat,n_req_auth_user_id) VALUES ('$patient_id','$nurse_id','p','')";
		$result = mysqli_query($this->conn,$mysql_qry);
		
		$temp_array = array();
		
		header('Content-Type: application/json');
		echo json_encode(array("SendNurseRequest"=>$temp_array));
		//mysqli_close($conn);
				
	}
	
	///////
	
	/////////
	public function patient_schedule_All_Details_data()
	{	
		
		$schdliD = $_POST["schdliD"];
		//$schdliD = "22";
		//$user_p = $_POST["user_password"];
		//$user_p = "892820520v";
		//$user_p_md = md5($user_p);
	
		$mysql_qry = "select * from schdule_tbl where sch_id = '$schdliD';";
		$result = mysqli_query($this->conn ,$mysql_qry);
		
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
		echo json_encode(array("ScheduleDetailsResults"=>$temp_array));
		//mysqli_close($conn);
				
	}
	
	////////
	
	/////////
	public function patient_History_All_Details_data()
	{	
		
		$historyiD = $_POST["historyiD"];
		//$historyiD = "6";
		//$user_p = $_POST["user_password"];
		//$user_p = "892820520v";
		//$user_p_md = md5($user_p);
	
		$mysql_qry = "select * from patient_history_tbl where p_h_id = '$historyiD';";
		$result = mysqli_query($this->conn ,$mysql_qry);
		
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
		echo json_encode(array("HistoryDetailsResults"=>$temp_array));
		//mysqli_close($conn);
				
	}
	
	////////
	
	/////////Selecting the previouse password
	public function selectOldPass()
	{	
		$u_Nic = $_POST["u_Nic"];
		$u_Old_pass = md5($_POST["u_Old_pass"]);
		$u_New_pass = md5($_POST["u_New_pass"]);
		
		//$u_Nic = "002p";
		//$u_Old_pass = md5("0022p");
		//$u_New_pass = md5("0023p");
	
		$mysql_qry = "select * from login_tbl where user_name = '$u_Nic' AND password = '$u_Old_pass';";
		$result = mysqli_query($this->conn ,$mysql_qry);
		
			$temp_array = array();
			
		if(mysqli_num_rows($result) > 0) {
			
		while($row = $result->fetch_assoc()) 
			{
      			 // $temp_array[]= $row;
				 $sql = "UPDATE login_tbl SET password='$u_New_pass' WHERE user_name = '$u_Nic'";
				 mysqli_query($this->conn ,$sql);
    		}
					
		}
		else
		{
			echo "Error";
		}
		header('Content-Type: application/json');
		echo json_encode(array("LoginTableSelectResults"=>$temp_array));
		//mysqli_close($conn);
				
	}
	////////
	
	
	/////All Requested Patients////
	public function all_nurse_requested_patients()
	{	
		
		$nurse_id = $_POST["nurse_id"];
		//$nurse_id = "20";
		//$user_p = $_POST["user_password"];
		//$user_p = "892820520v";
		//$user_p_md = md5($user_p);
		
		
		
		$mysql_qry = "select p.*,g.gendar,l.loc_name,t.title from nurse_requests_tbl
as npr, patient_tbl as p ,gendar_tbl as g,treatment_location_tbl as l, title as t where npr.n_id = '$nurse_id' AND npr.p_id=p.p_id AND p.p_gen_id = g.gen_id AND p.p_loc_id = l.loc_id AND p.p_ti_id = t.ti_id;";
		$result = mysqli_query($this->conn ,$mysql_qry);
		
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
		echo json_encode(array("AssignedPatientResults"=>$temp_array));
		//mysqli_close($conn);
				
	}
	
	///////
	
	
	
	/////////
	public function all_doctor_chat_room_details()
	{	
		$doctor_id = $_POST["doctor_id"];
		$doctor_nic = $_POST["doctor_nic"];
		//$doctor_id = "11";
		
		$mysql_qry = "select pri_ch_id from d_n_private_chat_tbl where d_id ='$doctor_id' AND pri_ch_room_name = '$doctor_nic';";
		
		$result = mysqli_query($this->conn ,$mysql_qry);
		
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
		echo json_encode(array("DocChatRoomResults"=>$temp_array));
		//mysqli_close($conn);
				
	}
	
	///////
	
	/////
	public function all_public_chat_titles()
	{	
		$mysql_qry = "select * from public_chat_tbl where pub_ch_active_sta = '1' ORDER BY pub_ch_id DESC;";
		$result = mysqli_query($this->conn ,$mysql_qry);
		
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
		echo json_encode(array("AllPublicChatTitles"=>$temp_array));
		//mysqli_close($conn);
				
	}
	///////
	
	////////////////////////////////////////////////////////////////////////////////
	///////////////////////////Public User registration///////////////////////////////
	
	/////
	public function all_provinces()
	{	
		$mysql_qry = "select * from  pub_province_tbl ORDER BY pro_Code";
		$result = mysqli_query($this->conn ,$mysql_qry);
		
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
		echo json_encode(array("AllPurovinces"=>$temp_array));
		//mysqli_close($conn);
				
	}
	///////
	
	/////
	public function all_gn_divisions()
	{	
		$mysql_qry = "select * from  pub_gn_division_tbl ORDER BY gn_Code";
		$result = mysqli_query($this->conn ,$mysql_qry);
		
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
		echo json_encode(array("AllGnDivisions"=>$temp_array));
		//mysqli_close($conn);
				
	}
	///////
	
	/////
	public function all_dis_divisions()
	{	
		$mysql_qry = "select * from  pub_ds_division_tbl ORDER BY ds_Code";
		$result = mysqli_query($this->conn ,$mysql_qry);
		
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
		echo json_encode(array("AllDisDivisions"=>$temp_array));
		//mysqli_close($conn);
				
	}
	///////
	
	/////
	public function all_districts()
	{	
	
		//$procode = $_POST["procode"];
		//$procode ="1";

		$mysql_qry = "select * from  pub_district_tbl ORDER BY dis_Code";
		$result = mysqli_query($this->conn ,$mysql_qry);
		
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
		echo json_encode(array("AllDisricts"=>$temp_array));
		//mysqli_close($conn);
				
	}
	///////
	
	/////////////Selecteed Stuff down below
	/////
	public function all_selected_districts()
	{	
	
		$procode = $_POST["procode"];
		//$procode ="1";

		$mysql_qry = "select * from  pub_district_tbl where pro_Code='$procode'";
		$result = mysqli_query($this->conn ,$mysql_qry);
		
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
		echo json_encode(array("AllSelectedDisricts"=>$temp_array));
		//mysqli_close($conn);
				
	}
	///////
	
	/////
	public function all_selected_ds_districts()
	{	
	
		$discode = $_POST["discode"];
		//$discode ="2";

		$mysql_qry = "select * from  pub_ds_division_tbl where dis_Code='$discode'";
		$result = mysqli_query($this->conn ,$mysql_qry);
		
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
		echo json_encode(array("AllSelectedDsDisricts"=>$temp_array));
		//mysqli_close($conn);
				
	}
	///////
	
	
	
	/////
	public function all_selected_gn_division()
	{	
	
		$dscode = $_POST["dscode"];
		//$discode ="2";

		$mysql_qry = "select * from  pub_gn_division_tbl where ds_Code='$dscode'";
		$result = mysqli_query($this->conn ,$mysql_qry);
		
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
		echo json_encode(array("AllSelectedGnDivi"=>$temp_array));
		//mysqli_close($conn);
				
	}
	///////
	
	
	
	
	////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////
	/////////Selecting the previouse password
	public function updateRelationdetails()
	{	
	
		$pt_id=$_POST["patintId"];
		$name = $_POST["name"];
		$contact = $_POST["contact"];
		$relationship = $_POST["relationship"];
		
		//$pt_id='31';
		//$name = 'dddd';
		//$contact = 'bbb';
		//$relationship = 'nnnn';
		
	
		$sql = "UPDATE patient_tbl SET p_relation_name='$name',p_relation_to_patient='$relationship',p_relation_contactno='$contact' WHERE p_id = '$pt_id'";
	  mysqli_query($this->conn ,$sql);
		
			$temp_array = array();
			
	
		header('Content-Type: application/json');
		echo json_encode(array("UpdateRelation"=>$temp_array));
		//mysqli_close($conn);
				
	}
	////////

	
/////////
	public function add_blog_post_title()
	{	
		$pTittle = $_POST["pTittle"];
		$pDateTime = $_POST["pDateTime"];
		$pNic = $_POST["pNic"];
		$pStat = $_POST["pStat"];
		
	/*$patient_id = "17";
		$statdate = "2017-03-10";
		$stattime = "06:58:52";
		$statvalue = "06:58:52";*/
	
		$mysql_qry = "INSERT INTO public_chat_tbl (pub_ch_title,pub_ch_date_time,pub_ch_user_id,pub_ch_active_sta) VALUES ('$pTittle','$pDateTime','$pNic','$pStat')";
		$result = mysqli_query($this->conn,$mysql_qry);
		
		$temp_array = array();
		
		header('Content-Type: application/json');
		echo json_encode(array("AddPostTitle"=>$temp_array));
		//mysqli_close($conn);
				
	}
	
	///////


/////
	public function all_blog_posts()
	{	
	
		$postTitleID = $_POST["postTitleID"];
		//$postTitleID = "6";

		$mysql_qry = "select * from  public_chat_msg_tbl where pub_ch_id='$postTitleID' AND pub_ch_msg_active_sta = '1'";
		$result = mysqli_query($this->conn ,$mysql_qry);
		
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
		echo json_encode(array("AllSelectedPosts"=>$temp_array));
		//mysqli_close($conn);
				
	}
	///////
	
		
/////////
	public function add_blog_posts_comments()
	{	
		$pTittle = $_POST["pTittle"];
		$pComments = $_POST["pComments"];
		$pNic = $_POST["pNic"];
		$pNickName = $_POST["pNickName"];
		$pDateTime = $_POST["pDateTime"];
		$pStat = $_POST["pStat"];
		
	/*$patient_id = "17";
		$statdate = "2017-03-10";
		$stattime = "06:58:52";
		$statvalue = "06:58:52";*/
	
		$mysql_qry = "INSERT INTO public_chat_msg_tbl (pub_ch_id,pri_ch_msg,pri_ch_user_id,	pub_cht_nick_name,pub_ch_msg_date_time,pub_ch_msg_active_sta) VALUES ('$pTittle','$pComments','$pNic','$pNickName','$pDateTime','$pStat')";
		$result = mysqli_query($this->conn,$mysql_qry);
		
		$temp_array = array();
		
		header('Content-Type: application/json');
		echo json_encode(array("AddPost"=>$temp_array));
		//mysqli_close($conn);
				
	}
	
	///////




	
}





?>