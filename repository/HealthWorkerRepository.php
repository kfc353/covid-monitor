<?php
require_once "MysqlConnection.php";
require_once "model/HealthWorker.php";

class HealthWorkerRepository
{
    static function save($healthWorker): void
    {
        $mysqli = MysqlConnection::getInstance()->getMysqli();
        // check if we have a person in database?
    }

    static function findAll(): array
    {
        $mysqli = MysqlConnection::getInstance()->getMysqli();
        $result = $mysqli->query(
            "SELECT 
                HealthWorker.medicareNum, 
                Person.firstName,
                Person.lastName,
                Person.dateOfBirth,
                Person.phoneNum,
                Person.address,
                Person.province,
                Person.citizenship,
                Person.email,
                Person.motherMedicareNum,
                Person.fatherMedicareNum
            FROM Person 
            RIGHT JOIN HealthWorker 
            ON Person.medicareNum = HealthWorker.medicareNum");
        $allResults = array();
        while ($row = $result->fetch_assoc()) {
            array_push($allResults, new HealthWorker($row));
        }
        return $allResults;
    }

    static function findByMedicareNum($medicareNum): ?HealthWorker
    {
        $mysqli = MysqlConnection::getInstance()->getMysqli();
        $stmt = $mysqli->prepare(
            "SELECT * FROM 
                (SELECT
                    HealthWorker.medicareNum,
                    Person.firstName,
                    Person.lastName,
                    Person.dateOfBirth,
                    Person.phoneNum,
                    Person.address,
                    Person.province,
                    Person.citizenship,
                    Person.email,
                    Person.motherMedicareNum,
                    Person.fatherMedicareNum
                FROM Person
                RIGHT JOIN HealthWorker
                ON Person.medicareNum = HealthWorker.medicareNum) 
                    AS PHW
            WHERE medicareNum = ?"
        );
        $stmt->bind_param("s", $medicareNum);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        if ($row = $result->fetch_assoc()){
            return new HealthWorker($row);
        } else {
            return null;
        }
    }
}