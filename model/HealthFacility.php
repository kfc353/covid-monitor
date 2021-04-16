<?php

class HealthFacility
{
    private string $name;
    private string $address;
    private string $webAddress;
    private FacilityType $type;
    private AcceptMethod $acceptMethod;

    public function __construct($assocArray){
        $this->setName($assocArray['name']);
        $this->setAddress($assocArray['address']);
        $this->setWebAddress($assocArray['webAddress']);
        $this->setType(FacilityType::from($assocArray['type']));
        $this->setAcceptMethod(AcceptMethod::from($assocArray['acceptMethod']));
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getWebAddress(): string
    {
        return $this->webAddress;
    }

    /**
     * @param string $webAddress
     */
    public function setWebAddress(string $webAddress): void
    {
        if($webAddress == NULL){
            $this->webAddress = '';
        } else {
            $this->webAddress = $webAddress;

        }
    }

    /**
     * @return FacilityType
     */
    public function getType(): FacilityType
    {
        return $this->type;
    }

    /**
     * @param FacilityType $type
     */
    public function setType(FacilityType $type): void
    {
        $this->type = $type;
    }

    /**
     * @return AcceptMethod
     */
    public function getAcceptMethod(): AcceptMethod
    {
        return $this->acceptMethod;
    }

    /**
     * @param AcceptMethod $acceptMethod
     */
    public function setAcceptMethod(AcceptMethod $acceptMethod): void
    {
        $this->acceptMethod = $acceptMethod;
    }

}