<?php

require_once "vendor/autoload.php";

use MyCLabs\Enum\Enum;

final class FacilityType extends Enum
{
    private const hospital = "hospital";
    private const clinic = "clinic";
    private const specialInstallment = "special installment";
}
 