<?php
require_once "MysqlConnection.php";

class PostalCodeRepository
{
    static function save(string $postalCode, string $city): void
    {
        $mysqli = MysqlConnection::getInstance()->getMysqli();
        $stmt = $mysqli->prepare("INSERT INTO PostalCodeCity VALUES (?, ?)");
        $stmt->bind_param("ss", $postalCode, $city);
        $stmt->execute();
        if($stmt->affected_rows == 0){
            throw new Exception("No row affected when inserting into PostalCodeCity. Entry already exisits. \n");
        }else if($stmt->affected_rows == -1) {
            throw new Exception(sprintf("Error occurred when inserting into PostalCodeCity: %s\n", $stmt->error));
        }
        $stmt->close();
    }

    static function findAll(): array
    {
        $mysqli = MysqlConnection::getInstance()->getMysqli();
        $result = $mysqli->query("SELECT postalCode FROM PostalCodeCity");
        $allPostalCode = array();
        while ($row = $result->fetch_assoc()) {
            array_push($allPostalCode, $row['address']);
        }
        return $allPostalCode;
    }

    static function find(string $postalCode): ?string
    {
        $mysqli = MysqlConnection::getInstance()->getMysqli();
        $stmt = $mysqli->prepare("SELECT postalCode FROM PostalCodeCity WHERE postalCode = ?");
        $stmt->bind_param("s", $postalCode);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        if ($row = $result->fetch_assoc()) {
            return $row['postalCode'];
        } else {
            return null;
        }
    }

    static function update(string $oldPostalCode, string $newPostalCode): void
    {
        $mysqli = MysqlConnection::getInstance()->getMysqli();
        $stmt = $mysqli->prepare("UPDATE PostalCodeCity SET postalCode = ? WHERE postalCode = ?");
        $stmt->bind_param("ss", $newPostalCode, $oldPostalCode);
        $stmt->execute();
        if ($stmt->affected_rows == 0) {
            throw new Exception("No row updated in PostalCodeCity. \n");
        } else if ($stmt->affected_rows == -1) {
            throw new Exception(sprintf("Error occurred when update PostalCodeCity: %s\n", $stmt->error));
        }
    }

}