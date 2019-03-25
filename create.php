<?php 
include ('db.php'); 
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
try{
	$stmt=$dbcon->prepare("Insert into crud(name,email,password) values
	(:name, :email, :password)");
	$stmt->bindParam(":name", $name);
	$stmt->bindParam(":email", $email);
	$stmt->bindParam(":password", $password);
	$stmt->execute();
	header("location:index.php");
}

catch (PDOException $e){
	print "Error!: ".$e->getMessage()."<br/>";
	die();
}
?>