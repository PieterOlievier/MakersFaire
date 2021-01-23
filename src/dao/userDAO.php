<?php
require_once __DIR__ . '/DAO.php';
class userDAO extends DAO
{

  public function selectById($id)
  {
    $sql = "SELECT * FROM `orders` WHERE `id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function selectByUsername($username)
  {
    $sql = "SELECT * FROM `users` WHERE `username` = :username";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':username', $username);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function insert($data)
  {
    $errors = $this->getValidationErrors($data);
    if (empty($errors)) {
      $sql = "INSERT INTO `orders` (`naam`, `voornaam`, `email`, `adres`, `nr`, `postcode`, `stad`) VALUES (:naam, :voornaam,:email,:adres,:nr,:postcode,:stad)";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':naam', $data['naam']);
      $stmt->bindValue(':voornaam', $data['voornaam']);
      $stmt->bindValue(':email', $data['email']);
      $stmt->bindValue(':adres', $data['adres']);
      $stmt->bindValue(':nr', $data['nr']);
      $stmt->bindValue(':postcode', $data['postcode']);
      $stmt->bindValue(':stad', $data['stad']);
      if ($stmt->execute()) {
        $insertedId = $this->pdo->lastInsertId();
        return $this->selectById($insertedId);
      }
    }
    return false;
  }

  public function getValidationErrors($data)
  {
    $errors = array();
    if (empty($data['naam'])) {
      $errors['naam'] = 'vul gevlieve jouw naam in';
    }
    if (empty($data['voornaam'])) {
      $errors['voornaam'] = 'vul gevlieve jouw voornaam in';
    }
    return $errors;
  }
}
