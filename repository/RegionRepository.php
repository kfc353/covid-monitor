<?php
require_once "MysqlConnection.php";

class RegionRepository
{
    static function save(string $region): void
    {
        $mysqli = MysqlConnection::getInstance()->getMysqli();
        $stmt = $mysqli->prepare("INSERT INTO Region VALUES ?");
        $stmt->bind_param("s", $region);
        $stmt->execute();
        if ($stmt->affected_rows == 0) {
            throw new Exception("No row affected when inserting into Region. Entry already exists.\n");
        } else if ($stmt->affected_rows == -1) {
            throw new Exception(sprintf("Error occurred when inserting into Region: %s\n", $stmt->error));
        }
    }

    static function findAll(): array
    {
        $mysqli = MysqlConnection::getInstance()->getMysqli();
        $result = $mysqli->query("SELECT region FROM Region");
        $allRegions = array();
        while ($row = $result->fetch_assoc()) {
            array_push($allRegions, $row['region']);
        }
        return $allRegions;
    }

    static function findByRegion($region): ?string
    {
        $mysqli = MysqlConnection::getInstance()->getMysqli();
        $stmt = $mysqli->prepare("SELECT region FROM Region WHERE region = ?");
        $stmt->bind_param("s", $region);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        if ($row = $result->fetch_assoc()) {
            return $row['region'];
        } else {
            return null;
        }
    }

    static function update($oldRegion, $newRegion): void
    {
        $mysqli = MysqlConnection::getInstance()->getMysqli();
        $stmt = $mysqli->prepare("UPDATE Region SET region = ? WHERE region = ?");
        $stmt->bind_param("ss", $newRegion, $oldRegion);
        $stmt->execute();
        if ($stmt->affected_rows == 0) {
            throw new Exception("No row updated in Region. \n");
        } else if ($stmt->affected_rows == -1) {
            throw new Exception(sprintf("Error occurred when update Region: %s\n", $stmt->error));
        }
    }

    static function deleteByRegion($region): void
    {
        $mysqli = MysqlConnection::getInstance()->getMysqli();
        $stmt = $mysqli->prepare("DELETE FROM Region WHERE region = ?");
        $stmt->bind_param("s", $region);
        $stmt->execute();
        if ($stmt->affected_rows == 0) {
            throw new Exception("No row deleted in CityRegion. \n");
        } else if ($stmt->affected_rows == -1) {
            throw new Exception(sprintf("Error occurred when delete CityRegion: %s\n", $stmt->error));
        }
    }
}
