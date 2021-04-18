<?php
class HealthFacility
{
    private string $name;
    private string $address;
    private string $webAddress;
    private string $type;
    private string $acceptMethod;

    public function __construct($assocArray){
        $this->setName($assocArray['name']);
        $this->setAddress($assocArray['address']);
        $this->setWebAddress($assocArray['webAddress']);
        $this->setType(($assocArray['type']));
        $this->setAcceptMethod(($assocArray['acceptMethod']));
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
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * 
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getAcceptMethod(): string
    {
        return $this->acceptMethod;
    }

    /**
     * @param string $acceptMethod
     */
    public function setAcceptMethod(string $acceptMethod): void
    {
        $this->acceptMethod = $acceptMethod;
    }

}