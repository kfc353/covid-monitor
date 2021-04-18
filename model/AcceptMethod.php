<?php

require_once "vendor/autoload.php";

use MyCLabs\Enum\Enum;

final class AcceptMethod extends Enum
{
    private const appointment = "appointment only";
    private const walkin = "walk-in";
    private const both = "both";
}