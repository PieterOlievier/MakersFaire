<?php

require_once(__DIR__ . '/DAO.php');

class StepsdayDAO extends DAO
{

    //-------------------------------------------------//

    public function selectById($id)
    {
        $sql = "SELECT * FROM `skill_steps_day` WHERE `id` = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //-------------------------------------------------//

    public function selectSkillStepsDay($skill_id)
    {
        $sql = "SELECT * FROM `skill_steps_day` WHERE `skill_id` = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $skill_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
