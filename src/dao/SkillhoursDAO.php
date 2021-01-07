<?php

require_once(__DIR__ . '/DAO.php');

class SkillhoursDAO extends DAO
{
    public function selectSkillhours($skill_id)
    {
        $sql = "SELECT * FROM `skill_hours` WHERE `skill_id` = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $skill_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectById($id)
    {
        $sql = "SELECT * FROM `skill_hours` WHERE `id` = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($data)
    {
        //$errors = $this->validate($data);
        if (empty($errors)) {
            $sql = "INSERT INTO `skill_hours` (`skill_id`, `user_id`, `time_one`, `time_two`, `time_three`, `time_four`) VALUES (:skill_id, :user_id,  :time_one, :time_two, :time_three, :time_four)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':skill_id', $data['skill_id']);
            $stmt->bindValue(':user_id', $data['user_id']);
            $stmt->bindValue(':time_one', $data['time_one']);
            $stmt->bindValue(':time_two', $data['time_two']);
            $stmt->bindValue(':time_three', $data['time_three']);
            $stmt->bindValue(':time_four', $data['time_four']);
            if ($stmt->execute()) {
                return $this->selectById($this->pdo->lastInsertId());
            }
        }
        return false;
    }

    public function update($data)
    {
        $errors = $this->validate($data);
        if (empty($errors)) {
            $sql = "UPDATE `skill_hours` SET `time_one` = :time_one, `time_two` = :time_two, `time_three` = :time_three, `time_four` = :time_four, `user_id` = :user_id WHERE `skill_id` = :skill_id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':time_one', $data['time_one']);
            $stmt->bindValue(':time_two', $data['time_two']);
            $stmt->bindValue(':time_three', $data['time_three']);
            $stmt->bindValue(':time_four', $data['time_four']);
            $stmt->bindValue(':user_id', $data['user_id']);
            $stmt->bindValue(':skill_id', $data['skill_id']);
            if ($stmt->execute()) {
                return $this->selectById($data['skill_id']);
            }
        }
        return false;
    }

    public function remove($data)
    {
        //$errors = $this->validate($data);
        if (empty($errors)) {
            $sql = "UPDATE `skills` SET `status` = :status WHERE `id` = :skill_id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':skill_id', $data['skill_id']);
            $stmt->bindValue(':status', "start");
            if ($stmt->execute()) {
                return $this->selectById($data['skill_id']);
            }
        }
        return false;
    }

    public function validate($data)
    {
        $errors = [];
        if (!isset($data['skill_id'])) {
            $errors['skill_id'] = 'Gelieve een image_id in te vullen';
        }
        if (!isset($data['time_one'])) {
            $errors['time_one'] = 'one';
        }
        if (!isset($data['time_two'])) {
            $errors['time_two'] = 'two';
        }
        if (!isset($data['time_three'])) {
            $errors['time_three'] = 'three';
        }
        if (!isset($data['time_four'])) {
            $errors['time_four'] = 'four';
        }
        return $errors;
    }
}
