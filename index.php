<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Movies</title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
<body>

<div class="container">
<div class="row">
<div class="col-md-4">
<h1>Movies</h1> 

<?php

if(isset($_GET['message'])) {

  if($_GET['message'] == 'addmovie') {
  echo '<div class="alert alert-success">
  <strong>Success!</strong> Movie Added.
  </div>';
  } // if added

  if($_GET['message'] == 'deletemovie') {
  echo '<div class="alert alert-danger">
  <strong>Success!</strong> Movie Deleted.
  </div>';
  } // if deleted

  if($_GET['message'] == 'updatemovie') {
  echo '<div class="alert alert-info">
  <strong>Success!</strong> Movie Updated.
  </div>';
  } // if updated

}

?>
</head>

<form action="functions.php" method="POST">
<div class="form-group">
    <label for="email">Movie Title:</label>
    <input type="text" name="movie_title" class="form-control" id="movie_title" 
 value="<?=$_POST['movie_title']?>">
  </div> 
 
  <div class="form-group">
  <label for="sel1">Genre:</label>
<select name="movie_genre" id="movie_genre" class="form-control"> 
<?php
$genres = array("Action","Comedy","Kids and Family", "Drama","Fantasy","Horror","Mystery","Romance","Thriller","Western");



foreach($genres as $genre) {

  if($_POST['movie_genre'] == $genre) {
    echo '<option value="'.$genre.'" selected>'.$genre. '</option>';
  } else {
    echo '<option value="'.$genre.'">'.$genre. '</option>';
  }

}
 
?>
</select></div><br>

<?php
if(isset($_POST['updatemovie'])) {
echo '<input type="hidden" name="movie_id" value="'.$_POST['movie_id'].'">';

echo '<button type="submit" name="updatemovie" style="width:100%;" class="btn btn-info">Update Movie</button>';
} else {
echo '<button type="submit" name="addmovie" style="width:100%;" class="btn btn-success">Add Movie</button>';  
}
?>


</form>



</div></div></div>
<br><br>
<div class="container" style="border-top: 1px gray solid;">
<div class="row">
<div class="col-md-12">

<br><br>
<table class="table table-hover table-striped table-bordered">

<tr>
<th>ID</th>
<th>Movie</th>
<th>Genre</th>
<th>Edit</th>
<th>Delete</th>
</tr>
<?php

include 'db.inc.php';

$sql = "SELECT * FROM movies";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    ?>
<tr>
    <td><?=$row['movie_id']?></td>
    <td><?=$row['movie_title']?></td>
    <td><?=$row['movie_genre']?></td>
    
    <td class="text-center"><form action="index.php" method="POST"> 
    <input type="hidden" name="movie_id" value="<?=$row['movie_id']?>">
    <input type="hidden" name="movie_title" value="<?=$row['movie_title']?>">
    <input type="hidden" name="movie_genre" value="<?=$row['movie_genre']?>">
    <button type="submit" name="updatemovie"  class="btn btn-info btn-xs">Edit</button>
  </form>
</td>
    <td class="text-center"><form action="functions.php" method="POST"> 
    <input type="hidden" name="movie_id" value="<?=$row['movie_id']?>">
    <button type="submit" name="deletemovie" class="btn btn-danger btn-xs">X</button>
  </form>
</td>
</tr> 




<?php
  }
} else {
  echo "0 results";
}

mysqli_close($conn);
?>
</table>


</div></div></div>

</body>
</html>