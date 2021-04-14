<?php


class GroupZone
{
    private string $groupZoneId;

    public function __construct(string $groupZoneId)
    {
        $this->setGroupZoneId($groupZoneId);
    }

    /**
     * @return string
     */
    public function getGroupZoneId(): string
    {
        return $this->groupZoneId;
    }

    /**
     * @param string $groupZoneId
     */
    public function setGroupZoneId(string $groupZoneId): void
    {
        $this->groupZoneId = $groupZoneId;
    }


}