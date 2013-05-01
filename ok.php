<?
include 'db.php';

error_reporting(E_ALL ^ E_NOTICE);

$sql = "SELECT * from track LIMIT 1"; 
$result = mysql_query($sql);
if ($result){
	echo "ok";
} else {
	echo "error";
}
?>