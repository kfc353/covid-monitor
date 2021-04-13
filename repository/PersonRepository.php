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
    }

    static function findAll(): array
    {
        $mysqli = MysqlConnection::getInstance()->getMysqli();
        $result = $mysqli->query("SELECT * FROM Person");
        $allPerson = array();
        while($row = $result->fetch_assoc())
            array_push($allPerson, self::createPersonFromAssoc($row));
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
            return self::createPersonFromAssoc($row);
        } else {
            return null;
        }
    }

    static function deleteByMedicareNum($medicareNum): void
    {
        $mysqli = MysqlConnection::getInstance()->getMysqli();
        $stmt = $mysqli->prepare("DELETE FROM Person WHERE medicareNum = ?");
        $stmt->bind_param("s", $medicareNum);
        $stmt->execute();
        if ($stmt->affected_rows == 0) {
            printf("No row found by medicareNum when delete . \n");
        } else if ($stmt->affected_rows == -1) {
            printf("Error occurred when delete: %s\n", $stmt->error);
        }
        $stmt->close();
    }

    static function updateByMedicareNum($medicareNum, Person $person): void
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
    }

    private static function createPersonFromAssoc($assocArray): Person
    {
        $person = new Person();
        $person->setMedicareNum($assocArray['medicareNum']);
        $person->setFirstName($assocArray['firstName']);
        $person->setLastName($assocArray['lastName']);
        $person->setDateOfBirth($assocArray['dateOfBirth']);
        $person->setAddress($assocArray['address']);
        $person->setProvince($assocArray['province']);
        $person->setCitizenship($assocArray['citizenship']);
        $person->setEmail($assocArray['email']);
        if (isset($assocArray['motherMedicareNum'])) {
            $person->setMotherMedicareNum($assocArray['motherMedicareNum']);
        }
        if (isset($assocArray['fatherMedicareNum'])) {
            $person->setFatherMedicareNum($assocArray['fatherMedicareNum']);
        }
        return $person;
    }

}

