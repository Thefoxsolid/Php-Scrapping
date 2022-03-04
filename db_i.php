<?php
@set_time_limit(1300); 

function dbconnect() {
/*	$dbhost = "localhost";
	$dbuname = "user_engintel";
	$dbpass = "nosgopo";

    $dbname = "engintel_cl_db";*/
//		$dbuname = "root";
//	$dbpass = "";
 //   $dbname = "engintel";


	$dbhost = "localhost";
	$dbuname = "root";
	$dbpass = "";
    $dbname = "auto_php";
	//$dbuname = "giftymai";
	//$dbpass = "(hQ%2I6WJ5K%"";
    //$dbname = "bauldelr_gf";
	global $dbconnecta;
	$dbconnecta=mysqli_connect("p:".$dbhost,$dbuname,$dbpass);
	$msg194 = "Error de conexi�n";
	@mysqli_select_db($dbconnecta,"$dbname") or die("$msg194");
}

function dbquery($query) {
global $dbconnecta;
	$msg195 = "Error de conexi�n";
	$result = mysqli_query($dbconnecta,$query) or die("$msg195 (" . mysqli_errno($dbconnecta) . ": " . mysqli_error($dbconnecta) . ") $query");
	return $result;
}
function dbquery2($query) {
	global $dbconnecta;
	if ($result = mysqli_query($dbconnecta,$query))
	return $result;
	else
	return "no";
}
function dbquery3($query) {
	global $dbconnecta;
	if ($result = mysqli_query($dbconnecta,$query))
	return "si";
	else
	return "no";
}

function dbquery_up($a,$b){
	if ($result = @mysqli_query($a))
		return "insert";
	else{
		@mysql_query($b);
		return "update";
	}
}
?>
