<?php

// Add a Movie

if(isset($_POST['addmovie'])) {

  include 'db.inc.php';
    
  $sql = "INSERT INTO movies (movie_title, movie_genre) 
  VALUES ('{$_POST['movie_title']}', '{$_POST['movie_genre']}')";
    
    if (mysqli_query($conn, $sql)) {
    header("Location: index.php?message=addmovie");

    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    } 


}

// Update a Movie

if(isset($_POST['updatemovie'])) {
    
  include 'db.inc.php';

  $sql = "UPDATE movies SET movie_title='{$_POST['movie_title']}',movie_genre='{$_POST['movie_genre']}' 
  WHERE movie_id='{$_POST['movie_id']}'";

    if (mysqli_query($conn, $sql)) {
    header("Location: index.php?message=updatemovie");

   } else {
     echo "Error updating record: " . mysqli_error($conn);
   }

}


// Delete a Movie

if(isset($_POST['deletemovie'])) {
    
  include 'db.inc.php';

  $sql = "DELETE FROM movies WHERE movie_id='{$_POST['movie_id']}'";


    if (mysqli_query($conn, $sql)) {
    header("Location: index.php?message=deletemovie");

   } else {
     echo "Error deleting record: " . mysqli_error($conn);
   }


}

?>