<?php
include 'PetShop.php';
include 'Pet.php';
include 'Pigeon.php';
include 'Cat.php';
include 'Snake.php';
include 'Toad.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (empty($_POST['pet_name'])) {
    $errors[] = "Pet name is required";
  }
  if (empty($_POST['pet_age'])) {
    $errors[] = "Pet age is required";
  }

  if ($_POST['pet_age'] < 0 || $_POST['pet_age'] > 100) {
    $errors[] = "Please enter valid age";
  }

  if (!empty($errors)) {
    foreach ($errors as $error) {
        echo $error . "<br>";
    }
  } else {
      $pet_type = $_POST['pet_type'];
      $pet_name = $_POST['pet_name'];
      $pet_age = $_POST['pet_age'];

      $new_pet;

      if ($pet_type === 'cat') {
        $new_pet = new Cat($pet_name, $pet_age);
      } else if ($pet_type === 'pigeon') {
        $new_pet = new Pigeon($pet_name, $pet_age);
      } else if ($pet_type === 'toad') {
        $new_pet = new Toad($pet_name, $pet_age);
      } else if ($pet_type === 'snake') {
        $new_pet = new Snake($pet_name, $pet_age);
      }

      PetShop::addPet($new_pet);
  }
}