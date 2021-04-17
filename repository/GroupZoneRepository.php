<?php
require_once "MysqlConnection.php";
require_once "model/GroupZone.php";

class GroupZoneRepository
{
    static function save(GroupZone $groupZone): void
    {
        $mysqli = MysqlConnection::getInstance()->getMysqli();
        $stmt = $mysqli->prepare("INSERT INTO GroupZone VALUES ?");
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

    static function findAll(): array
    {
        $mysqli = MysqlConnection::getInstance()->getMysqli();
        $result = $mysqli->query("SELECT * FROM GroupZone");
        $allResults = array();
        while ($row = $result->fetch_assoc()) {
            array_push($allResults, new GroupZone($row['groupZoneID']));
        }
        return $allResults;
    }

    static function findByGroupZoneId($id): ?GroupZone
    {
        $mysqli = MysqlConnection::getInstance()->getMysqli();
        $stmt = $mysqli->prepare("SELECT * FROM GroupZone WHERE groupZoneID = ?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        if ($row = $result->fetch_assoc()) {
            return new GroupZone($row['groupZoneID']);
        } else {
            return null;
        }
    }

    static function deleteByGroupZoneId($id): void
    {
        $mysqli = MysqlConnection::getInstance()->getMysqli();
        $stmt = $mysqli->prepare("DELETE FROM GroupZone WHERE groupZoneID = ?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        if ($stmt->affected_rows == 0) {
            throw new Exception("No row deleted in GroupZone. \n");
        } else if ($stmt->affected_rows == -1) {
           throw new Exception(sprintf("Error occurred when delete GroupZone: %s\n", $stmt->error));
        }
        $stmt->close();
    }
}
