<?php
require_once "MysqlConnection.php";
require_once "model/HealthFacility.php";


class HealthFacilityRepository
{
    static function save(HealthFacility $facility): void
    {
        $mysqli = MysqlConnection::getInstance()->getMysqli();
        $stmt = $mysqli->prepare("INSERT INTO HealthFacility VALUES (?,?,?,?,?)");
        $name = $facility->getName();
        $address = $facility->getAddress();
        $webAddress = $facility->getWebAddress();
        $type = $facility->getType()->getValue();
        $acceptMethod = $facility->getAcceptMethod()->getValue();
        $stmt->bind_param("sssss",
            $name, $address, $webAddress, $type, $acceptMethod);
        $stmt->execute();
        if ($stmt->affected_rows == 0) {
            printf("No row affected when inserting into HealthFacility. Entry already exists.\n");
        } else if ($stmt->affected_rows == -1) {
            printf("Error occurred when inserting into HealthFacility: %s\n", $stmt->error);
        }
        $stmt->close();
    }

    static function findAll(): array
    {
        $mysqli = MysqlConnection::getInstance()->getMysqli();
        $result = $mysqli->query("SELECT * FROM HealthFacility");
        $allFacilities = array();
        while ($row = $result->fetch_assoc()) {
            array_push($allFacilities, new HealthFacility($row));
        }
        return $allFacilities;
    }

    static function findByNameAddress($name, $address): ?HealthFacility
    {
        $mysqli = MysqlConnection::getInstance()->getMysqli();
        $stmt = $mysqli->prepare("SELECT * FROM HealthFacility WHERE name = ? AND address = ?");
        $stmt->bind_param("ss", $name, $address);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            return new HealthFacility($row);
        } else {
            return null;
        }
    }

    static function updateByNameAddress(HealthFacility $facility): void
    {
        $mysqli = MysqlConnection::getInstance()->getMysqli();
        $stmt = $mysqli->prepare("UPDATE HealthFacility SET 
                          webAddress = ?, type = ?, acceptMethod = ?
                          WHERE name = ? AND address = ?");
        $name = $facility->getName();
        $address = $facility->getAddress();
        $webAddress = $facility->getWebAddress();
        $type = $facility->getType();
        $acceptMethod = $facility->getAcceptMethod();
        $stmt->bind_param("sssss", $webAddress, $type
            , $acceptMethod, $name, $address);
        $stmt->execute();
        if ($stmt -> affected_rows == 0){
            printf("No row updated in HealthFacility. \n");
        } else if ($stmt -> affected_rows == -1){
            printf("Error occurred when update HealthFacility: %s\n", $stmt->error);
        }
        $stmt->close();
    }

    static function deleteByNameAddress($name, $address): void
    {
        $mysqli = MysqlConnection::getInstance()->getMysqli();
        $stmt = $mysqli->prepare("DELETE FROM HealthFacility WHERE name = ? AND address = ?");
        $stmt->bind_param("ss", $name, $address);
        $stmt->execute();
        if ($stmt->affected_rows == 0){
            printf("No row deleted in HealthFacility");
        } else {
            printf("Error occurred when delete HealthFacility: %s\n", $stmt->error);
        }
        $stmt->close();

    }
}