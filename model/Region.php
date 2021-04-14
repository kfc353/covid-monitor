<?php

class Region
{
    private string $region;

    public function __construct(array $assocArray)
    {
        $this->setRegion($assocArray['region']);
    }

    /**
     * @return string
     */
    public function getRegion(): string
    {
        return $this->region;
    }

    /**
     * @param string $region
     */
    public function setRegion(string $region): void
    {
        $this->region = $region;
    }
}