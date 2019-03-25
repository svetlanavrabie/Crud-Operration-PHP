<?php 
include ('db.php'); 
$delid=$_GET['delid'];

try{
	$stmt=$dbcon->prepare("delete from crud where id=:did");
	$stmt->bindParam(":did", $delid);
	$stmt->execute();
	header("location:index.php");
}

catch (PDOException $e){
	print "Error!: ".$e->getMessage()."<br/>";
	die();
}
?>