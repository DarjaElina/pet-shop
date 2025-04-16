<?php
  include "managePets.php";
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
  <form method="POST">
    <label for="pet_type" id="type">Select pet type</label>
    <select name="pet_type" id="pet_type">
      <option value="cat">Cat</option>
      <option value="snake">Snake</option>
      <option value="toad">Toad</option>
      <option value="pigeon">Pigeon</option>
    </select>

    <label for="pet_name">Enter pet name</label>
    <input type="text" id="pet_name" name="pet_name">

    <label for="pet_age">Enter pet age</label>
    <input type="number" id="pet_age" name="pet_age">
    <input type="submit">
  </form>
  <h3>Our pets</h3>
  <?php
    $pets = PetShop::getPets();
    if (sizeof($pets) > 0) {
      foreach($pets as $pet) {
        echo "<p>Hi, my name is $pet->name</p>";
        echo "<p>I am $pet->age years old!</p>";
        $pet->perform_unique_action();
      }
    } else echo "We have no pets available at this moment!";
  ?>
</body>
</html>

