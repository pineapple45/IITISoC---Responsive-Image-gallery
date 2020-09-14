<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "registration");

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	//$image_text = mysqli_real_escape_string($db, $_POST['image_text']);

  	// image file directory
  	$target = "images/".basename($image);

  	$sql = "INSERT INTO users (image) VALUES ('$image')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      $msg = "Image uploaded successfully";
      
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($db, "SELECT * FROM users");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Upload page</title>
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="s.css" />
  </head>
  <body>
    <div class="main">
      <div class="container">
      <?php
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
      	echo "<img src='images/".$row['image']."' >";
      	echo "<p>".$row['image_text']."</p>";
      echo "</div>";
    }
  ?>
        <form action="" method="POST" enctype="multipart/form-data">
          <h2>UPLOAD IMAGES</h2>
          <div class="formgrp">
            <label for="Upload"></label>
          <input type="file" name="" placeholder=""="No file chosen.">
        </div>
          <div class="formgrp">
            <label for="submit"></label>
          <input type="submit" value="Submit"/>
        </div>
        <!--  <button type="submit" class="btn btn-primary">UPLOAD</button>-->
          <h4><a href="rr.html">View Images</a></h4>
        </form>
      </div>
    </div>
  </body>
</html>
