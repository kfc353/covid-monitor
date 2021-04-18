<?php
require_once "MysqlConnection.php";

class RecommendationRepository
{
    static function save(GroupZone $groupZone): void
    {
        $mysqli = MysqlConnection::getInstance()->getMysqli();
        $stmt = $mysqli->prepare("INSERT INTO GroupZone VALUES (?)");
        $groupZoneId = $groupZone->getGroupZoneId();
        $stmt->bind_param("s", $groupZoneId);
        $stmt->execute();
        if ($stmt->affected_rows == 0) {
            throw new Exception("No row affected when inserting into GroupZone. Entry already exists.\n");
        } else if ($stmt->affected_rows == -1) {
            throw new Exception(sprintf("Error occurred when inserting into GroupZone: %s\n", $stmt->error));
        }
        $stmt->close();
    }
    
    static function update($recommend)
    {
        $mysqli = MysqlConnection::getInstance()->getMysqli();
        $stmt = $mysqli->prepare("UPDATE Recommendation SET recommendation = ? WHERE id = 0");
        $stmt->bind_param("s", $recommend);
        $stmt->execute();
        if ($stmt->affected_rows == 0){
            throw new Exception("No row updated in Recommendation");
        } else if ($stmt->affected_rows == -1){
            throw new Exception(sprintf("Error occurred when update Recommendation: %s\n", $stmt->error));
        }
    }

    static function deleteByRecommendationId($id): void
    {
        $mysqli = MysqlConnection::getInstance()->getMysqli();
        $stmt = $mysqli->prepare("DELETE FROM Recommendation WHERE id = ?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        if ($stmt->affected_rows == 0) {
            throw new Exception("No row deleted in Recommendation. \n");
        } else if ($stmt->affected_rows == -1) {
           throw new Exception(sprintf("Error occurred when delete Recommendation: %s\n", $stmt->error));
        }
        $stmt->close();
    }
}