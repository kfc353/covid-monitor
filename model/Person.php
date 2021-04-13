<?php

class Person
{
  private string $medicareNum;
  private string $firstName;
  private string $lastName;
  private string $dateOfBirth;
  private string $phoneNum;
  private string $address;
  private string $province;
  private string $citizenship;
  private string $email;
  private string $motherMedicareNum;
  private string $fatherMedicareNum;

    /**
     * @param string $medicareNum
     */
  public function setMedicareNum(string $medicareNum)
  {
    $this->medicareNum = $medicareNum;
  }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @param string $dateOfBirth
     */
    public function setDateOfBirth(string $dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;
    }

    /**
     * @param string $phoneNum
     */
    public function setPhoneNum(string $phoneNum)
    {
        $this->phoneNum = $phoneNum;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address)
    {
        $this->address = $address;
    }

    /**
     * @param string $province
     */
    public function setProvince(string $province)
    {
        $this->province = $province;
    }

    /**
     * @param string $citizenship
     */
    public function setCitizenship(string $citizenship)
    {
        $this->citizenship = $citizenship;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * @param string $motherMedicareNum
     */
    public function setMotherMedicareNum(string $motherMedicareNum)
    {
        $this->motherMedicareNum = $motherMedicareNum;
    }

    /**
     * @param string $fatherMedicareNum
     */
    public function setFatherMedicareNum(string $fatherMedicareNum)
    {
        $this->fatherMedicareNum = $fatherMedicareNum;
    }

    /**
     * @return string
     */
    public function getMedicareNum(): string
    {
        return $this->medicareNum;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getDateOfBirth(): string
    {
        return $this->dateOfBirth;
    }

    /**
     * @return string
     */
    public function getPhoneNum(): string
    {
        return $this->phoneNum;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @return string
     */
    public function getProvince(): string
    {
        return $this->province;
    }

    /**
     * @return string
     */
    public function getCitizenship(): string
    {
        return $this->citizenship;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getMotherMedicareNum(): string
    {
        return $this->motherMedicareNum;
    }

    /**
     * @return string
     */
    public function getFatherMedicareNum(): string
    {
        return $this->fatherMedicareNum;
    }


}
