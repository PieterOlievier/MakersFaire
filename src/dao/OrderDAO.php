<?php
require_once __DIR__ . '/DAO.php';
class OrderDAO extends DAO
{


  public function insert($data)
  {
  {
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
    if (empty($data['username'])) {
      $errors['username'] = 'please enter the username';
    }
    if (empty($data['password'])) {
      $errors['password'] = 'please enter the password';
    }
    return $errors;
  }
}

