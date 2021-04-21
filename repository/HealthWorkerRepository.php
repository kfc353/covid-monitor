<?php
require_once "MysqlConnection.php";
require_once "model/HealthWorker.php";

class HealthWorkerRepository
{
    static function save(HealthWorker $healthWorker): void
    {
        $mysqli = MysqlConnection::getInstance()->getMysqli();
        // check if we have a person in database?
        if (PersonRepository::findByMedicareNum($healthWorker->getMedicareNum())){
            $stmt = $mysqli->prepare("INSERT INTO HealthWorker VALUES (?)");
            $medicareNum = $healthWorker->getMedicareNum();
            $stmt->bind_param("s", $medicareNum);
            $stmt->execute();
            if ($stmt->affected_rows == 0){
                throw new Exception("No row affected when insert into HealthWorker. Entry already exists.\n");
            } else if ($stmt -> affected_rows == -1){
                throw new Exception(sprintf("Error occurred when insert into HealthWorker: %s\n", $stmt->error));
            }
            $stmt->close();
        } else {
            throw new Exception("Cannot insert healthWorker when person not exists\n");
        }

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
        if ($row = $result->fetch_assoc()) {
            return new HealthWorker($row);
        } else {
            return null;
        }
    }

    static function updateByMedicareNum($healthWorker): void
    {
        printf("in health worker");
        // mysql integrity on update rule will update HealthWorker table
        PersonRepository::updateByMedicareNum($healthWorker);
    }

    static function deleteByMedicareNum($medicareNum): void{
        $mysqli = MysqlConnection::getInstance()->getMysqli();
        $stmt = $mysqli->prepare("DELETE FROM HealthWorker WHERE medicareNum = ?");
        $stmt->bind_param("s", $medicareNum);
        $stmt->execute();
        if ($stmt->affected_rows == 0) {
            throw new Exception("No row found by medicareNum when delete . \n");
        } else if ($stmt->affected_rows == -1) {
            throw new Exception(sprintf("Error occurred when delete: %s\n", $stmt->error));
        }
        $stmt->close();
    }
}