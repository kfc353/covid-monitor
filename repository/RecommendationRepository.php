<?php
require_once "MysqlConnection.php";

class RecommendationRepository
{

    static function update($recommend)
    {
        $mysqli = MysqlConnection::getInstance()->getMysqli();
        $stmt = $mysqli->prepare("UPDATE Recommendation SET recommendation = ? WHERE id = 0");
        $stmt->bind_param("s", $recommend);
        $stmt->execute();
        if ($stmt->affected_rows == 0){
            throw new Exception("No row updated in Recommendation");
        } else if ($stmt->affected_rows == -1){
            throw new Exception(sprintf("Error occurred when update Recommendation"));
        }
    }
}