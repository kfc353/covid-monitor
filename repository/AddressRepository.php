<?php
require_once "MysqlConnection.php";

class AddressRepository
{
    static function save(string $address, string $postalCode): void
    {
        $mysqli = MysqlConnection::getInstance()->getMysqli();
        $stmt = $mysqli->prepare("INSERT INTO AddressPostalCode VALUES (?, ?)");
        $stmt->bind_param("ss", $address, $postalCode);
        $stmt->execute();
        if ($stmt->affected_rows == 0){
            throw new Exception("No row affected when inserting into AddressPostalCode. Entry already exists.\n");
        } else if ($stmt->affected_rows == -1) {
            throw new Exception(sprintf("Error occurred when inserting into AddressPostalCode: %s\n", $stmt->error));
        }
        $stmt->close();
    }

    static function findAll(): array
    {
        $mysqli = MysqlConnection::getInstance()->getMysqli();
        $result = $mysqli->query("SELECT address FROM AddressPostalCode");
        $allAddress = array();
        while ($row = $result->fetch_assoc()) {
            array_push($allAddress, $row['address']);
        }
        return $allAddress;
    }

    static function find(string $address): ?string
    {
        $mysqli = MysqlConnection::getInstance()->getMysqli();
        $stmt = $mysqli->prepare("SELECT address FROM AddressPostalCode WHERE address = ?");
        $stmt->bind_param("s", $address);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        if ($row = $result->fetch_assoc()) {
            return $row['address'];
        } else {
            return null;
        }
    }

    static function update(string $oldAddress, string $newAddress): void
    {
        $mysqli = MysqlConnection::getInstance()->getMysqli();
        $stmt = $mysqli->prepare("UPDATE AddressPostalCode SET address = ? WHERE address = ?");
        $stmt->bind_param("ss", $newAddress, $oldAddress);
        $stmt->execute();
        if ($stmt->affected_rows == 0) {
            throw new Exception("No row updated in AddressPostalCode. \n");
        } else if ($stmt->affected_rows == -1) {
            throw new Exception(sprintf("Error occurred when update AddressPostalCode: %s\n", $stmt->error));
        }
        $stmt->close();
    }

}
