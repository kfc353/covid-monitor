<?php
require_once "MysqlConnection.php";
require_once "model/Person.php";

class PersonRepository
{
    static function save(Person $person): void
    {
        $mysqli = MysqlConnection::getInstance()->getMysqli();
        $stmt = $mysqli->prepare("INSERT INTO Person VALUES (?,?,?,?,?,?,?,?,?,?,?)");
        $firstName = $person->getFirstName();
        $lastName = $person->getLastName();
        $dateOfBirth = $person->getDateOfBirth();
        $phoneNum = $person->getPhoneNum();
        $address = $person->getAddress();
        $province = $person->getProvince();
        $citizenship = $person->getCitizenship();
        $email = $person->getEmail();
        $motherMedicareNum = $person->getMotherMedicareNum();
        $fatherMedicareNum = $person->getFatherMedicareNum();
        $stmt->bind_param("sssssssssss",
            $firstName,
            $lastName,
            $dateOfBirth,
            $phoneNum,
            $address,
            $province,
            $citizenship,
            $email,
            $motherMedicareNum,
            $fatherMedicareNum);
        $stmt->execute();
        if ($stmt->affected_rows == 0) {
            printf("No row affected when inserting into Person. Entry already exists.\n");
        } else if ($stmt->affected_rows == -1) {
            printf("Error occurred when inserting into Person: %s\n", $stmt->error);
        }
        $stmt->close();
    }

    static function findAll(): array
    {
        $mysqli = MysqlConnection::getInstance()->getMysqli();
        $result = $mysqli->query("SELECT * FROM Person");
        $allPerson = array();
        while($row = $result->fetch_assoc()){
            array_push($allPerson, new Person($row));
        }

        return $allPerson;
    }

    static function findByMedicareNum($medicareNum): ?Person
    {
        $mysqli = MysqlConnection::getInstance()->getMysqli();
        $stmt = $mysqli->prepare("SELECT * FROM Person WHERE medicareNum = ?");
        $stmt->bind_param("s", $medicareNum);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        if ($row = $result->fetch_assoc()){
            return new Person($row);
        } else {
            return null;
        }
    }

    static function updateByMedicareNum(Person $person): void
    {
        $mysqli = MysqlConnection::getInstance()->getMysqli();
        $stmt = $mysqli->prepare("UPDATE Person SET 
                  firstName = ?,
                  lastName = ?,
                  dateOfBirth = ?,
                  phoneNum = ?,
                  address = ?,
                  province = ?,
                  citizenship = ?,
                  email = ?,
                  motherMedicareNum = ?,
                  fatherMedicareNum = ?
                  WHERE medicareNum = ?");
        $medicareNum = $person->getMedicareNum();
        $firstName = $person->getFirstName();
        $lastName = $person->getLastName();
        $dateOfBirth = $person->getDateOfBirth();
        $phoneNum = $person->getPhoneNum();
        $address = $person->getAddress();
        $province = $person->getProvince();
        $citizenship = $person->getCitizenship();
        $email = $person->getEmail();
        $motherMedicareNum = $person->getMotherMedicareNum();
        $fatherMedicareNum = $person->getFatherMedicareNum();
        $stmt->bind_param("sssssssssss",
            $firstName,
            $lastName,
            $dateOfBirth,
            $phoneNum,
            $address,
            $province,
            $citizenship,
            $email,
            $motherMedicareNum,
            $fatherMedicareNum,
            $medicareNum
        );
        $stmt->execute();
        if ($stmt->affected_rows == 0) {
            printf("No row updated in Person. \n");
        } else if ($stmt->affected_rows == -1) {
            printf("Error occurred when update Person: %s\n", $stmt->error);
        }
        $stmt->close();
    }

    static function deleteByMedicareNum($medicareNum): void
    {
        $mysqli = MysqlConnection::getInstance()->getMysqli();
        $stmt = $mysqli->prepare("DELETE FROM Person WHERE medicareNum = ?");
        $stmt->bind_param("s", $medicareNum);
        $stmt->execute();
        if ($stmt->affected_rows == 0) {
            printf("No row deleted in Person. \n");
        } else if ($stmt->affected_rows == -1) {
            printf("Error occurred when delete Person: %s\n", $stmt->error);
        }
        $stmt->close();
    }


}

