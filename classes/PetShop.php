<?php

class PetShop {
  public static function addPet($pet) {
    $_SESSION['pets'][] = $pet;
  }
  public static function getPets() {
    return $_SESSION['pets'] ?? [];
  }
}