<?php 
include ('db.php'); 
$uid=$_GET['uid'];
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
try{
	$stmt=$dbcon->prepare("Update crud set name=:name,email=:email,
	password=:password where id=:uid");
	$stmt->bindParam(":uid", $uid);
	$stmt->bindParam(":name", $name);
	$stmt->bindParam(":email", $email);
	$stmt->bindParam(":password", $password);
	$stmt->execute();
	header("location:edit.php?editid=$uid");
}

catch (PDOException $e){
	print "Error!: ".$e->getMessage()."<br/>";
	die();
}
?>