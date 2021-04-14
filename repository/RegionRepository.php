<?php
require_once "MysqlConnection.php";
require_once "model/Region.php";

class RegionRepository
{
    // add region?

    static function findAll(): array
    {
        $mysqli = MysqlConnection::getInstance()->getMysqli();
        $result = $mysqli->query("SELECT DISTINCT region FROM CityRegion");
        $allRegions = array();
        while ($row = $result->fetch_assoc()) {
            array_push($allRegions, new Region($row));
        }
        return $allRegions;
    }

    static function findByRegion($region): ?Region
    {
        $mysqli = MysqlConnection::getInstance()->getMysqli();
        $stmt = $mysqli->prepare("SELECT DISTINCT region FROM CityRegion WHERE region = ?");
        $stmt->bind_param("s", $region);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        if ($row = $result->fetch_assoc()) {
            return new Region($row);
        } else {
            return null;
        }
    }

    // update region?

    static function deleteByRegion($region): void
    {
        $mysqli = MysqlConnection::getInstance()->getMysqli();
        $stmt = $mysqli->prepare("DELETE FROM CityRegion WHERE region = ?");
        $stmt->bind_param("s", $region);
        $stmt->execute();
        if ($stmt->affected_rows == 0) {
            printf("No row deleted in CityRegion. \n");
        } else if ($stmt->affected_rows == -1) {
            printf("Error occurred when delete CityRegion: %s\n", $stmt->error);
        }
    }

}