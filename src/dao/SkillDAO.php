<?php

require_once(__DIR__ . '/DAO.php');

class SkillDAO extends DAO
{

  //-------------------------------------------------//

  public function selectById($id)
  {
    $sql = "SELECT * FROM `skills` WHERE `id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  //-------------------------------------------------//

  public function selectSkills()
  {
    $sql = "SELECT * FROM `skills` ORDER BY `id`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  // `status` = :status,

  public function selectCompletedSkills($user_id)
  {
    $sql = "SELECT * FROM `current_skills` WHERE `status` = :status AND `user_id` = :user_id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':status', 'finished');
    $stmt->bindValue(':user_id', $user_id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  /*-------------------------------------------------------------------------------*/

  public function insert($data)
  {
    $errors = $this->validate($data);
    if (empty($errors)) {
      $sql = "INSERT INTO `current_skills` (`user_id`, `current_skill`, `recommanded_time`, `timeperiod`, `start_date`, `status`) VALUES (:user_id, :current_skill, :recommanded_time, :timeperiod, :start_date, :status)";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':user_id', $data['user_id']);
      $stmt->bindValue(':current_skill', $data['current_skill']);
      $stmt->bindValue(':recommanded_time', $data['recommanded_time']);
      $stmt->bindValue(':timeperiod', $data['timeperiod']);
      $stmt->bindValue(':start_date', $data['start_date']);
      $stmt->bindValue(':status', $data['status']);
      if ($stmt->execute()) {
        return $this->selectById($this->pdo->lastInsertId());
      }
    }
    return false;
  }


  public function selectCurrentSkillById($id)
  {
    $sql = "SELECT * FROM `current_skills` WHERE `id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function selectCurrentSkills()
  {
    $sql = "SELECT * FROM `current_skills` ORDER BY `id`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }


  public function selectByIdCurrent($title)
  {
    $sql = "SELECT * FROM `current_skills` WHERE `current_skill` = :title";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':title', $title);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }



  public function update($data)
  {
    //$errors = $this->validate($data);
    if (empty($errors)) {
      $sql = "UPDATE `current_skills` SET `user_id` = :user_id, `current_skill` = :current_skill, `recommanded_time` = :recommanded_time, `timeperiod` = :timeperiod, `start_date` = :start_date WHERE `id` = :id";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':user_id', $data['user_id']);
      $stmt->bindValue(':current_skill', $data['current_skill']);
      $stmt->bindValue(':recommanded_time', $data['recommanded_time']);
      $stmt->bindValue(':timeperiod', $data['timeperiod']);
      $stmt->bindValue(':start_date', $data['start_date']);
      $stmt->bindValue(':id', $data['id']);
      if ($stmt->execute()) {
        return $this->selectById($data['id']);
      }
    }
    return false;
  }

  public function updateHome($data)
  {
    //$errors = $this->validate($data);
    if (empty($errors)) {
      $sql = "UPDATE `skills` SET `status` = :status, `start_date` = :start_date WHERE `id` = :skill_id";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':skill_id', $data['skill_id']);
      $stmt->bindValue(':status', "progress");
      $stmt->bindValue(':start_date', $data['start_date']);
      if ($stmt->execute()) {
        return $this->selectById($data['skill_id']);
      }
    }
    return false;
  }

  public function validate($data)
  {
    $errors = [];
    if (!isset($data['current_skill'])) {
      $errors['current_skill'] = 'Gelieve een title in te vullen';
    }
    if (!isset($data['user_id'])) {
      $errors['status'] = 'Gelieve een user_id in te vullen';
    }
    return $errors;
  }
}
