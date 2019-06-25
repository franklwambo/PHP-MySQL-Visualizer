<?php
//include connection file 
include("connection.php");
$db = new dbObj();
$connString =  $db->getConnstring();

$params = $_REQUEST;
$action = $params['action'] !='' ? $params['action'] : '';
$empCls = new Registered($connString);

switch($action) {
 case 'list':
	$empCls->getClients();
 break;
 default:
 return;
}


class Registered {
	protected $conn;
	protected $data = array();
	function __construct($connString) {
		$this->conn = $connString;
	}
	
	function getClients() {
		$data = array();
		$sql = "call Get_New_SETS_Registrations()";
		
		$queryRecords = mysqli_query($this->conn, $sql) or die("error fetching registry count");
		
		while( $row = mysqli_fetch_assoc($queryRecords) ) { 
			$data[] = $row;
			//echo "<pre>";print_R($data);die;
		}
		
		$json_data = array(
			"Result" => 'OK', 
			"Records"  => $data   // total data array
			);

	echo json_encode($json_data);  // send data as json format*/
		
		
	}
	

/*function getConnstring() {
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "test";

	$con = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
	
	return $con;
}*/
}
/*	//include connection file 
	include_once("connection.php");
	 
	// initilize all variable
	$params =  $totalRecords = $data = array();

	$sqlTot = $sqlRec = $where = "";
	
	
	$params = $_REQUEST;
	$limit = $params["rowCount"];

	if (isset($params["current"])) { $page  = $params["current"]; } else { $page=1; };  
    $start_from = ($page-1) * $limit;
	// check search value exist
	if( !empty($params['searchPhrase']) ) {   
		$where .=" WHERE ";
		$where .=" ( employee_name LIKE '".$params['searchPhrase']."%' ";    
		$where .=" OR employee_salary LIKE '".$params['searchPhrase']."%' ";

		$where .=" OR employee_age LIKE '".$params['searchPhrase']."%' )";
	}
	
	// getting total number records without any search
	$sql = "SELECT * FROM `employee` ";
	$sqlTot .= $sql;
	$sqlRec .= $sql;
	
	
	//concatenate search sql if value exist
	if(isset($where) && $where != '') {

		$sqlTot .= $where;
		$sqlRec .= $where;
	}
	if ($limit!=-1)
	$sqlRec .= "LIMIT $start_from, $limit";
		
	$queryTot = mysqli_query($conn, $sqlTot) or die("database error:". mysqli_error($conn));


	$totalRecords = mysqli_num_rows($queryTot);

	$queryRecords = mysqli_query($conn, $sqlRec) or die("error to fetch employees data");

	//iterate on results row and create new index array of data
	while( $row = mysqli_fetch_assoc($queryRecords) ) { 
		$data[] = $row;
		//echo "<pre>";print_R($data);die;
	}	
	
	$json_data = array(
			"current"            => intval( $params['current'] ), 
			"rowCount"            => 10, 			
			"total"    => intval( $totalRecords ),
			"rows"            => $data   // total data array
			);

	echo json_encode($json_data);  // send data as json format*/
?>
	