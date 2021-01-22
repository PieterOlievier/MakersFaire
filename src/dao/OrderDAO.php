<?php
require_once __DIR__ . '/DAO.php';
class orderDAO extends DAO
{


  public function insert($data)
  {
    $errors = $this->getValidationErrors($data);
    if (empty($errors)) {
      $sql = "INSERT INTO `users` (`username`, `password`) VALUES (:username, :password)";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':username', $data['username']);
      $stmt->bindValue(':password', $data['password']);
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

