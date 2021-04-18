<?php
require_once "MysqlConnection.php";

class CityRepository
{
    static function save(string $city, string $region): void
    {
        $mysqli = MysqlConnection::getInstance()->getMysqli();
        $stmt = $mysqli->prepare("INSERT INTO CityRegion VALUES (?, ?)");
        $stmt->bind_param("ss", $city, $region);
        $stmt->execute();
        if ($stmt->affected_rows == 0) {
            throw new Exception("No row affected when inserting into CityRegion. Entry already exists.\n");
        } else if ($stmt->affected_rows == -1) {
            throw new Exception(sprintf("Error occurred when inserting into CityRegion: %s\n", $stmt->error));
        }
        $stmt->close();
    }

    static function findAll(): array
    {
        $mysqli = MysqlConnection::getInstance()->getMysqli();
        $result = $mysqli->query("SELECT city FROM CityRegion");
        $allCity = array();
        while($row = $result->fetch_assoc())
        {
            array_push($allCity, $row['city']);
        }
        return $allCity;
    }

    static function find(string $city): ?string
    {
        $mysqli = MysqlConnection::getInstance()->getMysqli();
        $stmt = $mysqli->prepare("SELECT city FROM CityRegion WHERE city = ?");
        $stmt->bind_param("s", $city);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        if ($row = $result->fetch_assoc()){
            return $row['city'];
        } else {
            return null;
        }
    }

    static function update(string $oldCity, string $newCity): void
    {
        $mysqli = MysqlConnection::getInstance()->getMysqli();
        $stmt = $mysqli->prepare("UPDATE CityRegion SET city = ? WHERE city = ?");
        $stmt->bind_param("ss", $newCity, $oldCity);
        $stmt->execute();
        if ($stmt->affected_rows == 0){
            throw new Exception("No row updated in CityRegion. \n");
        } else if ($stmt->affected_rows == -1){
            throw new Exception(sprintf("Error occurred when update CityRegion: %s\n", $stmt->error));
        }
    }
}