<?php

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
    return;
}

  $pet_type = $_POST['pet_type'];
  $pet_name = $_POST['pet_name'];
  $pet_age = $_POST['pet_age'];

  switch ($pet_type) {
      case 'cat':
          $new_pet = new Cat($pet_name, $pet_age);
          break;
      case 'pigeon':
          $new_pet = new Pigeon($pet_name, $pet_age);
          break;
      case 'toad':
          $new_pet = new Toad($pet_name, $pet_age);
          break;
      case 'snake':
          $new_pet = new Snake($pet_name, $pet_age);
          break;
      default:
          return;
  }

  PetShop::addPet($new_pet);
}