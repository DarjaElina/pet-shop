<?php
 require_once "classes/Pet.php";
 require_once "classes/PetShop.php";
 require_once "classes/Cat.php";
 require_once "classes/Toad.php";
 require_once "classes/Snake.php";
 require_once "classes/Pigeon.php";
  
  session_start();
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pet Shop</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <h1>Pet Shop🐸🐍🐈🐦</h1>
  <?php include "managePets.php"; ?>
  <?php if (!empty($errors)) : ?>
  <div class="error-box">
    <?php foreach ($errors as $error) {
      echo "<p class='error-message'>$error</p>";
    } ?>
  </div>
  <?php endif; ?>
  <form method="POST" class="pet-form">
    <label for="pet_type">Select pet type</label>
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

    <input type="submit" value="Add Pet">
  </form>
  <h3>Our pets</h3>
  <?php
    $pets = PetShop::getPets();
    if (sizeof($pets) > 0) {
      echo '<div class="pet-container">';
      foreach($pets as $pet) {
        echo '<div class="pet-card">';
        echo "<h4 class='emoji'>🐾 $pet->name</h4>";
        echo "<p>Age: $pet->age</p>";
        ob_start();
        $pet->perform_unique_action();
        $action = ob_get_clean();
        echo "<p>$action</p>";
        echo '</div>';
      }
      echo '</div>';
    } else echo "We have no pets available at this moment!";
  ?>
</body>
</html>

