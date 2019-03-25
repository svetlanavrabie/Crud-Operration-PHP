<?php include ('db.php'); ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Crud</title>
  </head>
  <body>
  <div class="container">
	<div class="row">
	
	<form action="create.php" method="post">
	<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
    </div>
	
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" placeholder="Enter email" name="email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
  </div>
 
  <button type="submit" class="btn btn-primary">Add</button>
</form>
</div>
<div class="row">
<br />
	
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col" colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
try{
	
	$stmt=$dbcon->prepare("SELECT * FROM crud");
	$stmt->execute();
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
		extract($row);


?>

<tr>
<td><?php echo $id; ?></td>
<td><?php echo $name; ?></td>
<td><?php echo $email; ?></td>
<td><a href="edit.php?editid=<?php echo $id; ?>" class="btn btn-outline-secondary">Edit</a></td>
<td><a href="delete.php?delid=<?php echo $id; ?>" class="btn btn-outline-danger">Delete</a></td>

</tr>  
<?php
}
}

catch (PDOException $e){
	print "Error!: ".$e->getMessage()."<br/>";
	die();	
}

?>
  </tbody>
</table>
</div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>