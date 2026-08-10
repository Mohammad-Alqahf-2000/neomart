<?php

namespace App\Enums;

enum StoreOrderTaxTypeEnum: string
{
    // "percentage", "value"
    case PERCENTAGE = "percentage";
    case VALUE = "value";
}
